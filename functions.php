<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_agendaminutes-program',
		'title' => 'Agenda/Minutes Program',
		'fields' => array (
			array (
				'key' => 'field_59fb4062f6f5f',
				'label' => 'YouTube Video URL',
				'name' => 'youtube_video_id',
				'type' => 'text',
				'instructions' => 'The YouTube Video URL is the public web page link that looks like https://www.youtube.com/watch?v=123abc456def',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fb4154f6f60',
				'label' => 'Agenda ID',
				'name' => 'agenda_id',
				'type' => 'text',
				'instructions' => 'This is the ID of the file in your Google Drive. It is the random string of numbers and letters in the URL.<br>
	e.g. https://docs.google.com/file/d/[ID FOUND HERE]/preview?rm=minimal',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fb5c0255c8a',
				'label' => 'Minutes ID',
				'name' => 'minutes_id',
				'type' => 'text',
				'instructions' => 'This is the ID of the file in your Google Drive. It is the random string of numbers and letters in the URL.<br>
	e.g. https://docs.google.com/file/d/[ID FOUND HERE]/preview?rm=minimal',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_59fb84bafb318',
				'label' => 'Meeting Date',
				'name' => 'meeting_date',
				'type' => 'date_picker',
				'instructions' => 'Choose the date the meeting happened / will happen',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'yymmdd',
				'first_day' => 1,
			),
			array (
				'key' => 'field_59fb5c2855c8b',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'council' => 'City Council',
					'pnz' => 'Planning & Zoning',
					'other' => 'Other',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_category',
					'operator' => '==',
					'value' => '43',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'discussion',
				4 => 'comments',
				5 => 'author',
				6 => 'format',
				7 => 'featured_image',
				8 => 'tags',
				9 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
?>