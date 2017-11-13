<?php
/**
 * Constants
 *
 * Defines common constants that can be used throughout the site
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

// Asset Version. Update this date when you make changes to the live site.
define('BBG_THEME_ASSET_VERSION', (BBG_TEST_MODE ? microtime() : '20171010'));

// Theme URL.
define('BBG_THEME_URL', get_bloginfo('template_url') . '/');

// Theme Path.
define('BBG_THEME_PATH', dirname(dirname(dirname(__FILE__))) . '/');

// Social Networks.
define('BBG_SOCIAL_NETWORKS', array(
	'facebook'=>'Facebook',
	'twitter'=>'Twitter',
	'linkedin'=>'LinkedIn',
	'instagram'=>'Instagram',
	'pinterest'=>'Pinterest',
	'tumblr'=>'Tumblr',
	'googleplus'=>'Google+',
	'vimeo'=>'Vimeo',
	'youtube'=>'Youtube',
));

// Site Colors.
define('BBG_SITE_COLORS', array(
	'aqua',
	'pink',
	'coral',
	'blue',
));


// We're going to loop through the site colors,
// And generate nice arrays for text and bg colors.
// These can be used when defining field options.
$text_colors = array();
$bg_colors = array();

foreach (BBG_SITE_COLORS as $c) {
	$text_colors['t_c:' . $c . '-400'] = ucwords($c);
	$bg_colors['v_bc:' . $c . '-400'] = ucwords($c);
}

define('BBG_TEXT_COLORS', $text_colors);
define('BBG_BG_COLORS', $bg_colors);
