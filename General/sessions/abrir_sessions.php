<?php


session_start(); // Inicia ou resume uma sessão
$_SESSION['username'] = 'usuario_teste'; // Armazena um valor na sessão

//session_destroy();

print_r(isset($_SESSION['username']));


echo $_SESSION['username'];