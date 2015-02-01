<?php

class IDK_Presents_Shortcodes {


	function __construct() {

		add_shortcode( 'slide',
			array( $this, 'slide' ) );

		add_shortcode( 'note',
			array( $this, 'note' ) );

		add_shortcode( 'play',
			array( $this, 'play' ) );

		add_action( 'wp_enqueue_scripts',
			array( $this, 'scripts_and_styles' ) );

	}


	function slide( $atts ) {

		if ( is_array( $atts ) ) extract( $atts );

		if ( isset( $bg ) ) {
			$query = new WP_Query( 'pagename=' . $bg );
			$bg = wp_get_attachment_url( $query->post->ID );
		}



		return "</section><section class='slide' style='background-image:url($bg)'>";
	}


	function note( $atts, $content ) {
		return "<note>" . $content . "</note>";
	}


	function play( $atts ) {

		return "<a id='idk-play'>Start</a>";
	}


	function scripts_and_styles() {

		if ( $GLOBALS['post']->post_type != 'presentation' ) return;

		wp_enqueue_script(
			'idk-presents',
			plugins_url( 'js/script.js', __FILE__ ),
			array( 'jquery' )
		);

		wp_enqueue_style(
			'idk-presents',
			plugins_url( 'css/style.css', __FILE__ )
		);

	}

}

new IDK_Presents_Shortcodes();