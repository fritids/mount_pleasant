<?php get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="img_contain">
    <?php if ( has_post_thumbnail()) : ?>
      <?php the_post_thumbnail( 'image328' ); ?>
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/library/images/content_img.jpg" alt="" class="content_img">
    <?php endif; ?>
    </div>
    <article id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
