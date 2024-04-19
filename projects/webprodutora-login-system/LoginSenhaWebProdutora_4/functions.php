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

/* Inserir novos usuarios */
function inserirUsuarios($connect){
  
  if((isset($_POST['cadastrar']) AND !empty($_POST['email']) AND !empty($_POST['senha']))) {
    // array para receber erros
    $erros = array();

    //get email from post
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

      $nome = mysqli_real_escape_string($connect, $_POST['nome']); // evitar sql injection
      $senha = sha1($_POST['senha']);


    if($_POST['senha'] != $_POST['repetesenha']){
      $erros[] = "Senhas não conferem!";
    }
    //check email exists e guarda a info na variavel
    $queryEmail = "SELECT EMAIL FROM usuarios WHERE email = '$email' ";

    //executa a query e guarda a infor na variavel
     $buscaEmail =  mysqli_query($connect, $queryEmail);

    // pega o numero de linhas, se for 0 nao existe
    $verifica = mysqli_num_rows($buscaEmail);

    if(!empty($verifica)){ //se nao for vazio pq email ja existe na base
      $erros[] = "E-mail já cadastrado!";
    }
    // se var $erros estiver vazia continuar para cadastro
    if(empty($erros)){
      $query = "INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES ('$nome', '$email', '$senha', NOW())";
      $executar = mysqli_query($connect, $query);
      
      if($executar){
        echo 'Usuario Inseriado com sucesso!';
      } else {
        echo 'Erro ao inserir usuário!';
      }

    } else {  // senao foreach show cada um dos erros
        foreach($erros as $erro){
          echo "<p>{$erro}</p>";
        }
    }

  }

}

// delete
function deletar($connect, $tabela, $id){
// se a var nao estiver vazia
if(!empty($id)) {
  $query = "DELETE FROM $tabela WHERE id = ". (int) $id;
  $execute =  mysqli_query($connect, $query);

  if($execute){
    echo 'Dado deletado com sucesso!';
  } else {
    echo 'Erro ao deletar!';
   }
  }
}


function UpdateUser($connect){
  if(isset($_POST['atualizar']) AND !empty($_POST['email'])) {
    // array para receber erros
    $erros = array();
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    //get email from post
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    $nome = mysqli_real_escape_string($connect, $_POST['nome']); // evitar sql injection
    $senha = "";
    $data = mysqli_real_escape_string($connect, $_POST['data_cadastro']);

      if(empty($data)){
        $erros[] = "Preencha a data de cadastro";
      }
    
      if(empty($email)){
        $erros[] = "Preencha seu e-mail corretamente";
      }
      if(strlen($nome) < 4){
        $erros[] = "Preencha seu nome completo";
      }
      // se tiver senha, uusuario deseja atualizar a senha
      if(!empty($_POST['senha'])){
        if($_POST['senha'] == $_POST['repetesenha']){ // verifica se as senhas sao iguais
          $senha = sha1($_POST['senha']); // atualiza senha
        } else{
          $erros[] = "Senhas não conferem!";
        }
      }

      // get email atual da pessoa que esta tentando atualizar
      $queryEmailAtual = "SELECT email FROM usuarios WHERE id = $id";
      $buscaEmailAtual = mysqli_query($connect, $queryEmailAtual);
      $returnEmail = mysqli_fetch_assoc($buscaEmailAtual);
      //$returnEmail['email'];

      // vai procurar o email que a pessoa esta passando + se esse email for igual do usuario que está editando vai ignorar
      // duvida ir no SQL do phpmyadmin e: SELECT email from `usuarios` WHERE email = 'gerente@teste.com' AND email <> 'gerente@teste.com';

      $queryEmail = "SELECT email FROM usuarios WHERE email = '$email' AND email <> '" .$returnEmail['email']. "'";

    // executa a query e guarda o dado na variavel
     $buscaEmail =  mysqli_query($connect, $queryEmail);

    // pega o numero de linhas, se for 0 nao existe
    $verifica = mysqli_num_rows($buscaEmail);

    if(!empty($verifica)){ //se nao for vazio pq email ja existe na base
      $erros[] = "E-mail já cadastrado!";
    }
    // se n tem erros
    if(empty($erros)){
      // UPDATE user
      if(!empty($senha)){ // se tem senha, usa a query que tem update de senha
        $query = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_cadastro = '$data' WHERE id =". (int) $id;
      } else { // senao usar a query sem update senha
        $query = "UPDATE usuarios SET nome = '$nome', email = '$email', data_cadastro = '$data' WHERE id =" .(int) $id;
      }
      
      $execute =  mysqli_query($connect, $query);
      if($execute){
        echo 'Usuário atualizado com sucesso!';
      } else {
        echo 'Erro ao atualizar usuário!';
       }
    } else {
      foreach($erros as $erro){
        echo "<p>{$erro}</p>";
    }
  }
}
}