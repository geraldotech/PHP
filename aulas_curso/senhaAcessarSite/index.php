
<?php 
 if(isset($_POST['Login']) AND !empty($_POST['password'])){
  $pass = $_POST['password'];
  if($pass === '123'){
    ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>logado</title>
  </head>
  <body>    
    <h1>Logado</h1>
  <ul>
  <li>senhas</li>
  <li>senhas</li>
  <li>senhas</li>
  <li>senhas</li>
  <li>senhas</li>
  <li>senhas</li>
</ul>
<button onclick="location.href = location.href">Logout</button>  </body>
</html>

<?php
  }
  
 } else { ?>
 
 <!DOCTYPE html>
<html lang="en" style="color-scheme: dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />   
  </head>
  <body>
    <form action="" method="post">
      <input type="password" name="password" required/>
      <input type="submit" value="Login" name="Login" />
    </form>
  </body>
</html>

  <?php
 }

 ?>
