<?php
/**
 * Adds 2 custom fields to the artist post type
 * 1. Spotify URL
 * 2. References
 */

function amplify_meta_artist_spotify() {
    add_meta_box( 'amplify_meta_artist_spotify', 'Spotify URL', 'amplify_meta_artist_spotify_callback', 'artists', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'amplify_meta_artist_spotify' );

function amplify_meta_references() {
    add_meta_box( 'amplify_meta_references', 'References', 'amplify_meta_references_callback', 'artists', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'amplify_meta_references' );

function amplify_meta_artist_spotify_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'amplify_meta_artist_spotify_nonce' );

    $amplify_meta_artist_spotify = get_post_meta( $post->ID, 'amplify_meta_artist_spotify', true );

    echo '<label for="amplify_meta_artist_spotify">Spotify Artist URL: </label>';
    echo '<input type="text" style="width: 100%;" id="amplify_meta_artist_spotify" name="amplify_meta_artist_spotify" value="' . esc_attr( $amplify_meta_artist_spotify ) . '" />';
}

function amplify_meta_references_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'amplify_meta_references_nonce' );

    $amplify_meta_references = get_post_meta( $post->ID, 'amplify_meta_references', true );
    $references = !empty( $amplify_meta_references ) ? $amplify_meta_references : array('');

    echo '<div id="reference-parent">';
    foreach ($references as $index => $reference) {
        echo '<div class="reference-container" id="reference-container-'. ($index+1) .'">';
        echo '<label for="amplify_meta_reference_'. ($index+1) .'">Reference '. ($index+1) .': </label>';
        echo '<textarea class="reference" id="amplify_meta_reference_'. ($index+1) .'" name="amplify_meta_references[]">' . esc_attr( $reference ) . '</textarea>';
        echo '<button type="button" class="remove-reference">Remove Reference</button>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" id="add-reference">Add Reference</button>';
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

function amplify_meta_references_save( $post_id ) {
    if ( ! isset( $_POST['amplify_meta_references_nonce'] ) || ! wp_verify_nonce( $_POST['amplify_meta_references_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['amplify_meta_references'] ) ) {
        $references = array_map('sanitize_text_field', $_POST['amplify_meta_references']);
        update_post_meta( $post_id, 'amplify_meta_references', $references );
    }
}
add_action( 'save_post', 'amplify_meta_references_save' );

function amplify_enqueue_meta_box_scripts($hook) {
    if ($hook == 'post.php' || $hook == 'post-new.php') {
        wp_enqueue_script('amplify-meta-box', get_template_directory_uri() . '/assets/js/reference-meta-box.js', array(), null, true);
    }
}
add_action('admin_enqueue_scripts', 'amplify_enqueue_meta_box_scripts');