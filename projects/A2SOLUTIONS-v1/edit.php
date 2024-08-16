
    <title>Edit Car</title>


<?php
   include('./partials/header.php')
   ?>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Car</h2>
        <?php
        require './includes/config.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $car_id = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
            $stmt->execute([$car_id]);
            $car = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($car) {
                ?>
                <form action="./update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca:</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $car['Marca']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $car['Modelo']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="cor" class="form-label">Cor:</label>
                        <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $car['Cor']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano:</label>
                        <input type="number" class="form-control" id="ano" name="ano" value="<?php echo $car['Ano']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="number" class="form-control" id="valor" name="valor" step="0.01" value="<?php echo $car['Valor']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="novo" name="status" value="Novo" <?php echo ($car['Status'] === 'Novo') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="novo">Novo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="seminovo" name="status" value="Seminovo" <?php echo ($car['Status'] === 'Seminovo') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="seminovo">Seminovo</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Car</button>
                </form>
                <?php
            } else {
                echo "<p>Car not found.</p>";
            }
        } else {
            echo "<p>Invalid request.</p>";
        }
        ?>
    </div>


<?php   include('./partials/footer.php')  ?>

