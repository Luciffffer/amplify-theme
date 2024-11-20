<?php

// setup
if ( ! function_exists( 'amplify_setup' ) ) {
    function amplify_setup() {
        
        // register menus
        register_nav_menus(
            array(
                'global' => __( 'global', 'amplify' ),
                'global-buttons' => __( 'global-buttons', 'amplify' ),
                'footer' => __( 'footer', 'amplify' )
            )
        );

        // custom logo support
        add_theme_support( 'custom-logo' );

        // custom post types
        register_post_type( 'artists',
            array(
                'labels' => array(
                    'name' => __( 'Artists' ),
                    'singular_name' => __( 'Artist' ),
                    'add_new_item' => 'Add New Artist Article',
                    'edit_item' => 'Edit Artist Article',
                    'all_items' => 'All Artists',
                    'view_item' => 'View Artist Article',
                    'search_items' => 'Search Artists',
                    'not_found' => 'No Artists Found',
                    'not_found_in_trash' => 'No Artists Found in Trash'
                ),
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'taxonomies' => array( 'genre' ),
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'artists' ),
                'menu_icon' => 'dashicons-format-audio',
                'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'comments', 'revisions' ),
                'show_in_rest' => true,
                'capability_type' => 'post',
            )
        );

        register_post_type( 'webinars',
            array(
                'labels' => array(
                    'name' => __( 'Webinars' ),
                    'singular_name' => __( 'Webinar' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'webinars' ),
                'menu_icon' => 'dashicons-microphone',
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'show_in_rest' => true,
            )
        );

        // genre taxonomy
        register_taxonomy( 'genre', array( 'artists' ),
            array(
                'hierarchical' => false,
                'show_ui' => true,
                'show_admin_column' => true,
                'label' => 'Genre',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'genre' ),
                'show_in_rest' => true,
                'publicly_queryable' => false
            )
        );
        register_taxonomy_for_object_type( 'genre', 'artists' );

        // post thumbnail support
        add_theme_support( 'post-thumbnails' );

    }
}
add_action( 'init', 'amplify_setup' );

// title tag
function amplify_title_tag() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'amplify_title_tag' );

// hide default post type
function amplify_hide_default_post_type() {
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'amplify_hide_default_post_type' );

function amplify_remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'amplify_remove_default_post_type_menu_bar', 999 );

// custom artist fields
require_once get_template_directory() . '/partials/functions/custom-artist-fields.php';

// custom user fields
require_once get_template_directory() . '/partials/functions/custom-user-fields.php';

// enqueue scripts
function amplify_enqueue_scripts() {
    wp_enqueue_script( 'hamburger-menu', get_template_directory_uri() . '/assets/js/hamburger-menu.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'amplify_enqueue_scripts' );

// functions
function convertDateTimeToHumanReadable( $datetime ) {
    $date = new DateTime( $datetime );
    $now = new DateTime();

    $interval = $now->diff( $date );

    if ( $interval->y >= 1 ) {
        return $interval->y . " year" . ( $interval->y > 1 ? "s" : "" ) . " ago";
    } else if ( $interval->m >= 1 ) {
        return $interval->m . " month" . ( $interval->m > 1 ? "s" : "" ) . " ago";
    } else if ( $interval->d >= 1 ) {
        return $interval->d . " day" . ( $interval->d > 1 ? "s" : "" ) . " ago";
    } else if ( $interval->h >= 1 ) {
        return $interval->h . " hour" . ( $interval->h > 1 ? "s" : "" ) . " ago";
    } else if ( $interval->i >= 1 ) {
        return $interval->i . " minute" . ( $interval->i > 1 ? "s" : "" ) . " ago";
    } else {
        return "Just now";
    }
}