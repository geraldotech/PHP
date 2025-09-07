<?php

/** Métodos Mágicos 
 * simula manual de property hooks usando os recursos que existem no PHP 8.3.
 * Usa um método mágico para tudo (__get, __set)
 * 
 * Em PHP 8.4 você escreveria bem menos código, porque o PHP já sabe qual 
 * propriedade está sendo acessada e permite acoplar get/set nela diretamente.
 */
class User {
  private string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function __get(string $prop): mixed {
    return match ($prop) {
      'name' => $this->name,
      default => throw new Error("Propriedade $prop não definida."),
    };
  }

  public function __set(string $prop, $value): void {
    switch ($prop) {
      case 'name':
        if (! is_string($value)) {
          throw new TypeError('Nome deve ser uma string');
        }
        if (strlen($value) === 0) {
          throw new ValueError('Nome não pode ser vazio');
        }
        $this->name = $value;
        break;
      default:
        throw new Error("Erro ao definir a propriedade $prop");
    }
  }
}

// try pra capturar
try {
  $use = new User('Geraldo');
  #instanciando
  //print_r($use);

  echo $use->name;
  // Tentando acessar algo que não existe
  # echo $use->idade;

  // Tentando definir uma propriedade que não existe
  $use->city = "RJ";
} catch (Error $e) {
  echo "Ops! " . $e->getMessage();
}
