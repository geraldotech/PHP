<?php
// delete router
require_once "functions.php";

$userid = $_SERVER['QUERY_STRING'];
parse_str($userid, $output);
$getuserid = $output['userid'];

delete($conn, 'cadastros', $getuserid);

if(isset($_GET['userid'])){
  //echo 'click no link';
/*   echo $_GET['userid'];
  echo $_GET['nome']; */
}

?>
<html>

<body>
<h1>Confirmar apagar o usuario: <?=$_GET['nome']?></h1>
<form method="POST" action="">
<input type="submit" value="Delete" name="delete" />
</form>
<?php
/* 
echo $custommsn; */
?>
</body>
</html