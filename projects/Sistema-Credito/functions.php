<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";

$conn = mysqli_connect("localhost", $user, $password, $database);
//$conn = new PDO("mysql:host=localhost;dbname=$database", $user, $password);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 

function listaAll($conn, $table){
  $query = "SELECT * FROM $table";
  $execute = mysqli_query($conn, $query);
  $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);
  return $results;
}


function filterUsers($conn){
  $results = array('');
  //global $usersearch;
  if(isset($_POST['search'])){

     $usersearch = $_POST['Username'];
    //$query  = "SELECT * FROM cadastros WHERE NOME like '%GERALDO%'";
    $query = "SELECT * FROM cadastros WHERE NOME like '%$usersearch%'";
    $execute = mysqli_query($conn, $query);
    $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);
   return $results;
  }
}


// considerando apenas qualquer get 
function filterUsersGetMethod($conn){
  if(isset($_GET)){
   $params = $_SERVER['QUERY_STRING'];
   
   parse_str($params, $output);
   print_r($output ? $output['name'] : '');
   //$username = $output['name'];
   
   // resolve o problema de undefined key
   $username = $output ? $output['name'] : '';
   $query = "SELECT * FROM cadastros WHERE NOME like '%$username%'";
    //$query  = "SELECT * FROM cadastros WHERE NOME like '%GERALDO%'";
    $execute = mysqli_query($conn, $query);
    $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);
   return $results;
  }
}

/* single using while in results page editar.php, no mysqli_fetch_assoc */
function singleUser($conn, $getuserid, $table){
 $query = "SELECT * FROM $table WHERE person_id = '$getuserid'";
 $execute = mysqli_query($conn, $query);
  //$results = mysqli_fetch_assoc($execute,);
 return $execute;   
}

/* single using assoc return object - no loop */
function singleUserAssoc($conn, $getuserid, $table){
  $query = "SELECT * FROM $table WHERE person_id = '$getuserid'";
  $execute = mysqli_query($conn, $query);
  $results = mysqli_fetch_assoc($execute);
  return $results;   
}

function updateSingleUser($conn, $getuserid, $table){
  if(isset(($_POST)['updateinfo'])){  
    $limite = $_POST['limite'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];

     $query = "UPDATE $table SET LIMITE = '$limite', EMAIL = '$email', NOME = '$nome' WHERE person_id = '$getuserid'";
    $execute = mysqli_query($conn, $query);
    
   if($execute){
    echo '<h2>Atualizado</h2>';
  } else {
    echo 'Bad Way';
  }
  // close connect
    mysqli_close($conn);
    // refresh page
    header("Refresh:1");
  }
}


function register($conn, $table){
  if(isset(($_POST)['register'])){
    $limite = $_POST['limite'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $password = $_POST['password'];
    $cpf = $_POST['cpf'];

    $query = "INSERT INTO $table (NOME, EMAIL, CPF, LIMITE, CLIENTE_DESDE, PASSWORD) VALUES ('$nome', '$email', '$cpf', '$limite', NOW(), '$password')";
    $execute = mysqli_query($conn, $query);
    if($execute){
      echo "Registrado com sucesso";
    }
   
  }
}

function delete($conn, $table, $getuserid){
  if(isset(($_POST)['delete'])){
    $query = "DELETE FROM $table WHERE person_id ='$getuserid'";
    $execute = mysqli_query($conn, $query);
    if($execute){
      $custommsn = "deleted";
      echo "<h2>Deletado com sucesso</h2>";
      header("refresh:2;url=search.php" );
    } else {
      echo 'Error'; 
    }
  }
}
// ,

function BuyCart($limiteAtual,  $conn, $table, $getuserid){


  if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
  if(isset($_POST['buynow']) && !empty($_POST['total'])){     

    $total = $_POST['total'];       
    $limiteAtualtoNum = (float)$limiteAtual;
    $totalToNum = (float)$total;
    $NewBalance = $limiteAtualtoNum - $totalToNum;
    $ToStringAgain = (string)$NewBalance;    
    
    $query = "UPDATE $table SET LIMITE = $ToStringAgain WHERE person_id = '$getuserid'";
    $execute = mysqli_query($conn, $query); 
    $execute;
    
   if($execute){    
    echo '<h2>Sucesso!</h2>';
    } else {    
    echo 'Bad Way';
    }
    mysqli_close($conn);
   // refresh page
   header("Refresh:1");
  } else {
    echo '<h1 style="color: red;">Verificar os campos!</h1>';
  } 
  }

 }

function BuyCartAjax($limiteAtual,  $conn, $table, $getuserid){
  if(isset($_POST['total']) && !empty($_POST['total'])){  
   // echo '<h2>AJAX REQUEST</h2>';    
    $total = $_POST['total']; 
   
    //echo "RECEBIDO". $total . "convertido para " . $StringParaNum;
       
    $limiteAtualtoNum = (float)$limiteAtual;
    $totalToNum = (float)$total;
    $NewBalance = $limiteAtualtoNum - $totalToNum;
    $ToStringAgain = (string)$NewBalance;  

    $novoLimite = $limiteAtualtoNum - $totalToNum;

   
    $query = "UPDATE $table SET LIMITE = $ToStringAgain WHERE person_id = '$getuserid'";
    $execute = mysqli_query($conn, $query); 
    $execute;
    
   if($execute){    
    echo '<h2 style="color: green; font-size: 2rem">Sucesso!</h2>';
    echo "<h2>New Balance: $NewBalance</h2>";
    echo '<p>Limite atual: ' .$limiteAtual. '</p>';
    echo '<p>Total compra: ' .$total. '</p>';
    $novoLimite = $limiteAtualtoNum - $totalToNum;
    echo "<p>Seu saldo atualizado $ToStringAgain</p>";
  } else {    
    echo 'Bad Way';
  }
  
  mysqli_close($conn);
   // refresh page
   header("Refresh:2");
  }
 }

//echo 'functions ok';
?>