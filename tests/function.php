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
?>