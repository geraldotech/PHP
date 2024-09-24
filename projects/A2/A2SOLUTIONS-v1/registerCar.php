

<title>Register Car</title>
<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}


include('./partials/header.php') 


?>
<div class="container mt-5">
        <h2 class="mb-4 text-center">Registrar novo carro:</h2>
        <form action="./includes/register_car_process.php" method="post">
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
                <input type="text" class="form-control" list="modeloList" id="modelo" name="modelo">
                <datalist id="modeloList">            
                <!-- Add more options as needed -->
                </datalist>
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

           <div class="d-flex justify-content-between p-2">
           <button type="submit" class="btn btn-primary">Register Car</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
           </div>
        </form>
 </div>
<script>
$(document).ready(function(){
    $('#marca').on('input', function(){
        let selectedMarca = $(this).val();
        console.log(selectedMarca)
        let modelos = [];
        // Populate modelos based on selectedMarca
        switch(selectedMarca) {
            case 'Audi':
                modelos = ['AUDI A3', 'AUDI A4', 'AUDI A5', 'AUDI E-TRON GT', 'AUDI Q3', 'AUDI Q5', 'AUDI Q8 E-TRON', 'AUDI RS E-TRON GT'];
                break;
            case 'BMW':
                modelos = ['BMW 1 Series', 'BMW 2 Series', 'BMW 3 Series', 'BMW 4 Series', 'BMW 5 Series', 'BMW 6 Series', 'BMW 7 Series'];
                break;
            case 'Chevrolet':
                modelos = ['Chevrolet Camaro', 'Chevrolet Corvette', 'Chevrolet Impala', 'Chevrolet Malibu', 'Chevrolet Silverado', 'Chevrolet Suburban', 'Chevrolet Tahoe'];
                break;
            // Add cases for other marcas
            default:
                modelos = [];
        }
        // Populate the datalist with modelos
        $('#modeloList').empty();

        $.each(modelos, function(index, value){
            $('#modeloList').append('<option value="' + value + '">');
        });
    });
});
</script>
<?php   include('./partials/footer.php')  ?>
<style>
    /* CSS to make inputs smaller */
    form {
        max-width: 450px; /* Adjust the width as needed */
        margin: 0 auto;
    }
</style>