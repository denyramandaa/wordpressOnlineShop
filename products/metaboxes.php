<?php
/**
 * Register meta box(es).
 */
function onphpid_register_meta_boxes()
{
    add_meta_box( 'metabox-price', __( 'Attribut Products', 'semi-toko-online' ), 'onphpid_render_metabox', 'onphpid_products' );
}
 
add_action('add_meta_boxes', 'onphpid_register_meta_boxes');
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function onphpid_render_metabox($post)
{
    wp_nonce_field('onphpid-nonce', "meta-box-nonce");
 
    $sku = get_post_meta($post->ID, "meta-box-sku", true);
    $price = get_post_meta($post->ID, "meta-box-price", true);
    $checked = (get_post_meta($post->ID, "meta-box-best", true)) ? 'checked' : '';
    ?>
    <div>
    <table>
        <tr>
            <td><label for="meta-box-sku">SKU</label></td>
            <td>:</td>
            <td><input name="meta-box-sku" type="text" value="<?php echo $sku; ?>"></td>
        </tr>
        <tr>
            <td><label for="meta-box-price">Price</label></td>
            <td>:</td>
            <td>
                <input name="meta-box-price" type="text" value="<?php echo $price; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="meta-box-best">Best Seller</label></td>
            <td>:</td>
            <td>
                <input name="meta-box-best" type="checkbox" value="best-seller" <?php echo $checked;?>>
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
function onphpid_save_meta_box($post_id)
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
 
    $sku = $_POST['meta-box-sku'];
    $price = $_POST['meta-box-price'];
    $checked = $_POST['meta-box-best'];
 
    update_post_meta($post_id, 'meta-box-sku', $sku);
    update_post_meta($post_id, 'meta-box-price', $price);
    update_post_meta($post_id, 'meta-box-best', $checked);
}
add_action('save_post', 'onphpid_save_meta_box');