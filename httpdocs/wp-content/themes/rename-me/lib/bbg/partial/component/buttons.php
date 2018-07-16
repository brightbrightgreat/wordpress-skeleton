<?php
/**
 * Partial: Component - Buttons
 *
 * @package brightbrightgreat/vibes
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial\component;

use \blobfolio\common\data;
use \blobfolio\common\ref\cast as r_cast;
use \blobfolio\common\ref\format as r_format;

class buttons extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'buttons'=>array(),
		'group_classes'=>array(),
		'section_classes'=>array(),
		'item_classes'=>array(),

		'button_color'=>array(),
		'v_align'=>'c',
		'h_align'=>'c',

	);


	/**
	 * Sanitize arguments
	 *
	 * @param mixed $args The current data.
	 * @return mixed $args The modified args or false.
	 */
	protected static function sanitize_arguments(&$args=null) {
		$args = array_filter($args);
		$args = data::parse_args($args, static::TEMPLATE);
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
		ob_start();

		if (count($args['buttons'])) { ?>
			<div
			class="js_animate js_animateable d:f d_fw:w
			d_ai:<?=$args['v_align']?> d_jc:<?=$args['h_align']?>
			m:btn-group
			<?=implode(' ', $args['group_classes'])?>">
				<?php
				foreach ($args['buttons'] as $link) {
					$link['section_classes'] = $args['section_classes'];
					$link['item_classes'] = array_merge($args['item_classes'], $args['button_color']);
					link::print($link);
				} ?>
			</div>
		<?php } ?>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
