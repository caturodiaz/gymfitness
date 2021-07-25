<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    
    <header class="site-header">
        <div class="container">
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
            </div>
        </div>
    </header>
