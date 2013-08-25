<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$title = clean($_POST['title']);
$staff_image = clean($_POST['image']); //image from a database
$image_name = clean($_FILES['image']['name']); //image name from a submitted form
$position = clean($_POST['position']);

if ($staff_image !== $image_name && !empty($image_name)) {
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
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/" . $image_name);

            // Deleting old file
            unlink("uploads/images/" . $staff_image);

            $query_image = "UPDATE staff
                               SET staff_image = '$image_name'
                             WHERE staff_id = '$id'";

            $result_image = mysqli_query($link, $query_image) or die(mysqli_error());
        }
    } else {

        info('error', 'This image type is not allowed');
        header('Location: home.php#tab5');
        exit(0);
    }
}

$query_staff = "UPDATE staff
                SET staff_title = '$title',
                    position = '$position',
                    posted_date = CURRENT_TIMESTAMP()
                WHERE staff_id = '$id'";
$result_staff = mysqli_query($link ,$query_staff) or die(mysqli_error());

if ($result_staff) {
    info('message', 'Staff updated successfully!');
    header('Location: home.php#tab5');
} else {
    info('error', 'Cannot update staff, please try again!');
    header('Location: home.php#tab5');
}
?>
