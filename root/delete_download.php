<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining download file name according to the given id
    $query_attachment = "SELECT dwn_file_name
                           FROM downloads
                          WHERE dwn_id = '$id'
                          LIMIT 1";

    $result_attachment = mysql_query($query_attachment) or die(mysql_error());

    $attachment = mysql_fetch_array($result_attachment);

    $attachment_name = $attachment['dwn_file_name'];

    // Obtaining download file path
    $attachment_path = 'uploads/downloads/' . $attachment_name;

    // Deleting download file.
    unlink($attachment_path);

    // Deleting download detail in the database.
    $query_downloads = "DELETE FROM downloads
                         WHERE dwn_id = '$id'";

    $result_donwloads = mysql_query($query_downloads) or die(mysql_error());

    if ($result_donwloads) {
        info('message', 'Download deleted successfully!');
        header('Location: home.php#tab4');
    } else {
        info('error', 'Cannot delete download file, please try again');
        header('Location: home.php#tab4');
    }
} else {
    info('error', 'Invalid download id');
    header('Location: home.php#tab4');
}
?>
