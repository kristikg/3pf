<?php
  $args = array(
    'post_type' => 'sponsors',
    'cat' => 63,
    'posts_per_page' => $num_posts
  );
  $query = new WP_Query( $args );
?>

<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        	<?php the_post_thumbnail(); ?>
      	   <h5><a href="<?php echo get_post_meta($post->ID, 'link', true);?>" target="_blank" rel="nofollow"><?php the_title(); ?></a></h5>

 <?php endwhile; endif; wp_reset_postdata(); ?>

