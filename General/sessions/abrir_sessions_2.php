<?php


session_start(); // Inicia ou resume uma sessão
$_SESSION['email'] = 'geraldo@geraldo.com'; // Armazena um valor na sessão

//session_destroy();

echo $_SESSION['email'];