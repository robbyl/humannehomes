<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$event_title = clean($_POST['title']);
$event_description = clean($_POST['description']);
$event_image = clean($_POST['event_image']); // image name from database
$event_attachment = clean($_POST['event_attachment']); // attachment name from database
$image_name = $_FILES["image"]["name"]; // image name from submitted form.
$attachment_name = $_FILES["attachment"]["name"]; // attachment name from submitted form.

if ($event_image !== $event_image && !empty($event_image)) {
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
            unlink("uploads/images/" . $event_image);

            $query_image = "UPDATE events
                               SET event_image = '$image_name'
                             WHERE event_id = '$id'";

            $result_image = mysql_query($query_image) or die(mysql_error());
        }
    } else {

        info('error', 'This file type is not allowed');
        header('Location: home#tab2.php');
        exit(0);
    }
}


if ($event_attachment !== $attachment_name && !empty($attachment_name)) {
// Get and upload attachment file
    $allowed_file_ext = array("pdf", "doc", "docx");

    $extension = end(explode(".", $attachment_name));

    if (in_array($extension, $allowed_file_ext) && ($_FILES["attachment"]["size"] < 100000000)) {

        // Checking file for errors
        if ($_FILES["attachment"]["error"] > 0) {

            $message = "This file contain errors. Return Code: " . $_FILES["attachment"]["error"];
            //info('error', $message);
        } else {

            // Uploading new attachment to doc folder.
            move_uploaded_file($_FILES["attachment"]["tmp_name"], "uploads/docs/" . $attachment_name);

            // Deleting old attachment file
            unlink("uploads/docs/" . $news_attachment);

            $query_attachment = "UPDATE events
                                 SET event_attachment = '$attachment_name'
                               WHERE event_id = '$id'";

            $result_attachment = mysql_query($query_attachment) or die(mysql_error());
        }
    } else {

        info('error', 'This file type is not allowed');
        header('Location: home.php#tab2');
        exit(0);
    }
}

$query_events = "UPDATE events
                  SET event_title = '$event_title',
                      event_description = '$event_description'
                WHERE event_id = '$id'";

$result_events = mysql_query($query_events) or die(mysql_error());
if ($result_events) {
    info('message', 'Event updated successfully!');
    header("Location: home.php#tab2");
} else {
    info('error', 'Cannot update events, please try again!');
    header("Location: home.php#tab2");
}
?>
