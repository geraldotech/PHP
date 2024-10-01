<?php

function mostrarNome(){
    echo "<h2>Nome: Geraldo</h2>";
}
mostrarNome();

function mostrarNome2($nome){
    echo "<h2>Nome: </h2>".$nome;
}
mostrarNome2("Felipe");

echo "<hr>";


//function com valores padroes
function Sum($n1 = 2, $n2 = 3){
    echo ($n1 + $n2);
}

Sum(10,2);

echo "<hr>";
function retornaString(){
     return "Welcome";
}

echo retornaString();




$input = "<h1>meu form</h1>";
print_r($input);
print_r("Geraldo");
echo strip_tags($input, '<br>');


/* functions and return by gmapdev */ 

function checkNum($media){
  if ((float)$media >= 6 ){
    echo 'Aprovado';
    return;
  }
    echo 'Reprovado';
}
// checkNum(5);
// checkNum(6.4);


function isAppoved($n1, $n2){
  $sum = (float)$n1 + (float)$n2;
  $media = $sum /2;
  $aprovado = 6;
  if($media < $aprovado){
    echo 'Reprovado'. $media;
    return;
  }
  echo 'Aprovado'. $media;
}

//isAppoved(5.8, 5.7);


function consulta($ativo= null){

 // Por padrão, começa ativo
 $ativoStatus = "AND ativo = 1";
     
 if ($ativo === 'todos') {
     // Se for 'todos', não aplica filtro (busca todos)
     $ativoStatus = "";
 }
  if ($ativo === 'inativo') {
     // Se for 'inativo', filtra para ativo = 0
     $ativoStatus = "AND ativo = 0";
 }

 echo $ativoStatus;
 return "SELECT users from TEST $ativoStatus";
}

 echo '<hr>'; 

print_r(consulta('inativo'));
 echo '<hr>'; 
 print_r(consulta('todos'));
 echo '<hr>'; 
print_r(consulta());

?>


