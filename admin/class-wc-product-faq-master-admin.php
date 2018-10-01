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

		add_action( 'woocommerce_product_data_panels', array($this,'product_faqs_tab_content_data' ));


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
	
	public function product_faqs_tab_content_data() {
		$html  = '';
		$html .= '<div id="wk_custom_tab_data" class="panel woocommerce_options_panel">';
		$html .= '<div id="ques_divgroup">';
			$html .= '<div id="ques_div1">';
				$html .= '<h3>Contact Information:</h3>';
				$html .= '<div class="nisl-wrap">';
				    $html .= '<label><strong>Add Question:</strong></label>';
			    $html .= '<input type="text" id="pmsafe_dealer_contact_fname1" name="pmsafe_dealer_contact_fname[]" value="" class="widefat" />';
			    $html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		$html .= '<a href="#" id="add_new_question">Add Question</a>';
		$html .= '</div>';

		echo $html;
	}

}
