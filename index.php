<?php
include './config/config.php';

$query_slides = "SELECT `slideImageTitle`,`slideImageDescription`,
                        `slideImage`, `captionName` 
                   FROM  frontpageslider f
             INNER JOIN caption c
                     ON f.`captionID` = c.`captionID`";

$result_slides = mysqli_query($link, $query_slides) or die(mysqli_error($link));

$query_projects = "SELECT `projectID`, `projectImage`, `projectName`
                     FROM project
                 ORDER BY `projectStartDate` DESC
                    LIMIT 0, 4";

$result_projects = mysqli_query($link, $query_projects) or die(mysqli_error($link));
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
        <script defer src="js/jquery.flexslider-min.js"></script>
        <script src="js/jquery.jcarousel.min.js"></script>
<!--        <script src="js/flickr.js"></script>
        <script src="js/twitter.js"></script>-->
        <script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="js/jquery.easing.js"></script>
        <script src="js/jquery.mousewheel.js"></script> 
        <script src="js/froogaloop.js"></script>
        <script src="js/jquery.fitvid.js"></script>
        <script src="js/flexi_1.js"></script>
        <script src="js/custom.js"></script>
        <!-- JAVASCRIPT SECTION -->
    </head>

    <body>

        <!-- DROPDOWN MESSAGE SECTION -->
        <?php include './includes/dropdown_wrap.php'; ?>
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

                    <!-- SLIDER SECTION -->
                    <section class="slider_wrap">

                        <div class="slide_wrap">

                            <div class="flexslider">
                                <ul class="slides">
                                    <?php
                                    while ($slide = mysqli_fetch_array($result_slides)) {
                                        ?>

                                        <li>
                                            <img src="slider/<?php echo $slide['slideImage'] ?>" alt="">
                                            <div class="<?php echo $slide['captionName'] ?>">

                                                <h3><?php echo $slide['slideImageTitle']; ?></h3>
                                                <p><?php echo preg_replace("/\n/", "<br>", $slide['slideImageDescription']); ?></p>
                                                <!--<p><a href="http://themeforest.net/item/lola-responsive-business-html-theme/3223355?ref=UBL" title="Buy This Template">Buy This template</a></p>-->
                                            </div>
                                        </li>

                                        <?php
                                    }
                                    ?>

<!--                                    <li>
                                        <iframe id="player_1" src="http://player.vimeo.com/video/44300863?api=1&amp;player_id=player_1" width="500" height="281"></iframe>
                                        <div class="flex-caption-2">You can play videos within this slider</div>
                                    </li>-->
                                </ul>
                            </div>

                        </div>

                    </section>
                    <div class="clear"></div>
                    <!-- SLIDER SECTION -->
                    <!-- PAGE TITLE SECTION -->
                    <section class="mainpage_title">

                        <h1>At vero eos et <span>accusamus et iusto</span> odio dignissimos ducimus qui blanditiis praesentium voluptatum <span>deleniti atque</span> corrupti quos</h1>

                    </section>
                    <!-- PAGE TITLE SECTION -->
                    <div class="container">

                        <!-- LATEST PORTFOLIO SECTION -->
                        <section class="latestportfolio_front">        

                            <div class="container">

                                <h5 class="latestportfolio_front_title">Latest Projects</h5>

                                <ul class="latestportfolio_carousel">
                                    <!-- LATEST PORTFOLIO ITEM -->
                                    <?php
                                    while ($project = mysqli_fetch_array($result_projects)) {
                                        ?>

                                        <li>
                                            <a href="details?project=<?php echo $project['projectID']; ?>"><img src="images/portfolio/<?php echo $project['projectImage']; ?>" alt=""></a>
                                            <div class="clear"></div>
                                            <div class="portpost"><a href="details?project=<?php echo $project['projectID']; ?>"><img src="images/posticon.png" alt="See Post"></a></div>
                                            <div class="portplus"><a class="fancyboxnumber" href="images/portfolio/<?php echo $project['projectImage']; ?>" title="<?php echo $project['projectName']; ?>"><img src="images/plus.png" alt="Enlarge Image"></a></div>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                    <!-- LATEST PORTFOLIO ITEM -->
                                </ul>           

                            </div>         

                        </section>   
                        <!-- LATEST PORTFOLIO SECTION -->  

                        <!-- LATEST BLOG SECTION -->
                        <section class="latestblog_front">        

                        </section>   
                        <!-- LATEST BLOG SECTION --> 
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