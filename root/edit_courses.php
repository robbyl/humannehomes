<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_courses = "SELECT *
                     FROM courses
                    WHERE course_id = '$id'
                    LIMIT 1";

    $result_courses = mysql_query($query_courses) or die(mysql_error());

    $row_courses = mysql_fetch_array($result_courses);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="css/style.css" rel="stylesheet" />

    </head>
    <body>
        <div class="pop-up-wrapper">
            <div class="pop-up-contents">
                <div class="pop-up-header">Edit courses<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="courses-form" action="process_edit_courses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_courses['course_id'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" value="<?php echo $row_courses['course_title'] ?>" class="text" required></td>
                        </tr>
                        <tr>
                            <td width="200">Duration*</td>
                            <td><input type="text" name="duration" value="<?php echo $row_courses['duration'] ?>" class="text" required></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Course Description*</td>
                            <td><textarea name="description" required><?php echo $row_courses['course_description']; ?></textarea></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="courses-form">Cancel</button>
                    <button type="submit" class="post" form="courses-form">Update</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
