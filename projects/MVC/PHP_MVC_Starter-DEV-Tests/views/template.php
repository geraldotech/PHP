<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template</title>
  <link rel="stylesheet" href="<?= URL . '/assets/css/main.css'?>">
</head>
<body>
  <nav class="top_menu">
    <ul>
      <li>
        <a href="<?= URL . '/'?>">Home</a>
      </li>
      <li>
        <a href="<?= URL . '/about' ?>">About</a>
      </li>
      <li>
        <a href="<?= URL . '/devtest' ?>">Devtest</a>
      </li>
    </ul>
  </nav> 
  <!-- page content -->
  <?php
    $this->loadViewInTemplate($viewName, $viewData);
  ?>
  

<script src="<?= URL . '/assets/js/main.js'?>"></script>
</body>
</html>