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
  <div class="col-md-12"><?php $this->helper->alertMessage(); ?></div>
  <h1>Área de Testes</h1>
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
        <dd>
          <?php
       echo $_SERVER['REQUEST_URI'];
      ?>
        </dd>
      </dl>
    </li>
  </ul>
  
  <h3>Menu</h3>
  <nav>
    <ul>
      <li>
        <a href="<?php echo $_SERVER['REQUEST_URI'] . '/about' ?>">about</a>
      </li>
    </ul>
  </nav>
  
  <?php
   echo $_SERVER['REQUEST_URI'];
  ?>
  
  <div
    id="modalNameHere"
    class="modal fade"
    role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button
            type="button"
            class="close"
            data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Title of modal</h4>
        </div>
        <div class="modal-body">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo debitis reiciendis perspiciatis optio amet provident. Maxime voluptatum ducimus, repellendus ipsam nam doloremque corrupti
            distinctio, nesciunt laudantium magnam, aliquam temporibus repellat.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <h3>Buttons</h3>
  
  <nav>
    <button
      type="button"
      class="btn btn-success"
      data-toggle="modal"
      data-target="#modalNameHere">
      Button 1
    </button>
    <button
      type="button"
      class="btn btn-success btn-sm"
      data-toggle="modal"
      data-target="#modalNameHere">
      btn-sm
    </button>
  
    <button
      type="button"
      class="btn btn-danger closemodalcreateuser"
      data-dismiss="modal">
      Button 2
    </button>
  
    <button
      type="button"
      class="btn btn-primary">
      Button 3
    </button>
  
    <button
      type="button"
      class="btn btn-primary btnActive">
      Btnactive
    </button>
  </nav>
  
  
  
  
  <p>From Controller: <?= $name ?>
  </p>
  
  <p>From model: <?= print_r($lista) ?> </p>
  
  <h2>consultaLogin()</h2>
<!--   
  <p>From consultaLogin <?= print_r($consultaLogin) ?> </p>
  <p>From consultaLogin <?= print_r($consultaLogin['returna']) ?> </p> -->
  <!-- <p>From consultaLogin2 <?= print_r($all['returna']) ?> </p> -->
  
  
  
  <!-- <p>From model: <?= print_r($consultaLogin['data']) ?>
  <p>From model: <?= print_r($consultaLogin['message']) ?> </p>  -->
  
  
  <h3>Icons disabled class</h3>
  <p>disabled input</p>
  <i title="Excluir" type="button" class="fa fa-trash fa-lg disabledinput"></i>
  
  <i class="fa fa-edit fa-lg" title="Editar" disabled></i>
  
  <h3>SGA Loader animation</h3>
  
  <section class="spinner-container classToHideAnimationHere">
    <div class="spinner-wrapper2">
      <div class="spinnerTable border_blue"></div>
      <div class="spinner-text">SGA</div>
    </div>
  </section>

  <h3>Datatables</h3>


  <?php 
   print_r($tryCatchFunction[0]);
  ?>
<!--   <table
  class="table hover  dt-responsive nowrap dataTable no-footer dtr-inline"
  cellspacing="0"
  width="100%"
  role="grid"
  aria-describedby="datatable-responsive_info"
  style="width: 100%"
  id="tableRiscoAtuais">
  <thead>
    <tr>
      <th>Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tryCatchFunction as $row): ?>
    <tr>
      <td><?php echo $row['nomeUsuario']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table> -->
  <table
  class="table hover  dt-responsive nowrap dataTable no-footer dtr-inline"
  cellspacing="0"
  width="100%"
  role="grid"
  aria-describedby="datatable-responsive_info"
  style="width: 100%"
  id="tableRiscoAtuais">
  <thead>
      <tr>
        <th>
          Nome       
        </th>
          <th>email</th>
          <th>data_criacao</th>
    </tr>
    </thead>
  <tbody>
    <?php foreach($tryCatchFunction as $val):?>
      <tr>
        <td><?=  $val['nomeUsuario'] ?></td>
        <td><?=  $val['email'] ?></td>
        <td><?=  $val['data_criacao'] ?></td>
      </tr>    
    <?php endforeach; ?>
  <tbody>
</table>

</main>

