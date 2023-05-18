<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the filename from the query parameters
    $filename = $_GET['filename'];

    // Specify the file path and name
    $filePath = "../file/" . $filename;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file content
        $fileContent = file_get_contents($filePath);

        // Display the file content on another page
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>File Content</title>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container mt-5'>";
        echo "<h2>File Content</h2>";
        echo "<pre>" . htmlspecialchars($fileContent) . "</pre>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "File not found.";
    }
}
?>