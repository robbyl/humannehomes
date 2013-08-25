<?php
require 'session_validator.php';

session_start();
$user_name = $_SESSION['username'];
session_commit();

require '../config/config.php';

$query_project = "SELECT `projectID`, `projectImage`, `projectName`, `shortDescription`, 
                         `fullDescription`, `projectStartDate`
                 FROM project
             ORDER BY projectStartDate DESC";
$result_project = mysqli_query($link, $query_project) or die(mysqli_error($link));

$query_slider = "SELECT `slideID`, `slideImage`, `slideImageTitle`, 
                         `slideImageDescription`, `captionName`
                       FROM frontpageslider f
                 INNER JOIN caption c
                       ON c.`captionID` = f.`captionID`
             ORDER BY slideImageTitle DESC";
$result_slider = mysqli_query($link, $query_slider) or die(mysqli_error($link));

//$query_courses = "SELECT * 
//                    FROM courses
//                ORDER BY course_posted_date DESC";
//$result_courses = mysqli_query($link, $query_courses) or die(mysqli_error($link));
//
//$query_downloads = "SELECT * 
//                      FROM downloads
//                  ORDER BY dwn_date_uploaded DESC";
//$result_downloads = mysqli_query($link, $query_downloads) or die(mysqli_error($link));
//
//$query_staff = "SELECT * 
//                      FROM staff
//                  ORDER BY posted_date DESC";
//$result_staff = mysqli_query($link, $query_staff) or die(mysqli_error($link));
//
//$query_gallery = "SELECT * 
//                      FROM gallery";
//$result_gallery = mysqli_query($link, $query_gallery) or die(mysqli_error($link));
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/data_table.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css" />
        <link rel="stylesheet" type="text/css" href="css/ui_darkness.css" />

        <script src="js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="js/royal-core.js" type="text/javascript"></script>

    </head>

    <body>
        <div class="wrapper"  id="bg">
            <div id="pop-up"></div>
            <div class="header">
                <ul class="nav">
                    <li>Welcome <?php echo $user_name; ?>!</li>
                    <li><a href="../index.php">Humanne Homes - Home page</a></li>|
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <!-- end .header -->
                <?php
                // Displaying message and errors
                include '../includes/info.php';
                ?>
            </div>
            <div class="content">
                <div class="tabwrapper">
                    <div class="tabs_links">
                        <ul>
                            <li><a href="#tab1">Manage Projects</a></li>
                            <li><a href="#tab2">Manage slide</a></li>
<!--                            <li><a href="#tab3">Manage Modules</a></li>
                            <li><a  href="#tab4">Manage Downloads</a></li>
                            <li><a href="#tab5">Org Structure</a></li>
                            <li><a href="#tab6">Gallery</a></li>-->
                            <li><a href="#tab7">Change password</a></li>
                        </ul>
                    </div>

                    <div class="tab_content" id="tab1" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage Projects</h2>
                            <button class="post news">Post project</button>
                            <div style="clear: both"></div>
                        </div>

                        <div class="form-wrapper">
                            <table class="data-table1" width="100%">
                                <thead>
                                    <tr>
                                        <th>Project Image</th>
                                        <th>Project Name</th>
                                        <th>Short Description</th>
                                        <th>Full Description</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_project = mysqli_fetch_array($result_project)) {
                                        echo '<tr>';
                                        echo '<td>' . $row_project['projectImage'] . '</td>';
                                        echo '<td>' . $row_project['projectName'] . '</td>';
                                        echo '<td>' . preg_replace("/\n/", "<br>", $row_project['shortDescription']) . '</td>';
                                        echo '<td>' . preg_replace("/\n/", "<br>", $row_project['fullDescription']) . '</td>';
                                        echo '<td><a href="edit_news.php?id=' . $row_project['projectID'] . '" class="edit-news">Edit</a></td>';
                                        echo '<td><a href="delete_news.php?id=' . $row_project['projectID'] . '" onClick="return confirm(\'Are you sure you want to delete this project?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab2" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage Slide show</h2>
                            <button class="post events" >Post slide show</button>
                            <div style="clear: both"></div>
                        </div>
                        <div class="form-wrapper">
                            <table class="data-table2" border="1" width="100%">
                                <thead>
                                    <tr>
                                        <th>Slide Image</th>
                                        <th>Slide Title</th>
                                        <th>Image Description</th>
                                        <th>Caption</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_slider = mysqli_fetch_array($result_slider)) {

                                        echo '<tr>';
//                                        echo '<td><img src="uploads/images/' . $row_staff['staff_image'] . '" height="40"/></td>';
                                        echo '<td><img src="../slider/' . $row_slider['slideImage'] . '" height="40"/></td>';
                                        echo '<td>' . $row_slider['slideImageTitle'] . '</td>';
                                        echo '<td>' . preg_replace("/\n/", "<br>", $row_slider['slideImageDescription']) . '</td>';
                                        echo '<td>' . $row_slider['captionName'] . '</td>';
                                        echo '<td><a href="edit_slide.php?id=' . $row_slider['slideID'] . '" class="edit-events">Edit</a></td>';
                                        echo '<td><a href="delete_events.php?id=' . $row_slider['slideID'] . '" onClick="return confirm(\'Are you sure you want to delete this slide?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab3" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage Modules</h2>
                            <button class="post courses" >Post modules</button>
                            <div style="clear: both"></div>
                        </div>
                        <div class="form-wrapper">
                            <table border="1" class="data-table3" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date posted</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Credit</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_courses = mysqli_fetch_array($result_courses)) {
                                        $course_posted = date_create($row_courses['course_posted_date']);

                                        echo '<tr>';
                                        echo '<td>' . date_format($course_posted, 'd M, Y @ H:i') . '</td>';
                                        echo '<td>' . $row_courses['course_title'] . '</td>';
                                        echo '<td>' . $row_courses['course_description'] . '</td>';
                                        echo '<td>' . $row_courses['duration'] . '</td>';
                                        echo '<td><a href="edit_courses.php?id=' . $row_courses['course_id'] . '" class="edit-courses">Edit</a></td>';
                                        echo '<td><a href="delete_courses.php?id=' . $row_courses['course_id'] . '" onClick="return confirm(\'Are you sure you want to delete this course?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab4" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage Downloads</h2>
                            <button class="post upload" >Upload new files</button>
                            <div style="clear: both"></div>
                        </div>

                        <div class="form-wrapper">
                            <table class="data-table4" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date uploaded</th>
                                        <th>Title</th>
                                        <th>File name</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_download = mysqli_fetch_array($result_downloads)) {
                                        $posted = date_create($row_download['dwn_date_uploaded']);

                                        echo '<tr>';
                                        echo '<td>' . date_format($posted, 'd M, Y @ H:i') . '</td>';
                                        echo '<td>' . $row_download['dwn_title'] . '</td>';
                                        echo '<td><a href="uploads/downloads/' . $row_download['dwn_file_name'] . '">' . $row_download['dwn_file_name'] . '</a></td>';
                                        echo '<td><a href="edit_download.php?id=' . $row_download['dwn_id'] . '" class="edit-download">Edit</a></td>';
                                        echo '<td><a href="delete_download.php?id=' . $row_download['dwn_id'] . '" onClick="return confirm(\'Are you sure you want to delete this file?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab5" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage organization structure</h2>
                            <button class="post staff" >Post staff</button>
                            <div style="clear: both"></div>
                        </div>

                        <div class="form-wrapper">
                            <table class="data-table5" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date posted</th>
                                        <th>Staff image</th>
                                        <th>Title</th>
                                        <th>Position</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_staff = mysqli_fetch_array($result_staff)) {
                                        $posted_date = date_create($row_staff['posted_date']);

                                        echo '<tr>';
                                        echo '<td>' . date_format($posted_date, 'd M, Y @ H:i') . '</td>';
                                        echo '<td><img src="uploads/images/' . $row_staff['staff_image'] . '" height="40"/></td>';
                                        echo '<td>' . $row_staff['staff_title'] . '</td>';
                                        echo '<td>' . $row_staff['position'] . '</td>';
                                        echo '<td><a href="edit_staff.php?id=' . $row_staff['staff_id'] . '" class="edit-staff">Edit</a></td>';
                                        echo '<td><a href="delete_staff.php?id=' . $row_staff['staff_id'] . '" onClick="return confirm(\'Are you sure you want to delete this staff?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab6" style="display:none" >
                        <div class="root-heading">
                            <h2 class="label">Manage Photo gallery</h2>
                            <button class="post photo">Upload photo</button>
                        </div>
                        <div class="form-wrapper">
                            <table class="data-table6" width="100%">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_gallery = mysqli_fetch_array($result_gallery)) {

                                        echo '<tr>';
                                        echo '<td><img src="uploads/images/gallery/' . $row_gallery['photo_name'] . '" height="40"/></td>';
                                        echo '<td>' . $row_gallery['photo_description'] . '</td>';
                                        echo '<td><a href="edit_photo.php?id=' . $row_gallery['photo_id'] . '" class="edit-photo">Edit</a></td>';
                                        echo '<td><a href="delete_photo.php?id=' . $row_gallery['photo_id'] . '" onClick="return confirm(\'Are you sure you want to delete this photo?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab_content" id="tab7" style="display:none" >
                        <div class="root-heading">
                            <button type="reset" class="post" form="charge_password">Reset</button>
                            <button type="submit" class="post" style="margin-right: 0" form="resert_password">Change</button>
                            <h2 class="label">Change your password</h2>
                        </div>
                        <div class="form-wrapper">
                            <form id="resert_password" action="process_change_pass.php" method="POST">
                                <table border="0" width="100%">
                                    <tr>
                                        <td width="200">Current Password</td>
                                        <td><input type="password" name="curr_pass" id="curr_pass" required size="255" class="text" ></td>
                                    </tr>
                                    <tr>
                                        <td width="200">New Password</td>
                                        <td><input type="password" name="new_pass" id="new_pass" size="255" class="text" required></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Repeat New Password</td>
                                        <td>
                                            <input type="password" name="rep_new_pass" id="rep_new_pass"
                                                   required size="255" oninput="check(this)" class="text" >
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div> 
            <?php include 'footer.php'; ?>
            <!-- end .footer -->
        </div>
    </body>

</html>
