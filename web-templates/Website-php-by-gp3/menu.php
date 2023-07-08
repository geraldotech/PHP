<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GPnote - 2020</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
          

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header"> <!--This div creates a navigation button visible on smaller screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><!--These tags create the standard 3-lin button logo on top right corner -->
                    <span class="icon-bar"></span><!--Put the page less than full-screen to see this behavior -->
                    <span class="icon-bar"></span>
                </button>
				<h1><a href="index.php">GPnoteTech</a></h1>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How-To<span class="caret"></span></a><!--Requires the JavaScript files linked at the end-->
                        <ul class="dropdown-menu">
                            <li><a href="https://drive.google.com/drive/folders/0B29thvr3hrYROGFRam5Fb3VLejg?usp=sharing">Linux Server</a></li>
                            <li><a href="learn-html.php">Learn HTML</a></li>
                       
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Downloads<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="downloads.php">Downloads</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Header:</li>
                            <li><a href="#">MoreItems</a></li>
                            <li><a href="#">MoreItems</a></li>
                            <li><a href="#">MoreItems</a></li>
                        </ul>
                    </li>
                    <li><a href="select-banco.html">Fazer Pagamento</a></li>
                    <li><a href="about.php">Sobre</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>	
    <!-- JavaScript is required for the dropdown menu -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="js/bootstrap.js"></script>
</body>
</html>';
?>