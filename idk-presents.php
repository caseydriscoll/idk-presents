<?php

/**
 * Plugin Name: iDK Presents
 * Description: A Presentation Plugin
 * Author: Casey Patrick Driscoll
 * Author URI: http://caseypatrickdriscoll.com
 */

include 'idk-presents-cpt.php';

class IDK_Presents {


	function __construct() {

		register_activation_hook( __FILE__,
			array( 'IDK_Presents', 'flush_rewrite_rules' ) );
		register_deactivation_hook( __FILE__,
			array( 'IDK_Presents', 'flush_rewrite_rules' ) );

	}


	/**
	 * Should be flushing rewrite rules on activate/deactivate,
	 *   but not really working as far as I can tell
	 *
	 * @author caseypatrickdriscoll
	 *
	 * @created 2015-01-31 20:10:39
	 */
	public static function flush_rewrite_rules() {
		flush_rewrite_rules();
	}

}

new IDK_Presents();