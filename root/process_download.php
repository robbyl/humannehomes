<?php

require '../config/config.php';
require '../functions/general_functions.php';

$title = clean($_POST['title']);
$file_name = clean($_FILES['download']['name']); // Get file name
// Get and upload attachment file
$allowed_file_ext = array("pdf", "doc", "docx");

$extension = end(explode(".", $file_name));

if (in_array($extension, $allowed_file_ext) && ($_FILES["download"]["size"] < 100000000)) {

    // Checking file for errors
    if ($_FILES["download"]["error"] > 0) {

        $message = "This file contain errors. Return Code: " . $_FILES["download"]["error"];
        info('error', $message);
        header('Location: home.php');
        exit(0);
    } else {

        // Uploading it to doc folder.
        move_uploaded_file($_FILES["download"]["tmp_name"], "uploads/downloads/" . $file_name);
    }
} else {

    info('error', 'This file type is not allowed');
    header('Location: home.php#tab4');
    exit(0);
}

$query_dwn = "INSERT INTO downloads
                      (dwn_title, dwn_date_uploaded, dwn_file_name)
               VALUES ('$title', CURRENT_TIMESTAMP(), '$file_name')";

$result_dwn = mysqli_query($link ,$query_dwn) or die(mysqli_error());

if ($result_dwn) {
    info('message', 'File uploaded successfully!');
    header('Location: home.php#tab4');
} else {
    info('error', 'Cannot upload file, please try again!');
    header('Location: home.php#tab4');
}
?>
