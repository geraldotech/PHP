<?php
 require_once "functions.php";
$userid = $_SERVER['QUERY_STRING'];
 parse_str($userid, $output);
 $getuserid = $output['userid'];
 $table = 'cadastros';
 // usar while loop ?
 
 //$singleuser = singleUser($conn, $getuserid, $table);
 /// usar object? + facil pegar o nome no title do site
 $result = singleUserAssoc($conn, $getuserid, $table);

?>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar <?php echo $result['NOME'] ?></title>
    <link rel="stylesheet" href="./assets/styles.css"/>
</head>
<body>
<?php include('./layout/navbar.php'); 
?>

<?php
//while($result = mysqli_fetch_array($singleuser)){
?>
<h1>UPDATE USER: <?php echo $result['NOME']  ?></h1>
<?php updateSingleUser($conn, $getuserid, $table); ?>
<form method="POST" action="" onsubmit="location.reload()">

<label for="nome">NOME:</label>
  <input type="text" name="nome" id="nome"  value="<?php echo $result['NOME'] ?>" />


 <label for="cpf">CPF:</label> <input type="text" value="<?php echo $result['CPF']  ?>"  id="cpf" disabled /> 

<label for="email">EMAIL:</label>  
<input type="text" name="email" id="email" value="<?php echo $result['EMAIL'] ?>" />

<input type="range" min="0" max="20000.00" value="2000.00" step="0.01" style="width:100%" oninput="converter(this.value)">

 <label for="limite">LIMITE:</label>  
 <input type="text" name="limite" id="limite" value="<?php echo $result['LIMITE'] ?>" />

  <input type="submit" value="Update" name="updateinfo" />
</form>
<?php
// }
?>

<script>
function converter(valor){
  //var numero = parseFloat(valor).toLocaleString('pt-BR',{ style: 'currency', currency: 'BRL' });
  let numero =  parseFloat(valor);
  document.getElementById('limite').value = numero;
}
// keep range updated with value from mysql
const rangeInput = document.querySelector('input[type="range"]');
rangeInput.value = document.getElementById('limite').value;


</script> 
</body>
</html>
