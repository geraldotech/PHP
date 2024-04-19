
<?php
 // Check if the 'id' parameter is set in the URL
/* if (isset($_GET['id'])) {
    // Retrieve the value of the 'id' parameter
    $id = $_GET['id'];
    // Use the value of $id as needed
    echo "ID: $id";
} else {
    // 'id' parameter not found in the URL
    echo "ID parameter not provided in the URL.";
}  */

// Specify the directory where files are stored
$dir = "files/";

// Check if the 'filename' parameter is set in the URL
if (isset($_GET['file'])) {
    // Retrieve the value of the 'filename' parameter
    $filename = $_GET['file'];

    // Construct the full path of the file
    $filePath = $dir . $filename;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Attempt to delete the file
        if (unlink($filePath)) {
            echo "File '$filename' deleted successfully.";
        } else {
            echo "Error deleting file '$filename'.";
        }
    } else {
        echo "File '$filename' not found.";
    }
} else {
    // 'filename' parameter not found in the URL
    echo "Filename parameter not provided in the URL. delete?file=name";
}
?>

