<?php
/**
 * Index
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
	endwhile;
else :
	echo 'Oops';
endif;

get_footer();
