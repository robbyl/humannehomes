<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining news attachment name according to the given id
    $query_attachment = "SELECT nws_attachment
                           FROM news
                          WHERE nws_id = '$id'
                          LIMIT 1";

    $result_attachment = mysql_query($query_attachment) or die(mysql_error());

    $attachment = mysql_fetch_array($result_attachment);

    $attachment_name = $attachment['nws_attachment'];

    // Obtaining news attachment path
    $attachment_path = 'uploads/docs/' . $attachment_name;

    // Deleting news attachment file.
    unlink($attachment_path);

    // Deleting news detail in the database.
    $query_news = "DELETE FROM news
                         WHERE nws_id = '$id'";

    $result_news = mysql_query($query_news) or die(mysql_error());

    if ($result_news) {
        info('message', 'News deleted successfully!');
        header('Location: home.php');
    } else {
        info('error', 'Cannot delete news');
        header('Location: home.php');
    }
} else {
    info('error', 'Invalid news id');
    header('Location: home.php');
}
?>
