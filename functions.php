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
                'rewrite' => array( 'slug' => 'artist' ),
                'menu_icon' => 'dashicons-format-audio',
                'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'comments', 'revisions' ),
                'show_in_rest' => true,
                'capability_type' => 'post',
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
                'hierarchical' => false,
                'show_ui' => true,
                'show_admin_column' => true,
                'label' => 'Genre',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'genre' ),
                'show_in_rest' => true,
            )
        );
        register_taxonomy_for_object_type( 'genre', 'artists' );

        // post thumbnail support
        add_theme_support( 'post-thumbnails' );

    }
}
add_action( 'init', 'amplify_setup' );


// hide default post type
function amplify_hide_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'amplify_hide_default_post_type' );

function amplify_remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'amplify_remove_default_post_type_menu_bar', 999 );


// enqueue scripts
function amplify_enqueue_scripts() {
    wp_enqueue_script( 'hamburger-menu', get_template_directory_uri() . '/assets/js/hamburger-menu.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'amplify_enqueue_scripts' );


// add custom field
function amplify_meta_artist_spotify() {
    add_meta_box( 'amplify_meta_artist_spotify', 'Spotify URL', 'amplify_meta_artist_spotify_callback', 'artists', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'amplify_meta_artist_spotify' );

function amplify_meta_artist_spotify_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'amplify_meta_artist_spotify_nonce' );

    $amplify_meta_artist_spotify = get_post_meta( $post->ID, 'amplify_meta_artist_spotify', true );

    echo '<label for="amplify_meta_artist_spotify">Spotify Artist URL: </label>';
    echo '<input type="text" id="amplify_meta_artist_spotify" name="amplify_meta_artist_spotify" value="' . esc_attr( $amplify_meta_artist_spotify ) . '" />';
}

function amplify_meta_artist_spotify_save( $post_id ) {
    if ( ! isset( $_POST['amplify_meta_artist_spotify_nonce'] ) || ! wp_verify_nonce( $_POST['amplify_meta_artist_spotify_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['amplify_meta_artist_spotify'] ) ) {
        update_post_meta( $post_id, 'amplify_meta_artist_spotify', sanitize_text_field( $_POST['amplify_meta_artist_spotify'] ) );
    }
}
add_action( 'save_post', 'amplify_meta_artist_spotify_save' );


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