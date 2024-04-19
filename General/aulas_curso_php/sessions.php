<?php 
 session_start();

// $_SESSION['nome'] = "Geraldo";

if(isset($_SESSION['nome'])){
    echo $_SESSION['nome'];
    $_SESSION['nome'] = '';
}

/* destruir */

unset($_SESSION['nome']);

session_destroy();

?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
   <!--  <h1><?= $_SESSION['nome'] ?></h1> -->
    
</body>
</html>