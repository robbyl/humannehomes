<?php

require '../config/config.php';
require '../functions/general_functions.php';

$title = clean($_POST['title']);
$image_name = clean($_FILES['image']['name']); // Get image name
$position = clean($_POST['position']);

// Get and upload image file
$allowed_img_ext = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");

$image_extenstion = end(explode(".", $image_name));

if (!empty($image_name)) {

    if (in_array($image_extenstion, $allowed_img_ext)) {

        // Checking file for errors
        if ($_FILES["image"]["error"] > 0) {

            $message = "This file contain errors. Return Code: " . $_FILES["image"]["error"];
            //info('error', $message);
        } else {

            // Uploading it to image folder.
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/" . $image_name);
        }
    } else {

        info('error', 'This image type is not allowed');
        header('Location: home.php#tab5');
        exit(0);
    }
}

$query_org = "INSERT INTO staff
                      (staff_title, position, posted_date, staff_image)
               VALUES ('$title', '$position', CURRENT_TIMESTAMP(), '$image_name')";

$result_org = mysql_query($query_org) or die(mysql_error());

if ($result_org) {
    info('message', 'Staff posted successfully!');
    header('Location: home.php#tab5');
} else {
    info('error', 'Cannot post staff, please try again!');
    header('Location: home.php#tab5');
}
?>
