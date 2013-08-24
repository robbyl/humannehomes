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
                <div class="pop-up-header">Post organisation structure<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="org-form" action="process_staff.php" method="POST" enctype="multipart/form-data">
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Name*</td>
                            <td><input type="text" name="title" class="text" required></td>
                        </tr>
                        <tr>
                            <td>Image* <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" required="" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td width="200">Position*</td>
                            <td><input type="text" name="position" class="text" required></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="news-form">Cancel</button>
                    <button type="submit" class="post" form="org-form">Post</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
