<?php

/**
 * Adds 1 custom field to the webinar post type
 * 1. Webinar YouTube URL
 */

function amplify_meta_webinar_youtube() {
    add_meta_box( 'amplify_meta_webinar_youtube', 'YouTube URL', 'amplify_meta_webinar_youtube_callback', 'webinars', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'amplify_meta_webinar_youtube' );

function amplify_meta_webinar_youtube_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'amplify_meta_webinar_youtube_nonce' );

    $amplify_meta_webinar_youtube = get_post_meta( $post->ID, 'amplify_meta_webinar_youtube', true );

    echo '<label for="amplify_meta_webinar_youtube">YouTube URL: </label>';
    echo '<input type="text" style="width: 100%;" id="amplify_meta_webinar_youtube" name="amplify_meta_webinar_youtube" value="' . esc_attr( $amplify_meta_webinar_youtube ) . '" />';
}

function amplify_meta_webinar_youtube_save( $post_id ) {
    if ( ! isset( $_POST['amplify_meta_webinar_youtube_nonce'] ) || ! wp_verify_nonce( $_POST['amplify_meta_webinar_youtube_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['amplify_meta_webinar_youtube'] ) ) {
        update_post_meta( $post_id, 'amplify_meta_webinar_youtube', sanitize_text_field( $_POST['amplify_meta_webinar_youtube'] ) );
    }
}

add_action( 'save_post', 'amplify_meta_webinar_youtube_save' );