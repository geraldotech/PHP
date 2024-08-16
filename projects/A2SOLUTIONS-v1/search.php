<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Search</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    include('./partials/header.php');
?>
<div class="container mt-5">
    <h2 class="mb-4">Filtra  carro:</h2>
    <form id="searchForm">
        <div class="row">
            <div class="col-md-4">
                <select name="filter_type" id="filter_type" class="form-select mb-3">
                    <option value="marca">Marca</option>
                    <option value="modelo">Modelo</option>
                    <option value="ano">Ano</option>
                    <option value="status">Status</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="keyword" id="keyword" class="form-control mb-3" placeholder="Enter keyword">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100" id="searchBtn">Buscar</button>
            </div>
        </div>
    </form>
    <div id="searchResults">
        <!-- This is where the search results will be displayed -->
        <?php
        if (isset($_GET['filter_type']) && isset($_GET['keyword'])) {
            // Process search parameters and display results
            include('search_results.php');
        }
        ?>
    </div>
</div>


<?php   include('./partials/footer.php')  ?>
