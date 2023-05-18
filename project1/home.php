<?php require './header.php' ?>
<?php
// Path to the directory where folders are created
$directory = 'file/';
// Handle the form submission for creating a new folder
if (isset($_POST['create_folder'])) {
    $folderName = $_POST['folder_name'];
    $folderPath = $directory . $folderName;

    // Check if the folder already exists
    if (!is_dir($folderPath)) {
        // Create the new folder
        if (mkdir($folderPath)) {
            // Folder creation successful
            echo '<script>alert("New folder created successfully!");</script>';
        } else {
            // Folder creation failed
            echo '<script>alert("Failed to create the new folder.");</script>';
        }
    } else {
        // Folder already exists
        echo '<script>alert("The folder already exists.");</script>';
    }
}

// Handle the form submission for file upload
if (isset($_FILES['file_upload'])) {
    $folderName = $_POST['folder'];
    $folderPath = $directory . $folderName . '/';
    $fileName = $_FILES['file_upload']['name'];
    $fileTmp = $_FILES['file_upload']['tmp_name'];

    // Move the uploaded file to the folder
    if (move_uploaded_file($fileTmp, $folderPath . $fileName)) {
        // File upload successful
        echo '<script>alert("File uploaded successfully!");</script>';
    } else {
        // File upload failed
        echo '<script>alert("Failed to upload the file.");</script>';
    }
}

// Handle the form submission for deleting a folder
if (isset($_POST['delete_folder'])) {
    $folderName = $_POST['folder_name'];
    $folderPath = $directory . $folderName;

    // Check if the folder exists
    if (is_dir($folderPath)) {
        // Delete the folder and its contents recursively
        deleteFolder($folderPath);
        echo '<script>alert("Folder deleted successfully!");</script>';
    } else {
        // Folder doesn't exist
        echo '<script>alert("The folder does not exist.");</script>';
    }
}

// Handle the form submission for deleting a file
if (isset($_GET['delete_file'])) {
    $filePath = $_GET['delete_file'];

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
}

/**
 * Recursively delete a folder and its contents.
 *
 * @param string $folderPath The path to the folder to delete.
 */
function deleteFolder($folderPath)
{
    if (is_dir($folderPath)) {
        $files = array_diff(scandir($folderPath), array('.', '..'));

        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file;

            if (is_dir($filePath)) {
                // Recursive call to delete sub-folder
                deleteFolder($filePath);
            } else {
                // Delete the file
                unlink($filePath);
            }
        }

        // Delete the empty folder
        rmdir($folderPath);
    }
}

// Get the list of folders in the directory
$folders = array_filter(glob($directory . '*'), 'is_dir');
$folderData = array();

// Loop through the folders and retrieve their information
foreach ($folders as $folder) {
    $folderName = basename($folder);
    $folderPath = $directory . $folderName;

    $files = array_diff(scandir($folderPath), array('.', '..'));
    $fileCount = count($files);
    $fileTypes = array();

    foreach ($files as $file) {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        $fileTypes[] = $fileExtension;
    }

    $fileTypes = array_unique($fileTypes);
    $fileTypes = implode(', ', $fileTypes);

    $folderData[] = array(
        'name' => $folderName,
        'file_count' => $fileCount,
        'file_types' => $fileTypes,
        'created_at' => date('Y-m-d H:i:s', filectime($folder))
    );
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body >
    <div class=" mt-5 container-fluid mb-5 border-bottom " id="first">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-center align-items-center">
        <i class="fa-regular fa-folder-open fs-3 mr-3"></i>
            <h2>File Manager</h2>
            </div>
            <div>
            <!-- Create Folder Button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createFolderModal">
                Create Folder
            </button>

            <!-- Upload File Button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadFileModal">
                Upload File
            </button>
            </div>
        </div>
    </div>

    <!-- Create Folder Modal -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" role="dialog" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel">Create New Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="folderName">Folder Name:</label>
                            <input type="text" class="form-control" id="folderName" name="folder_name" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_folder">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload File Modal -->
    <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFileModalLabel">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="folderSelect">Select Folder:</label>
                            <select class="form-control" id="folderSelect" name="folder" required>
                                <?php foreach ($folderData as $folder) : ?>
                                    <option value="<?php echo $folder['name']; ?>"><?php echo $folder['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fileUpload">Choose File:</label>
                            <input type="file" class="form-control-file" id="fileUpload" name="file_upload" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Folder Listing Table -->
    <table class="table table-striped" style="background-color: #fafafa;"">
        <thead>
            <tr>
                <th>Title/Name</th>
                <th>File Count</th>
                <th>File Types</th>
                <th>Date Added</th>
                <th>Manage</th>
                <th>View Files</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($folderData as $folder) : ?>
                <tr>
                <td><a href="file-details.php?folder=<?php echo $folder['name']; ?>"><?php echo $folder['name']; ?></a></td>
                    <td><?php echo $folder['file_count']; ?></td>
                    <td><?php echo $folder['file_types']; ?></td>
                    <td><?php echo $folder['created_at']; ?></td>
                    <td>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="folder_name" value="<?php echo $folder['name']; ?>">
                            <button type="submit" name="delete_folder" class="btn border btn-sm" onclick="return confirm('Are you sure you want to delete this folder?')"><i class="fa-sharp fa-solid fa-trash" style="color: #f74545;"></i></button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn border btn-sm" data-toggle="modal" data-target="#viewFilesModal<?php echo $folder['name']; ?>">
                        <i class="fa-regular fa-eye" style="color: #16d019;"></i>
                        </button>
                    </td>
                </tr>
                <!-- View Files Modal -->
                <div class="modal fade" id="viewFilesModal<?php echo $folder['name']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewFilesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewFilesModalLabel">View Files - <?php echo $folder['name']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <?php
                                    $folderPath = $directory . $folder['name'] . '/';
                                    $files = array_diff(scandir($folderPath), array('.', '..'));
                                    foreach ($files as $file) {
                                        echo '<li>' . $file . ' - <a href="' . $folderPath . $file . '" target="_blank">Download</a> - <a href="?delete_file=' . $folderPath . $file . '" onclick="return confirm(\'Are you sure you want to delete this file?\')">Delete</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php require './footer.php' ?>