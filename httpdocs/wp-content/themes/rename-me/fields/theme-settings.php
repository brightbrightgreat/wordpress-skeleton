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

// Sharing.
->add_tab('Open Graph', array(

	// Instructions.
	Field::make('html', 'sharing_instructions')
	->set_html('
		<h3>Sharing - Open Graph</h3>
		<p>Open Graph settings control what shows up on social networks like Facebook, LinkedIn, and Twitter when someon shares this url.</p>
		<p>You <strong>must</strong> set defaults for the site. Defaults will be used on the homepage as well as any pages that are missing information to automatically generate the information.</p>
		<p>You can check what the page returns by using the Facebook Open Graph Debugger: <a href="https://developers.facebook.com/tools/debug">https://developers.facebook.com/tools/debug</a></p>
	'),

	// Open Graph Title.
	Field::make('text', 'og_title', 'Title')
	->set_required(true),

	// Open Graph Description.
	Field::make('textarea', 'og_description', 'Description')
	->set_required(true),

	// Open Graph Image.
	Field::make('image', 'og_image', 'Image')
	->set_required(true)
	->set_help_text('<p>This image will be used as the thumbnail when a post or page is shared and doesn\'t have a featured Image assigned.</p><p>Image should be at least 1200x630.</p>'),

	// Facebook Profile ID.
	Field::make('text', 'facebook_prof', 'Facebook Profile ID')
	->set_required(true),

	// Facebook App ID.
	Field::make('text', 'facebook_app', 'Facebook App ID')
	->set_required(true),

))

// Newsletter.
->add_tab('Newsletter', array(

	// Thank you message.
	Field::make('textarea', 'thank_you', 'Thank You Message')
	->set_required(true)
	->set_help_text('The text shown when the sign up form has been successfully submitted.'),

	// Mailchimp API Key.
	Field::make('text', 'mailchimp_api_key', 'Mailchimp API Key')
	->set_required(true),

	// Mailchimp List ID.
	Field::make('text', 'mailchimp_list_id', 'Mailchimp List ID')
	->set_required(true),

));
