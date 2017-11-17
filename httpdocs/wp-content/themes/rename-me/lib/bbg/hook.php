<?php
/**
 * Hooks
 *
 * All action and filter binding for the theme happens by calling
 * ::init() once after load.
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg;

use \blobfolio\common\data;
use \blobfolio\common\ref\sanitize as r_sanitize;

class hook extends \bbg\wp\common\base\hook {

	// Actions: hook=>[callbacks].
	const ACTIONS = array(
		'wp_enqueue_scripts'=>array(
			'styles'=>null,
			'scripts'=>null,
		),
	);

	// Filters: hook=>[callbacks].
	const FILTERS = array(
	);

	// -----------------------------------------------------------------
	// Header Business
	// -----------------------------------------------------------------

	/**
	 * Enqueue Styles
	 *
	 * @return void Nothing.
	 */
	public static function styles() {
		global $post;

		$css_url = BBG_THEME_URL . 'dist/css/';
		$css_path = BBG_THEME_PATH . 'dist/css/';

		// Core CSS.
		wp_register_style(
			'bbg-core-css',
			"{$css_url}core.css",
			array(),
			BBG_THEME_ASSET_VERSION
		);
		wp_enqueue_style('bbg-core-css');
	}

	/**
	 * Enqueue Styles
	 *
	 * @return void Nothing.
	 */
	public static function scripts() {
		global $post;

		$js_url = BBG_THEME_URL . 'dist/js/';
		$js_path = BBG_THEME_PATH . 'dist/js/';

		// Libs JS.
		wp_register_script(
			'bbg-libs-js',
			"{$js_url}libs.min.js",
			array(),
			BBG_THEME_ASSET_VERSION,
			true
		);

		// Core JS.
		wp_register_script(
			'bbg-core-js',
			"{$js_url}core.min.js",
			array('bbg-libs-js'),
			BBG_THEME_ASSET_VERSION,
			true
		);
		wp_enqueue_script('bbg-core-js');
	}
}
