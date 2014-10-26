<?php

include('includes/config.php');

$username       = $_POST['username'];
$hashedPassword = md5($_POST['password']);

/* check the database for correct password */
$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$hashedPassword'";
$checkLogin = mysqli_query($con, $sql);

if (mysqli_num_rows($checkLogin)) {
    /* login user */
    session_start();
    $_SESSION['username'] = $username;

    /* redirect to index */
    header("location:index.php");
} else {
	/* redirect back to login with an error */
    header("location:login.php?error=1");
}
