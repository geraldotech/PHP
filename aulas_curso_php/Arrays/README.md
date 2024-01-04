```php

// print only arr keys
print_r(json_encode(array_values($arr)));

 $arr =[1,2,3,4,5,6];

 // ✅ filter
 function impar($var){
    return $var & 1;
 }

 function par($var){
    return !($var & 1);
 }

print_r(array_filter($arr, "par"));
echo '<br>';

// ✅ map - ideia que tive para adicionar html em todos os elements
$navbar = ['Home', 'About', 'Page'];

// create a function
function navbar($val){
    return '<li>'. $val .'</li>';
}
//create a new var with map and function

$navbarok = array_map('navbar', $navbar);

// render all new itens
foreach($navbarok as $key => $value){
    echo '<ul>'. $value. '</ul>';
}



```
