<?php 
if(isset($_GET['acao'])){
    $nome = $_GET['nome'];
    $nome2 = $_GET['nome2'];
    echo $nome + $nome2;
} 


/* send a Javascript Alert from PHP*/
if(isset($_GET['action'])){
    $val = $_GET['opt'];
    if($val == 1)
        echo "one";
    if($val == 2)
        echo "<script> alert('hello'); </script>";
} 
?> 

<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New document</title>
</head>
<body>
     <form method="">
        <input type="number" name="nome" />
        <input type="number" name="nome2" />
        <input type="submit" name="acao" value="Enviar" /> 
    </form>

    <hr>

    <h1>GET</h1>
    <form>        
        <select name="opt">
            <option disabled>Select</option>
            <option value=1>1</option>
            <option value=2>2</option>
        </select>
        <input type="submit" name="action" value="Send"/>
    </form> 
</body>
</html>