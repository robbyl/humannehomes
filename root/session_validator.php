<?php

require '../functions/general_functions.php';

session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];

session_commit();

if (empty($username) || empty($password)) {

    info('error-outer', 'Please sign in first to continue!');
    header('Location: index.php');
}
?>
