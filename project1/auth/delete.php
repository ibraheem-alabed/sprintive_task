<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the filename from the query parameters
    $filename = $_GET['filename'];

    // Specify the file path and name
    $filePath = "../file/" . $filename;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Delete the file
        unlink($filePath);
        echo "File deleted successfully.";
    } else {
        echo "File not found.";
    }
}
?>