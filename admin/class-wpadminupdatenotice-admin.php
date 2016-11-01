<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.openstream.ch
 * @since      1.0.0
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/admin
 * @author     Sandro Lucifora <sandro@openstream.ch>
 */
class Wpadminupdatenotice_Admin {

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
     * Holds the values to be used in the fields callbacks
	 *
	 * @since    1.0.0
	 * @access   private
     */
    private $options;
	
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
		
		$this->options = get_option( 'wpaun' );
	}

    /**
     * Add admin menu action
     *
     * @access public
     * @return void
     */
    public function addMenu() {
    	add_action('admin_menu', array($this, 'admin_menu_config'));
    	add_action('admin_init', array($this, 'admin_page_init'));
    }

    /**
     * Add admin menu page
     *
     * @access public
     * @return void
     */
    public function admin_menu_config() {
        add_options_page(__('WP Admin Update Notice', 'wpadminupdatenotice'), __('WP AUN Settings', 'wpadminupdatenotice'), 'administrator', 'wpaun-admin', array( $this, 'load_admin_page_content' ));
    }
	// Load the plugin admin page partial.
	public function load_admin_page_content() {
	    require_once plugin_dir_path( __FILE__ ). 'partials/wpadminupdatenotice-admin-display.php';
	}


    /**
     * Register and add settings
     */
    public function admin_page_init()
    { 
        register_setting(
            'wpaun-admin', // Option group
            'wpaun', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'wpaun_email', // ID
            __('Success Message', 'wpadminupdatenotice'), // Title
            array( $this, 'print_success_info' ), // Callback
            'wpaun-admin' // Page
        );  

        add_settings_field(
            'email_subject_success', // ID
            __('Email Subject', 'wpadminupdatenotice'), // Title 
            array( $this, 'email_subject_success_callback' ), // Callback
            'wpaun-admin', // Page
            'wpaun_email' // Section           
        );      

        add_settings_field(
            'email_body_success', // ID
            __('Email Body', 'wpadminupdatenotice'), // Title 
            array( $this, 'email_body_success_callback' ), // Callback
            'wpaun-admin', // Page
            'wpaun_email' // Section           
        );      

        add_settings_section(
            'wpaun_basic_settings', // ID
            __('Basic Settings', 'wpadminupdatenotice'), // Title
            '', // Callback
            'wpaun-admin' // Page
        );  

        add_settings_field(
            'delete_settings', 
            'Remove Settings', 
            array( $this, 'delete_settings_callback' ), 
            'wpaun-admin', 
            'wpaun_basic_settings'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['email_subject_success'] ) )
            $new_input['email_subject_success'] = sanitize_text_field( $input['email_subject_success'] );

        if( isset( $input['email_body_success'] ) )
            $new_input['email_body_success'] = $input['email_body_success'];

        if( isset( $input['delete_settings'] ) )
            $new_input['delete_settings'] = sanitize_text_field( $input['delete_settings'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_success_info()
    {
        print __('Enter the plain email text you will get as the admin success notice (no HTML):', 'wpadminupdatenotice');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function email_subject_success_callback()
    {

        printf(
            '<input type="text" class="regular-text code" id="email_subject_success" name="wpaun[email_subject_success]" value="%s" />',
            isset( $this->options['email_subject_success'] ) ? esc_attr( $this->options['email_subject_success']) : ''
        );

    }

    public function email_body_success_callback()
    {
		
        printf(
            '<textarea id="email_body_success" name="wpaun[email_body_success]" rows="10" cols="50" class="large-text code" placeholder"'. __('Please enter your email text', 'wpadminupdatenotice').'">%s</textarea>',
            isset( $this->options['email_body_success'] ) ? esc_attr( $this->options['email_body_success']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function delete_settings_callback()
    {

		echo '<select name="wpaun[delete_settings]"><option value="no"'.( $this->options['delete_settings'] == 'no' ? ' selected' : '' ) .'>'.__('Do not', 'wpadminupdatenotice').'</option><option value="yes"'.( $this->options['delete_settings'] == 'yes' ? ' selected' : '' ) .'>'.__('Please', 'wpadminupdatenotice').'</option></select>&nbsp;'.__('remove all plugin data if I use the delete link in the plugins menu!', 'wpadminupdatenotice');;


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
		 * defined in Wpadminupdatenotice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpadminupdatenotice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpadminupdatenotice-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wpadminupdatenotice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpadminupdatenotice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpadminupdatenotice-admin.js', array( 'jquery' ), $this->version, false );

	}
}
