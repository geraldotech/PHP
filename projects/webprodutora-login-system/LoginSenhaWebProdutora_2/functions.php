<?php

$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'projeto_admin';

// conexão com o banco de dados
$connect = mysqli_connect($host, $db_user, $db_pass, $db_name);

function login($connect){
  if(isset($_POST['acessar']) AND !empty($_POST['email']) AND !empty($_POST['senha'])){
    
    echo 'dados';
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $senha = sha1($_POST['senha']);

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $executar = mysqli_query($connect, $query);
    //trazer resultado
    $return = mysqli_fetch_assoc($executar);

    if(!empty($return['email'])){
     // echo "Bem vindo". $return['nome'];

     // para logar usar a session
     session_start();
     $_SESSION['nome'] = $return['nome'];
     $_SESSION['id'] = $return['id'];
     $_SESSION['ativa'] = TRUE;
        header("location: index.php"); //redirect to

    } else {
      echo 'usuario e senha nao encontrados!';
    }
  }

}

function logout(){
  session_start();
  session_unset(); // remove cache
  session_destroy();
  //voltar ao painel de login
  header('location: login.php');
}

// Seleciona(busca) no db apenas um resultado com base no ID
function buscaUnica($connect, $tabela, $id){
  $query = "SELECT * FROM $tabela WHERE id =". (int) $id;
  $execute = mysqli_query($connect, $query);
  $result = mysqli_fetch_assoc($execute);
  return $result;
}


function buscar($connect, $tabela, $where = 1, $order = ""){

  if(!empty($order)){
  $order = "ORDER BY $order";
} 
  $query = "SELECT * FROM $tabela WHERE $where $order";
  $execute = mysqli_query($connect, $query);
  $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);
  return $results;
}
