<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template</title>
  <link rel="stylesheet" href="<?= URL . '/assets/css/main.css'?>">
  <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script>
    /* variaveis globais FROM php to JS */
      const url = '<?php echo URL; ?>/';
  </script>
</head>
<body>
  <nav class="top_menu">
    <ul>
      <li>
        <a href="<?= URL . '/'?>">Home</a>
      </li>
      <li>
        <a href="<?= URL . '/About' ?>">About</a>
      </li>
      <li>
        <a href="<?= URL . '/Devtest' ?>">Devtest</a>
      </li>
      <li>
        <a href="<?= URL . '/ImplodeAndExplode' ?>">Implode And Explode</a>
      </li>
      <li>
        <a href="<?= URL . '/Checkbox' ?>">Checkbox</a>
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