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
        <script src="js/contact.js"></script>
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
                <section class="main_section contactpage">

                    <!-- HEADER SECTION -->
                    <?php include './includes/header.php'; ?>

                    <div class="clear"></div>

                    <!-- GOOGLE SECTION -->
                    <section id="googlewrapping">

                        <div id="googlewrap"></div>

                    </section>
                    <!-- GOOGLE SECTION -->
                    <!-- HEADER SECTION -->
                    <!-- PAGE TITLE SECTION -->
                    <section class="mainpage_title">

                        <h1>Say Hello!</h1>

                    </section>
                    <!-- PAGE TITLE SECTION --> 
                    <div class="container">
                        <!-- SIDEBAR SECTION -->
                        <div class="sidebararea floatright">
                            <!-- WIDGET -->
                            <div class="widget">

                                <h3>Address</h3>

                                <p>HUMANNE HOMES ( T ) LTD.,<br>P.O.Box 1545,<br>Dar es Salaam,<br>Tanzania.</p>

                            </div>
                            <!-- WIDGET -->
                            <!-- WIDGET -->
                            <div class="widget">

                                <h3>Contact Details</h3>

                                <ul>
                                    <li>Tel: +255 22 2864343</li>
                                    <li>Mobile: +255 784 248 227</li>
                                    <li>Email: info@humannehomes.com</li>
                                    <li>Twitter: <a href="#" title="Join Us On Twitter">@Humannehomes</a></li>
                                    <li>Facebook: <a href="#" title="Join Us On Facebook">Humannehomes</a></li>
                                    <li>Linked In: <a href="#" title="Join Us On Linked In">Humannehomes</a></li>

                                </ul>

                            </div>
                            <!-- WIDGET -->

                        </div>
                        <!-- SIDEBAR SECTION -->
                        <!-- MAIN CONTENT SECTION -->
                        <div class="contentarea floatleft">

                            <!-- COMMENT FORM -->
                            <div class="messagearea">

                                <p>At vero eos et accusamus et iusto odiodignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similiquesunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est etexpedita distinctio.</p>
                                <form method="post" id="slickform" action="javascript:slickcontactparse();">
                                    <fieldset>
                                        <p><label>Name</label><br>
                                            <input type="text" class="commentinput" name="name" id="name"></p>
                                        <p><label>email</label><br>
                                            <input type="text" class="commentinput" name="email" id="email"></p>
                                        <p><label>Comment</label><br>
                                            <textarea class="commenttextarea" name="commentarea" id="commentarea"></textarea></p>
                                        <p><input type="submit" class="widgetinputbutton"></p>
                                    </fieldset>
                                </form>
                                <p class="contactmessage"></p>

                            </div>
                            <!-- COMMENT FORM -->
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