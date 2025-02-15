<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
  if(isset($_GET['make'])){
    $nome = $_GET['name'];
    $age = $_GET['age'];
    echo $nome . $age;
    echo '<hr>';
    print_r($_GET);
}

?>
  <h1> New Document</h1>
  <form action="" >
    <input type="text" name='name'>
    <input type="text" name='age'>
    <input type="submit" name='make' value="Enviar">
  </form>
</body>
</html>