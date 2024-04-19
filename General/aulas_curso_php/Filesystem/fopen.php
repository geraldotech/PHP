<?php
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y H:i:s');
echo "<h1>$data</h1>";

$handle = fopen("footer.txt", "r");

while($line = fgets($handle)){
    echo $line;
}