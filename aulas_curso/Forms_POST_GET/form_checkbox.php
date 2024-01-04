<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New document</title>
</head>
<body>

<?php 

/* if(isset($_GET['acao'])){
    $nome = $_GET['nome'];
    $nome2 = $_GET['nome2'];
    echo $nome + $nome2;
} */
?> 

<!--     <form method="">
    <input type="text" name="nome" />
    <input type="text" name="nome2" />
    <input type="text" name="email" />
    <input type="submit" name="acao" value="Enviar" /> 
</form>
-->
    <hr>

<?php

/* if(isset($_GET['action'])){
    $val = $_GET['opt'];
    if($val == 1)
        echo "one";
    if($val == 2)
        echo "<script> alert('hello'); </script>";
} */
?>
<!--     <form>        
    <select name="opt">
        <option disabled>Select</option>
        <option value=1>1</option>
        <option value=2>2</option>
    </select>
    <input type="submit" name="action" value="Send"/>
    </form> -->


    <h1>Checkbox get all values</h1>
    <?php 
     if(isset($_POST['checks'])){
        // print_r( $_POST['valor']);

        foreach($_POST['valor'] as $key => $value){
                echo $value;
        }
     }
    ?>

    <form method="post">
    <input type="checkbox" name="valor[]" value="10" />10
    <input type="checkbox" name="valor[]" value="20" />20
    <input type="checkbox" name="valor[]" value="30" />30
    <input type="checkbox" name="valor[]" value="40" />40
    <input type="submit" value="Enviar" name="checks" />
</form>

</body>
</html>