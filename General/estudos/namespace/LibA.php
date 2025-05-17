<?php

namespace LibA;

class User {
    public function __construct() {
        echo "User da LibA\n";
    }


    // 🛠️ Transformando em Classe (Melhor Organização)
    public static function sayHello2() {
        echo "Ola do Lib A dentro da classe";
    }


    public function sayHello3() {
        echo "Ola do Lib A dentro da classe";
    }
}

// Função global (não precisa de instância)

function sayHello() {
    echo "funcao global";
}
