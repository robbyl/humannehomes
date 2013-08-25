<?php

require '../functions/general_functions.php';

$title = clean($_POST['title']);
$description = clean($_POST['description']);
$captionID = clean($_POST['captionID']);
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
            move_uploaded_file($_FILES["image"]["tmp_name"], "../slider/" . $image_name);
        }
    } else {

        info('error', 'This file type is not allowed');
        header('Location: home.php#tab2');
        exit(0);
    }
}

// Get and upload attachment file
//$allowed_file_ext = array("pdf", "doc", "docx");
//$file_name = clean($_FILES['attachment']['name']); // Get file name
//
//$extension = end(explode(".", $file_name));
//
//if (in_array($extension, $allowed_file_ext) && ($_FILES["attachment"]["size"] < 100000000)) {
//
//    // Checking file for errors
//    if ($_FILES["attachment"]["error"] > 0) {
//
//        $message = "This file contain errors. Return Code: " . $_FILES["attachment"]["error"];
//        info('error', $message);
//        header('Location: home.php#tab2');
//    } else {
//
//        // Uploading it to doc folder.
//        move_uploaded_file($_FILES["attachment"]["tmp_name"], "../slider/" . $file_name);
//    }
//} else {
//
//    info('error', 'This file type is not allowed');
//    header('Location: home.php#tab2');
//    exit(0);
//}

require '../config/config.php';

$query_slide = "INSERT INTO frontpageslider
                      (`slideImageTitle`, `slideImage`,`captionID`, `slideImageDescription`)
               VALUES ('$title', '$image_name', '$captionID', '$description')";

$result_slide = mysqli_query($link ,$query_slide) or die(mysqli_error($link));

if ($result_slide) {
    info('message', 'Slide posted successfully!');
    header('Location: home.php#tab2');
} else {
    info('error', 'Cannot post slide!');
    header('Location: home.php#tab2');
}
?>
