<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udimy Theme Development</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <!-- header logo  -->
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="site logo" class="logoimage"> 
                </a>
            </div>
            <!-- header information  -->
            <div class="header-information">
                <!-- social menu  -->
                <div class="social-menu">

                    <?php 
                    $args = array(
                        'theme_location'        => 'social_menu',
                        'container'             => 'nav',
                        'container_class'       => 'socials',
                        'container_id'          => 'socials',
                        'link_before'            => '<span class="sr-text">',
                        'link_after'            => '</span>',
                    );
                    wp_nav_menu($args);
                    ?>

                </div>
                <!-- info  -->
                <div class="header-info">
                    <p><?php echo get_option('udimy_address_text'); ?></p>
                    <p><?php echo get_option('udimy_phone_text'); ?></p>
                </div>
            </div>
        </div><!--- Container --->
    </header>
    <!-- main menu  -->
    <div class="main-menu">
        <div class="mobile-menu">
            <a href="#" class="mobile"><i class="fa fa-bars"></i>menu</a>
        </div>
        <div class="navigation container">
            <?php 
            
            $args = array(
                'theme_location'    => 'primary_menu',
                'container'         => 'nav',
                'container_class'   => 'site-nav'
            );

            wp_nav_menu($args);
            
            ?>
        </div>
    </div>