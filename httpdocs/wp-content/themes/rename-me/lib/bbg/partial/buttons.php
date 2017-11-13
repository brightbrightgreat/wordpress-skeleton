<?php
/**
 * Partial: Buttons
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial;

use \blobfolio\common\data;
use \blobfolio\common\ref\cast as r_cast;
use \blobfolio\common\ref\format as r_format;

class buttons extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'buttons'=>array(),
		'section_classes'=>'m:btn_group d:f',
		'item_classes'=>'m:btn v_border',
		'color'=>'',
	);

	/**
	 * Build the Content
	 *
	 * @param string $str Content.
	 * @param string $id ID.
	 * @param array $args Arguments.
	 * @return bool True.
	 */
	protected static function build_content(string &$str, string $id, array $args) {
		ob_start();

		if (count($args['buttons'])) {
			foreach ($args['buttons'] as $link) {
				$link['section_classes'] = $args['section_classes'];
				$link['item_classes'] = $args['item_classes'];
				\bbg\partial\link::print($link);
			}
		} ?>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
