<?php 
 function myautoload($class){
  $class = str_replace('\\', '/', $class);
  //echo $class; 
  if(file_exists('classes/'.$class.'.php')){
    include('classes/'.$class.'.php');
  }
}

spl_autoload_register('myautoload');

new Home\Inicial();
?>