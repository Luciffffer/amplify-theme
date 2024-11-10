<?php
/**
 * Adds 5 custom fields to the user profile
 * 1. Quote
 * 2. Description
 * 3. Fun fact
 * 4. Spotify URL
 * 5. LinkedIn URL
 */

// add fields to user profile
function amplify_custom_user_fields( $user ) {
    echo '<h2>Who is who fields</h2>';
    ?>
    <table class="form-table">
        <tr>
            <th><label for="quote">Quote:</label></th>
            <td>
                <input type="text" name="quote" id="quote" value="<?php echo esc_attr( get_the_author_meta( 'quote', $user->ID ) ) ?>" class="regular-text">
                <p>Share a short but fun quote that you connect with!</p>
            </td>
        </tr>
        <tr>
            <th><label for="whois-description">Description:</label></th>
            <td>
                <textarea rows="5" name="whois-description" id="whois-description" class="regular-text"><?php echo esc_attr( get_the_author_meta( 'whois-description', $user->ID ) ) ?></textarea>
                <p>Describe yourself in a fun manner. Introduce yourself and also briefly cover your roles.</p>
            </td>
        </tr>
        <tr>
            <th><label for="fun-fact">Fun fact:</label></th>
            <td>
                <input type="text" name="fun-fact" id="fun-fact" value="<?php echo esc_attr( get_the_author_meta( 'fun-fact', $user->ID ) ) ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="spotify">Spotify URL:</label></th>
            <td>
                <input type="text" name="spotify" id="spotify" value="<?php echo esc_attr( get_the_author_meta( 'spotify', $user->ID ) ) ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="linkedin">LinkedIn URL:</label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ) ?>" class="regular-text">
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'show_user_profile', 'amplify_custom_user_fields' );
add_action( 'edit_user_profile', 'amplify_custom_user_fields' );


// save fields to user profile
function amplify_save_custom_user_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return;
    }

    update_user_meta( $user_id, 'quote', $_POST['quote'] );
    update_user_meta( $user_id, 'whois-description', $_POST['whois-description'] );
    update_user_meta( $user_id, 'fun-fact', $_POST['fun-fact'] );
    update_user_meta( $user_id, 'spotify', $_POST['spotify'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
}

add_action( 'personal_options_update', 'amplify_save_custom_user_fields' );
add_action( 'edit_user_profile_update', 'amplify_save_custom_user_fields' );