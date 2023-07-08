<?php

if(isset($_POST['btn'])){
    $x = $_POST['n1'];
}

echo "Nome digitado: $x";
echo "<br>";
/* if($x == 'g'){
    echo "Geraldo";
} else if($x == 'a'){
    echo "Al";
} */

switch ($x) {

    case "a":
    echo  "Geraldo";
    break;

    case "b":
        echo  "Costa";
        break;

    default:
    echo "padrao";

}

?>