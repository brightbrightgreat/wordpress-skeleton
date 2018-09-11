<?php
/**
 * Constants
 *
 * Defines common constants that can be used throughout the site
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

// The file must be called through WP.
if (!defined('ABSPATH')) {
	exit;
}



// ---------------------------------------------------------------------
// Paths
// ---------------------------------------------------------------------

// Theme URL.
define('BBG_THEME_URL', trailingslashit(get_bloginfo('template_url')));

// Theme Path.
define('BBG_THEME_PATH', trailingslashit(dirname(dirname(dirname(__FILE__)))));

// --------------------------------------------------------------------- end paths


// ---------------------------------------------------------------------
// Posts
// ---------------------------------------------------------------------

// Any post that is special enough to get a disconnected call somewhere
// should have its ID recorded here. Do not ever get_permalink(5).

// --------------------------------------------------------------------- end posts


// ---------------------------------------------------------------------
// APIs
// ---------------------------------------------------------------------
// --------------------------------------------------------------------- end APIs


// ---------------------------------------------------------------------
// Misc
// ---------------------------------------------------------------------

// Asset version for CSS/JS assets. Be sure to update when changes are
// made!
define('BBG_THEME_ASSET_VERSION', (defined('BBG_TESTMODE') && BBG_TESTMODE ? microtime(true) : '20180507'));

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

// We're going to loop through the site colors, and generate nice arrays
// for text and bg colors. These can be used e.g. when defining field
// options.
$nice_colors = array();

foreach (BBG_SITE_COLORS as $c) {
	$nice_colors[$c] = ucwords(str_replace('-', ' ', $c));
}

define('BBG_NICE_COLORS', $nice_colors);

// --------------------------------------------------------------------- end misc
