<?php
require '../config/config.php';
require '../functions/general_functions.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = clean($_GET['id']);

    $query_project = "SELECT `projectID`, `projectName`, pc.`projectCategoryID`,`projectImage`, 
                           `projectStartDate`, `shortDescription`, `fullDescription`, `projectCategory`
                          FROM project p
                  INNER JOIN projectcategory pc
                         ON p.`projectCategoryID` = pc.`projectCategoryID`
                    WHERE `projectID` = '$id'
                    LIMIT 1";

    $result_project = mysqli_query($link, $query_project) or die(mysqli_error($link));

    $row_project = mysqli_fetch_array($result_project);
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
                <div class="pop-up-header">Edit project<div class="close"></div></div>
                <p class="dscptn">* Indicates this field is required.</p>
                <form class="pop-up-form" id="news-form" action="process_edit_project.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row_project['projectID'] ?>" />
                    <input type="hidden" name="projectImage" value="<?php echo $row_news['projectImage'] ?>" />
                    <table border="0" width="100%">
                        <tr>
                            <td width="250">Project Name*</td>
                            <td><input type="text" name="projectName" value="<?php echo $row_project['projectName'] ?>" class="text" required></td>
                        </tr>

                        <tr>
                            <td>Project Image <div class="file-types">(jpeg, png, gif)</div></td>
                            <td><input type="file" name="image" class="text" style="padding-left: 0; padding-right: 10px"></td>
                        </tr>
                        <tr>
                            <td>Project Category</td>
                            <td>
                                <select name="projectCategoryID" required="" style="width: 512px">
                                    <option value="" disabled="" selected="" style="display:none;"></option>
                                    <?php
                                    $query_projectCategory = "SELECT `projectCategoryID`, `projectCategory` FROM projectcategory  ORDER BY projectCategory ASC";
                                    $result_projectCategory = mysqli_query($link, $query_projectCategory) or die(mysqli_error($link));
                                    while ($row_projectCategory = mysqli_fetch_array($result_projectCategory)) {
                                        ?>

                                        <option <?php if ($row_projectCategory['projectCategoryID'] === $row_project['projectCategoryID']) echo 'selected'; ?> value="<?php echo $row_projectCategory['projectCategoryID'] ?>"><?php echo $row_projectCategory['projectCategory'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="170">Project Start Date:<sup class="required-field">*</sup></td>
                            <td>
                                <input type="date" name="projectStartDate" id="departureDate" required min="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" class="text" style="width: 500px; margin-right: 10px;">

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Short Description*</td>
                            <td><textarea name="shortdescription" required style="min-height: 40px"><?php echo $row_project['shortDescription']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">Full Description*</td>
                            <td><textarea name="fulldescription" required><?php echo $row_project['fullDescription']; ?></textarea></td>
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
