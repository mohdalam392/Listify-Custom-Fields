<?php
/**
 * Plugin Name:Listify Custom Column
 * Plugin URI:http://facebook.com/Alamdeveloper
 * Description:Listify Custom Column
 * Version:1.0.0
 * Author:Mohd Alam
 * Author URI:http://facebook.com/Alamdeveloper
 * Email:mohdalam392@gmail.com
 * License:IPL
 */
?>

<?php



/** Add Meta Information On Listing Single Page **/
function custom_listify_single_job_listing_meta() {
    global $post;
    $post_meta = get_post_meta ( $post->ID, '_Judicial_area', true );    
    if(!empty($post_meta)){
      echo '<br/>Judicial Area: <span class="custom-info" >' . $post_meta . '</span>'; 
    }

    /**
    add_meta_box(
        'abc',
        'Test',
        'sidebar_box_content2',
        'post',
        'advanced',
        'default'
      );
     **/ 
}
add_action( 'listify_single_job_listing_meta', 'custom_listify_single_job_listing_meta', 40 );


/** Adding Fields To Admin And Frontend To Listing Posts **/
add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );
function frontend_add_salary_field( $fields ) {
  $fields['job']['Judicial_area'] = array(
    'label'       => __( 'Judicial Area', 'job_manager' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'Judicial Area',
    'priority'    => 2
  );
  return $fields;
}

add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );
function admin_add_salary_field( $fields ) {
  $fields['_Judicial_area'] = array(
    'label'       => __( 'Judicial Area', 'job_manager' ),
    'type'        => 'text',
    'placeholder' => 'Judicial Area',
    'priority'    => 2,
    'description' => ''
  );
  return $fields;
 } 


/**
add_action( 'job_manager_ajax_get_listings', 'custom_get_listing' );

function custom_get_listing(){
    echo "test is here";
}
**/

/**
add_action( 'submit_job_form_fields', 'custom_submit_job_form_fields' );

function custom_submit_job_form_fields( $fields ) {

    $fields['job']['job_title']['label'] = "Company Name";
    //$fields['job']['job_location']['required'] = true;
    return $fields;

}
**/

?>