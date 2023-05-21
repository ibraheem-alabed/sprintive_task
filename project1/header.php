<?php
session_start();



if (!isset($_SESSION['user']) && !strpos($_SERVER['SCRIPT_FILENAME'], 'index.php') && !strpos($_SERVER['SCRIPT_FILENAME'], 'user_registration.php'))
header("Location: ./ ");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Manegmant System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

    <header>
        <nav class="navbar px-5" style=" background-color: #353537;">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php" style="color: whitesmoke;">File Manegmant System</a>
                <!-- <button class="navbar-toggler" style="background-color: #cbcbcb;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="" id="navbarSupportedContent">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./home.php">
                                    Home
                                </a>
                            </li> -->
                        </ul>

                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa-regular fa-user mr-2" style="color: white;"></i>
                            <span class="me-3" style="color: white;" ><?= $_SESSION['user']['display_name'] ?></span>
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color: white;"></i>
                            <a href="./auth/logout.php" class="btn " style="color: white;">Logout</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <!-- The closing tag is in footer.php -->