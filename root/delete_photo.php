<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining photo name according to the given id
    $query_photo = "SELECT photo_name
                           FROM gallery
                          WHERE photo_id = '$id'
                          LIMIT 1";

    $result_photo = mysql_query($query_photo) or die(mysql_error());

    $photo = mysql_fetch_array($result_photo);

    $photo_name = $photo['photo_name'];

    // Obtaining photo path
    $photo_path = 'uploads/images/gallery/' . $photo_name;

    // Deleting photo.
    unlink($photo_path);

    // Deleting photo detail in the database.
    $query_gallery = "DELETE FROM gallery
                         WHERE photo_id = '$id'";

    $result_gallery = mysql_query($query_gallery) or die(mysql_error());

    if ($result_gallery) {
        info('message', 'Photo deleted successfully!');
        header('Location: home.php#tab6');
    } else {
        info('error', 'Cannot delete photo');
        header('Location: home.php#tab6');
    }
} else {
    info('error', 'Invalid photo id');
    header('Location: home.php#tab6');
}
?>
