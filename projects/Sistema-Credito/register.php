<?php
 require_once "functions.php";
 register($conn, 'cadastros');
?>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/styles.css"/>
    <title>Register new User</title>
</head>
<body>
<?php include('./layout/navbar.php'); 
?>

<?php
?>
<h1>Register User</h1>

<form method="POST" action="">
<label for="nome">NOME:</label>
  <input type="text" name="nome" id="nome" required />
 <label for="cpf">CPF:</label> <input type="text" id="cpf" name="cpf" maxlength="11" required /> 

<label for="email">EMAIL:</label>  
<input type="text" name="email" id="email" required />

<label for="password">PASSWORD:</label>  
<input type="password" name="password" id="password" required />

 <label for="limite">LIMITE:</label>  
 <input type="range" min="0" max="20000.00" value="2000.00" step="0.01" style="width:100%" oninput="converter(this.value)">
 <input type="text" name="limite" id="limite" value="0" />

  <input type="submit" value="Register" name="register" />
</form>

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
