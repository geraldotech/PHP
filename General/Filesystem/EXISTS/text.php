<?php

if(file_exists('conf.txt')){
  echo 'arquivo existe';
  echo '<hr>';
}

$filename = 'os.txt';

//Check the file exists or not
if (!file_exists($filename)) {

    echo 'File does not exist.';

}