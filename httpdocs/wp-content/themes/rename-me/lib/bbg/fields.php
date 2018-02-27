<?php
/**
 * Fields
 *
 * @package #REPLACE-REPONAME
 * @author  Bright Bright Great <sayhello@brightbrightgreat.com>
 */

namespace bbg;

use \bbg\constants;
use \Carbon_Fields\Container;
use \Carbon_Fields\Field;

class fields extends \bbg\wp\common\base\hook {

	const ACTIONS = array(
		'carbon_fields_register_fields'=>array(
			'register_fields'=>null,
		),
	);

	/**
	 * Register fields
	 *
	 * @return void Nothing.
	 */
	public static function register_fields() {
		$files = glob(BBG_THEME_PATH . 'fields/*.php');
		if (is_array($files)) {
			foreach ($files as $file) {
				require($file);
			}
		}
	}


	/**
	 * Clone fields.
	 *
	 * This sets up common field types that we can later clone into field groups.
	 *
	 * @param string $name The name of the field group to clone.
	 * @param string $prefix An optional prefix to prevent field collisions.
	 * @return array $fields An array of the field definitions.
	 */
	public static function clone_fields(string $name, string $prefix='') {
		$fields = array();

		switch ($name) {

			case 'link':
				$fields = array(

					// Link text.
					Field::make('text', $prefix . 'link_text', 'Text'),

					// Link type.
					Field::make('radio', $prefix . 'link_type', 'Type')
					->add_options(array(
						'internal'=>'Internal (choose from posts and pages on the site)',
						'external'=>'External (enter a custom URL)',
						'download'=>'File Download',
						'email'=>'Email (pop up with compose mail to the entered email address)',
					)),

					// Internal link.
					Field::make('association', $prefix . 'link_internal', 'Select')
					->set_conditional_logic(array(array(
						'field'=>$prefix . 'link_type',
						'value'=>'internal',
					), )),

					// External link.
					Field::make('text', $prefix . 'link_external', 'URL')
					->set_attribute('type', 'url')
					->set_conditional_logic(array(array(
						'field'=>$prefix . 'link_type',
						'value'=>'external',
					), )),

					// File download.
					Field::make('file', $prefix . 'link_download', 'File')
					->set_conditional_logic(array(array(
						'field'=>$prefix . 'link_type',
						'value'=>'download',
					), )),

					// Email address.
					Field::make('text', $prefix . 'link_email', 'Email')
					->set_attribute('type', 'email')
					->set_conditional_logic(array(array(
						'field'=>$prefix . 'link_type',
						'value'=>'email',
					), )),

					// Email Subject.
					Field::make('text', $prefix . 'link_subject', 'Subject')
					->set_conditional_logic(array(array(
						'field'=>$prefix . 'link_type',
						'value'=>'email',
					), )),

				);
				break;

			case 'button_group':
				$fields = array(
					Field::make('complex', $prefix . 'buttons', 'Buttons')
					->add_fields(
						fields::clone_fields('link')
					),
				);
				break;

			case 'text':
				$fields = array_merge(
					array(
						// Headline.
						Field::make('text', $prefix . 'headline', 'Headline'),

						// Text.
						Field::make('rich_text', $prefix . 'text', 'Text'),
					),

					fields::clone_fields('button_group', $prefix)
				);
				break;
		}

		return $fields;
	}

}
