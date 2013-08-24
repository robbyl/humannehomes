<?php

require '../functions/general_functions.php';

$title = clean($_POST['title']);
$description = clean($_POST['description']);
$image_name = clean($_FILES["image"]["name"]); // Get image name

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

        info('error', 'This file type is not allowed');
        header('Location: home.php#tab2');
        exit(0);
    }
}

// Get and upload attachment file
$allowed_file_ext = array("pdf", "doc", "docx");
$file_name = clean($_FILES['attachment']['name']); // Get file name

$extension = end(explode(".", $file_name));

if (in_array($extension, $allowed_file_ext) && ($_FILES["attachment"]["size"] < 100000000)) {

    // Checking file for errors
    if ($_FILES["attachment"]["error"] > 0) {

        $message = "This file contain errors. Return Code: " . $_FILES["attachment"]["error"];
        info('error', $message);
        header('Location: home.php#tab2');
    } else {

        // Uploading it to doc folder.
        move_uploaded_file($_FILES["attachment"]["tmp_name"], "uploads/docs/" . $file_name);
    }
} else {

    info('error', 'This file type is not allowed');
    header('Location: home.php#tab2');
    exit(0);
}

require '../config/config.php';

$query_news = "INSERT INTO events
                      (event_title, event_posted_date, event_description, event_attachment, event_image)
               VALUES ('$title', CURRENT_TIMESTAMP(), '$description', '$file_name', '$image_name')";

$result_news = mysqli_query($link ,$query_news) or die(mysqli_error());

if ($result_news) {
    info('message', 'Event posted successfully!');
    header('Location: home.php#tab2');
} else {
    info('error', 'Cannot post event!');
    header('Location: home.php#tab2');
}
?>
