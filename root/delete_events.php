<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining events attachment name according to the given id
    $query_attachment = "SELECT event_attachment
                           FROM events
                          WHERE event_id = '$id'
                          LIMIT 1";

    $result_attachment = mysqli_query($link, $query_attachment) or die(mysqli_error());

    $attachment = mysqli_fetch_array($result_attachment);

    $attachment_name = $attachment['event_attachment'];

    // Obtaining events attachment path
    $attachment_path = 'uploads/docs/' . $attachment_name;

    // Deleting events attachment file.
    unlink($attachment_path);

    // Deleting events detail in the database.
    $query_events = "DELETE FROM events
                         WHERE event_id = '$id'";

    $result_events = mysqli_query($link, $query_events) or die(mysqli_error());

    if ($result_events) {
        info('message', 'Event deleted successfully!');
        header('Location: home.php#tab2');
    } else {
        info('error', 'Cannot delete events');
        header('Location: home.php#tab2');
    }
} else {
    info('error', 'Invalid event id');
    header('Location: home.php#tab2');
}
?>
