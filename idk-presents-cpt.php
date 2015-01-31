<?php


class IDK_Presents_CPT {


	function __construct() {

		add_action( 'init',
			array( $this, 'register' ) );

		add_action( 'admin_head',
			array( $this, 'add_menu_icons_styles' ) );

		add_action( 'get_header',
			array( $this, 'remove_sidebar' ) );

	}


	/**
	 * Registers the 'Presents' Custom Post Type
	 *
	 * @author caseypatrickdriscoll
	 *
	 * @created 2015-01-31 17:48:19
	 *
	 * @return void
	 */
	function register() {
		register_post_type( 'presentation', array(
			'hierarchical'      => false,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'has_archive'       => true,
			'query_var'         => true,
			'rewrite'           => true,
			'menu_icon'         => '',
			'supports'          => array( 'title', 'editor', 'thumbnail', 'comments' ),
			'labels'            => array(
				'name'                => __( 'Presentations', 'YOUR-TEXTDOMAIN' ),
				'singular_name'       => __( 'Presentation', 'YOUR-TEXTDOMAIN' ),
				'all_items'           => __( 'Presentations', 'YOUR-TEXTDOMAIN' ),
				'new_item'            => __( 'New Presentation', 'YOUR-TEXTDOMAIN' ),
				'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'        => __( 'Add New Presentation', 'YOUR-TEXTDOMAIN' ),
				'edit_item'           => __( 'Edit Presentation', 'YOUR-TEXTDOMAIN' ),
				'view_item'           => __( 'View Presentation', 'YOUR-TEXTDOMAIN' ),
				'search_items'        => __( 'Search Presentations', 'YOUR-TEXTDOMAIN' ),
				'not_found'           => __( 'No presentations found', 'YOUR-TEXTDOMAIN' ),
				'not_found_in_trash'  => __( 'No presentations found in trash', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'   => __( 'Parent presentation', 'YOUR-TEXTDOMAIN' ),
				'menu_name'           => __( 'Presentations', 'YOUR-TEXTDOMAIN' ),
			),
		) );

	}


	/**
	 * Adds icon to admin menu for 'Presentations' custom post type
	 *
	 * Thanks to http://mannieschumpert.com/blog/using-wordpress-3-8-icons-custom-post-types-admin-menu/
	 *
	 * @author caseypatrickdriscoll
	 *
	 * @created 2015-01-31 17:55:51
	 *
	 * @return void
	 */
	function add_menu_icons_styles(){
		?>

		<style>
			#adminmenu .menu-icon-presentation div.wp-menu-image:before {
				content: '\f233';
			}
		</style>

	<?php
	}


	/**
	 * Removes sidebar on 'Presentation' custom post types
	 *
	 * @author caseypatrickdriscoll
	 *
	 * @created 2015-01-31 18:18:38
	 *
	 * @return void
	 */
	function remove_sidebar() {
		$post = $GLOBALS['post'];

		if ( $post->post_type == 'presentation' )
			add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	}

}

new IDK_Presents_CPT();