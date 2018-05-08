<?php
/**
 * Partial: Link
 *
 * @package brightbrightgreat/ritdye
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial\component;

use \blobfolio\common\data;
use \blobfolio\common\ref\cast as r_cast;
use \blobfolio\common\ref\format as r_format;

class link extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'link_type'=>'',
		'link_text'=>'',
		'link_internal'=>array(),
		'link_email'=>'',
		'link_subject'=>'',
		'link_external'=>'',
		'link_download'=>'',
		'section_classes'=>array(),
		'item_classes'=>array(),
		'link_classes'=>null,
		'section_tag'=>'a',
		'section_atts'=>array(),
	);

	const NO_ENV = true;

	/**
	 * Sanitize Arguments
	 *
	 * This function will standardize the arguments passed to the build
	 * method so that life can continue. Return `FALSE` to short-circuit
	 * and abort the attempt.
	 *
	 * @param mixed $args Arguments.
	 * @return bool True/false.
	 */
	protected static function sanitize_arguments(&$args=null) {
		$args = data::parse_args($args, static::TEMPLATE);

		$args['item_classes'] = ($args['link_classes'] ? $args['link_classes'] : $args['item_classes']);

		$link = \bbg\wp\common\utility::get_link($args);

		unset($args['section_classes']);

		$args['section_atts']['href'] = $link['url'];
		$args['section_atts']['class'] = $link['classes'];
		$args['section_atts']['target'] = $link['target'];

		if ($link['download']) {
			$arg['sections_atts']['download'] = true;
		}

		return $args;
	}

	/**
	 * Build the Content
	 *
	 * @param string $str Content.
	 * @param string $id ID.
	 * @param array $args Arguments.
	 * @return bool True.
	 */
	protected static function build_content(string &$str, string $id, array $args) {
		ob_start(); ?>

		<?=$args['link_text']?>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
