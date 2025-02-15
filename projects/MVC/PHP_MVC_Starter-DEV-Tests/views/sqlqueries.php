<style>
  .containerdev{
    background: #181818;
    color: #fff; 
    padding: 1rem;
    font-familly: Arial;
  }
  table {
    color: #fff;
  }
 
</style>

<main class="containerdev">
  <div class="col-md-12">
     <?php $this->helper->alertMessage(); ?> 
  </div>
  <p>rota para fins de testes html, php, em geral, criado por Geraldo Costa em <time>23/08/2024</time>.</p>
  
  <h3>Contextualizandos URLs</h3>
  <ul>
    <li>
      <dl>
        <dt><code>URL</code></dt>
        <p>é uma constante customizada globalmente de <strong>config.php</strong> que retorna a URL que o projeto foi instalado.</p>
        <dd>
        </dd>
      </dl>
    </li>
    <li>
      <dl>
        <dt><code>$_SERVER['REQUEST_URI']</code></dt>
        <p>retorna a url atual completa</p>
        <p> <a href="<?php echo $_SERVER['REQUEST_URI'] . '/about' ?>">about</a></p>
        <dd>
          <?php
       echo $_SERVER['REQUEST_URI'];
      ?>
        </dd>
      </dl>
    </li>
  </ul>
  
  <?php
   echo $_SERVER['REQUEST_URI'];
  ?>  
  
  <p>From Controller: <?= $name ?>
  </p>
  
  <p>From model: <?= print_r($lista) ?> </p>


  <h1>consultaSimples()</h1>
  
  <?php
  print_r($consultaSimples[0]['idLogin']);


  echo '<ul>';
  foreach($consultaSimples as $val){
    echo "<li>" . $val['nomeUsuario'] . "</li>";
  }
  echo '</ul>';
  
  ?>  

</main>

