#!/usr/bin/env php
<?php
// migrate.php — PHP CLI migrations for MySQL
// Uso:
//   php migrate.php status
//   php migrate.php up [--to=VERSION] [--dry-run]
//   php migrate.php down [--steps=N] [--to=VERSION] [--dry-run]
//   php migrate.php make "descricao_da_migration"

ini_set('display_errors', '1');
error_reporting(E_ALL);

function env($k, $d = null) {
  $v = getenv($k);
  return ($v === false || $v === '') ? $d : $v;
}

if (!defined('STDERR')) {
  define('STDERR', fopen('php://stderr', 'w'));
}

try {
  throw new Exception("Algo deu errado!");
} catch (Throwable $e) {
  fwrite(STDERR, "Erro: " . $e->getMessage() . PHP_EOL);
}

$DB_HOST = env('DB_HOST', 'db');
$DB_PORT = (int)env('DB_PORT', 3306);
$DB_NAME = env('DB_NAME', 'movies');
$DB_USER = env('DB_USER', 'root');
$DB_PASS = env('DB_PASS', 'root');
$DIR     = rtrim(env('MIGRATIONS_DIR', './migrations'), '/');

if (!is_dir($DIR)) {
  mkdir($DIR, 0775, true);
}

$dsn = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset=utf8mb4";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
try {
  $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (Throwable $e) {
  fwrite(STDERR, "Erro ao conectar no banco: " . $e->getMessage() . PHP_EOL);
  exit(1);
}

// cria tabela de controle
$pdo->exec("CREATE TABLE IF NOT EXISTS _schema_migrations (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  version VARCHAR(191) NOT NULL,
  filename VARCHAR(191) NOT NULL,
  checksum CHAR(64) NOT NULL,
  applied_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uk_version (version)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

function getLock(PDO $pdo): void {
  $stmt = $pdo->query("SELECT GET_LOCK('_schema_migrations_lock', 60) AS got");
  $got  = (int)$stmt->fetch()['got'];
  if ($got !== 1) {
    throw new RuntimeException("Não foi possível adquirir lock.");
  }
}
function releaseLock(PDO $pdo): void {
  $pdo->query("SELECT RELEASE_LOCK('_schema_migrations_lock')");
}

// Lê arquivos *.up.sql e pareia com *.down.sql
function listMigrations(string $dir): array {
  $files = glob($dir . '/*.up.sql') ?: [];
  $list = [];
  foreach ($files as $up) {
    $base = basename($up);
    $ver  = preg_replace('/\.up\.sql$/', '', $base);
    $down = $dir . '/' . $ver . '.down.sql';
    $list[$ver] = [
      'version' => $ver,
      'up'      => $up,
      'down'    => file_exists($down) ? $down : null,
    ];
  }
  ksort($list); // ordem cronológica
  return $list;
}

function applied(PDO $pdo): array {
  $rows = $pdo->query("SELECT version, checksum, filename, applied_at FROM _schema_migrations ORDER BY version")->fetchAll();
  $map = [];
  foreach ($rows as $r) {
    $map[$r['version']] = $r;
  }
  return $map;
}

function parseSqlWithDelimiter(string $sql): array {
  // Suporta “DELIMITER $$ ... $$” etc. Ignora linhas DELIMITER e quebra por delimitador corrente.
  $lines = preg_split("/\r\n|\n|\r/", $sql);
  $delim = ';';
  $buf = '';
  $stmts = [];

  foreach ($lines as $line) {
    if (preg_match('/^\s*DELIMITER\s+(\S+)\s*$/i', $line, $m)) {
      // despeja buffer com delimitador anterior, se houver
      if (trim($buf) !== '') {
        $chunk = rtrim($buf);
        if (substr($chunk, -strlen($delim)) === $delim) {
          $chunk = substr($chunk, 0, -strlen($delim));
        }
        if (trim($chunk) !== '') $stmts[] = $chunk;
        $buf = '';
      }
      $delim = $m[1];
      continue;
    }
    $buf .= $line . "\n";
    // checa se termina com o delimitador atual
    if (substr(rtrim($buf), -strlen($delim)) === $delim) {
      $chunk = rtrim($buf);
      $chunk = substr($chunk, 0, -strlen($delim));
      if (trim($chunk) !== '') $stmts[] = $chunk;
      $buf = '';
    }
  }
  if (trim($buf) !== '') {
    $stmts[] = $buf;
  }
  // remove comentários vazios
  $stmts = array_values(array_filter(array_map('trim', $stmts), fn($s) => $s !== ''));
  return $stmts;
}

function runSql(PDO $pdo, string $sql): void {
  $stmts = parseSqlWithDelimiter($sql);
  foreach ($stmts as $s) {
    // MySQL executa DDL com auto-commit; ainda assim, tentamos agrupar ao máximo.
    $pdo->exec($s);
  }
}

function sha(string $file): string {
  return hash_file('sha256', $file);
}

function color($txt, $c = '0;37') {
  return "\033[" . $c . "m" . $txt . "\033[0m";
}

function status(PDO $pdo, string $dir): void {
  $all = listMigrations($dir);
  $applied = applied($pdo);
  echo "Status das migrations (" . $dir . "):\n";
  foreach ($all as $v => $m) {
    $mark = isset($applied[$v]) ? color('APLICADA', '0;32') : color('PENDENTE', '0;33');
    $changed = '';
    if (isset($applied[$v]) && is_file($m['up'])) {
      $curr = sha($m['up']);
      if ($curr !== $applied[$v]['checksum']) $changed = ' ' . color('[ALTERADA]', '0;31');
    }
    echo " - {$v}: {$mark}{$changed}\n";
  }
  if (!$all) echo " (nenhuma migration encontrada)\n";
}

function cmd_make(string $dir, string $desc): void {
  $ts = date('Y_m_d_His');
  $slug = preg_replace('/[^a-z0-9_]+/i', '_', trim($desc));
  $base = "{$ts}_{$slug}";
  $up   = "{$dir}/{$base}.up.sql";
  $down = "{$dir}/{$base}.down.sql";
  file_put_contents($up, "-- UP: {$desc}\n\n");
  file_put_contents($down, "-- DOWN: {$desc}\n\n");
  echo "Criado:\n  - $up\n  - $down\n";
}

function cmd_up(PDO $pdo, string $dir, ?string $toVersion = null, bool $dry = false): void {
  getLock($pdo);
  try {
    $all = listMigrations($dir);
    $ap  = applied($pdo);
    $pending = [];
    foreach ($all as $v => $m) {
      if (!isset($ap[$v])) $pending[$v] = $m;
      if ($toVersion && strcmp($v, $toVersion) > 0) unset($pending[$v]);
    }
    if (!$pending) {
      echo "Nada a aplicar.\n";
      return;
    }

    foreach ($pending as $v => $m) {
      $sql = file_get_contents($m['up']);
      $checksum = sha($m['up']);
      echo "Aplicando {$v} ... ";
      if ($dry) {
        echo "[dry-run]\n";
        continue;
      }

      // Tentativa de transação: DDL pode auto-commitar; ainda assim o bloco ajuda em DML.
      $pdo->beginTransaction();
      try {
        runSql($pdo, $sql);
        $ins = $pdo->prepare("INSERT INTO _schema_migrations(version, filename, checksum) VALUES (?,?,?)");
        $ins->execute([$v, basename($m['up']), $checksum]);
        $pdo->commit();
        echo "OK\n";
      } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
          $pdo->rollBack();
        }
        throw $e;
      }
    }
  } finally {
    releaseLock($pdo);
  }
}

function cmd_down(PDO $pdo, string $dir, ?int $steps = null, ?string $toVersion = null, bool $dry = false): void {
  getLock($pdo);
  try {
    $all = listMigrations($dir);
    $ap  = applied($pdo);
    $appliedVersions = array_keys($ap);
    if (!$appliedVersions) {
      echo "Nada a reverter.\n";
      return;
    }

    // define alvo
    $targets = array_reverse($appliedVersions); // do mais recente p/ mais antigo
    $toIdx = null;
    if ($toVersion) {
      $toIdx = array_search($toVersion, $appliedVersions, true);
      if ($toIdx === false) {
        echo "Versão --to={$toVersion} não está aplicada.\n";
        return;
      }
    }
    $count = $steps ?? ($toVersion ? (array_search(end($targets), $targets, true) + 1) : 1);
    if ($steps === null && $toVersion !== null) {
      // Reverter até atingir "antes de $toVersion" (inclusive)
      $count = array_search(end($appliedVersions), $appliedVersions, true) - $toIdx + 1;
    }

    $done = 0;
    foreach ($targets as $v) {
      if ($done >= $count) break;
      if (!isset($all[$v]['down']) || !$all[$v]['down']) {
        echo "Sem arquivo DOWN para {$v}. Pule manualmente.\n";
        $done++;
        continue;
      }
      $sql = file_get_contents($all[$v]['down']);
      echo "Revertendo {$v} ... ";
      if ($dry) {
        echo "[dry-run]\n";
        $done++;
        continue;
      }

      try {
        runSql($pdo, $sql);
        $pdo->prepare("DELETE FROM _schema_migrations WHERE version=?")->execute([$v]);
        echo color("OK\n", '0;32');
      } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
          $pdo->rollBack();
        }
        echo color("ERRO\n", '0;31');
        throw $e;
      }

      $done++;
    }
  } finally {
    releaseLock($pdo);
  }
}

// -------- CLI --------
$cmd = $argv[1] ?? 'status';
$args = array_slice($argv, 2);
$opts = [
  'to'      => null,
  'steps'   => null,
  'dry-run' => false,
];
foreach ($args as $a) {
  if (preg_match('/^--to=(.+)$/', $a, $m)) $opts['to'] = $m[1];
  if (preg_match('/^--steps=(\d+)$/', $a, $m)) $opts['steps'] = (int)$m[1];
  if ($a === '--dry-run') $opts['dry-run'] = true;
}

try {
  switch ($cmd) {
    case 'status':
      status($pdo, $DIR);
      break;
    case 'make':
      $desc = $argv[2] ?? null;
      if (!$desc) {
        echo "Uso: php migrate.php make \"descricao\"\n";
        exit(1);
      }
      cmd_make($DIR, $desc);
      break;
    case 'up':
      cmd_up($pdo, $DIR, $opts['to'], $opts['dry-run']);
      break;
    case 'down':
      cmd_down($pdo, $DIR, $opts['steps'], $opts['to'], $opts['dry-run']);
      break;
    default:
      echo "Comandos:\n";
      echo "  php migrate.php status\n";
      echo "  php migrate.php make \"descricao\"\n";
      echo "  php migrate.php up [--to=VERSION] [--dry-run]\n";
      echo "  php migrate.php down [--steps=N] [--to=VERSION] [--dry-run]\n";
      exit(1);
  }
} catch (Throwable $e) {
  fwrite(STDERR, "Falhou: " . $e->getMessage() . PHP_EOL);
  exit(1);
}
