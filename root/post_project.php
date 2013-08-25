<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="css/style.css" rel="stylesheet" />
        <script type="text/javascript">
            $(document).ready(function (){
                $('#departureDate').live('change', function() {
                    var departureDate = $('#departureDate').val();
                    getClassSeats(departureDate);
                });
            })
        
        </script>

    </head>
    <body>
        <div class="pop-up-wrapper">
            <div class="pop-up-contents">
                <div class="pop-up-header">Post project<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="news-form" action="process_project.php" method="POST" enctype="multipart/form-data">
                    <table border="0" width="100%">
                        <tr>
                            <td width="250">Project Name*</td>
                            <td><input type="text" name="projectName" class="text" required></td>
                        </tr>
                        <tr>
                            <td>Project Image* <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td>Project Category*</td>
                            <td>
                                <select name="projectCategoryID" class="text" required="" style="width: 470px; height: 28px;">
                                    <option value="" disabled="" selected="" style="display:none;"></option>
                                    <?php
                                    $query_caption = "SELECT `projectCategoryID`, `projectCategory` FROM projectcategory  ORDER BY projectCategory ASC";
                                    $result_caption = mysqli_query($link, $query_caption) or die(mysqli_error($link));
                                    while ($row_caption = mysqli_fetch_array($result_caption)) {
                                        ?>
                                        <option value="<?php echo $row_caption['projectCategoryID'] ?>"><?php echo $row_caption['projectCategory'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <a href="#" title="Add project category" class="add-category quick edit"></a>
                            </td>
                        </tr>
                        <tr>
                            <td width="170">Project Start Date*<sup class="required-field">*</sup></td>
                            <td>
                                <input type="date" name="projectStartDate" id="departureDate" required value="<?php echo date('Y-m-d') ?>" class="text" style="width: 500px; margin-right: 10px; font-family: inherit;">

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Short Description*</td>
                            <td><textarea name="shortdescription" required style="min-height: 40px"></textarea></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Full Description*</td>
                            <td><textarea name="fulldescription" required></textarea></td>
                        </tr>
                    </table>
                </form>
                <div class="pop-up-footer">
                    <button type="reset" class="post" style="margin-right: 0" form="news-form">Cancel</button>
                    <button type="submit" class="post" form="news-form">Post</button>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </body>
</html>
