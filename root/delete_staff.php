<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining download file name according to the given id
    $query_image = "SELECT staff_image
                           FROM staff
                          WHERE staff_id = '$id'
                          LIMIT 1";

    $result_image = mysqli_query($link, $query_image) or die(mysqli_error());

    $image = mysqli_fetch_array($result_image);

    $image_name = $image['staff_image'];

    // Obtaining download file path
    $image_path = 'uploads/images/' . $image_name;

    // Deleting download file.
    unlink($image_path);

    // Deleting download detail in the database.
    $query_staff = "DELETE FROM staff
                         WHERE staff_id = '$id'";

    $result_staff = mysqli_query($links, $query_staff) or die(mysqli_error());

    if ($result_staff) {
        info('message', 'Staff deleted successfully!');
        header('Location: home.php#tab5');
    } else {
        info('error', 'Cannot delete staff, please try again');
        header('Location: home.php#tab5');
    }
} else {
    info('error', 'Invalid staff id');
    header('Location: home.php#tab5');
}
?>
