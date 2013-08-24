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
                <div class="pop-up-header">Upload Download File<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="upload-form" action="process_download.php" method="POST" enctype="multipart/form-data">
                    <table border="0" width="100%">
                        <tr>
                            <td width="200">Title*</td>
                            <td><input type="text" name="title" class="text" required></td>
                        </tr>
                        <tr>
                            <td>File Path*  <div class="file-types">(pdf, doc, docx)</div></td>
                            <td><input type="file" name="download" class="text" required="" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="upload-form">Cancel</button>
                    <button type="submit" class="post" form="upload-form">Upload</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
