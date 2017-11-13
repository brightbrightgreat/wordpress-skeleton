<?php
/**
 * Fields: Hero
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

use \bbg\fields;
use \Carbon_Fields\Container;
use \Carbon_Fields\Field;


// Set up container.
Container::make( 'post_meta', 'hero', 'Hero' )

// Display location.
->where( 'post_type', 'IN', array('page', 'post') )

// Page context
->set_context('carbon_fields_after_title')

// Set up fields.
->add_fields(array_merge(

		// Text fields.
		fields::clone_fields('text', 'hero_'),

		// Text color.
		fields::clone_fields('text_color', 'hero_')
	)
);
