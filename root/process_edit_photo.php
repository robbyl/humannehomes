<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$photo_name = clean($_POST['photo_name']); // image name from database
$image_name = clean($_FILES["image"]["name"]); // image name from submitted form.
$photo_description = clean($_POST['description']);

if ($photo_name !== $image_name && !empty($image_name)) {
// Get and upload image file
    $allowed_img_ext = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");

    $image_extenstion = end(explode(".", $image_name));

    if (in_array($image_extenstion, $allowed_img_ext) && in_array($image_extenstion, $allowed_img_ext)) {

        // Checking file for errors
        if ($_FILES["image"]["error"] > 0) {

            $message = "This file contain errors. Return Code: " . $_FILES["image"]["error"];
            //info('error', $message);
        } else {

            // Uploading new image image folder.
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/gallery/" . $image_name);

            // Deleting old file
            unlink("uploads/images/gallery/" . $photo_name);

            $query_image = "UPDATE gallery
                               SET photo_name = '$image_name'
                             WHERE photo_id = '$id'";

            $result_image = mysql_query($query_image) or die(mysql_error());
        }
    } else {

        info('error', 'This image type is not allowed');
        header('Location: home.php#tab6');
        exit(0);
    }
}

$query_news = "UPDATE gallery
                  SET photo_description = '$photo_description'
                WHERE photo_id = '$id'";

$result_news = mysql_query($query_news) or die(mysql_error());

if ($result_news) {
    info('message', 'Photo updated successfully!');
    header("Location: home.php#tab6");
} else {
    info('error', 'Cannot update photo, please try again!');
    header("Location: home.php#tab6");
}
?>
