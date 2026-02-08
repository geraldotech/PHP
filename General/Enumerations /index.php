<?php

/**
 * PHP 8.1^
 */
enum Suit: int {
  case Hearts = 1;
  case Diamonds  = 2;
  case Clubs = 3;
  case Spades = 4;

  function do_stuff(Suit $s) {
    // ..
    echo 'do_stuff';
  }

  function descricao(): string {
    return match ($this) {
      self::Hearts => 'coração',
      self::Diamonds => 'diamentes',
      self::Clubs => 'clube',
      self::Spades => 'espadas',
    };
  }
}

$idRegraValida = Suit::Hearts->value;
$desc = Suit::Hearts->descricao();
echo $idRegraValida;
echo '<br>';
echo $desc;
// do_stuff(Suit::Spades);
