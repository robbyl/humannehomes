<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_staff = "SELECT *
                     FROM staff
                    WHERE staff_id = '$id'
                    LIMIT 1";

    $result_staff = mysqli_query($link ,$query_staff) or die(mysqli_error());
    $row_staff = mysqli_fetch_array($result_staff);
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
                <div class="pop-up-header">Edit staff<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="staff-form" action="process_edit_staff.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_staff['staff_id']; ?>"/>
                    <input type="hidden" name="staff_image" value="<?php echo $row_news['staff_image'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Name*</td>
                            <td><input type="text" name="title" value="<?php echo $row_staff['staff_title'] ?>"class="text" required></td>
                        </tr>
                        <tr>
                            <td>Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td width="200">Position*</td>
                            <td><input type="text" name="position" value="<?php echo $row_staff['position'] ?>"class="text" required></td>
                        </tr>

                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="staff-form">Cancel</button>
                    <button type="submit" class="post" form="staff-form">Update</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
