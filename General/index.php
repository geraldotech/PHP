<!DOCTYPE html>
<html lang="pt-BR">
<?php
// Definindo o array $erpOptions com dados fictícios das empresas
$erpOptions = [
    ['idEmpresa' => 1, 'idLegEmpresa' => 'Empresa 1'],
    ['idEmpresa' => 2, 'idLegEmpresa' => 'Empresa 2'],
    ['idEmpresa' => 3, 'idLegEmpresa' => 'Empresa 3'],
    // Adicione mais empresas conforme necessário
];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Vinculação de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
