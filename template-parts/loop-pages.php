<?php while( have_posts() ): the_post(); ?>  

        <h1 class="text-center primary-text"><?php the_title(); ?></h1>

        <?php if(has_post_thumbnail() ):
                the_post_thumbnail('middle', array('class' => 'featured-image'));
            endif;
        ?>

        <?php if(get_post_type() === 'gymfitness_classes') {
                        $start_time = get_field('start_time');
                        $end_time = get_field('end_time'); 
                ?>
                <p class="class-info"><?php the_field('classes_days');?> - <?php echo $start_time . " to " . $end_time; ?></p>
                
        <?php } ?>
        <?php the_content(); ?>

<?php  endwhile; ?>