<?php

$fluxos = [
  ['idFluxo' => 1, 'desc' => 'lorem 1'],
  ['idFluxo' => 2, 'desc' => 'lorem 2'],
  ['idFluxo' => 3, 'desc' => 'lorem 3'],
  ['idFluxo' => 4, 'desc' => 'lorem 4'],
  ['idFluxo' => 9, 'desc' => 'lorem 9'],
];

foreach ($fluxos as $fluxo) {
  // apenas 9 é permitido
  if ($fluxo['idFluxo'] != 9) continue;

  echo "<h2>Fluxo permitido: ID " . $fluxo['idFluxo'] . "</h2>";
}

echo '<hr>';

foreach ($fluxos as $fluxo) {
  // apenas 9 não é permitido
  if ($fluxo['idFluxo'] == 9) continue;

  echo "<h2>Fluxo permitido: ID " . $fluxo['idFluxo'] . "</h2>";
}

// migrado from README.md


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

// or
foreach($arr as $i) :?>
<p><?= $i ?> </p>
<?php endforeach; ?>


$meuArr = ['Geraldo'];
$meuArr[1] = ['Isabella'];
$meuArr['key02'] = ['Devs'];
$meuArr['key03'] = [1,2,3,4]; // novo arr with key
print_r($meuArr);


// foreach + endforeach

$papelaria = array('livros',' canetas',' lapis',' papel oficio');


<?php foreach($papelaria as $i => $row):?>
<p>
    <?= $row . ' - ' . $i?>
</p>

<p>
  <?= "{$row} - {$i}" ?>
</p>

<?php endforeach;  ?>



// ## render html list
$nomes = ['Geraldo', 'Felipe', 'Costa'];

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


$list = [
  ['name'=> 'Geraldo'],
  ['name'=> 'Felipe'],
  ['name'=> 'Bella'],
];
  <article class="ok">
    <ul>
      <?php foreach ($list as $key => $val) : ?>
      <li><?php  echo $val['name'] . ' index =>' . $key  ?></li>
      <?php endforeach ?>
    </ul>
  </article>