<html>
<head>
  <meta charset="utf-8">
  <title><?= self::titulo; ?></title>
  <link 
  href="<?= INCLUDE_PATH_FULL ?>css/style.css" rel="stylesheet"
  type="text/css" 
  />
</head>
<body>
<!-- <?php
foreach ($this->menuItems as $key => $value){
  echo $value;
}
?> -->
<header>
  <div class="center"><!-- center -->
    <div class="logo">
      <h2>gmapCODE</h2>
    </div>
    <nav>
      <?php 
       foreach($this->menuItems as $value){
         echo '<a href="'.INCLUDE_PATH.strtolower($value).'">'.$value.'</a>';
        }
        ?>
  </nav>
  <div class="clear">    
  </div>
</div><!-- center -->
</header>