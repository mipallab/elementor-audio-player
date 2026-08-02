<?php
/**
 * Plugin Name: OBJE Podcast Player
 * Description: A modern, high-fidelity Elementor podcast widget with a sticky global Spotify-style audio player. Supports Elementor Free.
 * Version:     1.7.3
 * Requires at least: 5.8
 * Tested up to: 7.0
 * Requires PHP: 7.4
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25
 * Author:      Majadul Islam
 * Author URI:  https://profiles.wordpress.org/mipallab123/
 * Text Domain: obje-podcast-player
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main OBJE_Podcast_Player Class
 */
final class OBJE_Podcast_Player {

	/**
	 * Plugin Version
	 */
	const VERSION = '1.7.3';

	/**
	 * Minimum Elementor Version
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.16.0';

	/**
	 * Minimum PHP Version
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 */
	private static $_instance = null;

	/**
	 * Instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Check if Elementor is installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Enqueue scripts and styles
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        
        // Add footer template for the player
        add_action( 'wp_footer', [ $this, 'render_sticky_player_template' ] );
	}

	/**
	 * Admin notice
	 * Warning when the site doesn't have Elementor installed or activated.
	 */
	public function admin_notice_missing_main_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'obje-podcast-player' ),
			'<strong>' . esc_html__( 'OBJE Podcast Player', 'obje-podcast-player' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'obje-podcast-player' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}

	/**
	 * Admin notice
	 * Warning when the site doesn't have a minimum required Elementor version.
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'obje-podcast-player' ),
			'<strong>' . esc_html__( 'OBJE Podcast Player', 'obje-podcast-player' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'obje-podcast-player' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}

	/**
	 * Admin notice
	 * Warning when the site doesn't have a minimum required PHP version.
	 */
	public function admin_notice_minimum_php_version() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'obje-podcast-player' ),
			'<strong>' . esc_html__( 'OBJE Podcast Player', 'obje-podcast-player' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'obje-podcast-player' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}

	/**
	 * Register Widgets
	 */
	public function register_widgets( $widgets_manager ) {
		require_once( __DIR__ . '/includes/class-podcast-widget.php' );
		$widgets_manager->register( new \OBJE_Podcast_Widget() );
	}

	/**
	 * Enqueue Scripts & Styles
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'obje-podcast-style', plugins_url( '/assets/css/podcast-player.css', __FILE__ ), [], self::VERSION );
		wp_enqueue_script( 'obje-podcast-script', plugins_url( '/assets/js/podcast-player.js', __FILE__ ), ['jquery'], self::VERSION, true );
	}

    /**
     * Render the Sticky Player HTML in the footer
     */
    public function render_sticky_player_template() {
        require_once( __DIR__ . '/templates/sticky-player.php' );
    }

}

OBJE_Podcast_Player::instance();
