<?php
/*
Template Name: Homepage
*/
?>

<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!-- wordpress head functions -->
        <?php wp_head(); ?>
        <!-- end of wordpress head -->
        <!-- IE8 fallback moved below head to work properly. Added respond as well. Tested to work. -->
            <!-- media-queries.js (fallback) -->
        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>           
        <![endif]-->

        <!-- html5.js -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->    
        
            <!-- respond.js -->
        <!--[if lt IE 9]>
                  <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->    
    </head>
    
    <body <?php body_class(); ?> home>
                
        <header role="banner">
                
            <div class="navbar navbar-default navbar-fixed-top">
                <div class="container header-border">
          
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" 
                            href="<?php echo home_url(); ?>">
                            <img src='<?php print IMAGES.'/lg_logo.png' ?>' alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>

                    <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                        <?php include 'social-icons.php'; ?>
                    </form>

                </div> <!-- end .container -->

                <div class="container nav-container">

                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>

                    </div>
                </div> <!-- end .container -->

            </div> <!-- end .navbar -->
        
        </header> <!-- end header -->
        
    <div class="container">


    <div class="top-row">

    	<div class="clearfix row">

    		<div class="col-md-12 jumbo-header">
    			<h1>Supporting people in housing need</h1>
    		</div>

    	</div>



    	<div class="clearfix row jumbo-message">

    		<div class="col-md-6">
	            <p>PATH is an independent charity, supporting people who are vulnerable to homelessness in Plymouth and Teignbridge.</p>
	            <p><a class="btn btn-primary btn-lg" href="#" role="button">More about Path &raquo;</a></p>
    		</div>

    		<div class="col-md-6">
    			<?php $homepageImage = get_option('path_homepage_image'); ?>

				<img class="img_middle" src='<?php print $homepageImage; ?>' alt="<?php bloginfo('name'); ?>">

    		</div>

    	</div>



        <!-- Example row of columns -->
        <div class="clearfix row">
            <div class="col-md-3">
                <h2>Clients</h2>
                <?php $homepageImage = get_option('path_clients_image'); ?>

				<img class="homepageCategoryImage" src='<?php print $homepageImage; ?>' alt="<?php bloginfo('name'); ?>">
                <button class="btn btn-default" href="#" role="button">Help with housing &raquo;</button>
            </div>
            <div class="col-md-3">
                <h2>Agencies</h2>
                <?php $homepageImage = get_option('path_agencies_image'); ?>

				<img class="homepageCategoryImage" src='<?php print $homepageImage; ?>' alt="<?php bloginfo('name'); ?>">
                <button class="btn btn-default" href="#" role="button">Agencies / Refferers &raquo;</button>
            </div>
            <div class="col-md-3">
                <h2>Landlords</h2>
                <?php $homepageImage = get_option('path_landlords_image'); ?>

				<img class="homepageCategoryImage" src='<?php print $homepageImage; ?>' alt="<?php bloginfo('name'); ?>">
                <button class="btn btn-default" href="#" role="button">Landloards / Agents &raquo;</button>
            </div>
            <div class="col-md-3">
                <h2>Support Us</h2>
                <?php $homepageImage = get_option('path_volunteers_image'); ?>

				<img class="homepageCategoryImage" src='<?php print $homepageImage; ?>' alt="<?php bloginfo('name'); ?>">
                <button class="btn btn-default" href="#" role="button">Donate &raquo;</button>

                <button class="btn btn-default" href="#" role="button">Get Involved &raquo;</button>
            </div>
        </div>
        
    </div> <!-- /container -->

<?php get_footer(); ?>