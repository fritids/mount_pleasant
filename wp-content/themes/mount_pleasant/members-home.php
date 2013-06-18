<?php
/*
Template Name: Members Home
*/

get_currentuserinfo();
global $user_ID;
if ($user_ID == '') { 
  header('Location: ' . site_url('/login/')); exit(); 
}

get_header(); ?>
<div class="members_home">
  <div class="left">
    <div class="recent_news">
      <h2>MPGC Recent News</h2>
      <?php
        $news_args = array('post_type' => 'news','posts_per_page' => 5);
        $news = new WP_Query( $news_args );
        if( $news->have_posts() ) {
          while( $news->have_posts() ) {
            $news->the_post();
      ?>
      <div class="news_item">
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <p>
          <?php
            $the_length = 230;
            $blurb = get_the_excerpt();
            echo substr($blurb, 0, $the_length);
          ?>
          <?php if (strlen($blurb) > $the_length) : ?>
            &hellip;<a href="<?php the_permalink(); ?>">read more</a>
          <?php endif; ?>
          
        </p>
      </div>
      <?php
            }
          }
      ?>
      <a href="<?php echo site_url('/news'); ?>" class="button">All MPGC News</a>
    </div> <!-- .recent_news -->
    <div class="recent_posts">
      <h2>Out of Bounds Blog</h2>
      <?php
        $blog_args = array('post_type' => 'post','posts_per_page' => 5);
        $blog = new WP_Query( $blog_args );
        if( $blog->have_posts() ) {
          while( $blog->have_posts() ) {
            $blog->the_post();
      ?>
      <div class="news_item">
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <p><?php the_date() ?></p>
        <p>
          <?php
            $the_length = 230;
            $blurb = get_the_excerpt();
            echo substr($blurb, 0, $the_length);
            echo "...";
          ?>
        </p>
      </div>
      <?php
            }
          }
      ?>
      <a href="<?php echo site_url('/blog/'); ?>" class="button">All Blog Posts</a>
    </div> <!-- .recent_posts -->
  </div> <!-- / .left -->
  <div class="right">
    <div class="upcoming_events">
      <?php dynamic_sidebar( 'sidebar2' ); ?>
      <a class="button" href="calendar/">View Calendar</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>

