<?php
function dwwp_register_post_type() {

    $singular = __( 'Suscriber' );
    $plural = __( 'Suscribers' );
    //Used for the rewrite slug below.
    $plural_slug = str_replace( ' ', '_', $plural );

    //Setup all the labels to accurately reflect this post type.
    $labels = array(
        'name' 					=> $plural,
        'singular_name' 		=> $singular,
        'add_new' 				=> 'Add New',
        'add_new_item' 			=> 'Add New ' . $singular,
        'edit'		        	=> 'Edit',
        'edit_item'	        	=> 'Edit ' . $singular,
        'new_item'	        	=> 'New ' . $singular,
        'view' 					=> 'View ' . $singular,
        'view_item' 			=> 'View ' . $singular,
        'search_term'   		=> 'Search ' . $plural,
        'parent' 				=> 'Parent ' . $singular,
        'not_found' 			=> 'No ' . $plural .' found',
        'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
    );

    //Define all the arguments for this post type.
    $args = array(
        'labels' 			  => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-admin-site',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        // 'capabilities' => array(),
        'rewrite'             => array(
            'slug' => strtolower( $plural_slug ),
            'with_front' => true,
            'pages' => true,
            'feeds' => false,

        ),
        'supports'            => array(
            'title'
        )
    );

    //Create the post type using the above two varaiables.
    register_post_type( 'suscriber', $args);
}
add_action( 'init', 'dwwp_register_post_type' );

//---------------------------------------------------------------------------------------------------------------

function dwwp_add_custom_metabox() {

    add_meta_box(
        'dwwp_meta',
        __( 'Job Listing' ),
        'dwwp_meta_callback',
        'suscriber',
        'normal',
        'core'
    );

}

add_action( 'add_meta_boxes', 'dwwp_add_custom_metabox' );


function dwwp_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'dwwp_jobs_nonce' );
    $dwwp_stored_meta = get_post_meta( $post->ID ); ?>

    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="username" class="dwwp-row-title"><?php _e( 'Name', 'wp-job-listing' ); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" class="widget_text" name="username" id="username"
                       value="<?php if ( ! empty ( $dwwp_stored_meta['username'] ) ) {
                           echo esc_attr( $dwwp_stored_meta['username'][0] );
                       } ?>"/>
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="email" class="widget_text" ><?php _e( 'email', 'wp-job-listing' ); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" size=10 name="email" id="email" value="<?php if ( ! empty ( $dwwp_stored_meta['email'] ) ) echo esc_attr( $dwwp_stored_meta['email'][0] ); ?>"/>
            </div>
        </div>

    <div class="meta-row">
        <div class="meta-th">
            <label for="preferred-requirements" class="dwwp-row-title"><?php _e( 'Mensaje', 'wp-job-listing' ) ?></label>
        </div>
        <div class="meta-td">
	          <textarea name="contact_message" id="contact_message"><?php
                  if ( ! empty ( $dwwp_stored_meta['contact_message'] ) ) {
                      echo esc_attr( $dwwp_stored_meta['contact_message'][0] );
                  }
                  ?>
	          </textarea>
        </div>
    </div>




    <?php
}

function dwwp_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'dwwp_jobs_nonce' ] ) && wp_verify_nonce( $_POST[ 'dwwp_jobs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'username' ] ) ) {
        update_post_meta( $post_id, 'username', sanitize_text_field( $_POST[ 'username' ] ) );
    }
    if ( isset( $_POST[ 'email' ] ) ) {
        update_post_meta( $post_id, 'email', sanitize_text_field( $_POST[ 'email' ] ) );
    }
    if ( isset( $_POST[ 'contact_message' ] ) ) {
        update_post_meta( $post_id, 'contact_message', sanitize_text_field( $_POST[ 'contact_message' ] ) );
    }

}
add_action( 'save_post', 'dwwp_meta_save' );
