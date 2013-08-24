<?php

require '../config/config.php';
require '../functions/general_functions.php';

$image_name = clean($_FILES['image']['name']); // Get image name
$description = clean($_POST['description']);


// Get and upload image file
$allowed_img_ext = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");

$image_extenstion = end(explode(".", $image_name));

if (in_array($image_extenstion, $allowed_img_ext)) {

    // Checking file for errors
    if ($_FILES["image"]["error"] > 0) {

        $message = "This file contain errors. Return Code: " . $_FILES["image"]["error"];
        //info('error', $message);
    } else {

        // Uploading it to image folder.
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/gallery/" . $image_name);
    }
} else {

    info('error', 'This image type is not allowed');
    header('Location: home.php#tab6');
    exit(0);
}

$query_gallery = "INSERT INTO gallery
                      (photo_name, photo_description)
               VALUES ('$image_name', '$description')";

$result_gallery = mysql_query($query_gallery) or die(mysql_error());

if ($result_gallery) {
    info('message', 'Photo uploaded successfully!');
    header('Location: home.php#tab6');
} else {
    info('error', 'Cannot upload photo!');
    header('Location: home.php#tab6');
}
?>
