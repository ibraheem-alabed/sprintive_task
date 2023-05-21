<?php
$folderName = $_GET['folder'];
$fileName = $_GET['file'];
$filePath = './file/' . $folderName . '/' . $fileName;

// Check if the file exists
if (file_exists($filePath)) {
    // Delete the file
    if (unlink($filePath)) {
        // File deletion successful
        echo '<script>alert("File deleted successfully!");</script>';
    } else {
        // File deletion failed
        echo '<script>alert("Failed to delete the file.");</script>';
    }
} else {
    // File doesn't exist
    echo '<script>alert("The file does not exist.");</script>';
}

// Redirect back to the file details page
header("Location: file-details.php?folder=$folderName");
exit;
