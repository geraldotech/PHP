
<title>List Cars</title>
<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}


   include('./partials/header.php')
   ?>
    <div class="container mt-5">
        <h2 class="mb-4">List of Cars</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
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
                <?php
                require './includes/config.php';

                $sql = "SELECT * FROM cars";
                $result = $conn->query($sql);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['Marca'] . "</td>";
                        echo "<td>" . $row['Modelo'] . "</td>";
                        echo "<td>" . $row['Cor'] . "</td>";
                        echo "<td>" . $row['Ano'] . "</td>";
                        echo "<td>R$" . number_format($row['Valor'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit</a>";
                        echo "&nbsp;";
                        echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm delete-btn'><i class='fas fa-trash-alt'></i> Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No cars found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Font Awesome JS (Optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            return confirm("Are you sure you want to delete this car?");
        });
    });
</script>
<?php include './partials/footer.php'; ?>

</body>
</html>
