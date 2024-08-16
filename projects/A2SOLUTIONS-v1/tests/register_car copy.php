<title>Register Car</title>
<?php
   include('./partials/header.php')
   ?>
<div class="container mt-5">
        <h2 class="mb-4">Registrar novo carro:</h2>
        <form action="register_car_process.php" method="post">
            <div class="mb-3">
              <!--  
                <input type="text" class="form-control" id="marca" name="marca" required> -->
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" id="marca" name="marca" class="form-control" list="marcasList" autocomplete="off">
            <datalist id="marcasList">
                <option value="Audi">
                <option value="BMW">
                <option value="Chevrolet">
                <option value="Fiat">
                <option value="Ford">
                <option value="Mercedes">
                <option value="Honda">
                <option value="Toyota">
                <!-- Add more options as needed -->
            </datalist>
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <div class="mb-3">
                <label for="cor" class="form-label">Cor:</label>
                <input type="text" class="form-control" id="cor" name="cor" required>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano:</label>
                <input type="number" class="form-control" id="ano" name="ano" required>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="novo" name="status" value="Novo" checked>
                    <label class="form-check-label" for="novo">Novo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="seminovo" name="status" value="Seminovo">
                    <label class="form-check-label" for="seminovo">Seminovo</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register Car</button>
        </form>
 </div>
 <script>

</script>
    
<?php   include('./partials/footer.php')  ?>

