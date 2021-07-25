<?php get_header('front'); ?>

<section class="welcome text-center section">
    <h2 class="primary-text"><?php the_field('welcome_header'); ?></h2>
    <p><?php the_field('welcome_content'); ?></p>
</section>

<div class="areas-section">
    <ul class="areas-container">
        <li class="area">
            <?php $area1 = get_field('area_1');
            $image = wp_get_attachment_image_src($area1['area_image'], 'middle')[0];
            ?>
            <img src="<?php echo esc_attr($image); ?>" alt="">
            <p><?php echo $area1['area_text']?></p>
        </li>
        <li class="area">
            <?php $area2 = get_field('area_2');
            $image = wp_get_attachment_image_src($area2['area_image'], 'middle')[0];
            ?>
            <img src="<?php echo esc_attr($image); ?>" alt="">
            <p><?php echo $area2['area_text']?></p>
        </li>
        <li class="area">
            <?php $area3 = get_field('area_3');
            $image = wp_get_attachment_image_src($area3['area_image'], 'middle')[0];
            ?>
            <img src="<?php echo esc_attr($image); ?>" alt="">
            <p><?php echo $area3['area_text']?></p>
        </li>
        <li class="area">
            <?php $area4 = get_field('area_4');
            $image = wp_get_attachment_image_src($area4['area_image'], 'middle')[0];
            ?>
            <img src="<?php echo esc_attr($image); ?>" alt="">
            <p><?php echo $area4['area_text']?></p>
        </li>
    </ul>
</div>

<section class="classes">
     <div class="container section">
         <h2 class="text-center primary-text">Our Services</h2>
         <?php gymfitness_list_classes(4); ?>

         <div class="container-btn">
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Our Services') ) );?>" class="btn btn-primary">See All Our Services</a>
         </div>
     </div>
</section>

<section class="trainers">
    <div class="container section">
        <h2 class="text-center primary-text">Our Trainers</h2>
        <p class="text-center">Professional Trainers that will help you achieve your GOALS.</p>

        <ul class="trainers-list">
            <?php 
                $args = array(
                    'post_type' => 'trainers',
                    'posts_per_page' => 30
                );
                $trainers = new WP_Query($args);
                while($trainers->have_posts()): $trainers->the_post();
            ?>
            <li class="trainer">
                <?php the_post_thumbnail('middle'); ?>
                <div class="content text-center">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <div class="specialty">
                        <?php 
                            $spe = get_field('specialty');
                            foreach($spe as $s): ?>
                                <span class="tag"><?php echo esc_html( $s )?></span>
                        
                     <?php  endforeach; ?>
                    </div>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata();?>
        </ul>
    </div>
</section>

<section class="testimonials">
    <h2 class="text-center white-text">Testimonials</h2>
    <div class="testimonials-container">
        <ul class="testimonials-list">
            <?php 
                $args = array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 10
                );

                $testimonials = new WP_Query($args);
                while($testimonials->have_posts()): $testimonials->the_post();
            ?>
            <li class="testimonial text-center">
                <blockquote>
                    <?php the_content(); ?>
                </blockquote>

                <div class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <p><?php the_title(); ?></p>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>   
        </ul>
    </div>
</section>

<section class="blog container section">
    <h2 class="text-center primary-text">Our Blog</h2>
    <p class="text-center">Learn from our experts</p>
    <ul class="blog-list">
        <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            $blog = new WP_Query($args);
            while($blog->have_posts()): $blog->the_post();
            
            get_template_part('template-parts/loop', 'blog');?>

        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</section>

<?php get_footer(); ?>