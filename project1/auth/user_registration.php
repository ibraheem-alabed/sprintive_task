
<?php
require './header.php' ?>

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
        <form class="w-50" action="./auth/create_user.php" method="POST">
            <div class="mb-3">
                <label for="display_name" class="form-label">FIRST NAME</label>
                <input type="text" name="display_name" class="form-control border-top-0 border-end-0 border-start-0 inp" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="display_name" class="form-label">LAST NAME</label>
                <input type="text" name="last_name" class="form-control border-top-0 border-end-0 border-start-0 inp" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                <input type="password" name="password" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputPassword1" required>
            </div>
            <div class="form-check my-5">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required >
  <label class="form-check-label" for="flexCheckChecked">
    i agree with the terms and conditions
  </label>
</div>
            <div class="d-flex justify-content-start align-items-center mt-3">
            <button type="submit" class="btn btn-success ">sign up</button>
            <p class="mx-3">or</p>
            <a href="../index.php" class="btn btn-secondary">log in</a>
            </div>

</div>
        </div>
    </div>

    <style>
#first{
    background-color: #ffffff
}
#log{
    background-color: #00aaff;
}

#reg{
    background-color: #f8f8f8;
}
.inp{
    background-color: #f8f8f8;

}
    </style>

<?php require './footer.php' ?>
