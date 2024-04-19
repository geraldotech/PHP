<?php 
 
/* for($i = 0; $i < 50; $i++){
  $content = "arquivo criado". $i;
  file_put_contents('file'.$i.'.txt', $content);
}
 */ 

 for($i = 0; $i < 50; $i++){
  unlink('file'.$i.'.txt');
}
?>