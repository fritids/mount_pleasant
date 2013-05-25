<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function news_post_type() { 
  // creating (registering) the custom type 
  register_post_type( 'news', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('MPGC News', 'bonestheme'), /* This is the Title of the Group */
      'singular_name' => __('News Item', 'bonestheme'), /* This is the individual type */
      'all_items' => __('All News Items', 'bonestheme'), /* the all items menu item */
      'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
      'add_new_item' => __('Add New News Item', 'bonestheme'), /* Add New Display Title */
      'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
      'edit_item' => __('Edit News Item', 'bonestheme'), /* Edit Display Title */
      'new_item' => __('New News Item', 'bonestheme'), /* New Display Title */
      'view_item' => __('View News Item', 'bonestheme'), /* View Display Title */
      'search_items' => __('Search News Item', 'bonestheme'), /* Search Custom Type Title */ 
      'not_found' =>  __('There are no News Items', 'bonestheme'), /* This displays if there are no entries yet */ 
      'not_found_in_trash' => __('There are no News Items in the trash', 'bonestheme'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'MPGC News', 'bonestheme' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
      'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
      'has_archive' => 'news', /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
    ) /* end of options */
  ); /* end of register post type */

  /* this adds your post categories to your custom post type */
  register_taxonomy_for_object_type('news_cat', 'news');
  
} 

// now let's add custom categories (these act like categories)
  register_taxonomy( 'news_cat', 
    array('news'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    array('hierarchical' => true,     /* if this is true, it acts like categories */             
      'labels' => array(
        'name' => __( 'Categories', 'bonestheme' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Category', 'bonestheme' ), /* single taxonomy name */
        'search_items' =>  __( 'Search Categories', 'bonestheme' ), /* search title for taxomony */
        'all_items' => __( 'All Categories', 'bonestheme' ), /* all title for taxonomies */
        'edit_item' => __( 'Edit Category', 'bonestheme' ), /* edit custom taxonomy title */
        'update_item' => __( 'Update Category', 'bonestheme' ), /* update title for taxonomy */
        'add_new_item' => __( 'Add New Category', 'bonestheme' ), /* add new title for taxonomy */
        'new_item_name' => __( 'New Category', 'bonestheme' ) /* name title for taxonomy */
      ),
      'show_admin_column' => true, 
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'category' ),
    )
  ); 

  // adding the function to the Wordpress init
  add_action( 'init', 'news_post_type');

function people_post_type() { 
  // creating (registering) the custom type 
  register_post_type( 'people', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('People', 'bonestheme'), /* This is the Title of the Group */
      'singular_name' => __('Person', 'bonestheme'), /* This is the individual type */
      'all_items' => __('All People', 'bonestheme'), /* the all items menu item */
      'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
      'add_new_item' => __('Add New Person', 'bonestheme'), /* Add New Display Title */
      'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
      'edit_item' => __('Edit Person', 'bonestheme'), /* Edit Display Title */
      'new_item' => __('New Person', 'bonestheme'), /* New Display Title */
      'view_item' => __('View Person', 'bonestheme'), /* View Display Title */
      'search_items' => __('Search Person', 'bonestheme'), /* Search Custom Type Title */ 
      'not_found' =>  __('There are no people', 'bonestheme'), /* This displays if there are no entries yet */ 
      'not_found_in_trash' => __('There are no people in the trash', 'bonestheme'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'Board and Ladies Divison Members', 'bonestheme' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 9, /* this is what order you want it to appear in on the left hand side menu */ 
      'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
      'has_archive' => 'people', /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'thumbnail')
    ) /* end of options */
  ); /* end of register post type */

  /* this adds your post categories to your custom post type */
  register_taxonomy_for_object_type('person_group', 'people');
  
} 
  // adding the function to the Wordpress init
  add_action( 'init', 'people_post_type');

  // now let's add custom categories (these act like categories)
  register_taxonomy( 'person_group', 
    array('people'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    array('hierarchical' => true,     /* if this is true, it acts like categories */             
      'labels' => array(
        'name' => __( 'Groups', 'bonestheme' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Group', 'bonestheme' ), /* single taxonomy name */
        'search_items' =>  __( 'Search Groups', 'bonestheme' ), /* search title for taxomony */
        'all_items' => __( 'All Groups', 'bonestheme' ), /* all title for taxonomies */
        'edit_item' => __( 'Edit Group', 'bonestheme' ), /* edit custom taxonomy title */
        'update_item' => __( 'Update Group', 'bonestheme' ), /* update title for taxonomy */
        'add_new_item' => __( 'Add New Group', 'bonestheme' ), /* add new title for taxonomy */
        'new_item_name' => __( 'New Group', 'bonestheme' ) /* name title for taxonomy */
      ),
      'show_admin_column' => true, 
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'group' ),
    )
  ); 

?>
