<?php

// setup
if ( ! function_exists( 'amplify_setup' ) ) {
    function amplify_setup() {
        
        // register menus
        register_nav_menus(
            array(
                'global' => __( 'global', 'lucifer' ),
                'footer' => __( 'footer', 'lucifer' )
            )
        );

        // custom logo support
        add_theme_support( 'custom-logo' );

        // custom post types
        register_post_type( 'artists',
            array(
                'labels' => array(
                    'name' => __( 'Artists' ),
                    'singular_name' => __( 'Artist' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'artists' ),
                'menu_icon' => 'dashicons-format-audio',
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'show_in_rest' => true,
            )
        );

        register_post_type( 'podcasts',
            array(
                'labels' => array(
                    'name' => __( 'Podcasts' ),
                    'singular_name' => __( 'Podcast' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'podcasts' ),
                'menu_icon' => 'dashicons-microphone',
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'show_in_rest' => true,
            )
        );

        // genre taxonomy
        register_taxonomy( 'genre', array( 'artists' ),
            array(
                'hierarchical' => true,
                'label' => 'Genre',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'genre' )
            )
        );

    }
}
add_action( 'after_setup_theme', 'amplify_setup' );

// hide default post type
function amplify_hide_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'amplify_hide_default_post_type' );

function amplify_remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'amplify_remove_default_post_type_menu_bar', 999 );