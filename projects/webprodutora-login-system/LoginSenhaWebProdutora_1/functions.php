<?php
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'projeto_admin';

// conexão com o banco de dados
$connect = mysqli_connect($host, $db_user, $db_pass, $db_name);

function login($connect){
  if(isset($_POST['acessar']) AND !empty($_POST['email']) AND !empty($_POST['senha'])){
    
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $senha = sha1($_POST['senha']);

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $executar = mysqli_query($connect, $query);
    //trazer resultado
    $return = mysqli_fetch_assoc($executar);

    if(!empty($return['email'])){
      echo "Bem vindo" . $return['nome'];
    } else {
      echo 'usuario e senha nao encontrados!';
    }
  }
}



