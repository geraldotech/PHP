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

  <h1>consultaLogin()</h1>

  <?php
  if($consultaLogin['ok']) :?>
  
  <p>From consultaLogin <?= print_r($consultaLogin) ?> </p>
  <br>
  <p>From consultaLogin <?= print_r($consultaLogin['message']) ?> </p>  
  <br>
  <p>From consultaLogin <?= print_r($consultaLogin['ok']) ?> </p> 
  <?php endif;
  ?>
  <!-- <p>From consultaLogin2 <?= print_r($all['returna']) ?> </p> -->  
  
  <!-- <p>From model: <?= print_r($consultaLogin['data']) ?>
  <p>From model: <?= print_r($consultaLogin['message']) ?> </p>  --> 


  <h1>tryCatchFunction()</h1>
  <?php 
   print_r($tryCatchFunction['data'][0]);
  ?>

<?php


if($tryCatchFunction['ok']){
  print_r("<h2 style='text-align:center;color: green'>{$tryCatchFunction['message']}</h2>");
}

if(!$tryCatchFunction['ok']){
  print_r("<h2 style='text-align:center;color: red'>{$tryCatchFunction['message']}</h2>");
} 

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

