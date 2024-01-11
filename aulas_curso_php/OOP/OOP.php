<?php 
 
/* 
ORIENTAÇÃO A OBJETOS
Pessoa {
  nome
  idade
  peso

  crescer()
  comer()
}
*/

class Pessoa{
  // Objeto pessoa

  private $nome = 'Geraldo';
  private $weigth = 86;
  private $age = 31;

  public function crescer(){
    // ✅contudo a public crescer pode chamar a private comer
    $this->comer();
    echo 'estou crescendo';
  }
  private function comer(){
    echo 'estou crescendo';    
  }
}

// Instanciar
$pessoa = new Pessoa;


// ✅ chamar $myvar->comer() vai da erro pq é private
// um apenas chama os dois |  e crescer() chama comer()
$pessoa->crescer();

?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1> New Document</h1>
  
</body>
</html>