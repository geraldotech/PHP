<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
  <link rel="stylesheet" href="<?= URL . '/assets/css/main.css'?>">
  
  <!-- VueJS 3 -->
  <script src="https://unpkg.com/vue@3"></script>

  <!-- VueJS 3 SFC Loader  -->
  <script src="https://cdn.jsdelivr.net/npm/vue3-sfc-loader/dist/vue3-sfc-loader.js"></script>
  <script src="<?= URL . '/assets/js/sfc-loader.js' ?>"></script> 
  
  <script>
  // consts
  const url = '<?php echo URL ?>'
  </script>

</head>
<body>
  <h1>template.php</h1>
  <nav>
    <ul>
      <li>
        <a href="<?= URL . '/'?>">Home</a>
      </li>
      <li>
        <a href="<?= URL . '/Foo' ?>">Foo</a>
      </li>
      <li>
        <a href="<?= URL . '/About' ?>">About</a>
      </li>
      <li>
        <a href="<?= URL . '/Games' ?>">Games</a>
      </li>
    </ul>
  </nav> 

<div id="template"></div>
<?php $this->loadViewInTemplate($viewName, $viewData); ?>



 <script type="module" src="<?= URL . '/assets/js/main.js'?>"></script>
 <script type="module" src="<?= URL . '/assets/js/about.js'?>"></script>
  </body>
</html>