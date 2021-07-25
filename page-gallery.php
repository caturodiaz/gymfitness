<?php 
/*
    Template Name: Gallery Template
*/

get_header() ?>

<main class="container page section">
    <div class="main-content">
    <?php while( have_posts() ): the_post(); ?>  
            <h1 class="text-center primary-text"><?php the_title(); ?></h1>

            <?php 
            //Obtain gallery from the page
                $gallery = get_post_gallery(get_the_ID(), false);
            //Obtain IDs
                $gallery_image_ID = explode(',', $gallery['ids'] );
            ?>

            <ul class="gallery-images">
                <?php
                    $i = 1;
                    foreach($gallery_image_ID as $id):
                        $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                        $imageThumb = wp_get_attachment_image_src( $id,  $size )[0];
                        $image = wp_get_attachment_image_src( $id,  'full' )[0];
                ?>
                <li>
                    <a href="<?php echo $image; ?>" data-lightbox="gallery">
                        <img src="<?php echo $imageThumb; ?>" alt="Gallery Image">
                    </a>
                </li>
                <?php $i++; endforeach; ?>

                    
            
            </ul>
      
           

        <?php  endwhile; ?>

    </div>
    
</main>

<?php get_footer() ?>