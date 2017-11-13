<?php
/**
 * Types & Taxnomies
 *
 * Registers custom post types and taxonomies
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg;

use \blobfolio\common\data;
use \blobfolio\common\ref\sanitize as r_sanitize;
use \bbg\wp\common\typetax as labels;

class typetax extends \bbg\wp\common\base\hook {

	// Actions: hook=>[callbacks].
	const ACTIONS = array(
		'init'=>array(
			'types'=>array('priority'=>0),
			'taxonomies'=>null,
		),
	);

	/**
	 * Register custom taxonomies
	 *
	 * @return void Nothing.
	 */
	public static function taxonomies() {
		// Noodle Flavor.
		register_taxonomy(
			'flavor',
			array('noodle'),
			array(
				'labels'=>labels::taxonomy_labels('Flavor', 'Flavors'),
				'rewrite'=>array('slug'=>'flavors'),
				'show_ui'=>true,
				'show_admin_column'=>true,
				'query_var'=>true,
				'hierarchical'=>true,
			)
		);
	}


	/**
	 * Register custom post types
	 *
	 * @return void Nothing.
	 */
	public static function types() {

		// Product.
		register_post_type(
			'product',
			array(
				'labels'=>labels::type_labels('Product', 'Products'),
				'public'=>true,
				'publicly_queryable'=>true,
				'show_ui'=>true,
				'show_in_menu'=>true,
				'show_in_nav_menus'=>true,
				'query_var'=>true,
				'rewrite'=>true,
				'capability_type'=>'post',
				'has_archive'=>false,
				'hierarchical'=>true,
				'menu_position'=>null,
				'exclude_from_search'=>false,
				'menu_icon'=>'dashicons-lightbulb',
				'supports'=>array('title', 'editor', 'thumbnail'),
			)
		);

		// Noodle.
		register_post_type(
			'noodle',
			array(
				'labels'=>labels::type_labels('Noodle', 'Noodles'),
				'public'=>true,
				'publicly_queryable'=>true,
				'show_ui'=>true,
				'show_in_menu'=>true,
				'show_in_nav_menus'=>true,
				'query_var'=>true,
				'rewrite'=>true,
				'capability_type'=>'post',
				'has_archive'=>false,
				'hierarchical'=>true,
				'menu_position'=>null,
				'exclude_from_search'=>false,
				'menu_icon'=>'dashicons-lightbulb',
				'supports'=>array('title', 'editor', 'thumbnail'),
			)
		);
	}

}
