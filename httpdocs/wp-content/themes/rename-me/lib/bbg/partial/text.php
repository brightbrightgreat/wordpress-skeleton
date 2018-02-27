<?php
/**
 * Partial: No Content
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial;

class text extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'headline'=>'',
		'text'=>'',
		'text_color'=>'black-400',
		'section_classes'=>'m:hero',
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
		ob_start(); ?>

		<div class="l_mw:820 <?=$args['text_color']?>">
			<h2 v-if="partial.<?=$id?>.headline">{{ partial.<?=$id?>.headline }}</h1>
			<div v-if="partial.<?=$id?>.text" class="t_wysiwyg" v-html="partial.<?=$id?>.text"></div>
		</div>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
