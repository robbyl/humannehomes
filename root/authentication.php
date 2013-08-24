<?php

require '../config/config.php';
require '../functions/general_functions.php';

$username = clean($_POST['username']);
$password = sha1($_POST['password']);

$query_user = "SELECT user_id, username, password
                 FROM user
                WHERE username = '$username' AND password = '$password' ";

$result_user = mysql_query($query_user) or die(mysql_error());
$row_user = mysql_fetch_array($result_user);

$num_row = mysql_num_rows($result_user);

if ($num_row === 1) {

    // Login successfully
    mysql_close($conn);
    session_start();
    $_SESSION['username'] = $row_user['username'];
    $_SESSION['user_id'] = $row_user['user_id'];
    $_SESSION['password'] = $row_user['password'];
    session_commit();

    header('Location:home.php');
} else {
    info('error-outer', 'Incorrect username or password!');
    header('Location: index.php');
}
?>
