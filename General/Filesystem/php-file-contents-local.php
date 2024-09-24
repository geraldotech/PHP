<?php
//via https://linuxhint.com/php-file-get-contents-function-2/

//Set an filename

$filename = 'os.txt';


//Check the file exists or not

if (!file_exists($filename)) {

    echo 'File does not exist.';

}

//Check the file has the read permission or not

else if (!is_readable($filename)) {

    echo 'File has no read permission.';

}

//Print the entire content of the file

else

    echo file_get_contents($filename);

?>

