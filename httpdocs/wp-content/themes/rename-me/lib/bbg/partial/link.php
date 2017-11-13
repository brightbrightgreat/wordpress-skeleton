<?php
/**
 * Partial: Link
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial;

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
		'section_classes'=>'',
		'item_classes'=>'',
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
		$link = \bbg\wp\common\utility::get_link($args); ?>

		<a id="<?=$id?>" href="<?=$link['url']?>" class="<?=implode($link['classes'], ' ')?>" target="<?=$link['target']?>" <?=($link['download'] ? 'download' : '')?>
			<?=($link['video'] ? 'v-on:click.prevent="modal = \'' . $link['modalID']  . '\'"' : '')?>>
			<?=$link['text']?>
		</a>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
