<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Search</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
   include('./partials/header.php')
   ?>
    <div class="container mt-5">
        <h2 class="mb-4">Car Search</h2>
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
                <button type="button" class="btn btn-primary w-100" id="searchBtn">Search</button>
            </div>
        </div>
        <div id="searchResults"></div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            // Function to fetch and display search results
            function fetchSearchResults() {
                var filter_type = $('#filter_type').val();
                var keyword = $('#keyword').val();

                $.ajax({
                    url: 'search_results.php',
                    method: 'GET',
                    data: { filter_type: filter_type, keyword: keyword },
                    success: function(response) {
                        $('#searchResults').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call fetchSearchResults function when search button is clicked
            $('#searchBtn').click(function() {
                fetchSearchResults();
            });

            // Call fetchSearchResults function when Enter key is pressed in the keyword input field
            $('#keyword').keypress(function(event) {
                if (event.keyCode === 13) {
                    fetchSearchResults();
                }
            });
        });
    </script>
</body>
</html>
