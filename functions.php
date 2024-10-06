<?php

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

        // custom post type
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

    }
}
add_action( 'after_setup_theme', 'amplify_setup' );