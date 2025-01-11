<?php

/* PODEMOS DEFINIR UMA CONST PARA O DOCUMENT ROOT */
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);

$local = BASE_PATH . '/PHP/General/Filesystem/exist.zip';


/* OU USING getcwd para pegar o diretorio atual */
$local_2 = getcwd() . '/exist.zip';
// current directory

print_r(BASE_PATH);
echo '<hr>';
echo getcwd() . "\n";

echo '<p>local</p>';
echo file_exists($local);
echo '<p>local_2</p>';
echo file_exists($local_2);
echo '<br>';
echo $local_2;