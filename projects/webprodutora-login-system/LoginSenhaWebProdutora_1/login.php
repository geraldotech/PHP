<?php require_once "functions.php";?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1>Formulario acesso ao site</h1>

  <form action="" method="POST">
    <fieldset>
    <legend>Painel de login</legend>
    <input type="email" name="email" placeholder="Inserir email" required/> 
    <input type="password" name="senha" placeholder="Inserir email" required />
     <input type="submit" name="acessar" value="acessar"/>
    </fieldset>
    </form>

<?php
  if (isset($_POST['acessar'])){
     login($connect);
  }
?>
  
</body>
</html>