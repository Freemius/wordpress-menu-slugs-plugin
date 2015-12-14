<?php
	/**
	 * Plugin Name: Freemius Menu Slugger
	 * Plugin URI:  http://freemius.com/
	 * Description: Adds the menu and submenu slugs.
	 * Version:     1.0.0
	 * Author:      Freemius
	 * Author URI:  http://freemius.com
	 * License: GPL2
	 */

	/**
	 * @package     Freemius Menu Slugger
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	function fs_add_slugs() {
		global $menu, $submenu;

		$slug_template = '<br><span style="color: yellow; background: #000; display: inline-block; padding: 1px 5px; font-size: 10px;">[%s]</span>';

		foreach ( $menu as $index => $meta ) {
			$menu[$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
		}

		foreach ( $submenu as $menu_slug => $submenu_items ) {
			foreach ($submenu_items as $index => $meta) {
				$submenu[$menu_slug][$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
			}
		}
	}

	function fs_menu_slugger_init() {
		add_action( 'admin_menu', 'fs_add_slugs', 99999999 );
	}

	add_action( 'plugins_loaded', 'fs_menu_slugger_init' );