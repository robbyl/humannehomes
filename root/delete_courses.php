<?php

require '../functions/general_functions.php';
require '../config/config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = clean($_GET['id']);

    // Deleting news detail in the database.
    $query_courses = "DELETE FROM courses
                         WHERE course_id = '$id'";

    $result_courses = mysqli_query($link, $query_courses) or die(mysqli_error());

    if ($result_courses) {
        info('message', 'Courses deleted successfully!');
        header('Location: home.php#tab3');
    } else {
        info('error', 'Cannot delete courses');
        header('Location: home.php#tab3');
    }
} else {
    info('error', 'Invalid course id');
    header('Location: home.php#tab3');
}
?>
