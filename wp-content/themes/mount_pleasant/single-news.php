<?php 

get_currentuserinfo();
global $user_ID;
if ($user_ID == '') { 
	header('Location: ' . site_url('/login/')); exit(); 
}

get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

          <div id="main" class="eightcol first clearfix" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <div class="article-header">

                  <h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>
                  <p class="byline vcard"><?php
                    printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
                  ?></p>

                </div> <!-- end article header -->

                <section class="entry-content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
                </section> <!-- end article section -->

                <footer class="article-footer">
                  <?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

                </footer> <!-- end article footer -->

                <?php comments_template(); ?>

              </article> <!-- end article -->

            <?php endwhile; ?>

            <?php else : ?>

              <article id="post-not-found" class="hentry clearfix">
                  <header class="article-header">
                    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
                  </header>
                  <section class="entry-content">
                    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
                  </section>
                  <footer class="article-footer">
                      <p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
                  </footer>
              </article>

            <?php endif; ?>
          <div class="sidebar">
            <div id="recent-posts-2" class="widget widget_recent_entries">    
              <h4 class="widgettitle">Recent News</h4>
                <ul>
        <?php
          $news_args = array('post_type' => 'news','posts_per_page' => 10);
          $news = new WP_Query( $news_args );
          if( $news->have_posts() ) {
            while( $news->have_posts() ) {
              $news->the_post();
        ?>
                  <li><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>
        <?php
            }
          }
        ?>
                </ul>
            </div>
          </div>
          </div> <!-- end #main -->

        </div> <!-- end #inner-content -->

      </div> <!-- end #content -->

<?php get_footer(); ?>
