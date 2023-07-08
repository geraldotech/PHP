### PHP Docs

Manual:  
[https://www.php.net/manual/en/](https://www.php.net/manual/en/)

Awesome youtube channel about HTML/CSS/JS/PHP:  
[https://www.youtube.com/c/CodeBoxx/videos](https://www.youtube.com/c/CodeBoxx/videos)

PHP é uma linguagem de programação voltada para o desenvolvimento de aplicados para web, muito usado na stack back-end. Sites como o Wordpress.org, Facebook entre outros usam PHP. Para mim tem um significado nostalgico ao mexer com PHP, aqui vai uma lembraça de 2006 quando jogava MuGNN e no site de vez em quando aparecia alguns erros do tipo `error on line...` coisas que agente nunca esquece, naquela época nem pensava em ser developer.

- Formato.php e echo:

Crie um novo documento e salve como `index.php`, o código deve ser declarado  `<?php //code// ?>`, um exemplo com echo:
```php
<?php
echo "Hello";
?>
```

- Também temos o `print_r` que mostras as informações de variáveis, arrays;

```php
const arr = ["Geraldo","gmapdev"];
print_r(arr); // Array ( [0] => Geraldo [1] => gmapdev )

```

- switch

```php
<?php
$pws = '1';
	switch ($pws){
		case '1':
			echo 'um';
			break;

			case '2';
			echo 'dois';
			break;
		default:
		echo 'nao foram encontradas combinacoes';
	}
?>
```

O que significa PHP?
- Antigamente Personal Home Page hoje em dia Hypertext Preprocessor


Strings de forma simplificada
```php
<?php
$nome = 'Geraldo';
$idade = '29 anos';

echo 'Meu nome é '; echo $nome; echo ‘ e tenho ‘; echo ‘ $idade’;
```
Example de concatenação:
```php
<?php
$nome = 'Geraldo ';
echo 'Meu nome e '.$nome.' Filho';
?>
```

Variáveis com aspas duplas:

```php

<?php
$nome = 'Geraldo ';
echo 'Meu nome e '.$nome.' Filho';
?>
```
Variável com define (Constants)

```php
<?php
define ('NOME','GERALDO');
echo NOME;
?>


<?php

define ('NOME','GERALDO');
define('NOME2', 'GE2RALDO');

if(NOME == NOME2){
	echo 'iguais';
} else {
	echo 'diferentes';
}

?>
```
Comparando variáveis iguais x diferentes

```php
<?php

$variavel1 = 'geraldo';
$variavel2 = 'geraldxxo';
if ($variavel1 == $variavel2){
echo 'iguais';
} else {
	echo 'diferentes';
}
?>
```

Um sinal de igual `=` quer dizer que estamos atribuindo um valor, sempre retorna verdadeiro.
```php
<?php

////Confere se sao identicos ou seja. Mesmo valor e mesmo tipo.
	$v1 = '10';
	$v2 = '10';

if ($v1 === $v2){
	echo 'verdade';
} else {
	echo 'nao sao identicos';
}
?>
```

Comparamos para ver se são diferentes (tipo e valor)
```php
<?php

$v1 = '50';
$v2 = '50';

if ($v1 !== $v2){
	echo 'sao diferentes';
}
else {
	echo 'sao iguais';
}

?>
```

Somando valores:

```php
<?php
//somando valores
//sem parenteses = inteiro

$n1 = (10);
$n2 = (6);

$soma = $n1 + $n2;
/* subtracao
$sub = ($v1 - $v2);
*/

echo 'o resultado e '.$soma;
//quebra de linha <br />
echo '<br />';

echo 'Testando soma';
?>
```
Function basic usage
```php
<?php


printnumero (30); 
echo '<br>';
printnumero (500); 
function printNumero($n){
    echo $n;
}

?>
```
Arrays

```php
<?php

$nome =  ['Geraldo','Filho','Costa'];
$sucess ['0'] = '<h3 style="background-color:green;color:white;text-align:center;">sucess logado</h3>';

echo $sucess[0];

?>


<?php

//array variaveis com varios valores
$nome = array ('chave1'=>'<h2>Geraldos</h2>','Petronilo','Mario');

echo $nome[0];

?>

//Arrays com chave predefinida
<?php
//Array
//modo 1
$opcoes[0] = ['chave1'=>'geraldo','isabella'];

//modo 2
$opcoes[100] = array('chave2'=>'master','chave3'=>'freitas');

//modo 3
$opcoes[5]['cha1'] = '<h1>domingo</h1>';

echo $opcoes[0]['chave1'];
echo '<br />';
echo $opcoes[100]['chave3'];

?>
```