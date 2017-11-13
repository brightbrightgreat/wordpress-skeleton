<?php
/**
 * Fields: Related Posts
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

use \bbg\fields;
use \Carbon_Fields\Container;
use \Carbon_Fields\Field;


// Set up container.
Container::make( 'post_meta', 'related_posts', 'Related Posts' )

// Display location.
->where( 'post_type', 'IN', array('page', 'post') )

// Set up fields.
->add_fields(array(

	// Related type.
	Field::make('radio', 'related_type', 'Type')
	->add_options(array(
		'auto'=>'Auto (most recent)',
		'category'=>'By category',
		'tag'=>'By Tag',
		'custom'=>'Curated (manually pick which posts will show up)',
	)),

	// Category.
	Field::make('association', 'related_category', 'Category')
	->set_types(array(
		'type'=>'term',
		'taxonomy'=>'category',
	))
	->set_conditional_logic(array(array(
		'field'=>'related_type',
		'value'=>'category',
	), )),

	// Tag.
	Field::make('association', 'related_tag', 'Tag')
	->set_types(array(
		'type'=>'term',
		'taxonomy'=>'post_tag',
	))
	->set_conditional_logic(array(array(
		'field'=>'related_type',
		'value'=>'tag',
	), )),

	// Curated.
	Field::make('association', 'related_posts', 'Curated Posts')
	->set_conditional_logic(array(array(
		'field'=>'related_type',
		'value'=>'custom',
	), )),

));
