<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOptions = $_POST['vinculaUsuarioInstanciaEdit'];
    if (!empty($selectedOptions)) {
        echo "Você selecionou as seguintes empresas:<br>";
        foreach ($selectedOptions as $option) {
            echo "ID da Empresa: " . htmlspecialchars($option) . "<br>";
        }
    } else {
        echo "Nenhuma empresa foi selecionada.";
    }
}
?>
