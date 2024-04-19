<?php 
 

 if($handle = opendir('list')){
  while(false !== ($file = readdir($handle))){
    echo $file;
    echo '<br>';
  }
 }

?>