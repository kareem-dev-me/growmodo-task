<?php
/**
 * Custom nav walker for Estatein active pill styling.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Nav walker that wraps the current item like the Figma active pill.
 */
class Growmodo_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$is_current = in_array( 'current-menu-item', $classes, true )
			|| in_array( 'current_page_item', $classes, true )
			|| in_array( 'current-menu-ancestor', $classes, true );

		$link_class = $is_current
			? 'btn-nav-active no-underline'
			: 'text-lg font-medium leading-[1.5] text-absolute-white no-underline hover:text-purple-75';

		$output .= '<li class="menu-item">';
		$output .= '<a class="' . esc_attr( $link_class ) . '" href="' . esc_url( $item->url ) . '">';
		$output .= esc_html( $item->title );
		$output .= '</a>';
	}

	/**
	 * Ends the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Page data object.
	 * @param int      $depth  Depth of page.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}
