<?php
/**
 * Fields: Theme Settings
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

use \bbg\fields;
use \Carbon_Fields\Container;
use \Carbon_Fields\Field;


$social = array(
	// Instructions.
	Field::make('html', 'social_instructions')
	->set_html('<h3>Social Networks</h3><p>Fill out the networks you\'d like to link out to. Any left blank won\'t be used.</p>'),
);

foreach (BBG_SOCIAL_NETWORKS as $k=>$v) {
	$social[] = Field::make('text', 'social_' . $k, $v)->set_attribute('type', 'url');
}


// Set up container.
Container::make( 'theme_options', 'Theme Settings' )

// Social.
->add_tab('Social', $social)
