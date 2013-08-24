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
                <div class="pop-up-header">Post courses<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="courses-form" action="process_courses.php" method="POST" enctype="multipart/form-data">
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" class="text" required></td>
                        </tr>
                        <tr>
                            <td width="200">Duration*</td>
                            <td><input type="text" name="duration" class="text" required></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Course description*</td>
                            <td><textarea name="description" required></textarea></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="news-form">Cancel</button>
                    <button type="submit" class="post" form="courses-form">Post</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
