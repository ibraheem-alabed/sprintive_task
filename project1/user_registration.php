
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

    <div class=" row border"  >
        <div class="col-3 height-100 d-flex flex-column  justify-content-evenly  align-items-center" id="log" >
            <div class="">
                <h2 style="color: white;">sing up</h2>
                <p style="color: white;">sing up with your simple detalis it will nbl corss checked by the administration</p>
            </div>
            <div class="">
                <h2 style="color: white;">sing in</h2>
                <p style="color: white;">sing in with your username and password</p>
            </div>
        </div>
        
        <div class="col-8 border-start" id="reg">

        <div class="container  p-5" id="reg">

    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger w-50 m-auto my-3' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php
    endif;
    unset($_SESSION['error']); // to apply flash msgs
    ?>

    <div class="d-flex justify-content-center align-items-center">
        <form class="w-50" action="./auth/create_user.php" method="POST">
            <div class="mb-3">
                <label for="display_name" class="form-label">first Name</label>
                <input type="text" name="display_name" class="form-control border-top-0 border-end-0 border-start-0 inp" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="display_name" class="form-label">last Name</label>
                <input type="text" name="last_name" class="form-control border-top-0 border-end-0 border-start-0 inp" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control border-top-0 border-end-0 border-start-0 inp" id="exampleInputPassword1" required>
            </div>
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    i agree with the terms and conditions
  </label>
</div>
            <div class="d-flex justify-content-between align-items-center mt-3">
            <button type="submit" class="btn btn-success ">sign up</button>
            <a href="./index.php" class="btn btn-secondary">loge in</a>
            </div>

</div>
        </div>
    </div>

<style>
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