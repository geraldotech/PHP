<?php

class User {
  private string $name;

  public function __construct(string $name) {
    $this->setName($name);
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $value): void {
    $value = trim($value);
    if ($value === '') {
      throw new ValueError('Nome não pode ser vazio');
    }
    $this->name = mb_convert_case($value, MB_CASE_TITLE);
  }
}

// uso:
$u = new User('  geraldo  ');
echo $u->getName(); // "Geraldo"
$u->setName('maria clara');
echo $u->getName(); // "Maria Clara"
