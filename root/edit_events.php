<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_events = "SELECT *
                     FROM events
                    WHERE event_id = '$id'
                    LIMIT 1";

    $result_events = mysql_query($query_events) or die(mysql_error());

    $row_events = mysql_fetch_array($result_events);
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
                <div class="pop-up-header">Edit events<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="events-form" action="process_edit_events.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_events['event_id'] ?>" />
                    <input type="hidden" name="event_image" value="<?php echo $row_events['event_image'] ?>" />
                    <input type="hidden" name="event_attachment" value="<?php echo $row_events['event_attachment'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" value="<?php echo $row_events['event_title'] ?>" class="text" required></td>
                        </tr>
                        <tr>
                            <td>Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td>Attachment <div class="file-types">(pdf, doc, docx)</div></td>
                            <td><input type="file" name="attachment" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Events Description*</td>
                            <td><textarea name="description" required><?php echo $row_events['event_description']; ?></textarea></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="events-form">Cancel</button>
                    <button type="submit" class="post" form="events-form">Update</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
