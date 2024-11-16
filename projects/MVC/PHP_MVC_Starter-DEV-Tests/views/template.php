<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

  <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
  <link rel="stylesheet" href="<?= URL . '/assets/css/main.css'?>">  

  <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  
  <!-- VueJS 3 -->
  <script src="https://unpkg.com/vue@3"></script>

  <!-- VueJS 3 SFC Loader  -->
  <script src="https://cdn.jsdelivr.net/npm/vue3-sfc-loader/dist/vue3-sfc-loader.js"></script>
  <script src="<?= URL . '/assets/js/sfc-loader-autoimports.js' ?>"></script> 
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