<!-- start a session -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
</head>
<body>
<?php   if(isset($_SESSION['ativa'])){ ?> <!-- if wrapper -->

    <h1>Painel Admin</h1>
    <h3>Bem vindo, <?php echo $_SESSION['nome'] ?></h3>
    <nav>
    <div>
        <a href="index.php">Painel</a>
        <a href="users.php">Gerenciar Users</a>
        <a href="#">--</a>
        <a href="logout.php">Logout</a>
    </div>
    </nav>
    
    <?php } else {
            header('location: login.php');
    } ?> <!-- if wrapper -->
</body>
</html>