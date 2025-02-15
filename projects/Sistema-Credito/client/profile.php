<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Users';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email, nome, limite FROM cadastros WHERE person_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['person_id']);
$stmt->execute();
$stmt->bind_result($password, $email, $nome, $limite);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="./src/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="home.php"><i class="fas fa-user-circle"></i>Home Page</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>UserID: <?=$_SESSION['person_id'];?></p>
				
				<p>Your account details are below:</p>
				<table>
          <tr>
            <td>Nome:</td>
            <td><?=$nome?></td>
          </tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" value="<?=$password?>" id="psw" />  <input type="checkbox" id="chs"/> <label for="chs">Mostrar</label> </td>
					</tr>
					<tr>
						<td>Limite:</td>
						<td>R$ <?=$limite?></td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			const label = document.querySelector('label')
			chs.onchange = function(){
				psw.type = chs.checked ? 'text' : 'password'
				label.textContent = chs.checked ? 'Esconder' : 'Mostrar'
			}

			</script>
	</body>
</html>