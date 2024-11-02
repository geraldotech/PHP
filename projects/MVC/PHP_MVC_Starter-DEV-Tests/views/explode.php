<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <h1>explode + foreach</h1>
  <form method="POST" action="<?php echo URL . '/Explode/examplethree' ?>">
    <input type="checkbox" name="updateGetUpdate[]" value="ADM-20-RT3" id="bravo">
    <label for="bravo">Bravo</label>
    <input type="checkbox" name="updateGetUpdate[]" value="USER-45-GE4" id="cos">
    <label for="cos">Costa</label>
    <button>Enviar</button>
  </form>
  <hr>

  <?php 
  
  // #1 explode string to array usando espaço como delimitador 
  $str = "Geraldo Costa Filho"; print_r($str); 
  $gpexplode = explode(" ", $str); print_r($gpexplode); 

  // loop em cada item para o h2
  foreach($gpexplode as $i => $val){
    print_r("<h1>{$val}</h1>"); 
  }

  // #2 hífen
  $dataHoje = "2024-10-07";
  $explodeData = explode('-', $dataHoje);      
  echo '<br>';  
  print_r($explodeData);

  echo '<hr>';

  // #3 pipe
  $code = "APC|232|OCC";
  $mydata = explode('|', $code);
  echo '<br>';
  print_r($mydata);


  // #4 ponto como delimitador
  $helo = "ger.al.do";
  $ehelo = explode('.', $helo);
  echo '<br>';
  print_r($ehelo);

  // #5 explode dentro de um loop
  echo '<h2>explode um array com loop</h2>';
  $myArray = ['2024-10-07', '2023-12-25', '2022-08-15'];

  foreach ($myArray as $str) {
      $exData = explode('-', $str);
      print_r($exData);
  }

  // loop list 
  foreach($list as $ind => $row){
      print_r("<p>{$row} - {$ind}</p>");  
  }  

  // #6 explode direct on string
  $url = 'site.com/geraldo';
  echo explode('/', $url)[0];  // site.com
  echo '<br>';
  echo explode('/', $url)[1]; // geraldo

  ?>  
  
</body>
</html>