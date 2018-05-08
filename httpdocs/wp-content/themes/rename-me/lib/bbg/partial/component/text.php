<?php
/**
 * Partial: Component - Text
 *
 * @package brightbrightgreat/vibes
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg\partial\component;

use \blobfolio\common\data;
use \bbg\wp\common\utility as u;

class text extends \bbg\wp\common\base\partial {

	// The basic $args data structure.
	const TEMPLATE = array(
		'headline'=>'',
		'preheadline'=>'',
		'subheadline'=>'',
		'text'=>'',
		'buttons'=>array(),

		'text_color'=>'',
		'sub_color'=>'',

		'section_atts'=>array(
			'class'=>'m:text l_mw:840',
		),

		'headline_classes'=>array(''),
		'text_classes'=>array(),

		'button_color'=>array(),
		'button_section_classes'=>array(),
		'button_group_classes'=>array(),
		'button_item_classes'=>array(),

		'button_v_align'=>'',
		'button_h_align'=>'',
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
		$args['text'] = apply_filters('the_content', $args['text']);

		$args['links'] = array();

		foreach ($args['buttons'] as $b) {
			$link = u::get_link($b);

			if ($link) {
				$args['links'][] = $link;
			}
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

		<?php if ($args['preheadline']) {?>
			<div class="l_m-b:20 t_h6 t_c:<?=$args['sub_color']?>"><?=$args['preheadline']?></div>
		<?php } ?>


		<?php if ($args['headline']) { ?>

			<?php
			if ($args['links'] && count($args['links']) === 1) { ?>

					<h2 class="js_animate js_animateable <?=implode(' ', $args['headline_classes'])?>">
						<a
						href="<?=$args['links'][0]['url']?>"
						class="<?=implode($args['links'][0]['classes'], ' ')?>"
						target="<?=$args['links'][0]['target']?>">
							<?=$args['headline']?>
						</a>
					</h2>
			<?php }

			else { ?>
				<h2 class="js_animate js_animateable <?=implode(' ', $args['headline_classes'])?>"><?=$args['headline']?></h2>
			<?php } ?>
		<?php } ?>

		<?php if ($args['subheadline']) { ?>
			<div class="js_animate js_animateable t_accent[sm] t_w:600 t_t:u"><?=$args['subheadline']?></div>
		<?php } ?>

		<?php if ($args['text']) { ?>
			<div class="js_animate js_animateable t_body-copy t_wysiwyg"><?=$args['text']?></div>
		<?php }

		if (count($args['buttons'])) {
			buttons::print(array(
				'buttons'=>$args['buttons'],
				'button_color'=>$args['button_color'],
				'section_classes'=>$args['button_section_classes'],
				'group_classes'=>$args['button_group_classes'],
				'item_classes'=>$args['button_item_classes'],
				'v_align'=>$args['button_v_align'],
				'h_align'=>$args['button_h_align'],
			));
		}
		?>

		<?php
		$str = ob_get_clean();
		return $str;
	}
}
