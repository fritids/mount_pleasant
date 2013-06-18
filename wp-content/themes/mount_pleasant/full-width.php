<?php 
/*
Template Name: Full Width
*/


get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="full_width" id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
