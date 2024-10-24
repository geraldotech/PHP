<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login page
    //header("Location: login.html");
   // exit();
}
// User is logged in, display dashboard content
echo "Welcome to the dashboard!";
echo "<br>";
echo "<a href=logout.php>Logout</a>";


?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Choose file:</label>
    <input type="file" name="file" id="file"><br><br>
    <input type="submit" value="Upload">
</form>


<hr>
<?php

$dir = "files/";

// Get the list of files in the directory
$files = scandir($dir);

// Remove . and .. entries from the list
$files = array_diff($files, array('.', '..'));


// Output the list of files
echo "Files in $dir:<br>";
foreach ($files as $file) {
    echo "<br>";
    // echo "<a href=". $dir . $file . " > .$file. </a> - ";
    echo '<a href="' . $dir . $file . '" target="_blank">' . $file . '</a> - ';
    echo  "<a href=delete.php?file=" . $file . "> ❌</a>";
    echo "<br>";
}

?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>

  
</body>
</html>