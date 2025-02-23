<?php 

  /* if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Content-Type:application/json');
    echo json_encode('the endpoint only accepts post requests. received a get request'); return;
  }


  // se $_POST é vazio, nao é possivel 
  if(empty($_POST)):
    echo 'necessario enviar $_POST';
  return; // retorna
  endif;

 */

?>


  <?php if(10 < 4):?>
  <p>sim</p>
  <?php else: ?>
    <p>Não</p>
  <?php endif; ?>


  <?php if(10 < 4):?>
  <p>sim</p>
  <?php else: ?>
    <p>Não</p>
  <?php endif; ?>

<?php

if(10 < 5) // false
echo '<h1>Maior que 5</h1>'; // a condição vai mudar apenas 1 linha a abaixo
echo '<h1>nao associado ao if sem chaves</h1>'; // continua normal independente do if