<style>
  p{
    border-top: 1px solid;
  }
</style>
<?php
/* DEFININDO CONST PARA O DOCUMENT ROOT */
echo '<p>BASE_PATH</p>';
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);

$local = BASE_PATH . '/PHP/General/Filesystem/exist.zip';
print_r(BASE_PATH);

echo '<p>file_exists local</p>';
echo file_exists($local);

echo '<p>getcws()</p>';
/* USING getcwd para pegar o diretorio atual */
$local_2 = getcwd() . '/exist.zip';
echo getcwd() . "\n";


echo '<p>file_exists local2</p>';
echo file_exists($local_2);
echo $local_2;


/* The full path where is the file */
echo '<p>__DIR__</p>';
print_r(__DIR__);


/* The full path and filename of the file with symlinks resolved */
echo '<p>__FILE__</p>';
print_r(__FILE__);


/* get root */
$root = dirname(__DIR__); // Sobe um nível
echo $root;