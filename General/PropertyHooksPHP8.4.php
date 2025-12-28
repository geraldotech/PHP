<?php

/**
 * 
 * REQUER PHP 8.4 >
 * @link https://www.marcosmarcolin.com.br/blog/php-property-hooks/
 */
if (version_compare(PHP_VERSION, '8.4.0', '<')) {
    echo '<h1>PHP_VERSION</h1>';
    echo 'Este exemplo requer PHP 8.4+. Versao atual: ' . PHP_VERSION;
    exit;
}


class Usuario {
  private string $nome;
  private int $idade;

  public function setNome(string $nome): void {
      $this->nome = strtoupper(trim($nome));
  }

  public function getNome(): string {
      return $this->nome;
  }

  public function setIdade(int $idade): void {
      if ($idade < 0) {
          throw new Exception("Idade inválida");
      }
      $this->idade = $idade;
  }

  public function getIdade(): int {
      return $this->idade;
  }
}

// ===== USO =====
$user = new Usuario();
$user->setNome("  Geraldo ");
$user->setIdade(32);

echo "Nome: " . $user->getNome();
echo "<br>";
echo "Idade: " . $user->getIdade();


/*
Antes (8.3)
$user->setNome("Geraldo");
echo $user->getNome();

Depois (8.4)
$user->nome = "Geraldo";
echo $user->nome;
*/

class Usuario2 {
  public string $nome {
      set {
          $this->nome = strtoupper(trim($value));
      }
      get {
          return $this->nome;
      }
  }

  public int $idade {
      set {
          if ($value < 0) {
              throw new Exception("Idade inválida");
          }
          $this->idade = $value;
      }
  }
}

// ===== USO =====
$user2 = new Usuario2();
$user2->nome = "  Geraldo ";
$user2->idade = 32;

echo '<h2>Property Hooks</h2>';

echo "Nome2: " . $user2->nome;
echo "<br>";
echo "Idade2: " . $user2->idade;


/* OUTRO EXEMPLO USANDO PROPERTY HOOKS */
class UsuarioView {
    public string $status {
        get {
            return $this->status ? '🟢 Ativo' : '🔴 Inativo';
        }
        set {
            $this->status = (bool) $value;
        }
    }
}

$u = new UsuarioView();
$u->status = 1;

echo "<h3>Status do usuário</h3>";
echo $u->status;
