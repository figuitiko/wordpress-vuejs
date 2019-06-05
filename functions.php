<?php

function corlate_child_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri(). '/style.css' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri().'/asset/css/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://fonts.googleapis.com/css?family=Gothic+A1|Kaushan+Script|Libre+Baskerville|Lobster' );
//    wp_enqueue_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
//    wp_enqueue_style( 'fa-icons', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay ');




    wp_register_script( 'sticky', get_stylesheet_directory_uri() .'/asset/js/sticky.js', array ( 'jquery' ), '1.1', true);
    wp_enqueue_script( 'sticky' );
    wp_register_script( 'my-contact-form', get_stylesheet_directory_uri()  .'/asset/js/my-contact-form.js', array ( 'vue' ), '1.1', true);
    wp_enqueue_script( 'my-contact-form' );
    wp_register_script( 'tabs', get_stylesheet_directory_uri()  .'/asset/js/tabs.js', array ( 'vue' ), '1.1', true);
    wp_enqueue_script( 'tabs' );
     if (is_front_page()){

         wp_enqueue_style( 'bulma-tabs', get_stylesheet_directory_uri().'/asset/css/bulma.css' );

     }

    if(is_page('contactenos')||is_front_page()){
        wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', [], '2.5.17');
        wp_enqueue_script('axios', 'https://unpkg.com/axios/dist/axios.min.js', [], ' 0.18.0');


    }



}
add_action( 'wp_enqueue_scripts', 'corlate_child_scripts' );


//function add_assets(){
//
//}
//add_action( 'wp_enqueue_scripts', 'add_assets' );
//
//require get_stylesheet_directory() .'/inc/contact_form.php';

//breadcrump

require get_stylesheet_directory() .'/inc/breadcrump.php';

//cpt

require get_stylesheet_directory() .'/inc/cpt.php';


//enpoint
require get_stylesheet_directory() .'/inc/contact_form.php';



// Function to change email address

function wpb_sender_email( $original_email_address ) {
    return 'suwebsite@paginas-web.acygp.com';
}

// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'Frank Freeman';
}

// Hooking up our functions to WordPress filters
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );




