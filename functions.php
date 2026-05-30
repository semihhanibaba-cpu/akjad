<?php
/**
 * HB Tedarik theme functions.
 *
 * @package HBTedarik
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HB_TEDARIK_VERSION', '1.0.0');
define('HB_TEDARIK_DIR', get_template_directory());
define('HB_TEDARIK_URI', get_template_directory_uri());

require HB_TEDARIK_DIR . '/inc/theme-setup.php';
require HB_TEDARIK_DIR . '/inc/template-tags.php';
require HB_TEDARIK_DIR . '/inc/products.php';
require HB_TEDARIK_DIR . '/inc/demo-content.php';
