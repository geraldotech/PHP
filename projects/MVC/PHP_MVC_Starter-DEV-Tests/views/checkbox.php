<h2>Checkbox</h2>
<div class="row">
     <div class="col-md-12"><?php $this->helper->alertMessage(); ?></div>

</div>

<hr>

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

<hr>

<?php
// Definindo o array $erpOptions com dados fictícios das empresas
$erpOptions = [
  ['idEmpresa' => 1, 'idLegEmpresa' => 'Empresa 1'],
  ['idEmpresa' => 2, 'idLegEmpresa' => 'Empresa 2'],
  ['idEmpresa' => 3, 'idLegEmpresa' => 'Empresa 3'],
  // Adicione mais empresas conforme necessário
];
?>

<h1>Vinculação de Usuário às Instâncias ERP</h1>
<form action="processar_formulario.php" method="POST">
      <?php foreach ($erpOptions as $value) : ?>
          <div class="form-check col-md-12" name="vinculaUsuarioInstanciaEdit">
              <input type="checkbox" name="vinculaUsuarioInstanciaEdit[]" id="vinculaUsuarioInstancia<?php echo $value['idEmpresa']; ?>" class="form-check-input erpOptionCheckbox" value="<?php echo $value['idEmpresa']; ?>">
              <label class="form-check-label" for="vinculaUsuarioInstancia<?php echo $value['idEmpresa']; ?>"><?php echo $value['idLegEmpresa']; ?></label>
          </div>
      <?php endforeach; ?>
      <button type="submit" class="btn btn-primary mt-3">Enviar</button>
</form>