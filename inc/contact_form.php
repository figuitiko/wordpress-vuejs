<?php
add_action( 'rest_api_init', 'wp_api_add_posts_endpoints' );
function wp_api_add_posts_endpoints() {
    register_rest_route( 'send-contact-form/v1', '/contact/', array(
        'methods' => 'POST',
        'callback' => 'addPosts_callback',
    ));
}

function addPosts_callback( $request_data ) {
    global $wpdb;
    $data = array();
    $table        = 'wp_posts';

    // Fetching values from API
    $parameters = $request_data->get_params();
    $user_id = $parameters['email'];
    $post_type = 'suscriber';


    // custom meta values
    $post_user=sanitize_text_field($parameters['username']);

    $post_email = sanitize_email($parameters['email']['value']);

    $post_msg= sanitize_textarea_field($parameters['message']['text']);

    $errors=[];




    if(empty($post_user)){
        $errors[]="name is requiere";
    }
    if(empty($post_email)||!filter_var( $post_email, FILTER_VALIDATE_EMAIL  )){
        $errors[]="email is requiere";
    }
    if(empty($post_msg)){
        $errors[]="MSG  is requiere";
    }

    $post_title =$post_user ;



    if($post_type!='' && $post_title!=''){

        // Create post object
        $my_post = array(

            'post_title' => wp_strip_all_tags( $post_title),
            'post_type' => $post_type,
            'post_status'=> 'publish',

        );
        $new_post_id = wp_insert_post( $my_post );


        // Set post categories


        // Set Custom Metabox
        if ($post_type != 'post') {
            update_post_meta($new_post_id, 'username', $post_user);
            update_post_meta($new_post_id, 'email', $post_email);
            update_post_meta($new_post_id, 'contact_message', $post_msg);
        }
        wp_mail($post_email, 'acygp-desarrollo-web','gracias '.$post_user.' estar en contacto, le haremos  saber una respuesta lo mas pronto posible');
        wp_mail('suwebsite@paginas-web.acygp.com', 'acygp-desarrollo-web','destinatario ---\n'.$post_email.'------usuario----\n'.$post_user.'-----\n'.$post_msg);



    }else{
        return ($data['status']=$errors);
    }

    return $data['status']=true;
}
function isNotRegisterMail($value){
    $suscribers = get_posts(
        array(
            'post_type'      =>  'suscriber',
            'posts_per_page'  =>  -1
        ));

       $my_emails=[];
    if (is_array($suscribers)) {
        foreach ( $suscribers as $suscriber) {
            $currentVal = get_field('email', $suscriber->ID);

            $my_emails[]=$currentVal;
        }

    }
    if(is_array($my_emails)){
        foreach ($my_emails as $my_email){
            if($value== $my_email){
                return true;
            }
            else{
                return false;
            }
        }
    }


}