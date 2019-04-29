<?php
/**
 * Register meta box(es).
 */
function films_register_meta_boxes()
{
    add_meta_box( 'metabox-price', __( 'Attribut Products', 'semi-toko-online' ), 'onphpid_render_metabox_films', 'onphpid_films' );
}
 
add_action('add_meta_boxes', 'films_register_meta_boxes');
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */

function onphpid_render_metabox_films($post)
{
    wp_nonce_field('onphpid-nonce', "meta-box-nonce");
 
    $duration = get_post_meta($post->ID, "meta-box-duration", true);
    $price_films = get_post_meta($post->ID, "meta-box-price_films", true);
    $recommend = (get_post_meta($post->ID, "meta-box-recommend", true)) ? 'checked' : '';
    ?>
    <div>
    <table>
        <tr>
            <td><label for="meta-box-duration">Duration</label></td>
            <td>:</td>
            <td><input name="meta-box-duration" type="text" value="<?php echo $duration; ?>"></td>
        </tr>
        <tr>
            <td><label for="meta-box-price_films">Price</label></td>
            <td>:</td>
            <td>
                <input name="meta-box-price_films" type="text" value="<?php echo $price_films; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="meta-box-recommend">Recommended</label></td>
            <td>:</td>
            <td>
                <input name="meta-box-recommend" type="checkbox" value="recommend" <?php echo $recommend;?>>
            </td>
        </tr>
    </table>
    
    </div>
 
    <?php
 
}
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function films_save_meta_box($post_id)
{
    // Save logic goes here. Don't forget to include nonce checks!
     if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], 'onphpid-nonce')) {
     	 return $post_id;
     }
     if (!current_user_can("edit_post", $post_id)) {
        return $post_id;
     }
 
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }
 
    $duration = $_POST['meta-box-duration'];
    $price_films = $_POST['meta-box-price_films'];
    $recommend = $_POST['meta-box-recommend'];
 
    update_post_meta($post_id, 'meta-box-duration', $duration);
    update_post_meta($post_id, 'meta-box-price_films', $price_films);
    update_post_meta($post_id, 'meta-box-recommend', $recommend);
}
add_action('save_post', 'films_save_meta_box');