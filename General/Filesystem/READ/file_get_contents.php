<?php
//$content = file_get_contents('arquivo.txt');
$content = file_get_contents('https://technotesbr.blogspot.com/');
echo $content;

//Set an filename
$filename = 'os.txt';
echo file_get_contents($filename);