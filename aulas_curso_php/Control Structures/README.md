### ✅👉 if para apenas 1 linha de codigo abaixo do if

```php

// before
if(10 > 5) {
    echo 'Maior que 5';
}
echo '<h1>Maior </h1>';

echo '<hr>';
// after sem {}

if(10 < 5) // false
echo 'Maior que 5'; // a condição vai mudar apenas 1 linha a abaixo
echo '<h1>nao associado ao if sem chaves</h1>'; // aqui continua normal independente do if
echo 'okay';

echo '<hr>';

// test with return

if(100 == 100)
echo 'iguais';
return;
echo 'not iguais';

// depois add na function

function testreturn(){
    if(100 == 100)
echo 'iguais';
return;
echo 'not iguais';
}


```
