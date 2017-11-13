<?php
/**
 * Functions: Main
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

// The file must be called through WP.
if (!defined('ABSPATH')) {
	exit;
}

use \bbg\wp\common\meta;


// ---------------------------------------------------------------------
// Require External files
// ---------------------------------------------------------------------
require(dirname(__FILE__) . '/lib/bbg/constants.php');
require(dirname(__FILE__) . '/lib/vendor/autoload.php');

\bbg\hook::init();
\bbg\fields::init();
\bbg\typetax::init();
