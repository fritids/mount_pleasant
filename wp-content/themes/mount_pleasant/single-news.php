<?php 

get_currentuserinfo();
global $user_ID;
if ($user_ID == '') { 
	header('Location: ' . site_url('/login/')); exit(); 
}

get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <img src="<?php echo get_template_directory_uri(); ?>/library/images/content_img.jpg" alt="" class="content_img">
    <article id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </article>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>