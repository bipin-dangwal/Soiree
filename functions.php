<?php

function enqueue_styles() {
  wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  
  wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );


function enqueue_javascripts(){
wp_enqueue_script( 'bootstrap-js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), false, false );
wp_enqueue_script( 'jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('jquery'), false, false );
wp_enqueue_script( 'ajquery-js','https://code.jquery.com/jquery-3.2.1.min.js', array('jquery'), false, false );
wp_enqueue_script( 'main-js', get_template_directory_uri() . '/main.js', array('jquery'), false, false );

}

add_action( 'wp_enqueue_scripts', 'enqueue_javascripts' );



function event_init() {
    // set up product labels
    $labels = array(
        'name' => 'events',
        'singular_name' => 'Product',
        'add_new' => 'Add New  Event',
        'add_new_item' => 'Add New Event Name',
        'edit_item' => 'Edit Events',
        'new_item' => 'New Product',
        'all_items' => 'All Events',
        'not_found' =>  'No Event Found',
        'not_found_in_trash' => 'No event found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Events',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        // 'rewrite' => array('slug' => 'events'),
        'query_var' => true,
        // 'menu_icon' => 'dashicons-products',
        'supports' => array(
            'title',
            'editor',
            // 'custom-fields',
        )

    );
    register_post_type( 'events', $args );
   flush_rewrite_rules( false );

}
add_action( 'init', 'event_init' );

function guest_init() {
    // set up product labels
    $labels = array(
        'name' => 'Guest Management',
        'singular_name' => 'Guest',
        'add_new' => 'Add New  Guest',
        'add_new_item' => 'Add New guest Name',
        'edit_item' => 'Edit guest',
        'new_item' => 'New guest',
        'all_items' => 'All guest',
        'not_found' =>  'No guest Found',
        'not_found_in_trash' => 'No guest found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'guest',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        // 'rewrite' => array('slug' => 'guest'),
        'query_var' => true,
        // 'menu_icon' => 'dashicons-products',
        'supports' => array(
            'title',


            
        )

    );
    register_post_type( 'guest', $args );
   flush_rewrite_rules( false );

}
add_action( 'init', 'guest_init' );


function request_guest_init() {
    // set up product labels
    $labels = array(
        'name' => 'request_guest Management',
        'singular_name' => 'request_guest',
        'edit_item' => 'Edit request_guest',
        'all_items' => 'All request_guest',
        'not_found' =>  'No request_guest Found',
        'not_found_in_trash' => 'No request_guest found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'request guest',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        // 'rewrite' => array('slug' => 'request_guest'),
        'query_var' => true,
        // 'menu_icon' => 'dashicons-products',
        'supports' => array(
            'title',
                    )

    );
    register_post_type( 'request_guest', $args );
   flush_rewrite_rules( false );

}
add_action( 'init', 'request_guest_init' );

function event_details_meta_box(){
    add_meta_box( 'eventdetails', 'Event details', 'evendetailscallback', 'events', 'side', 'high' );
    // add_meta_box( 'dateid', 'eventdate', 'eventdate', 'events', 'normal', 'low' );
    // add_meta_box( 'venueid', 'eventvenue', 'eventvenue', 'events', 'normal', 'low' );

}

add_action( 'add_meta_boxes', 'event_details_meta_box' );


function evendetailscallback( $post){
    
    wp_nonce_field( basename( __FILE__ ), 'dwwp_events_nonce' );
    $Event_stored_meta = get_post_meta( $post->ID ); ?>

    <label for="event_theme_text">Theme</label>
    <input type="text" name="event_theme_text" id="eventtheme"                  
    value="<?php if ( ! empty ( $Event_stored_meta['Event Theme'] ) ) {
                    echo esc_attr( $Event_stored_meta['Event Theme'][0] );
                } ?>"  /><br><br>
    <label for="event_date_text">Date</label>&nbsp&nbsp
    <input type="date" name="event_date_text" id="eventdate" value="<?php if ( ! empty ( $Event_stored_meta['Event date'] ) ) {
                    echo esc_attr( $Event_stored_meta['Event date'][0] );
                } ?>" /><br><br>
    <label for="event_venue_text">Venue</label>
    <input type="text" name="event_venue_text" id="venue" value="<?php if ( ! empty ( $Event_stored_meta['Event Menu'] ) ) {
                    echo esc_attr( $Event_stored_meta['Event Menu'][0] );
                } ?>" /><br><br>
    <?php    
}

function Events_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'dwwp_events_nonce' ] ) && wp_verify_nonce( $_POST[ 'dwwp_events_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'event_theme_text' ] ) ) {
        update_post_meta( $post_id, 'Event Theme', sanitize_text_field( $_POST[ 'event_theme_text' ] ) );
    }
     if ( isset( $_POST[ 'event_date_text' ] ) ) {
        update_post_meta( $post_id, 'Event date', sanitize_text_field( $_POST[ 'event_date_text' ] ) );
    }
     if ( isset( $_POST[ 'event_venue_text' ] ) ) {
        update_post_meta( $post_id, 'Event Menu', sanitize_text_field( $_POST[ 'event_venue_text' ] ) );
    }
     global $wpdb;  


      $the_posts = get_posts(array('post_type' => 'guest'));

      foreach ($the_posts as $the) {

       $mylink = $wpdb->get_row( "SELECT * FROM event_guest_list WHERE guest_id=$the->ID AND event_id= $post_id" );
        if($mylink->guest_id!=$the->ID||($mylink->event_id!=$post_id))
       { $wpdb->insert( 'event_guest_list', array(
    'event_id' => $post_id   ,
    'guest_id' => $the->ID,
    'status' => 'pending'
) ); }
      }


}
    add_action( 'save_post', 'Events_meta_save' );





function requesting_guest_name_meta_box(){
    add_meta_box( 'requeste_name', 'Name', 'requesting_guests_Name_callback', 'request_guest', 'normal', 'high' );
  

}

add_action( 'add_meta_boxes', 'requesting_guest_name_meta_box' );

function requesting_guests_Name_callback( $post){

     wp_nonce_field( basename( __FILE__ ), 'requesting_guest_nonce' );
    $requesting_guest_meta = get_post_meta( $post->ID ); ?>
<form>
    <label for="requesting_guest_text">Name</label>
    <input type="text" name="requesting_guest_text" id="requesting_guest_text"                  
    value="<?php if ( ! empty ( $requesting_guest_meta['requesting_guest_name'] ) ) {
                    echo esc_attr( $requesting_guest_meta['requesting_guest_name'][0] );
                } ?>"  /><br><br>
    <label for="requesting_guest_Email_text">Email</label>&nbsp&nbsp
    <input type="text" name="requesting_guest_Email_text" id="requesting_guest_Email_text" value="<?php if ( ! empty ( $requesting_guest_meta['requesting_guest_email'] ) ) {
                    echo esc_attr( $requesting_guest_meta['requesting_guest_email'][0] );
                } ?>" /><br><br>
    <label for="requesting_guest_Mobile_text">Mobile No</label>
    <input type="text" name="requesting_guest_Mobile_text" id="requesting_guest_Mobile_text" value="<?php if ( ! empty ( $requesting_guest_meta['requesting_guest_no'] ) ) {
                    echo esc_attr( $requesting_guest_meta['requesting_guest_no'][0] );
                } ?>" /><br><br>
   <div class="form-group">
                  <label for="request_gender" class="col-sm-2 control-label">Gender</label>
                  <label class="custom-control custom-radio">
                      <input name="request_gender" value="Male" type="radio" class="custom-control-input" required>
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Male</span>&nbsp&nbsp&nbsp
                  </label>
                  <label class="custom-control custom-radio">
                      <input name="request_gender" value="Female" type="radio" class="custom-control-input" required>
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Female</span>
                  </label>
    </div>
    <button type="submit" class="btn btn-primary" id="accept_request" name="accept_request" value="accept_request"> Accept</button>
    </form>


    <?php    
  
     
}

function accept_reject($post_id){
    if(isset($_POST['accept_request'])){

        set_post_type( $post_id, 'guest' );
    
    update_post_meta( $post_id, 'save_guest_name', sanitize_text_field( $_POST[ 'requesting_guest_text' ] ) );
    update_post_meta( $post_id, 'save_guest_email', sanitize_text_field( $_POST[ 'requesting_guest_Email_text' ] ) );
    update_post_meta( $post_id, 'save_guest_no', sanitize_text_field( $_POST[ 'requesting_guest_Mobile_text' ] ) );
    update_post_meta( $post_id, 'save_guest_gender', sanitize_text_field( $_POST[ 'request_gender' ] ) );

    }
    // else{
    //    echo "error"; 
    // }

}

add_action('save_post', 'accept_reject' );



function Requesting_guest_meta_change( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'requesting_guest_nonce' ] ) && wp_verify_nonce( $_POST[ 'requesting_guest_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'requesting_guest_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_name', sanitize_text_field( $_POST[ 'requesting_guest_text' ] ) );
    }
     if ( isset( $_POST[ 'requesting_guest_Email_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_email', sanitize_text_field( $_POST[ 'requesting_guest_Email_text' ] ) );
    }
     if ( isset( $_POST[ 'requesting_guest_Mobile_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_no', sanitize_text_field( $_POST[ 'requesting_guest_Mobile_text' ] ) );
    }
    if ( isset( $_POST[ 'request_gender' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_gender', sanitize_text_field( $_POST[ 'request_gender' ] ) );
    }
}
    add_action( 'save_post', 'Requesting_guest_meta_change' );





function Requesting_guest_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'requesting_guest_nonce' ] ) && wp_verify_nonce( $_POST[ 'requesting_guest_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'requesting_guest_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_name', sanitize_text_field( $_POST[ 'requesting_guest_text' ] ) );
    }
     if ( isset( $_POST[ 'requesting_guest_Email_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_email', sanitize_text_field( $_POST[ 'requesting_guest_Email_text' ] ) );
    }
     if ( isset( $_POST[ 'requesting_guest_Mobile_text' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_no', sanitize_text_field( $_POST[ 'requesting_guest_Mobile_text' ] ) );
    }
    if ( isset( $_POST[ 'request_gender' ] ) ) {
        update_post_meta( $post_id, 'requesting_guest_gender', sanitize_text_field( $_POST[ 'request_gender' ] ) );
    }
}
    add_action( 'save_post', 'Requesting_guest_meta_save' );





function save_guest_name_meta_box(){
    add_meta_box( 'save_name', 'Name', 'saveguest_callback', 'guest', 'normal', 'high' );
  

}

add_action( 'add_meta_boxes', 'save_guest_name_meta_box' );

function saveguest_callback( $post){

     wp_nonce_field( basename( __FILE__ ), 'save_guest_nonce' );
    $save_guest_meta = get_post_meta( $post->ID ); ?>
<form>
    <label for="save_guest_text">Name</label>
    <input type="text" name="save_guest_text" id="save_guest"                  
    value="<?php if ( ! empty ( $save_guest_meta['save_guest_name'] ) ) {
                    echo esc_attr( $save_guest_meta['save_guest_name'][0] );
                } ?>"  /><br><br>
    <label for="save_guest_Email_text">Email</label>&nbsp&nbsp
    <input type="text" name="save_guest_Email_text" id="save_guest_Email_text" value="<?php if ( ! empty ( $save_guest_meta['save_guest_email'] ) ) {
                    echo esc_attr( $save_guest_meta['save_guest_email'][0] );
                } ?>" /><br><br>
    <label for="save_guest_Mobile_text">Mobile No</label>
    <input type="text" name="save_guest_Mobile_text" id="save_guest_Mobile_text" value="<?php if ( ! empty ( $save_guest_meta['save_guest_no'] ) ) {
                    echo esc_attr( $save_guest_meta['save_guest_no'][0] );
                } ?>" /><br><br>
   <div class="form-group">
                  <label for="request_gender" class="col-sm-2 control-label">Gender</label>
                  <label class="custom-control custom-radio">
                      <input name="request_gender" value="Male" type="radio" class="custom-control-input" required>
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Male</span>&nbsp&nbsp&nbsp
                  </label>
                  <label class="custom-control custom-radio">
                      <input name="request_gender" value="Female" type="radio" class="custom-control-input" required>
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Female</span>
                  </label>
    </div>
    
    

    </form>

    
    <?php    
  
     
}


function save_guest_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'save_guest_nonce' ] ) && wp_verify_nonce( $_POST[ 'save_guest_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'save_guest_text' ] ) ) {
        update_post_meta( $post_id, 'save_guest_name', sanitize_text_field( $_POST[ 'save_guest_text' ] ) );
    }
     if ( isset( $_POST[ 'save_guest_Email_text' ] ) ) {
        update_post_meta( $post_id, 'save_guest_email', sanitize_text_field( $_POST[ 'save_guest_Email_text' ] ) );
    }
     if ( isset( $_POST[ 'save_guest_Mobile_text' ] ) ) {
        update_post_meta( $post_id, 'save_guest_no', sanitize_text_field( $_POST[ 'save_guest_Mobile_text' ] ) );
    }
    if ( isset( $_POST[ 'request_gender' ] ) ) {
        update_post_meta( $post_id, 'save_guest_gender', sanitize_text_field( $_POST[ 'request_gender' ] ) );
    }
}
    add_action( 'save_post', 'save_guest_meta_save' );

















function form_submit(){
  
  
     $inputname = $_POST['inputname']; 
     $phonenumber =$_POST['phonenumber'];
     $inputemail=$_POST['inputEmail'];
     $guest_gender= $_POST['request_gender'];
     
    
$post_id = wp_insert_post(array (
   'post_type' => 'request_guest',
   'post_title' => $inputname,
   'meta_input' => array(
    'requesting_guest_name' => $inputname,
    'requesting_guest_email' => $inputemail,
    'requesting_guest_no' => $phonenumber,
    'requesting_guest_gender' => $guest_gender,
    
)
   ));


    echo'<div class="alert alert-info" role="alert">"Thankyou <b>' .$inputname. '</b> your request is under process, we will get back to you in a while."</div>';

                    wp_die();
    
}
add_action('wp_ajax_form_submit', 'form_submit');
add_action('wp_ajax_nopriv_form_submit', 'form_submit');



function event_guestlist_page(){
    add_menu_page( 'event_guest', 'Guestlist', 'read', 'event_guests','event_guest_list');
}

add_action('admin_menu', 'event_guestlist_page');

function event_guest_list(){

    include 'event_guest_ui.php';
}


// function mynewproduct($post){
   
// global $wpdb;  


//       $the_posts = get_posts(array('post_type' => 'guest'));

//       foreach ($the_posts as $the) {

//        $mylink = $wpdb->get_row( "SELECT * FROM event_guest_list WHERE guest_id=$the->ID AND event_id=$post" );
//         if($mylink->guest_id!=$the->ID||($mylink->event_id!=$post))
//        { $wpdb->insert( 'event_guest_list', array(
//     'event_id' => $post   ,
//     'guest_id' => $the->ID,
//     'status' => 'pending'
// ) ); }
//       }

// }
// add_action( 'save_post_events', 'mynewproduct' );




















?>
