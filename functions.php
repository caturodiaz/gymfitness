<?php 

//Reusable queries
require get_template_directory() . '/inc/queries.php';

//When the theme is activated 
function gymfitness_setup() {

    //Enable featured images
    add_theme_support('post-thumbnails');

    //Seo Titles
    add_theme_support('title-tag');

    //Add images with personalized size
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('boxes', 400, 375, true);
    add_image_size('middle', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}

add_action('after_setup_theme', 'gymfitness_setup' );
//add more menu by adding it to the array
function gymfitness_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'gymfitness')
    ));
}

add_action('init', 'gymfitness_menus');

//Scripts Styles

function gymfitness_scripts_styles() {

    //normalize
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    //fonts
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');
    // SlickNav
    wp_enqueue_style('slickNavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');
    //LightboxCSS
    if(is_page('gallery')):
        wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');
    endif;
    //BXSlider
    if(is_page('home')):
        wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;
    //main stylesheet
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    // Main Scripts
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);
    //Lightbox Scripts
    if(is_page('gallery')):
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true);
    endif;
    //bxSlider Scripts 
    if(is_page('home')):
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    endif;
    //SlickNav
    wp_enqueue_script('slickNavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

// Define Widget Zone

function gymfitness_widgets(){
    register_sidebar( array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center primary-text">',
        'after_title' => '</h3>'
    ));

    register_sidebar( array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center primary-text">',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'gymfitness_widgets');

/* Hero Image*/

function gymfitness_hero_image() {
    //Obtain ID Front Page
    $front_page_id = get_option('page_on_front');
    $id_image = get_field('hero_image', $front_page_id);

    //Obtain Image 
    $image = wp_get_attachment_image_src($id_image, 'full')[0];

    //StyleCSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url($image);
        }
    ";

    wp_add_inline_style('custom', $featured_image_css);

}
add_action('init', 'gymfitness_hero_image');

?>

