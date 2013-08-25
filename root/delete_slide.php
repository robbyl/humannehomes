<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining download file name according to the given id
    $query_image = "SELECT `slideImage`
                      FROM frontpageslider
                     WHERE `slideID` = '$id'
                     LIMIT 1";

    $result_image = mysqli_query($link, $query_image) or die(mysqli_error());

    $image = mysqli_fetch_array($result_image);

    $image_name = $image['slideImage'];

    // Obtaining download file path
    $image_path = '../slider/' . $image_name;
    

    // Deleting download file.
    unlink($image_path);
    
    $query_slide = "DELETE FROM frontpageslider
                         WHERE `slideID` = '$id'";

    $result_slide = mysqli_query($link, $query_slide) or die(mysqli_error());

    if ($result_slide) {
        info('message', 'Slide deleted successfully!');
        header('Location: home.php#tab2');
    } else {
        info('error', 'Cannot delete slide');
        header('Location: home.php#tab2');
    }
} else {
    info('error', 'Invalid slide id');
    header('Location: home.php#tab2');
}
?>
