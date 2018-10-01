<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       ka.net
 * @since      1.0.0
 *
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/public
 * @author     ka <ka@narola.email>
 */
class Wc_Product_Faq_Master_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-product-faq-master-public.css', array(), time(), 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-product-faq-master-public.js', array( 'jquery' ), time(), false );
		wp_enqueue_script( 'accordian_js', plugin_dir_url( __FILE__ ) . 'js/zebra_accordion.min.js', array( 'jquery' ), time(), false );
		

	}


	public function product_faqs_tab( $tabs ) {
		$tabs['my_custom_tab'] = array(
			'title'    => __( 'FAQs', 'textdomain' ),
			'callback' => array( $this, 'product_faqs_tab_content' ),
			'priority' => 50,
		);
		return $tabs;
	}

	public function product_faqs_tab_content( $slug, $tab ) {
	?>
		
	<div class="accordion">
	    <div class="accordion-header">Et quasi architecto</div>
	    <div class="accordion-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</div>

	    <div class="accordion-header">Nemo enim ipsam</div>
	    <div class="accordion-content">Et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</div>

	    <div class="accordion-header">Sed ut perspiciatis</div>
	    <div class="accordion-content">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</div>
	</div>
	<?php
	}

}
