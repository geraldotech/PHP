<?php
require './includes/config.php'; // Include your database connection configuration

if (isset($_GET['filter_type']) && isset($_GET['keyword'])) {
    $filter_type = $_GET['filter_type'];
    $keyword = $_GET['keyword'];

    // Construct the search query based on the selected filter type
    $search_query = "SELECT * FROM cars WHERE $filter_type LIKE '%$keyword%'";

    // Execute the search query
    $stmt = $conn->prepare($search_query);
    $stmt->execute();
    
    // Display the search results
    if ($stmt->rowCount() > 0) {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Resultado:</title>
            <!-- Include Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h3>Search Results</h3>
                <ul class="list-group">
                    <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li class='list-group-item'>{$row['Marca']} - {$row['Modelo']} - {$row['Ano']} - {$row['Status']}</li>";
                        }
                    ?>
                </ul>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "<p>No results found.</p>";
    }
} else {
    echo "<p>No search query parameters provided.</p>";
}
?>
