```php

<php
class Pessoa {	
	public $nome;
	public $idade = 30;

	public function meusDados(){
	return "Meu nome é Geraldo, eu tenho $this->idade anos."
	}
	public function dadosPessoa(){
	return $this->meusDados
	}
}


```