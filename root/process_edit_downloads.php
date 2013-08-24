<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$title = clean($_POST['title']);
$dwn_attachment = clean($_POST['dwn_file_name']); // attachment name from database
$file_name = clean($_FILES['download']['name']); // attachment name from submitted form

if ($dwn_attachment !== $file_name && !empty($file_name)) {
// Get and upload attachment file
    $allowed_file_ext = array("pdf", "doc", "docx");

    $extension = end(explode(".", file_name));

    if (in_array($extension, $allowed_file_ext) && ($_FILES["attachment"]["size"] < 100000000)) {

        // Checking file for errors
        if ($_FILES["download"]["error"] > 0) {

            $message = "This file contain errors. Return Code: " . $_FILES["download"]["error"];
            //info('error', $message);
        } else {

            // Uploading new attachment to doc folder.
            move_uploaded_file($_FILES["download"]["tmp_name"], "uploads/docs/" . $file_name);

            // Deleting old attachment file
            unlink("uploads/docs/" . $file_name);

            $query_dwn = "UPDATE downloads
                                 SET dwn_file_name = '$file_name'
                               WHERE dwn_id = '$id'";

            $result_dwn = mysql_query($query_dwn) or die(mysql_error());
        }
    } else {

    info('error', 'This file type is not allowed');
    header('Location: home.php#tab4');
    exit(0);
    }
}

$query_downloads = "UPDATE downloads
                   SET dwn_title = '$title', 
                       dwn_date_uploaded = CURRENT_TIMESTAMP()
                   WHERE dwn_id = '$id'";

$result_downloads = mysql_query($query_downloads) or die(mysql_error());

if ($result_downloads) {
    info('message', 'File updated successfully!');
    header('Location: home.php#tab4');
} else {
    info('error', 'Cannot updated file, please try again!');
    header('Location: home.php#tab4');
}
?>
