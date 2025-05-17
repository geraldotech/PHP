<?php

require 'LibA.php';
require 'LibB.php';

// Chamada da função global
LibA\sayHello();

echo '<br>';

// Criando instâncias
new LibA\User(); // Não imprime nada, porque o método não é chamado
new LibB\User(); // Imprime a mensagem do construtor

echo '<br>';

// Chamando método estático
LibA\User::sayHello2();

echo '<br>';

// Criando uma instância para chamar método não estático
$userInstance = new LibA\User();
$userInstance->sayHello3();

echo '<hr>';

// Usando 'use' para simplificar
use LibA\User as UserA;
use LibB\User as UserB;

new UserA();
new UserB();

