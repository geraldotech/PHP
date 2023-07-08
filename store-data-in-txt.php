<!DOCTYPE html>
<html>
<head>
  <title>Store form data in .txt file</title>
</head>
<body>
  <form method="post">
    Enter Your Text Here:<br>
    <input type="text" name="textdata"><br>
    <input type="submit" name="submit">    
  </form>
  https://www.codespeedy.com/save-html-form-data-in-a-txt-text-file-in-php/
</body>
</html>
<?php
              
if(isset($_POST['textdata']))
{
$data=$_POST['textdata'];
$fp = fopen('data2.txt', 'a');
fwrite($fp, $data);
fclose($fp);
}
?>