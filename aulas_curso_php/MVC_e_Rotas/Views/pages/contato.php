<div class="chamada">
  <div class="center">
    <h2><?= $arr['titulo'] ?></h2>
    <h1><?= $arr['titulo2'] ?></h1>
</div>
</div>
<div class="contato principal">
  <div class="center">
  <form action="" method="POST">
  <div class="alerta">
      <h3>Entre em contato com a nossa equipe</h3>
</div>
    <input type="text" placeholder="Nome..." name="nome">
    <textarea name="" placeholder="sua mensagem..."></textarea>
    <input type="submit" name="acao" value="Enviar!">
  </form>

  <hr>
  <h2>My contantes <?= self::me; ?> em MainView.php chamar com <code>&lt;?= self::me; ?&gt;</code></h2>
  </div>
</div>
