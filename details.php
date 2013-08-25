<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require './config/config.php';
require './functions/general_functions.php';

$projectID = empty($_GET['project']) ? '' : clean($_GET['project']);

$query_projects = "SELECT `projectID`, `projectName`, `projectImage`, `fullDescription`
                     FROM project";

$result_projects = mysqli_query($link, $query_projects) or die(mysqli_error($link));

while ($projects = mysqli_fetch_array($result_projects)) {
    $project[$projects['projectID']] = $projects;
    $number[] = $projects['projectID'];
}

if (mysqli_num_rows($result_projects) <= 0 || !in_array($projectID, array_keys($project))) {
    
    header('Location: 404');
    exit;
}

$key = array_search($projectID, $number);

$numberKeys = array_keys($number);
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lola - The responsive Corporate/Business Html Theme</title>

        <!-- CSS SECTION -->
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/flexslider_1.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/media.css" type="text/css" />
        <link id="changestylesheet" rel="stylesheet" href="css/ColourThemes/green.css" type="text/css" />
        <!-- CSS SECTION -->
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> 

        <!-- JAVASCRIPT SECTION -->
        <script src="js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
        <script src="js/modernizr.js"></script>
        <script src="js/jquery.jcarousel.min.js"></script>
        <script src="js/flickr.js"></script>
        <script src="js/twitter.js"></script>
        <script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="js/jquery.easing.js"></script>
        <script src="js/jquery.mousewheel.js"></script> 
        <script src="js/custom.js"></script>
        <!-- JAVASCRIPT SECTION -->
    </head>

    <body>

        <!-- DROPDOWN MESSAGE SECTION -->
        <!--<section class="dropdown_wrap">
        
                <div class="dropdown_inner">
            
                Buy this theme for just $15 at Themeforest.net - <a href="http://themeforest.net/item/lola-responsive-business-html-theme/3223355?ref=UBL" title="Buy this theme for just $15 at Themeforest.net">Click Here To Buy!</a>
                
                <div class="dropdown_close"><img src="images/close.png" alt="Close Dropdown"></div>
            
            </div>
            
        </section>-->
        <!-- DROPDOWN MESSAGE SECTION -->

        <!-- SOCIAL MEDIA BUTTONS SECTION -->
        <?php include './includes/socialmedia_buttons.php'; ?>

        <div class="clear"></div>
        <!-- SOCIAL MEDIA BUTTONS SECTION -->

        <!-- HEADER AND MAIN SECTION -->
        <div class="mainbg background2">

            <!-- CONTAINER -->
            <div class="maincontainer">

                <!-- MAIN SECTION -->
                <section class="main_section">

                    <!-- HEADER SECTION -->
                    <?php include './includes/header.php'; ?>

                    <div class="clear"></div>
                    <!-- HEADER SECTION -->
                    <!-- PAGE TITLE SECTION -->
                    <section class="mainpage_title">

                        <h1><?php echo $project[$projectID]['projectName']; ?></h1>

                    </section>
                    <!-- PAGE TITLE SECTION -->         
                    <div class="container">
                        <!-- SIDEBAR SECTION -->
                        <div class="sidebararea floatright">

                            <!-- WIDGET -->
                            <div class="widget">

                                <p><a href="<?php echo in_array($key - 1, $numberKeys) ? 'details?project=' . $number[$key - 1] : '#'; ?>" title="previous" class="portfoliolink">PREV</a>  <a style="float: right" href="<?php echo in_array($key + 1, $numberKeys) ? 'details?project=' . $number[$key + 1] : '#'; ?>" title="Next" class="portfoliolink">NEXT</a></p>

                            </div>
                            <!-- WIDGET -->

                            <!-- WIDGET -->
                            <div class="widget">

                                <h3>Project overview</h3>
                                <p><?php echo preg_replace("/\n/", "<br>", $project[$projectID]['fullDescription']); ?></p> 
                            </div>
                            <!-- WIDGET -->
                            <!-- WIDGET -->
                            <div class="widget">

                                <h3>Technology</h3>

                                <ul>

                                    <li><a href="#" title="At vero eos et accusamus et iusto">Adobe Photoshop</a></li>
                                    <li><a href="#" title="Temporibus autem quibusdam et aut">Adobe Illustrator</a></li>
                                    <li><a href="#" title="Lorem ipsum dolor sit amet">Notepad++</a></li>

                                </ul>

                            </div>
                            <!-- WIDGET -->

                        </div>
                        <!-- SIDEBAR SECTION -->
                        <!-- MAIN CONTENT SECTION -->
                        <div class="contentarea floatleft">

                            <!-- ITEM -->
                            <div class="blog_item_wrap">

                                <!-- IMAGE -->
                                <div class="blogitem_image_alt"><img src="images/portfolio/<?php echo $project[$projectID]['projectImage']; ?>" alt=""></div>
                                <!-- IMAGE -->

                            </div>
                            <!-- ITEM -->

                        </div>
                        <!-- MAIN CONTENT SECTION -->
                    </div> 

                </section>
                <div class="clear"></div>
                <!-- MAIN SECTION -->

            </div>
            <!-- CONTAINER -->

        </div>
        <!-- HEADER AND MAIN SECTION -->

        <!-- FOOTER WIDGET SECTION -->
        <?php include './includes/footerwidget_area.php'; ?>
        <!-- FOOTER WIDGET SECTION -->
        <div class="clear"></div>
        <!-- FOOTER SECTION -->
        <?php include './includes/footer.php'; ?>
        <!-- FOOTER SECTION -->

        <!-- BACK TO TOP BUTTON -->
        <div class="backtotop"><a title="Back to the top">Back To Top</a></div>
        <!-- BACK TO TOP BUTTON -->

    </body>
</html>