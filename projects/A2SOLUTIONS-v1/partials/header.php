<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

   <!-- Include Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="registerCar.php">Registrar <i class="fa fa-plus" aria-hidden="true"></i>
</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listcars.php">Ver Todos<i class="fa fa-list" aria-hidden="true"></i>
</a>
                    </li>
                  <!--  <li class="nav-item">
                        <a class="nav-link" href="registerUser.php" tabindex="-1" aria-disabled="true">Registrar Usuário
                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                        </a>
                    </li>  -->
                    <li class="nav-item">
                        <a class="nav-link" href="search.php" tabindex="-1" aria-disabled="true">Filtrar<i class="fa fa-filter" aria-hidden="true"></i>
</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>