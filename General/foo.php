<?php 

$list = [
  ['name'=> 'Geraldo'],
  ['name'=> 'Felipe'],
  ['name'=> 'Bella'],
];
?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New document</title>
</head>

<body>


  <article class="ok">
    <ul>
      <?php foreach ($list as $key => $val) : ?>
      <li><?php  echo $val['name'] . ' index =>' . $key  ?></li>
      <?php endforeach ?>
    </ul>
  </article>


  <div>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit itaque tempora sint earum minus sed quae
      placeat quo eos error soluta, nemo repellendus ratione laudantium, accusantium nisi, quam voluptatum ipsam.</p>
  </div>

</body>

</html>