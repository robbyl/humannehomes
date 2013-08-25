<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Obtaining download file name according to the given id
    $query_project = "SELECT `projectImage`
                      FROM project
                     WHERE `projectID` = '$id'
                     LIMIT 1";

    $result_project = mysqli_query($link, $query_project) or die(mysqli_error($link));

    $image = mysqli_fetch_array($result_project);

    $image_name = $image['projectImage'];

    // Obtaining download file path
    $image_path = '../images/portfolio/' . $image_name;

    // Deleting download file.
    unlink($image_path);

    $query_project = "DELETE FROM project
                         WHERE `projectID` = '$id'";

    $result_project = mysqli_query($link, $query_project) or die(mysqli_error($link));

    if ($result_project) {
        info('message', 'Project deleted successfully!');
        header('Location: home.php#tab1');
    } else {
        info('error', 'Cannot delete project');
        header('Location: home.php#tab1');
    }
} else {
    info('error', 'Invalid project id');
    header('Location: home.php#tab1');
}
?>
