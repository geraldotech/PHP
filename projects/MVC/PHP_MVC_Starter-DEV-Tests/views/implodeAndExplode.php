<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>
<body>
  <h1> implode</h1>

  <form method="POST" action="<?php echo URL . '/implodeAndExplode/filtrausuarios' ?>">
    <input type="checkbox" name="userid[]" value="2400" id="2400">
    <label for="2400">Super</label>
    <input type="checkbox" name="userid[]" value="6969" id="6969">
    <label for="6969">Bella</label>

    <button>Enviar</button>
  </form>
  
  <h1> foreach</h1>

  <form method="POST" action="<?php echo URL . '/implodeAndExplode/setusuarios' ?>">
    <input type="checkbox" name="uid[]" value="2400" id="a">
    <label for="a">Super</label>
    <input type="checkbox" name="uid[]" value="6969" id="b">
    <label for="b">Bella</label>

    <button>Enviar</button>
  </form>
  
  <h1>foreach + explode</h1>

  <form method="POST" action="<?php echo URL . '/implodeAndExplode/exampledata' ?>">
    <input type="checkbox" name="updateGetUpdate[]" value="10-20" id="bravo">
    <label for="bravo">Bravo</label>
    <input type="checkbox" name="updateGetUpdate[]" value="30-40" id="cos">
    <label for="cos">Costa</label>

    <button>Enviar</button>
  </form>
  
</body>
</html>