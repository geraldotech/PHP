<?php

session_start(); // Inicia ou resume uma sessão
$_SESSION['username'] = 'gmapdev'; // Armazena um valor na sessão

//session_destroy();

if(isset($_SESSION['username'])){
    print_r($_SESSION['username']);
}

$_SESSION['username'] = 'footer'; // Armazena um valor na sessão

if(isset($_SESSION['username'])){
  print_r($_SESSION['username']);
}



//echo $_SESSION['username'];