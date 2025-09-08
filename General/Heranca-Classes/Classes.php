<?php

class Pessoa {
  // attributos e methodos
  public $nome;
  public $idade = 32;

  public function meusDados() {
    return "Meu nome é Geraldo, eu tenho $this->idade anos.";
  }

  public function dadosPessoa() {
    //$this->$nome;
    return $this->meusDados();
  }
}

$pessoa = new Pessoa();
echo $pessoa->dadosPessoa();


echo '<h1>classes</h1>';
/* classes 07/09/2025 */

class config {
  public static string $name = "meu sistema";
  public static bool $debug = true;
  public static int $timeout = 30;

  public  static  function isDebug(): string {
    return 'hello from isDebug';
  }

  // "self::" acessa dentro da classe
  public static function timeoutMs(): int {
    return self::$timeout * 1000;
  }

  public static function setDebug(bool $value): void {
    self::$debug = $value;
  }

  public function foo() {
    return 'foo example';
  }
}

// alterando o valor
#config::setDebug(false);


// acessar de qualquer lugar:
// porque $debug é estático — pertence à classe, não a uma instância.
// acessa variável estática.
echo config::$name;
echo config::$debug;
if (config::$debug) echo "Debug ligado!";
if (!config::$debug) echo "Debug desligado ligado!";

echo '<p>__10</p>';
print_r(config::isDebug()); // chama função estática.

// com instancia
// pertence àquele objeto específico.
$insta = new config();
echo '<p>__20</p>';
print_r($insta->isDebug());


echo '<p>__30</p>';
echo '<p>__40</p>';
echo ($insta->foo());

echo '<p>__40_timeoutMs</p>';
echo config::timeoutMs(); // 30000



