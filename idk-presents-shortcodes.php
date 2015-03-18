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

		add_action( 'wp_footer', function() {
			echo '<div id="idk-overlay"></div>';
		} );

	}


	function slide( $atts ) {

		if ( is_array( $atts ) ) extract( $atts );

		if ( isset( $bg ) ) {
			$args = array(
								'name'        => $bg,
								'post_status' => 'any',
								'post_type'   => 'attachment'
							);

			$query = new WP_Query( $args );
			$bg_img = wp_get_attachment_url( $query->post->ID );
		}

		if ( ! isset( $style ) ) $style = '';

		if ( isset( $bg_img ) ) $style .= "background-image:url($bg_img);padding:300px 50px;";

		return "<br style="clear:both;" /></section><section class='slide' style='$style'>";
	}


	function note( $atts, $content ) {
		return "<span class='note'>" . $content . "</span>";
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
