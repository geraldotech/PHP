<!-- start a session -->
<?php session_start(); 
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Usuários</title>
</head>
<body>
<?php   if(isset($_SESSION['ativa'])){ ?> <!-- if wrapper -->

    <h1>Painel Admin</h1>
    <h3>Bem vindo, <?php echo $_SESSION['nome'] ?></h3>
    <h2>Gerenciador de Usuários</h2>   
    
    <nav>
    <div>
            <a href="index.php">Painel</a>
            <a href="users.php">Gerenciar Users</a>
            <a href="logout.php">Logout</a>
    </div>
    </nav>
    
    <?php } else {
            header('location: login.php');
    } ?> <!-- if wrapper -->

<?php 
$tabela = "usuarios";
$order = 'nome'; // order by nome alfabetico
$usuarios = buscar($connect, $tabela, 1, $order);
?>


<!-- Lista all users -->
<div class="container">
<table border="1">
    <thead>
        <tr>
            <th>ID:</th>
            <th>Nome:</th>
            <th>Email:</th>
            <th>Data Cadastro:</th>
        </tr>
    </thead>

<tbody>
    <?php 
    //print_r($usuarios);
    foreach($usuarios as $usuario) : ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['data_cadastro']; ?></td>
            </tr>
    <?php endforeach; ?>

        
</tbody>

</table>

</div>
</body>
</html>