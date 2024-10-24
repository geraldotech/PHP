<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login page
  //  header("Location: login.html");
  //  exit();
}


/*  
*$dir é o caminho da pasta onde você deseja que os arquivos sejam salvos. 
*Neste exemplo, supondo que esta pagina esteja em public_html/upload/ 
*os arquivos serão salvos em public_html/upload/imagens/ 
*Obs.: Esta pasta de destino dos arquivos deve estar com as permissões de escrita habilitadas. 
*/ 


// Generate a unique file name based on the current date/time
$timestamp = time(); // Get current Unix timestamp
$random = mt_rand(); // Generate a random number
$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); // Get the file extension
$filename = $timestamp . 'G' . $random . '.' . $extension; // Construct the file name


$dir = "files/"; 
// recebendo o arquivo multipart 
$file = $_FILES["file"]; 
// Move o arquivo da pasta temporaria de upload para a pasta de destino 
if (move_uploaded_file($_FILES["file"]["tmp_name"], $dir . $filename)){ 
    echo "<a href='dashboard.php'>Dashboard</a>";
    echo "<br>";
    echo "Arquivo enviado com sucesso!"; 
    echo "<br>";
    echo "<a href='". $dir .  $filename . "'target='_blank'>LINK</a>";
    echo "<br>";
   
   // echo "<img src='". $dir . $filename . "'/>";
   // Check if the filename contains 'jpg' (case insensitive)
// Get the file extension
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

// Array of allowed image file extensions
$allowed_extensions = array("jpg", "jpeg", "png", "webp");

// Check if the file extension is in the list of allowed extensions
if (in_array($file_extension, $allowed_extensions)) {
    echo "<img src='". $dir . $filename . "'/>";
}

} 
else { 
    echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}           
?>
