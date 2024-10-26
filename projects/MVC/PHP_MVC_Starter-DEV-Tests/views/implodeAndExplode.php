<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1> implode</h1>

  <form method="POST" action="<?php echo URL . '/ImplodeAndExplode/filtrausuarios' ?>">
    <input type="checkbox" name="userid[]" value="2400" id="2400">
    <label for="2400">Super</label>
    <input type="checkbox" name="userid[]" value="6969" id="6969">
    <label for="6969">Bella</label>

    <button>Enviar</button>
  </form>
  
  <h1>foreach</h1>

  <form method="POST" action="<?php echo URL . '/ImplodeAndExplode/setusuarios' ?>">
    <input type="checkbox" name="uid[]" value="2400" id="a">
    <label for="a">Super</label>
    <input type="checkbox" name="uid[]" value="6969" id="b">
    <label for="b">Bella</label>

    <button>Enviar</button>
  </form>
  
  <h1>foreach + explode</h1>

  <form method="POST" action="<?php echo URL . '/ImplodeAndExplode/examplethree' ?>">
    <input type="checkbox" name="updateGetUpdate[]" value="10-20" id="bravo">
    <label for="bravo">Bravo</label>
    <input type="checkbox" name="updateGetUpdate[]" value="30-40" id="cos">
    <label for="cos">Costa</label>

    <button>Enviar</button>
  </form>
  <hr>

  <?php 
  // 1
  // string
  $str = "Geraldo Costa Filho";
  print_r($str); 

  // explore to array
  $gpexplode = explode(" ", $str);

  print_r($gpexplode); 
  // loop em cada item para o h2
  foreach($gpexplode as $i => $val){
    print_r("<h1>{$val}</h1>"); 
  }


  // 2
  // array implode to string
  echo '<hr>'; 
  $list = ['Alpha', 'Bravo', 'Charhlie'];

  $listim = implode($list);
  echo $listim; 


  // loop list 
  foreach($list as $ind => $row){
      print_r("<p>{$row} - {$ind}</p>");  
  }  
  ?>
  
</body>
</html>