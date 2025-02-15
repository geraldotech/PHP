<p>crie novos registros:</p>
<form
  action="<?php echo URL ?>/Insertsave/saveData"
  method="POST">
  <input
    type="text"
    name="author"
    value="geraldo"
    placeholder="author" />
  <input
    type="text"
    name="usertext"
    value="message"
    placeholder="your text here" />
  <button>Salvar</button>
</form>

<?php if($list['ok']) : ?>
<ul>
  <?php foreach($list['data'] as $val) : ?>
  <li>
    <?php echo $val['author'] . ' - ' . $val['text'] ?>
  </li>

  <?php endforeach ?>
</ul>
<?php elseif (!$list['ok']) : ?>
<p>No data available.</p>
<?php endif ?>
