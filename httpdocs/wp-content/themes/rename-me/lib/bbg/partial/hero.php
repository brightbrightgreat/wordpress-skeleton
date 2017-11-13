<?php
/**
 * Partial: Hero
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial;

class hero extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'headline'=>'',
		'text'=>'',
		'buttons'=>array(),

		'text_color'=>'black-400',
		'overlay'=>false,
		'alignment'=>'left',

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

		<div
		class="l_mw:820 <?=$args['text_color']?>"
		v-bind:class="{
			't_a:r' : partial.<?=$id?>.alignment === 'right'
		}">
			<h1 v-if="partial.<?=$id?>.headline">{{ partial.<?=$id?>.headline }}</h1>
			<div v-if="partial.<?=$id?>.text" class="" v-html="partial.<?=$id?>.text"></div>

			<?php
			buttons::print(array(
				'buttons'=>$args['buttons'],
				'color'=>$args['text_color'],
			));
			?>
		</div>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
