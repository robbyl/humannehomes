<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_slide = "SELECT `slideID`, c.`captionID`, `slideImage`, `slideImageTitle`, 
                         `slideImageDescription`, `captionName`
                       FROM frontpageslider f
                 INNER JOIN caption c
                       ON c.`captionID` = f.`captionID`
             WHERE `slideID` = '$id'
                    LIMIT 1";

    $result_slide = mysqli_query($link, $query_slide) or die(mysqli_error($link));

    $row_slide = mysqli_fetch_array($result_slide);
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
                <div class="pop-up-header">Edit slide image<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="events-form" action="process_edit_slide.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_slide['slideID'] ?>" />
                    <input type="hidden" name="slideImage" value="<?php echo $row_slide['slideImage'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Slide Title*</td>
                            <td><input type="text" name="imagetitle" value="<?php echo $row_slide['slideImageTitle'] ?>" class="text" required></td>
                        </tr>
                        <tr>
                            <td>Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td>Caption* <div class="file-types">(pdf, doc, docx)</div></td>
                            <td width="200">
                                <select name="captionID" required="" style="width: 512px">
                                    <option value="" disabled="" selected="" style="display:none;"></option>
                                    <?php
                                    $query_caption = "SELECT `captionID`, `captionName`  FROM caption  ORDER BY `captionName` ASC";
                                    $result_caption = mysqli_query($link, $query_caption) or die(mysqli_error($link));
                                    while ($row_caption = mysqli_fetch_array($result_caption)) {
                                        ?>
                                        <option <?php if ($row_caption['captionID'] === $row_slide['captionID']) echo 'selected'; ?> value="<?php echo $row_caption['captionID'] ?>"><?php echo $row_caption['captionName'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Image Description*</td>
                            <td><textarea name="description" required><?php echo $row_slide['slideImageDescription']; ?></textarea></td>
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
