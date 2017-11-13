<?php
/**
 * 404
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

get_header();


bbg\partial\hero::print(array(
	'headline'=>'404: not found',
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

get_footer();
