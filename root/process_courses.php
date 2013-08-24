<?php
require '../config/config.php';
require '../functions/general_functions.php';

$title = clean($_POST['title']);
$duration = clean($_POST['duration']);
$description = clean($_POST['description']);



$query_courses = "INSERT INTO courses
                      (course_title, course_posted_date, course_description, duration)
               VALUES ('$title', CURRENT_TIMESTAMP(), '$description', '$duration')";

$result_courses = mysqli_query($link ,$query_courses) or die(mysqli_error());

if ($result_courses) {
    info('message', 'Course posted successfully!');
    header('Location: home.php#tab3');
} else {
    info('error', 'Cannot post course!');
    header('Location: home.php#tab3');
}
?>
