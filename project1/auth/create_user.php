<?php
$display_name= isset($_POST['display_name']) ? $_POST['display_name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if (!empty($display_name) && !empty($email) && !empty($password)) {
    $new_user = json_decode(file_get_contents('../user.json'));
    // add the new user to the all user array.
    $new_user[] = (object) array(
        'display_name' => $display_name,
        'email' => $email,
        'password' => $password,
    );
    $json_users = json_encode($new_user);
    file_put_contents('../db/users.json', $json_users);
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    header("Location: index.php ");
    exit();
} else {
    header("Location: ../index.php ");
    exit();
}