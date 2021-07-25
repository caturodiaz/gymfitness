<?php 

function gymfitness_list_classes($quantity = -1) { ?>
    <ul class="list-classes">
        <?php 
            $args = array(
                'post_type' => 'gymfitness_classes',
                'posts_per_page' => $quantity
            );
            $classes = new WP_Query($args);
            while($classes->have_posts()): $classes->the_post(); ?>

            <li class="class card gradient">
                <?php the_post_thumbnail('middle');?>
                <div class="content">
                    <a href="<?php the_permalink();?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php 
                        $start_time = get_field('start_time');
                        $end_time = get_field('end_time');
                    ?>
                    <p><?php the_field('classes_days');?> - <?php echo $start_time . " to " . $end_time; ?></p>
                </div>
            </li>

            <?php endwhile; wp_reset_postdata(); ?>
    </ul>



<?php } ?>