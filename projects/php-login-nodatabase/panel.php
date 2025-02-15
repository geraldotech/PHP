<?php
// (A) START SESSION
session_start();
 
// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) { unset($_SESSION["user"]); }
 
// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit();
}
$msn = "Welcome";
?>
<html>

<?php echo $msn ?>


<p></p>

<a href="https://code-boxx.com/simple-php-login-without-database/">ref</a>
<br>
<form method="post">
  <input type="hidden" name="logout" value="1"/>
  <input type="submit" value="Logout"/>
</form>

</html>