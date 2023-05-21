
<?php
require './auth/header.php' ?>

<div class="container my-5 p-5">


    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger w-50 m-auto my-3' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php
    endif;
    unset($_SESSION['error']); // to apply flash msgs
    ?>

    <div class=" row  border-end-0 border-top-0 border-bottom-0 justify-content-center"  >
        <div class="col-3 height-100 d-flex flex-column  justify-content-around  " id="log" >
            <div class="mx-5">
                <h2 style="color: white;" >Sing Up</h2>
                <p style="color: white;">Sing up with your simple detalis it will nbl corss checked by the administration</p>
            </div>
            <div class="mx-5">
                <h2 style="color: white;">Sing In</h2>
                <p style="color: white;">Sing in with your username and password</p>
            </div>
        </div>
        
        <div class="col-7 border-start" id="reg">

        <div class="container  p-5" id="reg">

    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger w-50 m-auto my-3' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php
    endif;
    unset($_SESSION['error']); // to apply flash msgs
    ?>

    <div class="d-flex justify-content-start align-items-center ">
        <form class="w-50" action="./auth/validation.php" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                <input type="password" name="password" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputPassword1" required>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
            <button type="submit" class="btn btn-success ">log in</button>
            <p class="mx-3">or</p>
            <a href="./auth/user_registration.php" class="btn btn-secondary">sign up</a>
            </div>

</div>
        </div>
    </div>

<?php require './auth/footer.php' ?>
