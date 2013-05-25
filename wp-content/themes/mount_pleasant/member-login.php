<?php
/*
Template Name: Login
*/

get_header(); ?>

<?php $args = array(
  'echo' => true,
  'redirect' => site_url( '/members/' ) ); 
?> 
<?php wp_login_form( $args ); ?>

<?php get_footer(); ?>