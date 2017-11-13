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
			'bbg-core',
			"{$css_url}core.css",
			array(),
			BBG_THEME_ASSET_VERSION
		);
		wp_enqueue_style('bbg-core');

		// Some styles are page-specific. They'll be enqueued
		// automatically so long as {type}-{slug}.css exists in the
		// single/ folder.
		global $template;
		$file_slug = basename($template);
		$file_slug = preg_replace('/\.php$/i', '', $file_slug);
		$file_slug .= '.css';

		if (file_exists($css_path . $file_slug)) {

			$clean_slug = md5($file_slug);

			wp_register_style(
				$clean_slug,
				$css_url . $file_slug,
				array(),
				BBG_THEME_ASSET_VERSION
			);

			wp_enqueue_style($clean_slug);

		} // endif file exists
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

		// Core JS.
		wp_register_script(
			'bbg-core',
			"{$js_url}core.min.js",
			array(),
			BBG_THEME_ASSET_VERSION
		);
		wp_enqueue_script('bbg-core');

		// Libs JS.
		wp_register_script(
			'bbg-libs',
			"{$js_url}libs.min.js",
			array(),
			BBG_THEME_ASSET_VERSION
		);
		wp_enqueue_script('bbg-core');

		// Some styles are page-specific. They'll be enqueued
		// automatically so long as {type}-{slug}.css exists in the
		// single/ folder.
		global $template;
		$file_slug = basename($template);
		$file_slug = preg_replace('/\.php$/i', '', $file_slug);
		$file_slug .= '.min.js';

		if (file_exists($js_path . $file_slug)) {

			$clean_slug = md5($file_slug);

			wp_register_script(
				$clean_slug,
				$js_url . $file_slug,
				array(),
				BBG_THEME_ASSET_VERSION
			);

			wp_enqueue_script($clean_slug);

		} // endif file exists
	}
}
