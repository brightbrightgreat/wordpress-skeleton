<?php
/**
 * Index
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

get_header();

$hero = array(
	'headline'=>carbon_get_post_meta($post->ID, 'hero_headline'),
	'text'=>carbon_get_post_meta($post->ID, 'hero_text'),
	'text_color'=>carbon_get_post_meta($post->ID, 'hero_text_color'),
	'buttons'=>carbon_get_post_meta($post->ID, 'hero_buttons'),
);

\bbg\partial\hero::print($hero);

if (have_posts()) :
	while (have_posts()) :
		the_post();
	endwhile;
else :
	bbg\partial\text::print(array(
		'headline'=>'Posts not found.',
		'text'=>'Sorry, we couldn\'t find what you were looking for.',
		'buttons'=>array(
			array(
				'link_type'=>'internal',
				'link_internal'=>array(array(
					'id'=>get_option( 'page_on_front' ),
				), ),
				'link_text'=>'Go Home',
			),
		),
	));
endif;

get_footer();
