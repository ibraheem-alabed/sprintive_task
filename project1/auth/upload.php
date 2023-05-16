<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $file = $_FILES['file'];

  // Check if the file was uploaded without errors
  if ($file['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadPath = $uploadDir . basename($file['name']);

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      // Create an array with the file details
      $fileDetails = array(
        'name' => $file['name'],
        'type' => $file['type'],
        'size' => $file['size'],
        'path' => $uploadPath
      );

      // Get the existing file data
      $existingData = file_exists('files.json') ? json_decode(file_get_contents('files.json'), true) : array();

      // Add the new file details to the existing data
      $existingData[] = $fileDetails;

      // Save the updated data as JSON
      file_put_contents('files.json', json_encode($existingData));

      echo 'File uploaded successfully.';
    } else {
      echo 'Error moving file to upload directory.';
    }
  } else {
    echo 'Error uploading file.';
  }
}
?>