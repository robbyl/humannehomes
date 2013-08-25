<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_news = "SELECT *
                     FROM news
                    WHERE nws_id = '$id'
                    LIMIT 1";

    $result_news = mysqli_query($links, $query_news) or die(mysqli_error());

    $row_news = mysqli_fetch_array($result_news);
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
                <div class="pop-up-header">Edit news<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="news-form" action="process_edit_news.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_news['nws_id'] ?>" />
                    <input type="hidden" name="nws_image" value="<?php echo $row_news['nws_image'] ?>" />
                    <input type="hidden" name="nws_attachment" value="<?php echo $row_news['nws_attachment'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" value="<?php echo $row_news['nws_title'] ?>" class="text" required></td>
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
                            <td style="vertical-align: top">News Description*</td>
                            <td><textarea name="description" required><?php echo $row_news['nws_description']; ?></textarea></td>
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
