<?php require_once '../config/config.php';?>
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
                <div class="pop-up-header">Post slide<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="event-form" action="process_events.php" method="POST" enctype="multipart/form-data">                 
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Slide Title*</td>
                            <td><input type="text" name="title" class="text" required></td>
                        </tr>
                        <tr>
                            <td>Slide Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Slide Description*</td>
                            <td><textarea name="description" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Caption* <div class="file-types">(pdf, doc, docx)</div></td>
                            <td>
                                <select name="captionID" required="">
                                        <option value="" disabled="" selected="" style="display:none;"></option>
                                        <?php
                                        $query_caption = "SELECT `captionID`, `captionName`  FROM caption  ORDER BY `captionName` ASC";
                                        $result_caption = mysqli_query($link, $query_caption) or die(mysqli_error($link));
                                        while ($row_caption = mysqli_fetch_array($result_caption)) {
                                            ?>
                                            <option value="<?php echo $row_caption['captionID'] ?>"><?php echo $row_caption['captionName'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                            </td>
                        </tr>
                        
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="news-form">Cancel</button>
                    <button type="submit" class="post" form="event-form">Post</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
