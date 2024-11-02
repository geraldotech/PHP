<?php 


$empresa = [
  'TI' => [
      ['nome' => 'Carlos', 'cargo' => 'Desenvolvedor'],
      ['nome' => 'Ana', 'cargo' => 'Analista']
  ],
  'RH' => [
      ['nome' => 'Marcos', 'cargo' => 'Recrutador'],
      ['nome' => 'Paula', 'cargo' => 'Coordenadora']
  ]
];


print_r($empresa['TI']);

# issert and addslash

// isset Determine if a variable is declared and is different than NULL
if(isset($geraldo)){
  echo $geraldo;
}


// ?id=12&nome=geraldo
if(isset($_GET['id']) && isset($_GET['nome'])){
  echo '<hr>';
  echo $_GET['id'];
  echo $_GET['nome'];
}

print_r($_GET);


?> 

