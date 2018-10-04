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
		wp_enqueue_style( 'acc-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), time(), 'all' );

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
		wp_enqueue_script( 'accordian_js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array( 'jquery' ), time(), false );
		

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
		
	<div id="accordion">
	  <h3>Section 1</h3>
	  <div>
	    <p>
	    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
	    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
	    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
	    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
	    </p>
	  </div>
	  <h3>Section 2</h3>
	  <div>
	    <p>
	    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
	    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
	    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
	    suscipit faucibus urna.
	    </p>
	  </div>
	  <h3>Section 3</h3>
	  <div>
	    <p>
	    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
	    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
	    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
	    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
	    </p>
	    <ul>
	      <li>List item one</li>
	      <li>List item two</li>
	      <li>List item three</li>
	    </ul>
	  </div>
	  <h3>Section 4</h3>
	  <div>
	    <p>
	    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
	    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
	    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
	    mauris vel est.
	    </p>
	    <p>
	    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
	    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
	    inceptos himenaeos.
	    </p>
	  </div>
	</div>
 
	<?php
	}

}
