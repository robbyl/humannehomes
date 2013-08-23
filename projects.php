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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
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
                    <li><a href=".portfolio_filter" title="Graphic Design" data-filter=".graphic">Graphic Design</a></li>
                    <li><a href=".portfolio_filter" title="Print Design" data-filter=".print">Print Design</a></li>
                    <li><a href=".portfolio_filter" title="Web Design" data-filter=".web">Web Design</a></li>
                    <li><a href=".portfolio_filter" title="Other" data-filter=".other">Other</a></li>
                </ul>
            
            </div>
            <!-- PORTFOLIO FILTER -->
            <!-- PORTFOLIO SECTION -->
            <div class="portfoliofull">
            
                <ul id="portfolioisotope">
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Media Logo Design"><img src="images/portfolio/imagedemo.jpg" alt="Media Logo Design"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Media Logo Design">Media Logo Design</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Nike Advert Campaign"><img src="images/portfolio/imagedemo.jpg" alt="Nike Advert Campaign"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Nike Advert Campaign">Nike Advert Campaign</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Havalon Logo Design"><img src="images/portfolio/imagedemo.jpg" alt="Havalon Logo Design"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Havalon Logo Design">Havalon Logo Design</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="web">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Moot Wordpress Theme"><img src="images/portfolio/imagedemo.jpg" alt="Moot Wordpress Theme"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Moot Wordpress Theme">Moot Wordpress Theme</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="graphic print">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Axe Advert Design"><img src="images/portfolio/imagedemo.jpg" alt="Axe Advert Design"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Axe Advert Design">Axe Advert Design</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Republic Logo Design"><img src="images/portfolio/imagedemo.jpg" alt="Republic Logo Design"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Republic Logo Design">Republic Logo Design</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="graphic">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Creative Swan"><img src="images/portfolio/imagedemo.jpg" alt="Just a marshmallow"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Just a marshmallow">Just a marshmallow</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Creative Swan"><img src="images/portfolio/imagedemo.jpg" alt="Creative Swan"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Creative Swan">Creative Swan</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="web">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Creative Swan"><img src="images/portfolio/imagedemo.jpg" alt="Stella Wordpress Theme"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Stella Wordpress Theme">Stella Wordpress Theme</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="other">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Nike Advert Campaign"><img src="images/portfolio/imagedemo.jpg" alt="Nike Advert Campaign"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Nike Advert Campaign">Nike Advert Campaign</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="graphic print">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Axe Advert Design"><img src="images/portfolio/imagedemo.jpg" alt="Axe Advert Design"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Axe Advert Design">Axe Advert Design</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
                    <!-- PORTFOLIO ITEM -->
                    <!-- PORTFOLIO ITEM -->
                    <li class="graphic">
                        <!-- PORTFOLIO IMAGE -->
                        <a href="details" title="Creative Swan"><img src="images/portfolio/imagedemo.jpg" alt="Just a marshmallow"></a>
                        <!-- PORTFOLIO IMAGE -->
                        <!-- PORTFOLIO TITLE -->
                        <h3><a href="details" title="Just a marshmallow">Just a marshmallow</a></h3>
                        <!-- PORTFOLIO TITLE -->
                        <!-- PORTFOLIO DESCRIPTION -->
                        <p>similiquesunt in culpa qui officia deserunt mollitia animi</p>
                        <!-- PORTFOLIO DESCRIPTION -->
                    </li>
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
<section class="footerwidget_area">

	<div class="footer_widget_container">

        <!-- WIDGET -->
        <div class="widget">
        
            <h3>Pages</h3>
                   
            <ul>
            
                <li><a href="page1.html" title="Page Version 1">Page Layout 1</a></li>
                <li><a href="page2.html" title="Page Version 2">Page Layout 2</a></li>
                <li><a href="page3.html" title="Full Page Version">Full Page Layout</a></li>
                <li><a href="page4.html" title="Typography &amp; Layouts">Typography &amp; Grids</a></li>
                <li><a href="page5.html" title="Icons &amp; Buttons">Icons, Buttons &amp; Images</a></li>
                <li><a href="page6.html" title="Tabs &amp; Accordions">Tabs, Accordions &amp; Lists</a></li>
                <li><a href="page7.html" title="Theme Tables">Theme Tables</a></li>
            
            </ul>
        
        </div>
        <!-- WIDGET -->
        <!-- WIDGET -->
        <div class="widget">
        
            <h3>Flickr Feed</h3>
            
            <ul id="flickr"></ul>
        
        </div>
        <!-- WIDGET -->
        <!-- WIDGET -->
    	<div class="widget">
        
        	<h3>Latest Tweets</h3>
            
            <div class="twitterbody"></div>
        
        </div>
        <!-- WIDGET -->
        
	</div>

</section>
<!-- FOOTER WIDGET SECTION -->
<div class="clear"></div>
<!-- FOOTER SECTION -->
<footer class="footer">

	&copy; 2012 - UBL Designs, All rights reserved!&nbsp; -  
    <!-- DO NOT REMOVE, IF FOUND TO BE REMOVED DMCA TAKE DOWN NOTICE WILL BE PROVIDED TO SHUT YOUR HOSTING DOWN, TO YOUR HOSTING PROVIDER -->
    <a href="http://www.derby-web-design-agency.co.uk" title="Template by UBL Designs">Template By UBL Designs</a>
    <!-- DO NOT REMOVE, IF FOUND TO BE REMOVED DMCA TAKE DOWN NOTICE WILL BE PROVIDED TO SHUT YOUR HOSTING DOWN, TO YOUR HOSTING PROVIDER -->

</footer>
<!-- FOOTER SECTION -->

<!-- BACK TO TOP BUTTON -->
<div class="backtotop"><a title="Back to the top">Back To Top</a></div>
<!-- BACK TO TOP BUTTON -->

</body>
</html>