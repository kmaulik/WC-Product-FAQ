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

		?>
		<button type="button" class="btn btn-default" id="add_new_question">Add Question</button>


		<ul id="sortable">
		  <!-- <li class="ui-state-default" id="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
		  <li class="ui-state-default" id="2"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
		  <li class="ui-state-default" id="3"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
		  <li class="ui-state-default" id="4"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li> -->
		</ul>
		<h3><span id = "sortable-9"></span></h3>
		<?php
	}
}
