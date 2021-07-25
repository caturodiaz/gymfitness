<?php get_header() ?>

<main class="container page section con-sidebar">
    <div class="main-content">
        <?php get_template_part('template-parts/loop-pages')?>

    </div>
    
    <?php get_sidebar('classes') ?>
</main>

<?php get_footer() ?>