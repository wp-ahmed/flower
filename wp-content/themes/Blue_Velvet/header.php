<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php bloginfo("name"); ?></title>
    <meta charset='<?php bloginfo("charset");?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!--===============================================================================================-->	
    <?php wp_head(); ?>
</head>
<body>
    <div id="preloder" style="background">
        <img src='<?php echo get_template_directory_uri().'/images/load.gif'; ?>'>
	</div>
    <div id="top-bar" class="clr container">
        <div id="top-bar-inner" class="clr">
            <div id="top-bar-content" class="clr has-content top-bar-left">
                    <span class="topbar-content">
                        <?php echo get_field("coupon",'45') ?> 
                    </span>
            </div><!-- #top-bar-content -->
        </div><!-- #top-bar-inner -->
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php echo bloginfo("name"); ?></a>
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
            <div class="icon-contain"><a href="<?php echo get_permalink( get_page_by_path( 'cart' ) ); ?>"><i class="flaticon-bag"><span class="card-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></i></a><?php echo do_shortcode('[ti_wishlist_products_counter]'); ?></div>
            
            <div class="social-menu-inner clr">
                <ul>
                    <li class="oceanwp-facebook">
                        <a href="<?php echo get_field('facebook','47'); ?> " target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="oceanwp-instagram">
                        <a href="<?php echo get_field('instagram','47'); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="oceanwp-email">
                        <a href="mailto:<?php echo get_field('email','47'); ?>" target="_self">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>