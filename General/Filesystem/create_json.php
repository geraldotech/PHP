<?php

/* 
setar permissoes no linux
 sudo chown gmapdev:www-data /home/gmapdev/docker/php-server/src/PHP/General/Filesystem/
*/

$data_versions = [
  'sga_application' => [
      'version' => '3.00.005'
  ],
  'server' => [
      'php_version' => PHP_VERSION,
      'mysql_version' => '123456'
  ]
];

$sga_json_version = json_encode($data_versions, JSON_PRETTY_PRINT);

$file_path = __DIR__ . '/version.json';
$result = file_put_contents($file_path, $sga_json_version);

// Adicionando logs
if ($result === false) {
    error_log("Erro ao criar o arquivo: {$file_path}");
    error_log("Permissões do diretório: " . substr(sprintf('%o', fileperms(__DIR__)), -4));
    error_log("Usuário do processo PHP: " . get_current_user());
    error_log("Erro PHP: " . print_r(error_get_last(), true));
} else {
    echo "Arquivo criado com sucesso em: {$file_path}";
}
