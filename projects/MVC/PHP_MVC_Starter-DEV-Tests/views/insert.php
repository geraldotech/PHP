<p>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maiores exercitationem aut, quidem minus sit voluptates laboriosam id est minima ex incidunt, quod unde corporis? Odio soluta quo ipsam repellat?

</p>
<form action="<?php echo URL ?>/Insertsave/saveData" method="POST">
  <input type="text" name="author" value="geraldo" placeholder="author">
  <input type="text" name="usertext" value="testleorem23o23" placeholder="your text here">
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