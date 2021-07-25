<?php get_header() ?>

<main class="container page section no-sidebar">
    <div class="text-center">
        <?php get_template_part('template-parts/loop-pages')?>
        
        <?php gymfitness_list_classes(); ?>

    </div>
    
</main>

<?php get_footer() ?>