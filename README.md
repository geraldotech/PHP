### PHP Docs

Manual:

- [https://www.php.net/manual/en/](https://www.php.net/manual/en/)

- [https://br.phptherightway.com/](https://br.phptherightway.com/)

Awesome youtube channel about HTML/CSS/JS/PHP:

- [https://www.youtube.com/c/CodeBoxx/videos](https://www.youtube.com/c/CodeBoxx/videos)

PHP é uma linguagem de programação voltada para o desenvolvimento de aplicados para web, muito usado na stack back-end. Sites como o Wordpress.org, Facebook entre outros usam PHP. Para mim tem um significado nostalgico ao mexer com PHP, aqui vai uma lembraça de 2006 quando jogava MuGNN e no site de vez em quando aparecia alguns erros do tipo `error on line...` coisas que agente nunca esquece, naquela época nem pensava em ser developer.

O que significa PHP?

- Antigamente Personal Home Page hoje em dia Hypertext Preprocessor

# PHP + Windows

- [x] Baixar o PHP
- [x] Escolha um local fixo (exemplo C:/App/PHP)
- [x] Adicionar às variáveis de ambiente do sistema
- [x] Run o Built-in web server dentro na raiz do seu projeto: `php -S localhost:8000`
- [x] Run php files: `$ php runit.php`
      

<div align=center>
	<img src="https://github.com/user-attachments/assets/96bd077a-64f0-4d01-bf2e-94e74a040c8b" width='50%' />
</div>


Verificar informações do php instalado no server:

`$ echo '<?php phpinfo() ?>' >> info.php`

## echo

Crie um novo documento e salve como `index.php`

```php
<?php
echo "Hello";
?>
```

- Variables:

```php
<?php
$nome = "Geraldo";

echo $nome;

?>

```

## Concatenação:

- Aspas simples:

```php
$nome = 'Geraldo ';
$idade = 10;

echo 'Meu nome e '.$nome.' Filho';

echo 'Meu nome é '; echo $nome; echo ' e tenho '; echo ' $idade';

```

- Aspas duplas:

```php

<?php
$nome = "Geraldo";

echo "Meu nome is $nome Filho";

$className = 'red';
echo "<div class=\"$className\"> Title</div>";
echo "<div class=$className>Title 2<div>"; // better
?>
```

## print_r

> mostras as informações de variáveis, arrays;

```php
$arr = ["Geraldo","gmapdev"];
print_r(arr); // Array ( [0] => Geraldo [1] => gmapdev )

$myvar = "Hello from Networks";
print_r($myvar) // Hello from Networks

 echo($_SERVER); // ❌Warning: Array to string conversion in
 print_r($_SERVER); ✅// mostra todas as var dentro da var - large output

```

- Constants:

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

- Comparando variáveis iguais x diferentes

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

- Um sinal de igual `=` quer dizer que estamos atribuindo um valor, sempre retorna verdadeiro.

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

- Comparamos para ver se são diferentes (tipo e valor)

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

- Somando valores:

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

- Function basic usage:

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

### Arrays

```php


<?php

// Array []
$nome =  ['Geraldo','Filho','Costa'];
$success ['0'] = '<h3 style="background-color:green;color:white;text-align:center;">success logado</h3>';
echo $success[0];

$data[] = 'A';
$data[] = 'B';

print_r($data);
echo $data[1];


// Array ()
$saldo = array();
$saldo['banco'] = 1000;
echo $saldo['banco'];


// Arrays com chave predefinida
$nome = array ('chave1'=>'<h2>Geraldo</h2>','Petronilo','Mario');
echo $nome[0]; // Petronilo, enquanto o custom `chave1` returns <h2>Geraldo</h2>
print_r($nome); // print_r retorna os valores and keys


// Array com index no nome (chave predefinida)
$opcoes[0] = ['chave1'=>'geraldo','isabella'];
echo $opcoes[0][0]; // isabella
echo '<hr>';

print_r( $opcoes[0]['chave1']); //  geraldo
print_r( $opcoes[0]); // get all valus and keys

// no value has index
$opcoes[100] = array('chave2'=>'master','chave3'=>'freitas');

echo $opcoes[100]['chave3']; // precisa chamar a custom key

// start specific index
$opcoes[5]['cha1'] = ['<h1>domingo</h1>', 'key1' => 'Windows 11', 'key2' =>'Windows 10'];

echo $opcoes[5]['cha1'][0];
echo $opcoes[5]['cha1']['key1'];


```




## Array + foreach

```php

$papelaria = array('livros',' canetas',' lapis',' papel oficio');

foreach ($papelaria as $key => $value) {
  echo "<ul><li>$value</li></ul>";
}

// filter strlen
foreach($papelario as $key => $value){
  if(strlen($value) >= 5){
    echo $value;
  }
}


$lista = [1,2,3,4,5];
foreach($lista as  $value){
  echo $value;
}
 // Indexed arrays without key https://www.php.net/manual/en/language.types.array.php
$arr = array("foo", "menu", "bar");

foreach($arr as $item){
  echo "<h2>".$item."</h2>";
}

// or

foreach($arr as $i) : echo "<h2>".$i."<h2>";
endforeach;

$meuArr = ['Geraldo'];
$meuArr[1] = ['Isabella'];
$meuArr['key02'] = ['Devs'];
$meuArr['key03'] = [1,2,3,4]; // novo arr with key
print_r($meuArr);


// foreach + endforeach

<?php 
$papelaria = array('livros',' canetas',' lapis',' papel oficio');

?>

<?php foreach($papelaria as $i => $row):?>  
<p>
    <?= $row . ' - ' . $i?>
</p>  

<p>
  <?= "{$row} - {$i}" ?>
</p>

<?php endforeach;  ?>



// ## render html list

<?php
$nomes = ['Geraldo', 'Felipe', 'Costa'];
?>

<h1>write html 1</h1>

<ul>
  <?php
  foreach($nomes as $values) {
    echo "<li>$values</li>";
  }
  ?>
  </ul>


  <h1>write html 2</h1>
<ul>
<?php
  foreach($nomes as $values) {
?>
  <li><?= $values ?></li>
<?php }?>
</ul>

<h1>
  write html 3
</h1>
<?php
foreach($nomes as $nome) :
echo $nome;
endforeach;
?>

<h1>write html 4</h1>
<ul>
<?php foreach($nomes as $nome) : ?>
  <li><?= $nome ?></li>
<?php endforeach; ?>
</ul>


// #
<?php 

$list = [
  ['name'=> 'Geraldo'],
  ['name'=> 'Felipe'],
  ['name'=> 'Bella'],
];
?>
  <article class="ok">
    <ul>
      <?php foreach ($list as $key => $val) : ?>
      <li><?php  echo $val['name'] . ' index =>' . $key  ?></li>
      <?php endforeach ?>
    </ul>
  </article>




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

### Server and execution environment information

```php
 echo $_SERVER['SERVER_NAME']; // localhost
 echo '<br>';
 echo $_SERVER['PHP_SELF']; // local/aulas_curso_php/test.php
 echo '<br>';
 echo $_SERVER['DOCUMENT_ROOT']; // C:/xampp/htdocs
 echo '<br>';
 echo($_SERVER); // ❌Warning: Array to string conversion in
 print_r($_SERVER); ✅// mostra todas as var dentro da var - large output
```

## PHP GET URL Params

```php
// specific params
  $params = $_GET['post_id'];
   echo $params;

  // access http://localhost/test.php?post_id=343434


// getl all params file.php?geraldo
 echo   $_SERVER['REQUEST_URI'];
 echo "<br/>";
 echo   trim($_SERVER['REQUEST_URI'],'/\\');
 echo "<br/>";
echo $_SERVER['QUERY_STRING'];


// or create a file.php with:

<?php
/* get url params */
if(isset($_GET['id'])){
  echo $_GET['id'];
  echo $_GET['nome'];
}


if(isset($_POST['send'])){
  echo "Welcome ". $_POST['name'];
}

?>
<a href="?id=1212&nome=geraldofilho">Atualizar</a>

<form action="" method="POST">
<input type="text" name="name" />
<input type="submit" name="send" value="Send" />
</form>


```

## Display PHP Variables In HTML

```php
<!-- 1 -->
<?php
$username = 'Geraldo';
?>
<h1><?php echo $username?></h1>

<!-- 2 -->
<?php
$newway = 'gmapdev.com';
?>
<h1><?=$newway?></h1>
// support strings too
<h1><?='Hello' ?></h1>

<!-- 3 -->
<?php
printf("<h1>%s</h1>", $newway);
?>

<!-- 4 -->
<?php
echo "<h1>$username</h1>";
echo '<h1>' .$username. '</h1>';
?>
```

## How run php Visual Studio Code:

- inside output terminal:
  install extension: [code-runner](https://marketplace.visualstudio.com/items?itemName=formulahendry.code-runner)

CTRL + P `settings.json`:

```js
  "code-runner.executorMap": {
        "javascript": "node",
        "php": "C:\\php\\php.exe",
        "python": "python"
    }
```

## Conditional


```php

>// if + endif array

if(10 > 5) :?>
<p>Hello</p>
<?php endif;

$list = [1,2,3,4];

if(in_array(2, $list)) :?>
  <p>sim existe o 2 no array</p>  
<?php endif; 

```

# PHP Server + Visual Studio Code

[https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver](https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver)

- Windows: variáveis de ambiente > choose: "C:\Program Files (x86)\Common Files\Oracle\Java\javapath" click edit > "novo" > add "C:\php" > restart VSCode
