<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

<?php 
  if ( is_user_logged_in() ) {
    $home_url = site_url('/members/');
    $menu = 'members_menu';
  } else {
    $home_url = site_url('');
    $menu = 'guest_menu';
  }
?>


	<body <?php body_class(); ?>>
		<header id="main_header">
    <div class="content">
      <a href="<?php echo $home_url; ?>" id="mini_logo">MPGC</a>
      <nav class="top_nav">
        
        <?php if ( is_user_logged_in() ) : ?>
        <a href="<?php echo site_url('/members/blog'); ?>">Out of Bounds Blog</a>
        <a href="<?php echo site_url('/members/contact-us/'); ?>">Contact Us</a>
          <a href="<?php echo wp_logout_url( site_url() ); ?>">Logout</a>
        <?php else : ?>
          <a href="<?php echo site_url('/guests/contact-us/'); ?>">Contact Us</a>
          <a class="button" href="<?php echo site_url('/members/'); ?>">Members</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>
  <div id="banner">
      <div class="content">
        <div class="faded_area left"></div>
        <div class="faded_area right"></div>
        <a id="logo" href="<?php echo $home_url; ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Mount Pleasant Golf Club">
          <h1>Mount Pleasant Golf Club<span>est. 1910</span></h1>
        </a>
      </div><!-- / .content -->
      <div class="nav_ban">
        
        <?php wp_nav_menu( array( 'theme_location' => $menu ) ); ?>

       </div><!-- / .nav_ban -->
  </div><!-- / .banner -->
  <section class="middle">
    <div class="content main">

