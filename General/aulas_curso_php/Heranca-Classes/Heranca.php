<?php 


require 'Heranca1.php';

class Heranca extends Heranca1 {

}

class Heranca3 extends Heranca1{

}

echo '<br>';
$pessoa = new Heranca(' Isabella');

echo '<br>';
$herenca3 = new Heranca3();
echo $herenca3->deletar(' 4');



