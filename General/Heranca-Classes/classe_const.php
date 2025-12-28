<?php
/**
 *USANDO CONST + SELF
 * PHP aceita const dentro de classes e também no escopo globa
 */
class  Sincronizador {
  public $nome;
  public $idade = 32;
  public const CITY = true;
  private const DEBUG_SYNC = true;
  public const AGE = 30;

  public function meusDados() {

    if (self::DEBUG_SYNC) {
      return "Meu nome é Geraldo, eu tenho $this->idade e o sync on";
    }
    return "Meu nome é Geraldo, eu tenho $this->idade e o sync off";
  }
}

$sync = new Sincronizador();
echo $sync->meusDados();
echo '<hr>';
echo $sync::AGE;
echo '<br>';
echo Sincronizador::AGE;
echo '<br>';
echo Sincronizador::CITY ? 'true' : 'false';
echo '<br>';


// public
class Teste {
  public const AGE = 30;
  public $nome = "Geraldo";
}

$obj = new Teste();
echo $obj->nome;   // ok
echo Teste::AGE;   // ok


/* Um membro private só pode ser acessado de dentro de um MÉTODO da mesma classe.
➡️ Fora da classe → erro
➡️ Em classes filhas → erro
➡️ Dentro de métodos → funciona

$this-> para PROPRIEDADES privadas - como ja é feito no dia a dia
self:: somente para CONSTANTES
*/

class Teste2 {
  private const DEBUG = true;
  private $senha = '123';

  public function mostrar() {
    return self::DEBUG; // ok
  }

  public function mostrarDebug() {
    return self::DEBUG; // acesso correto à constante privada
  }

  public function mostrarSenha() {
    return $this->senha; // acesso correto ao atributo privado
  }
}

$obj2 = new Teste2();

//echo $obj2->senha; //→ ERRO
//echo Teste2::DEBUG; //→ ERRO

echo "<br>";
echo $obj2->mostrarSenha(); // 123
