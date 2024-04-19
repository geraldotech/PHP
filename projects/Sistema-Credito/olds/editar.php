<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";
$conn = mysqli_connect("localhost", $user, $password, $database);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 
 $userid = $_SERVER['QUERY_STRING'];
 
/* USING  parse_str()
https://www.php.net/manual/en/function.parse-str.php
*/
 parse_str($userid, $output);
 //echo $output['userid'];  // value
 $getuserid = $output['userid'];
 $qry = mysqli_query($conn, "SELECT * FROM $table WHERE person_id = '$getuserid'");

?>
<html>
<?php
while($result = mysqli_fetch_array($qry)){
?>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar <?php echo $result['NOME'] ?></title>
    <link rel="stylesheet" href="./assets/styles.css"/>
</head>
<body>
  <?php include('./layout/navbar.php'); ?>
<h1>UPDATE USER</h1>
<form method="POST" action="" onsubmit="location.reload()">
<label for="nome">NOME:</label>
  <input type="text" name="nome" id="nome"  value="<?php echo $result['NOME'] ?>" />
  CPF: <input type="text" value="<?php echo $result['CPF']  ?>" disabled /> <br>
  EMAIL: <input type="text" name="email" value="<?php echo $result['EMAIL'] ?>" />
  LIMITE: <input type="text" name="limite" value="<?php echo $result['LIMITE'] ?>" />
  <input type="submit" value="Update" name="updateinfo" />
</form>
  <?php
}
mysqli_close($conn);
?>
<!-- futuro ajax method -->
<script type="text/javascript">
  console.log('helloo')
  function updateinfo(){
    const email = document.querySelector('input[name="email"]')
    const limite = document.querySelector('input[name="limite"]')
    console.log(email, limite)
  }
</script>

</body>
</html>
<?php
/* tratar o POST update here */
if(isset(($_POST)['updateinfo'])){  
  $limite = $_POST['limite'];
  $email = $_POST['email'];
  $nome = $_POST['nome'];
  // connect
  $conn = mysqli_connect("localhost", $user, $password, $database);
  
// if erros
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 

// query
  $qry = mysqli_query($conn, "UPDATE $table SET LIMITE = '$limite', EMAIL = '$email', NOME = '$nome' WHERE person_id = '$getuserid'");

  if($qry){
    echo 'Atualizado';
  } else {
    echo 'Bad Way';
  }
  // close connection
  mysqli_close($conn);
  // refresh page
  header("Refresh:1");
}
?>