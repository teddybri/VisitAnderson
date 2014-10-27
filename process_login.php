<?php

include('includes/config.php');

$username       = $_POST['username'];
//$hashedPassword = md5($_POST['password']);

$options = array('cost' => 11);
$hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

/* check the database for correct password */
//$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$hashedPassword'";
$sql = "SELECT * FROM login WHERE username = '$username'";
$checkLogin = mysqli_query($con, $sql);

if (mysqli_num_rows($checkLogin)) {
    foreach ($checkLogin as $check) {
        if (password_verify($_POST['password'], $check['password'])) {
            /* login user */
            session_start();
            $_SESSION['username'] = $username;
            
            /* redirect to index */
            header("location:index.php");
        } else {
            /* redirect back to login with an error */
            header("location:login.php?error=1");
        }
    }
} else {
    /* redirect back to login with an error */
    header("location:login.php?error=1");
}
