<?php require './header.php' ?>

<?php
$folderName = $_GET['folder'];
$folderPath = './file/' . $folderName . '/';

// Get the list of files in the folder
if (is_dir($folderPath)) {
    $files = array_diff(scandir($folderPath), array('.', '..'));
} else {
    $files = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Files in <?php echo $folderName; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Files in <?php echo $folderName; ?></h2>

        <?php if ($files !== false) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file) : ?>
                        <tr>
                            <td><?php echo $file; ?></td>
                            <td>
                                <a href="<?php echo $folderPath . $file; ?>" target="_blank">open /</a>
                                <a href="delete-file.php?folder=<?php echo $folderName; ?>&file=<?php echo $file; ?>" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="alert alert-danger">
                <strong>Error:</strong> Folder not found.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php require './footer.php' ?>
