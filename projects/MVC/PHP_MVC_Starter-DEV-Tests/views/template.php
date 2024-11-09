<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
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
  <?php include('header.php') ?>
  <!-- page content -->
  <?php
    $this->loadViewInTemplate($viewName, $viewData);
  ?>

<script src="<?= URL . '/assets/js/main.js'?>"></script>
</body>
</html>