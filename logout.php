<?php

include('includes/config.php');

session_start();

/* destroy the session and redirect */
session_destroy();
header('location:login.php');
