<?php
/**
 * Growmodo theme bootstrap.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GROWMODO_VERSION', '1.0.0' );
define( 'GROWMODO_DIR', get_template_directory() );
define( 'GROWMODO_URI', get_template_directory_uri() );

require_once GROWMODO_DIR . '/inc/setup.php';
require_once GROWMODO_DIR . '/inc/assets.php';
require_once GROWMODO_DIR . '/inc/helpers.php';
require_once GROWMODO_DIR . '/inc/nav-walker.php';
require_once GROWMODO_DIR . '/inc/forms.php';
require_once GROWMODO_DIR . '/inc/cpt-property.php';
