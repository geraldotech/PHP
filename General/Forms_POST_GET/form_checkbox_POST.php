<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New document</title>
</head>
<body>

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