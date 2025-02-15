<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL . '/assets/css/main.css'?>">
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