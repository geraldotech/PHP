<!-- start a session -->
<?php session_start();

// alternative
$seguranca = isset($_SESSION['ativa']) ? TRUE : header('location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
</head>
<body>
<?php   if($seguranca){ ?> <!-- if wrapper -->

    <h1>Painel Admin</h1>
    <h3>Bem vindo, <?php echo $_SESSION['nome'] ?></h3>

    <a href="logout.php">Logout</a>
    
    <?php }?> <!-- if wrapper -->
</body>
</html>