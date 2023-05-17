<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the file name from the form input
    $fileName = $_POST['filename'];

    // Specify the file path and name
    $filePath = "../file/" . $fileName;

    // Check if the file already exists
    if (file_exists($filePath)) {
        echo "File already exists.";
    } else {
        // Move the uploaded file to the desired location
        $fileTmpPath = $_FILES['file']['tmp_name'];
        move_uploaded_file($fileTmpPath, $filePath);

        echo "File uploaded successfully.";
    }
}
?>