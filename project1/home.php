<?php
require './header.php' ?>






<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body >
    <div class="container mt-5 d-flex justify-content-between " >
        <div class="d-flex justify-content-center align-items-center">
    <i class="fa-regular fa-folder-open fs-3"></i>
        <h2 class="ml-2">File Manegar</h2>
        </div>
        <form method="POST" action="./auth/upload.php" enctype="multipart/form-data" class="d-flex justify-content-evenly">
            <div class="form-group">
                <label for="filename">File Name:</label>
                <input type="text" name="filename" id="filename" class="form-control" >
            </div>
            <div class="form-group">
                <label for="file" class="">Select File:</label>
                <input type="file" name="file" id="file" class="form-control-file " >
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>









<?php
$files = [];

// Scan the directory and retrieve file information
$directory = "./file/";
$dirContents = scandir($directory);
foreach ($dirContents as $file) {
    if ($file !== '.' && $file !== '..') {
        $filePath = $directory . $file;
        $fileInfo = [
            'name' => $file,
            'type' => mime_content_type($filePath),
            'created_at' => date('Y-m-d H:i:s', filemtime($filePath))
        ];
        $files[] = $fileInfo;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="background-color: #d6d6d6;">
        <?php if (!empty($files)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title/Name</th>
                        <th>File Type</th>
                        <th>Date Added</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file) : ?>
                        <tr>
                            <td style="color: #00a6ff;"><?php echo $file['name']; ?></td>
                            <td><?php echo $file['type']; ?></td>
                            <td><?php echo $file['created_at']; ?></td>
                            <td>
                            <a href="./auth/delete.php?filename=<?php echo $file['name']; ?>" class="btn btn-danger btn-sm"><i class="fa-sharp fa-solid fa-trash"></i></a>                            
                            <a href="./auth/view.php?filename=<?php echo $file['name']; ?>" class="btn btn-primary btn-sm mr-2"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No files uploaded yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>















<?php require './footer.php' ?>
