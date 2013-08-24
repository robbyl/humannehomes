<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_gallery = "SELECT *
                     FROM gallery
                    WHERE photo_id = '$id'
                    LIMIT 1";

    $result_gallery = mysql_query($query_gallery) or die(mysql_error());

    $row_gallery = mysql_fetch_array($result_gallery);
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
                <div class="pop-up-header">Edit Photo<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="news-form" action="process_edit_photo.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_gallery['photo_id'] ?>" />
                    <input type="hidden" name="photo_name" value="<?php echo $row_gallery['photo_name'] ?>" />

                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Image Description*</td>
                            <td><textarea name="description" required><?php echo $row_gallery['photo_description']; ?></textarea></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="news-form">Cancel</button>
                    <button type="submit" class="post" form="news-form">Update</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
