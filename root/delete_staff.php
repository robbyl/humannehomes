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

    $result_image = mysql_query($query_image) or die(mysql_error());

    $image = mysql_fetch_array($result_image);

    $image_name = $image['staff_image'];

    // Obtaining download file path
    $image_path = 'uploads/images/' . $image_name;

    // Deleting download file.
    unlink($image_path);

    // Deleting download detail in the database.
    $query_staff = "DELETE FROM staff
                         WHERE staff_id = '$id'";

    $result_staff = mysql_query($query_staff) or die(mysql_error());

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
