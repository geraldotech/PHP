<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../public/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper container-fluid"> 
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="row mt-3">
                <?php include('header.php') ?>

                </div> 
                <h3>Bem vindo, <?php echo $_SESSION['username']; ?>!</h3>
                <h3 class="text-center">Cadastro de carros</h3>
                <p>Estoque: <?php echo count($cars); ?></p>
                <p>Valor do Inventário: <i class="fas fa-hand-holding-usd"></i>R$ <?php  echo $formattedValue; ?></p>
                <table class="mt-5 table table-striped">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cor</th>
                            <th>Ano</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php print_r($cars[0]); ?> -->
                        <?php foreach ($cars as $car): ?>
                            <tr>
                                <td><?php 
                                  $model = strtolower($car['marca']);
                                  $icon_path = "./assets/img/svgs/{$model}.svg";
                                  echo ' <img class="marcaicon" src="' . $icon_path . '" alt="' . $car['marca'] . '">' . ' ' .  $car['marca'];
                                  ?>
                                </td>
                                <td><?php echo $car['modelo']; ?></td>
                                <td><?php echo $car['cor']; ?></td>
                                <td><?php echo $car['ano']; ?></td>
                                <td><?php echo $car['valor']; ?></td>
                                <td><?php echo $car['status']; ?></td>
                                <td class="d-flex justify-content-between">
                                    <!-- Edit button -->
                            <!-- antes edit-car era no icon agora movido para span -->
                                 <span class="edit-car btn btn-primary btn-sm" data-car-id="<?php echo $car['id']; ?>"> <i class=" fas fa-edit" role='button'  ></i></span>
                                   
                                 <span class=" delete-car btn btn-danger btn-sm">
                                 <i class=" fas fa-trash-alt pe-auto " role='button'></i>
                                 </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>


<!-- Modal para cadastrar -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar novo carro <i class="fas fa-car"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!-- Form to register new car -->
            <form id="registerCarForm">
                    <!-- Input fields for marca, modelo, cor, ano, valor, and status -->
            <div class="form-group">
                <label class="required" for="marca">Marca:</label>
                <input type="text" class="form-control" list="marcasList" id="marca" name="marca" required>
            <datalist id="marcasList">
                <option value="Audi">
                <option value="BMW">
                <option value="Chevrolet">
                <option value="Fiat">
                <option value="Ford">
                <option value="Mercedes">
                <option value="Honda">
                <option value="Toyota">
            </datalist>
                </div>
                    <div class="form-group">
                        <label class="required" for="modelo">Modelo:</label>
                        <input type="text" class="form-control" list="modeloList" id="modelo" name="modelo" required>
                <datalist id="modeloList">            
                <!-- sera preenchido by javascript -->
                </datalist>
                    </div>
                    <div class="form-group">
                        <label class="required" for="cor">Cor:</label>
                        <input type="text" class="form-control" list="coresSugeridas" id="cor" name="cor" required>
                        <datalist id="coresSugeridas">
                            <option value="Branco">
                            <option value="Prata/Cinza">
                            <option value="Vermelho">
                            <option value="Azul">
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label class="required" for="ano">Ano:</label>
                        <input type="number" class="form-control" id="ano" name="ano" required>
                    </div>
                    <div class="form-group">
                        <label class="required" for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <div class="form-group">
                        <label class="required" for="status">Status:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="novo">novo</option>
                            <option value="seminovo">seminovo</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between p-2">
                    <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
                     <button type="reset" class="btn btn-secondary mt-3">Limpar</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Car Modal -->
<div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarModalLabel">Edit Car Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to edit car details -->
                <form id="editCarForm">
                    <!-- Input fields for editing car details -->
                    <input type="hidden" id="edit_car_id" name="edit_car_id"> <!-- Hidden input to store car ID -->
                    <div class="form-group">
                        <label for="edit_marca">Marca:</label>
                        <input type="text" class="form-control" id="edit_marca" name="edit_marca" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_modelo">Modelo:</label>
                        <input type="text" class="form-control" id="edit_modelo" name="edit_modelo" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_cor">Cor:</label>
                        <input type="text" class="form-control" id="edit_cor" name="edit_cor" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_ano">Ano:</label>
                        <input type="number" class="form-control" id="edit_ano" name="edit_ano" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_valor">Valor:</label>
                        <input type="text" class="form-control" id="edit_valor" name="edit_valor" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status:</label>
                        <select class="form-select" id="edit_status" name="edit_status" required>
                            <option value="novo">Novo</option>
                            <option value="seminovo">Seminovo</option>
                        </select>
                    </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary mt-5 ">Salvar</button>
            <button type="button" class="btn btn-danger mt-5 " data-bs-dismiss="modal">Cancelar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Cars</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="filterForm" method="POST" action="filterResults.php">
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
                        </div>
                        <div class="mb-3">
                            <label for="cor" class="form-label">Cor</label>
                            <input type="text" class="form-control" id="cor" name="cor" placeholder="Cor">
                        </div>
                        <div class="mb-3">
                            <label for="ano" class="form-label">Ano</label>
                            <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="novo">Novo</option>
                                <option value="seminovo">Seminovo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript -->
    <script src="./assets/js/main.js"></script>
   
    <?php include('footer.php') ?>
</body>

</html>
