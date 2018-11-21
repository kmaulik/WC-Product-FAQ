<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       ka.net
 * @since      1.0.0
 *
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/admin
 * @author     ka <ka@narola.email>
 */
class Wc_Product_Faq_Master_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_filter( 'woocommerce_product_data_panels', array($this, 'faq_options_product_tab_content') );


	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Product_Faq_Master_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Product_Faq_Master_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-product-faq-master-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'icon-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), time(), 'all' );
	    wp_enqueue_style( 'jquery-modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', array(), time(), 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Product_Faq_Master_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Product_Faq_Master_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-product-faq-master-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'sortable_ accordion', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery-modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array( 'jquery' ), time(), false );
		wp_localize_script( $this->plugin_name, 'faqAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	}

	public function product_faqs_admin_tab( $default_tabs ) {
	    $default_tabs['custom_tab'] = array(
	        'label'   =>  __( 'FAQs', 'domain' ),
	        'target'  =>   'wk_custom_tab_data' ,
	        'priority' => 60,
	        'class'   => array()
	    );
	    return $default_tabs;
	}
	
	public function faq_options_product_tab_content() {
		
		?> <div id="wk_custom_tab_data" class="panel woocommerce_options_panel">
			<form class="form-horizontal press_agencies_form" method="post">
			<div class="row">
	        <div class="form-group col-md-12">
	            <button type="button" class="btn btn-default" id="add_new_question">Add new Question</button>
		            <div id="TextBoxesGroup">
		            <?php $counter = 1;?>
		            </div>
	        		</div>
	    		</div>
			</form>
		</div>
		<?php
	}

	public function faq_meta_box() {
    	add_meta_box( 'faq-meta-box', esc_html__( 'Woo FAQ', 'text-domain' ), array($this,'faq_callback'), 'product', 'normal', 'high' );
	}
	
	public function faq_callback(){
		
		include plugin_dir_path( __FILE__ ).'\partials\wc-product-faq-master-metaview-display.php';
	}

	public function add_product_faq_form_function(){
		$product_id = $_POST['product_id'];
		$faq_title = $_POST['title'];
		$faq_description = $_POST['description'];

			$product_faq = array();
			$product_faq = array(
				'faq_title' => $faq_title,
				'faq_description' => $faq_description,
			);
			add_post_meta($product_id,'_wc_product_faq',$product_faq);	
		
		$response = array('status' => true);
		echo json_encode($response);
		die;
	}

	public function delete_product_faq_form_function(){
		global $wpdb;
		$meta_id = $_POST['id'];
		
	    $postmeta = $wpdb->prefix . 'postmeta';
	    $wpdb->delete( $postmeta, array( 'meta_id' => $_POST['id'] ) );
		
	    
		$response = array('status' => true);
		echo json_encode($response);

		die;
	}

	public function edit_product_faq_form_function(){
		global $wpdb;
		$meta_id = $_POST['id'];
		$meta_data = get_faq_by_mid($meta_id);
		// pr($meta_data);
		foreach ($meta_data as $key => $value) {
			$meta_value = unserialize($value->meta_value);
			$faq_title = $meta_value['faq_title'];
			$faq_description = $meta_value['faq_description'];

		}
		 
		$response = array('status' => true, 'faq_title' => $faq_title, 'faq_description' => $faq_description);
		echo json_encode($response);

		die;
	}

	public function get_product_faq_records_function(){
    	$product_id = $_POST['product_id'];
    	

 		$get_faq = get_meta_by_post_id($product_id,'_wc_product_faq');

 		$counter = 1;
		foreach ($get_faq as $key => $value) {
			$meta_id = $value->meta_id;
			$faqs = unserialize($value->meta_value);

		?>
		  <li class="ui-state-default" id="<?php echo $counter;?>" data-index="<?php echo $meta_id;?>" data-position="<?php echo $faqs['faq_position']; ?>"><?php echo $faqs['faq_title']; ?><i class="fa fa-trash" data-id="<?php echo $meta_id;?>" id="remove_data"></i><i class="fa fa-edit" data-id="<?php echo $meta_id;?>" id="edit_data"></i></li>
		<?php
			$counter++;
		}
		die;
 	
	}

	public function  faq_loader(){
	    echo '<div class="faq-loader" style="display:none">';
	        echo '<div class="faq-load-image"><img src="'.plugin_dir_url( __FILE__ ).'images/ajax-loader.gif" alt=""></div>';
	        echo '<div class="faq-black-overlay"></div>';
	    echo '</div>';
	}

	public function save_new_position_function(){
		pr($_POST['positions']);
		if(isset($_POST['update'])){
			foreach ($_POST['positions'] as $position) {
				$index = $position[0];

				$newPosition = $position[1];
				$meta_data = get_faq_by_mid($index);
				
				foreach ($meta_data as $key => $value) {
					$meta_id = $value->meta_id;
					$faqs = unserialize($value->meta_value);
					$faqs['faq_position'] = $newPosition;
					update_meta( $index, '_wc_product_faq', $faqs );
					// global $wpdb;
  			// 		$data = $wpdb->query( $wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %s WHERE meta_id = %d", $index, $faqs) );
  					
				}
				


			}

		}	

		die;
	}


}
