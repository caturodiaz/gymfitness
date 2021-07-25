<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <header class="site-header">
        <div class="container header-grid">
            <div class="nav-bar">
                <div class="logo">
                    <a href="<?php echo site_url('/')?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Site Logo">
                    </a>
                </div>

                <?php 
                    $args = array(
                        'theme_location' => 'main-menu',
                        'container' => 'nav',
                        'container_class' => 'main-menu'
                    );
                    wp_nav_menu($args);
                
                ?>
            </div> <!--navbar-->

            <div class="tagline text-center">
                <h1><?php the_field('hero_header'); ?> </h1>
                <p><?php the_field('hero_content'); ?></p>
            </div>
        </div>
    </header>
