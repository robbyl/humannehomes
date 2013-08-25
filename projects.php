<?php
include './config/config.php';

$query_projects = "SELECT `projectID`, `projectName`, `shortDescription`,
                          `projectCategoryClass`, `projectImage`
                     FROM project p
               INNER JOIN projectcategory c
                       ON p.`projectCategoryID` = c.`projectCategoryID`
                 ORDER BY `projectStartDate` DESC";

$result_projects = mysqli_query($link, $query_projects) or die(mysqli_error($link));

$query_project_categories = "SELECT `projectCategory`, `projectCategoryClass`
                               FROM projectcategory
                           ORDER BY `projectCategory` ASC";

$result_project_categories = mysqli_query($link, $query_project_categories) or die(mysqli_error($link));
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
        <script src="js/isotope.js"></script>
        <script src="js/jquery.jcarousel.min.js"></script>
        <script src="js/flickr.js"></script>
        <script src="js/twitter.js"></script>
        <script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="js/jquery.easing.js"></script>
        <script src="js/jquery.mousewheel.js"></script> 
        <script src="js/custom.js"></script>
        <script src="js/portfolio.js"></script>
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

                        <h1>Welcome To Lola's <span>Portfolio</span></h1>

                    </section>
                    <!-- PAGE TITLE SECTION --> 
                    <div class="container">

                        <!-- PORTFOLIO SECTION -->        
                        <!-- PORTFOLIO FILTER -->
                        <div class="portfolio_filter">

                            <ul>
                                <li><span>Filter: </span></li>
                                <li><a href=".portfolio_filter" title="All" data-filter="*">All</a></li>
                                <?php
                                while ($category = mysqli_fetch_array($result_project_categories)) {
                                    ?>
                                    <li><a href=".portfolio_filter" title="<?php echo $category['projectCategory']; ?>" data-filter=".<?php echo $category['projectCategoryClass']; ?>"><?php echo $category['projectCategory']; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <!-- PORTFOLIO FILTER -->
                        <!-- PORTFOLIO SECTION -->
                        <div class="portfoliofull">

                            <ul id="portfolioisotope">
                                <!-- PORTFOLIO ITEM -->
                                <?php
                                while ($project = mysqli_fetch_array($result_projects)) {
                                    ?>

                                    <li class="<?php echo $project['projectCategoryClass']; ?>">
                                        <!-- PORTFOLIO IMAGE -->
                                        <a href="details?project=<?php echo $project['projectID'] ?>" title="<?php echo $project['projectName']; ?>"><img src="images/portfolio/<?php echo $project['projectImage']; ?>" alt="<?php echo $project['projectName']; ?>"></a>
                                        <!-- PORTFOLIO IMAGE -->
                                        <!-- PORTFOLIO TITLE -->
                                        <h3><a href="details?project=<?php echo $project['projectID'] ?>" title="<?php echo $project['projectName']; ?>"><?php echo $project['projectName']; ?></a></h3>
                                        <!-- PORTFOLIO TITLE -->
                                        <!-- PORTFOLIO DESCRIPTION -->
                                        <p><?php echo $project['shortDescription']; ?></p>
                                        <!-- PORTFOLIO DESCRIPTION -->
                                    </li>

                                    <?php
                                }
                                ?>
                                <!-- PORTFOLIO ITEM -->
                            </ul>

                        </div>
                        <!-- PORTFOLIO SECTION -->             
                        <!-- PORTFOLIO SECTION -->  

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