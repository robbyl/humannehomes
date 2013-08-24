<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_downloads = "SELECT *
                     FROM downloads
                    WHERE dwn_id = '$id'
                    LIMIT 1";

    $result_downloads = mysql_query($query_downloads) or die(mysql_error());

    $row_downloads = mysql_fetch_array($result_downloads);
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
                <div class="pop-up-header">Edit downloads<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="dwn-form" action="process_edit_downloads.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_downloads['dwn_id']; ?>"/>
                    <input type="hidden" name="dwn_file_name" value="<?php echo $row_news['dwn_file_name'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" value="<?php echo $row_downloads['dwn_title'] ?>"class="text" required></td>
                        </tr>
                        <tr>
                            <td>File Path  <div class="file-types">(pdf, doc, docx)</div></td>
                            <td><input type="file" name="download" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="dwn-form">Cancel</button>
                    <button type="submit" class="post" form="dwn-form">Update</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
