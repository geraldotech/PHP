<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <h1>implode</h1>
  <form method="POST" action="<?php echo URL . '/Implode/filtrausuarios' ?>">
    <input type="checkbox" name="userid[]" value="2400" id="2400">
    <label for="2400">Super</label>
    <input type="checkbox" name="userid[]" value="6969" id="6969">
    <label for="6969">Bella</label>
    <button>Enviar</button>
  </form>
  
  <hr>

  <h1>foreach</h1>
  <p>Deinido manualmente alguns usuários, escolha quais devem ser atualizados para o novo input</p>
  <form method="POST" action="<?php echo URL . '/Implode/setusuarios' ?>">
  <p>
    <input type="number" name='newTotvs' placeholder="Novo id totvs para todos os usuários">
  </p>
  <p>
    <input type="checkbox" name="uid[]" value="2400" id="a">
    <label for="a">Super</label></p>
  <p>
    <input type="checkbox" name="uid[]" value="6969" id="b">
    <label for="b">Bella</label>
  </p>
  <p>
    <input type="checkbox" name="uid[]" value="6972" id="leo">
    <label for="leo">Leona</label>
  </p>

  <p>
    <input type="checkbox" name="uncheckall" id="uncheckall">
    <label for="uncheckall">Todos para null</label>
  </p>
    <button>Enviar</button>
  </form>

  <?php foreach($logins as $lgn): ?>
    <ul>
      <li>
      <?php echo$lgn['login'] ?> - <?php echo$lgn['idTotovs'] ?? 'Não cadastrado' ?>
      </li>
    </ul>

  <?php endforeach; ?>



  <hr>

  <?php 
  // 1
  // string
  $str = "Geraldo Costa Filho";
  print_r($str); 

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