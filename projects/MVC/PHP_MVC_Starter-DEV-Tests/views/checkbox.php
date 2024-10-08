<h2>Checkbox</h2>


<form method="POST" action="<?= URL. '/Checkbox/recebidos'  ?>">
<?php
foreach($list as $opt): ?>

<ul>
  <li>
  <label for="<?= $opt['idLogin']?>"><?= $opt['nomeUsuario']?></label>
  <input type="checkbox" name="selecionados[]" value="<?= $opt['idLogin']?>" id="<?= $opt['idLogin']?>" <?php echo $opt['is_active'] == '1' ? 'checked' : '' ?>>
  </li>
 </ul>
<? endforeach ?>
<button type="submit">Submit</button>
</form>