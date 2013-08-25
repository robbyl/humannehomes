<?php

require '../config/config.php';
require '../functions/general_functions.php';

$id = clean($_POST['id']);
$course_title = clean($_POST['title']);
$duration = clean($_POST['duration']);
$course_description = clean($_POST['description']);

$query_courses = "UPDATE courses
                  SET course_title = '$course_title',
                      course_description = '$course_description',
                      duration = '$duration'
                WHERE course_id = '$id'";

$result_courses = mysqli_query($link, $query_courses) or die(mysqli_error());
if ($result_courses) {
    info('message', 'Courses updated successfully!');
    header("Location: home.php#tab3");
} else {
    info('error', 'Cannot update courses, please try again!');
    header("Location: home.php#tab3");
}
?>
