<?php
/**
 * Verifica a existência do arquivo .env no projeto.
 *
 * @return bool Retorna true se o arquivo .env existir, caso contrário, false.
 */
function loadEnv($file = '.env') {
  if (!file_exists($file)) {
      return false;
  }

  $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
      // Skip comments and empty lines
      if (strpos(trim($line), '#') === 0 || trim($line) === '') continue;

      // Split the line into a key-value pair
      list($name, $value) = explode('=', $line, 2);

      // Trim and store as environment variable
      putenv(trim($name) . '=' . trim($value));
      $_ENV[trim($name)] = trim($value);  // Optional: store in $_ENV
  }

  return true;  // Return true if the .env file was loaded successfully
}

/* SE TEM .env definido */
if(loadEnv()){
  define("DB_DATABASE",    $_ENV['DB_DATABASE']);
  define("DB_HOST",        $_ENV['DB_HOST']); 
  define("DB_USER",        $_ENV['DB_USER']);
  define("DB_PASSWORD",    $_ENV['DB_PASSWORD']);
  define("DB_PORT",        $_ENV['DB_PORT']);
}   