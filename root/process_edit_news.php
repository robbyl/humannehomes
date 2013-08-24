<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$news_title = clean($_POST['title']);
$news_description = clean($_POST['description']);
$news_image = clean($_POST['nws_image']); // image name from database
$news_attachment = clean($_POST['nws_attachment']); // attachment name from database
$image_name = clean($_FILES["image"]["name"]); // image name from submitted form.
$attachment_name = clean($_FILES["attachment"]["name"]); // attachment name from submitted form.

if ($news_image !== $image_name && !empty($image_name)) {
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
            unlink("uploads/images/" . $news_image);

            $query_image = "UPDATE news
                               SET nws_image = '$image_name'
                             WHERE nws_id = '$id'";

            $result_image = mysql_query($query_image) or die(mysql_error());
        }
    } else {

        info('error', 'This image type is not allowed');
        header('Location: home.php');
        exit(0);
    }
}


if ($news_attachment !== $attachment_name && !empty($attachment_name)) {
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

            $query_attachment = "UPDATE news
                                 SET nws_attachment = '$attachment_name'
                               WHERE nws_id = '$id'";

            $result_attachment = mysql_query($query_attachment) or die(mysql_error());
        }
    } else {

        info('error', 'This file type is not allowed');
        header('Location: home.php');
        exit(0);
    }
}

$query_news = "UPDATE news
                  SET nws_title = '$news_title',
                      nws_description = '$news_description'
                WHERE nws_id = '$id'";

$result_news = mysql_query($query_news) or die(mysql_error());

if ($result_news) {
    info('message', 'News updated successfully!');
    header("Location: home.php");
} else {
    info('error', 'Cannot update news, please try again!');
    header("Location: home.php");
}
?>
