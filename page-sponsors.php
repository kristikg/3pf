<?php
/**
 * Template Name: Sponsors Page
 */

//other template calls blog.php:

//fire_department_storage_set('blog_streampage', true);

get_header(); ?>

    <section id="sponsor-page">
      
       <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div id="sponsor-main">
       	   <h1><?php the_title(); ?></h1>
           <?php the_content(); ?>
        </div>

        <div id="foundation-partners">
        	<h2><?php the_field('3pf_partners_title'); ?></h2>
 			<?php get_template_part('content', 'sponsorsfoundation'); ?>      	   
 		</div>

 		<div id="corporate-partners">
        	<h2><?php the_field('corporate_partners_title'); ?></h2>
 			<?php get_template_part('content', 'sponsorspartner'); ?>    	   
 		</div>

 		<div id="sponsor-secondary">
 			<h2><?php the_field('secondary_title'); ?></h2>
 			<p><?php the_field('secondary_content'); ?></p>
 		</div>


       <?php endwhile; endif; wp_reset_postdata(); ?>   

    </section>




<?php get_footer(); ?>