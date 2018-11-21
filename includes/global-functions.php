

<?php

// require plugin_dir_path( __DIR__ ).'admin/include/class-pmsafe_dealer_area.php';
// require plugin_dir_path( __DIR__ ).'admin/include/class-pmsafe_distributor_area.php';


function pr($post){
    echo '<pre>';
    print_r($post);
    echo '</pre>';
}

function get_meta_by_post_id( $post_id, $meta_key ) {
  global $wpdb;
  $mid = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = %s order by meta_id", $post_id, $meta_key) );
  if( $mid != '' )
    return $mid;
 
  return false;
}


function get_faq_by_mid( $meta_id ) {
  global $wpdb;
  $data = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE meta_id = %d", $meta_id) );
  if( $data != '' )
    return $data;
 
  return false;
}




    