<?php

require __DIR__ . '/vendor/autoload.php';

use HelloWorld\HelloWorld;

$helloWorld = new HelloWorld();
echo $helloWorld->sayHello();
