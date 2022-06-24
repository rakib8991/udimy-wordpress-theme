<?php
// form submit databases function require
require_once(get_template_directory().'/inc/reservation_submit.php');
// input databases.php fild 
require_once(get_template_directory().'/inc/databases.php');

// add menu page | option menu 
require_once(get_template_directory().'/inc/option.php');
// theme function 

function udimy_theme_function(){

    add_theme_support('post-thumbnails');

    add_image_size('boxes', 437, 291, true);
}

add_action('after_setup_theme','udimy_theme_function');


function udimy_scrupts(){
    // adding stylesheet
    wp_register_style('google_fonts','https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@400;900&family=Poppins:wght@300;400;700&family=Raleway:wght@900&display=swap');
    wp_register_style('fluidboxcss',get_template_directory_uri()."/css/fluidbox.min.css",array(),'8.0.1');
    wp_register_style('normalize',get_template_directory_uri()."/css/normalize.css",array(),'8.0.1');
    wp_register_style('fontawesome',get_template_directory_uri()."/css/all.min.css",array(),'6.1.1');
    wp_register_style('style',get_stylesheet_uri(), array('normalize'), '1.0');

    // Enqueue the style 
    wp_enqueue_style('google_fonts');
    wp_enqueue_style('fluidboxcss');
    wp_enqueue_style('normalize');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');

    // adding script
    wp_register_script('fluidboxjs',get_template_directory_uri()."/js/jquery.fluidbox.min.js",array('jquery'),'1.0.0',true);
    wp_register_script('modernizr',get_template_directory_uri()."/js/modernizr.min.js",array('jquery'),'2.8.3',false);
    wp_register_script('script',get_template_directory_uri()."/js/script.js",array('jquery'),'1.0.0',true);

    // Enqueue scripts
    wp_enqueue_script('modernizr');
    wp_enqueue_script('fluidboxjs');
   
    wp_enqueue_script('jquery');
    wp_enqueue_script('script');

}
add_action('wp_enqueue_scripts','udimy_scrupts');

// register menu
function udimy_menu(){
    register_nav_menus(array(
        'primary_menu'  => __('Primary Menu','udimy'),
        'social_menu'  => __('Social Menu','udimy')
    ));
}
add_action('init','udimy_menu');

/**
 * Register a custom post type called "Menus".
 */
function our_menus() {
    $labels = array(
        'name'                  => _x( 'Menus', 'Post type general name', 'udimy' ),
        'singular_name'         => _x( 'Mneu', 'Post type singular name', 'udimy' ),
        'menu_name'             => _x( 'Menus', 'Admin Menu text', 'udimy' ),
        'name_admin_bar'        => _x( 'Menu', 'Add New on Toolbar', 'udimy' ),
        'add_new'               => __( 'Add New', 'udimy' ),
        'add_new_item'          => __( 'Add New Menu', 'udimy' ),
        'new_item'              => __( 'New MEnu', 'udimy' ),
        'edit_item'             => __( 'Edit Menu', 'udimy' ),
        'view_item'             => __( 'View Menu', 'udimy' ),
        'all_items'             => __( 'All Menus', 'udimy' ),
        'search_items'          => __( 'Search Menus', 'udimy' ),
        'parent_item_colon'     => __( 'Parent Menus:', 'udimy' ),
        'not_found'             => __( 'No menus item found.', 'udimy' ),
        'not_found_in_trash'    => __( 'No menus item found in Trash.', 'udimy' ),
        'featured_image'        => _x( 'Menu Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'udimy' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'udimy' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'udimy' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'udimy' ),
        'archives'              => _x( 'Menu archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'udimy' ),
        'insert_into_item'      => _x( 'Insert into menu', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'udimy' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this menu', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'udimy' ),
        'filter_items_list'     => _x( 'Filter menus list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'udimy' ),
        'items_list_navigation' => _x( 'Menu list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'udimy' ),
        'items_list'            => _x( 'Menus list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'udimy' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'menu' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'              => 'dashicons-welcome-widgets-menus',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', ),
        'taxonomy'          => array('category'),
    );
 
    register_post_type( 'menu', $args );
}
 
add_action( 'init', 'our_menus' );



/**
 * Create two taxonomies, genres and writers for the post type "book".
 *
 * @see register_post_type() for registering custom post types.
 */
function udimy_menu_category() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Menu Categorys', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Menu Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Menu Categorys', 'textdomain' ),
        'all_items'         => __( 'All Menu Categorys', 'textdomain' ),
        'parent_item'       => __( 'Parent Menu Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Menu Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit Menu Category', 'textdomain' ),
        'update_item'       => __( 'Update Menu Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Menu Category', 'textdomain' ),
        'new_item_name'     => __( 'New Menu Category Name', 'textdomain' ),
        'menu_name'         => __( 'Menu Category', 'textdomain' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'menu_category' ),
    );
 
    register_taxonomy( 'menu_category', array( 'menu' ), $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'udimy_menu_category', 0 );


// register sidebar
function udimy_blog_sidebar(){

    register_sidebar(array(
        'name'          => __('Blog Sidbar','udimy'),
        'id'            => 'blog_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

}
add_action('widgets_init','udimy_blog_sidebar');

