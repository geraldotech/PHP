<?php 


$msg = 'Somar';
 
 function isAproved($n1, $n2){  
 if(isset($_POST['Enviar']) AND !empty($_POST['n1'])) {
  $n1 = $_POST['n1'];
  $n2 = $_POST['n2'];
  $res = 'calculando';

  $sum = (float)$n1 + (float)$n2;
  $media = $sum /2;
  $aprovado = 6;
  if($media < $aprovado){
   // echo 'Reprovado com '. $media;
    return 'Reprovado com média '. $media;
  }
  return 'Aprovado com média '. $media;
} 
}


function myhtml(){
  return '<footer>copyright 2023</footer>';
}

?>