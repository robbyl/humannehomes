<?php

//require '../../includes/session_validator.php';
require '../config/config.php';
require '../functions/general_functions.php';

session_start();
$curr_pass = sha1($_POST['curr_pass']);
$new_pass = sha1($_POST['new_pass']);
$user_id = $_SESSION['user_id'];

// Cheking if the provided current password is in the database
$query_currpass = "SELECT user_id, password
                     FROM user
                    WHERE user_id = $user_id
                      AND password = '$curr_pass'";

$result_currpass = mysqli_query($link, $query_currpass) or die(mysqli_error());
$num_currpass = mysqli_num_rows($result_currpass);

if ($num_currpass === 1) {

    // Current password is present
    // Updating it with  new password

    $query_newpass = "UPDATE user
                        SET password = '$new_pass'
                      WHERE user_id = '$user_id'";

    $result_newpass = mysqli_query($link, $query_newpass) or die();

    if ($result_newpass) {

        info('message', 'Password changed!');
        header('Location: home.php#tab7');
    } else {
        info('error', 'Cannot change password!');
        header('Location: home.php#tab7');
    }
} else {
    info('error', 'Incorrect current password!');
    header('Location: home.php#tab7');
}
?>
