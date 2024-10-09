<?php
//print_r($res);
?>

<?php foreach($res as $val): ?>

<h2><?php echo $val['nomeUsuario'] ?></h2>
<h4><?php echo $val['email'] ?></h4>

<?php endforeach  ?>



