<?php session_start(); ?>
<style>
  p{
   font-weight: bold;
   font-size: 1rem;
  }
</style>
<?php
echo "<h1>Variáveis Globais úteis PHP</h1>";


echo "<h1>PHP_VERSION</h1>";
print_r(PHP_VERSION);

echo "<h1>PHP_INFO</h1>";
//phpinfo();

echo "<h1>PHP_OS</h1>";
print_r(PHP_OS);
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
     echo "<h2>Sistema Operacional Windows</h2>";
  } else {
    echo "<h2>Sistema Operacional: Linux/Unix</h2>";
}

/* Returns information about the operating system PHP is running on */
echo "<h1>php_uname</h1>";
echo php_uname();

$parts = explode(' ',  php_uname());
print_r($parts);
echo '<br>';
print_r($parts[0]);

echo php_uname('s'). '<br>'; // → Nome do sistema (Linux, Windows NT) 
echo php_uname('n'). 'host<br>'; // → Nome do host
echo php_uname('r'). '<br>'; // → Versão do kernel
echo php_uname('v'). '<br>'; // → Build do SO
echo php_uname('m'). '<br>'; // → Arquitetura (x86_64, AMD64)

echo "<hr>";

echo "<h1>SESSION</h1>";
echo '<br>';
print_r($_SESSION);


echo "<h1>SERVER</h1>";
echo "<p>Contém informações sobre cabeçalhos, caminhos e o script atual.</p>";

echo '<p>Informações sobre o navegador do usuário.</p>';
print_r($_SERVER['HTTP_USER_AGENT']);

echo '<p>Endereço IP do cliente</p>';
print_r($_SERVER['REMOTE_ADDR']);

echo '<p>Método HTTP (GET, POST, etc.).</p>';
print_r($_SERVER['REQUEST_METHOD']);

echo '<p>Caminho do script atual.</p>';
print_r($_SERVER['SCRIPT_NAME']); 


echo '<p>tudo _SERVER</p>';
print_r($_SERVER);
echo '<br>';

echo "<p>server_name =></p>" . $_SERVER['SERVER_NAME']; // localhost
echo '<br>';
echo $_SERVER['PHP_SELF']; // Retorna o caminho do script atual.

echo '<br>';
echo "<p>DOCUMENT_ROOT =></p>". $_SERVER['DOCUMENT_ROOT']; // C:/xampp/htdocs
echo '<br>';
print_r($_SERVER); //✅ mostra todas as var dentro da var - large output

echo "<h1>GET - POST</h1>";
print_r($_GET);
echo '<br>';
print_r($_POST);


echo "<h1>_ENV</h1>";
/* 
Contém variáveis de ambiente do servidor.
Geralmente usadas para acessar configurações do ambiente.
*/
print_r($_ENV);



echo "<h1>$GLOBALS</h1>";
/* 
Um array associativo que contém todas as variáveis globais do script.
*/
print_r($GLOBALS);
echo '<hr';
echo '<p>line</p>';
print_r($GLOBALS['_COOKIE']);