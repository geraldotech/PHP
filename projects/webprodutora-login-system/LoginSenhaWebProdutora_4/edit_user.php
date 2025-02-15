<!-- start a session -->
<?php session_start(); 
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Edit user</title>
</head>
<body>
<?php   if(isset($_SESSION['ativa'])){ ?> <!-- if wrapper -->

    <h1>Painel Admin</h1>
    <h3>Bem vindo, <?php echo $_SESSION['nome'] ?></h3>
    <h2>Gerenciador de Usuários - Editar</h2> 
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

<!-- wrapper html, getting user name via GET -->
<?php 
    if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    /* pega todos os dados do user para preencher o form, via url só temos o nome and id  */
    $usuario =  buscaUnica($connect, "usuarios", $id);
    // finalmente a function que vem de functions()
    UpdateUser($connect);
                ?>  
 <h2>Editando o user: <?php echo $_GET['nome'] ?></h2>        
    <?php } ?>

<fieldset>
    <lenged>Editar Usuario</legend>
    <form action="" method="post">
        <input value="<?php echo $usuario['id'] ?>" type="hidden" name="id" required>
        <input value="<?php echo $usuario['nome'] ?>" type="text" name="nome" placeholder="Nome" required>
        <input value="<?php echo $usuario['email'] ?>" type="email" name="email" placeholder="E-Mail" required>
        <input type="password" name="senha" placeholder="Senha">
        <input type="password" name="repetesenha" placeholder="Confirmar Senha">
        <input value="<?php echo $usuario['data_cadastro'] ?>" type="date" name="data_cadastro" placeholder="Data Cadastro">
        <input type="submit" name="atualizar" value="Atualizar">
    </form>
</fieldset>

</body>
</html>