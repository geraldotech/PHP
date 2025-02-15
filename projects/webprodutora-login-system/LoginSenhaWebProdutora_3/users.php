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


// fun para cadastro de usuarios
inserirUsuarios($connect);

/* DELETAR ✅ */


// v1
// if(isset($_GET['id'])){
//   /*   echo "<h2>Tem certeza que deseja deletar o usuário id = ". $_GET['id']. "</h2>"; */
//     echo "<h2>Tem certeza que deseja deletar o usuário ". $_GET['nome']. "</h2>";
// }

//v2 html livre 

if(isset($_GET['id'])){ ?>
<h2>Tem certeza que deseja deletar o usuário <?php echo $_GET['nome'] ?> </h2>
<form action="" method="POST"> 
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
    <input type="submit" name="deletar" value="Deletar" />

</form>
<?php } ?>
<?php 
if(isset($_POST['deletar'])){
// verifica se o id que pretende deletar é mesmo que esta logado
if( $_SESSION['id'] != $_POST['id'])
    deletar($connect, "usuarios", $_POST['id']); 
    else {
        echo "Você não pode deletar seu próprio usuário!";
    }
}
?>


<!--  DELETAR ends ✅ -->


<!-- Registro -->
<fieldset>
    <lenged>Inserir Usuarios</legend>
<form action="" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="E-Mail">
        <input type="password" name="senha" placeholder="Senha">
        <input type="password" name="repetesenha" placeholder="Confirmar Senha">
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</fieldset>

<!-- Lista all users -->
<div class="container">
<table border="1">
    <thead>
        <tr>
            <th>ID:</th>
            <th>Nome:</th>
            <th>Email:</th>
            <th>Data Cadastro:</th>
            <th>Ações</th>
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
                <td>
                    <!-- <a href="users.php?id=<?php echo $usuario['id']; ?>">Excluir</a> --> <!-- via Get pegando id do users -->
                    <a href="users.php?id=<?php echo $usuario['id']; ?>&nome=<?php echo $usuario['nome']; ?>">Excluir</a>
                </td>
            </tr>
    <?php endforeach; ?>        
</tbody>
</table>
</div>
</body>
</html>