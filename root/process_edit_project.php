<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$projectName = clean($_POST['projectName']);
$projectStartDate = clean($_POST['projectStartDate']);
$projectCategoryID = clean($_POST['projectCategoryID']);
$shortDescription = clean($_POST['shortDescription']);
$fullDescription = clean($_POST['fullDescription']);
$projectImage = clean($_POST['projectImage']); // image name from database

//$news_attachment = clean($_POST['nws_attachment']); // attachment name from database
$image_name = clean($_FILES["image"]["name"]); // image name from submitted form.
//$attachment_name = clean($_FILES["attachment"]["name"]); // attachment name from submitted form.

if ($projectImage !== $image_name && !empty($image_name)) {
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
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/portfolio/" . $image_name);

            // Deleting old file
            unlink("../images/portfolio/" . $projectImage);

            $query_image = "UPDATE project
                               SET `projectImage` = '$image_name'
                             WHERE `projectID` = '$id'";

            $result_image = mysqli_query($link, $query_image) or die(mysqli_error());
        }
    } else {

        info('error', 'This image type is not allowed');
        header('Location: home.php');
        exit(0);
    }
}

$query_project = "UPDATE project
                  SET `projectName` = '$projectName',
                      `projectCategoryID` = '$projectCategoryID',
                      `projectStartDate` = '$projectStartDate',
                      `shortDescription` = '$shortDescription',
                      `fullDescription` = '$fullDescription'
                WHERE `projectID` = '$id'";

$result_project = mysqli_query($link, $query_project) or die(mysqli_error($link));

if ($result_project) {
    info('message', 'Project updated successfully!');
    header("Location: home.php");
} else {
    info('error', 'Cannot update project, please try again!');
    header("Location: home.php");
}
?>
