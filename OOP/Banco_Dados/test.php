<?php 


 
echo   $_SERVER['REQUEST_URI'];
echo "<br/>";
echo   trim($_SERVER['REQUEST_URI'],'/\\');
echo "<br/>";
echo $_SERVER['QUERY_STRING'];

?>