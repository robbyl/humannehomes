<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$imagetitle = clean($_POST['imagetitle']);
$slider_description = clean($_POST['description']);
$captionID = clean($_POST['captionID']);
$slideImage = clean($_POST['slideImage']); // image name from database
//$event_attachment = clean($_POST['event_attachment']); // attachment name from database
$image_name = $_FILES["image"]["name"]; // image name from submitted form.
//$attachment_name = $_FILES["attachment"]["name"]; // attachment name from submitted form.

if ($image_name !== $slideImage && !empty($image_name)) {
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
            move_uploaded_file($_FILES["image"]["tmp_name"], "../slider/" . $image_name);

            // Deleting old file
            unlink("../slider/" . $slideImage);

            $query_image = "UPDATE frontpageslider
                               SET `slideImage` = '$image_name'
                             WHERE `slideID` = '$id'";

            $result_image = mysqli_query($link, $query_image) or die(mysqli_error($link));
        }
    } else {

        info('error', 'This file type is not allowed');
        header('Location: home#tab2.php');
        exit(0);
    }
}


//if ($event_attachment !== $attachment_name && !empty($attachment_name)) {
//// Get and upload attachment file
//    $allowed_file_ext = array("pdf", "doc", "docx");
//
//    $extension = end(explode(".", $attachment_name));
//
//    if (in_array($extension, $allowed_file_ext) && ($_FILES["attachment"]["size"] < 100000000)) {
//
//        // Checking file for errors
//        if ($_FILES["attachment"]["error"] > 0) {
//
//            $message = "This file contain errors. Return Code: " . $_FILES["attachment"]["error"];
//            //info('error', $message);
//        } else {
//
//            // Uploading new attachment to doc folder.
//            move_uploaded_file($_FILES["attachment"]["tmp_name"], "uploads/docs/" . $attachment_name);
//
//            // Deleting old attachment file
//            unlink("uploads/docs/" . $news_attachment);
//
//            $query_attachment = "UPDATE events
//                                 SET event_attachment = '$attachment_name'
//                               WHERE event_id = '$id'";
//
//            $result_attachment = mysqli_query($link, $query_attachment) or die(mysqli_error());
//        }
//    } else {
//
//        info('error', 'This file type is not allowed');
//        header('Location: home.php#tab2');
//        exit(0);
//    }
//}

$query_slide = "UPDATE frontpageslider
                  SET `slideImageTitle` = '$imagetitle',
                      `slideImageDescription` = '$slider_description',
                       `captionID` = '$captionID'
                WHERE `slideID` = '$id'";

$result_slide = mysqli_query($link, $query_slide) or die(mysqli_error($link));
if ($result_slide) {
    info('message', 'Slide updated successfully!');
    header("Location: home.php#tab2");
} else {
    info('error', 'Cannot update slide, please try again!');
    header("Location: home.php#tab2");
}
?>
