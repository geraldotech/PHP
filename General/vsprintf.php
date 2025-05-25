<?php
/**
* MANEIRA MAIS ELEGANTE DE ESCREVER TEMPLATES
* Placeholders in sprintf:
* %s - String                 
* %d - Integer
* %f - Floating point number                 
* %x - Hexadecimal number
*/

$template = "Olá, meu nome é %s, eu tenho %d anos e meu hobby é %s.  Bom ne %s";
$data = ["Geraldo", 30, "programar", "claro"];
$result = vsprintf($template, $data);

echo $result;