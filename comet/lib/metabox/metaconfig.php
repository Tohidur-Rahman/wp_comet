<?php

add_action('cmb2_admin_init', 'metabox_for_posts');

function metabox_for_posts(){

  $box = new_cmb2_box(array(
    'id'          => 'additional-box',
    'title'       => __('Additional Fields : &nbsp;Please click the format', 'comet'),
    'object_types' => array('post')
  ));

  $box->add_field( array(
		'name'       => __('Video URL', 'comet'),
		'id'         => '_for-video',
		'type'       => 'oembed'
	) );
  $box->add_field( array(
		'name'       => __('Audio URL', 'comet'),
		'id'         => '_for-audio',
		'type'       => 'oembed'
	) );
  $box->add_field( array(
		'name'       => __('Gallery Image', 'comet'),
		'id'         => '_for-gallery',
		'type'       => 'file_list',
	) );


  $slider = new_cmb2_box(array(
    'id'          => 'additional-slider',
    'title'       => __('First Button', 'comet'),
    'object_types' => array('comet-slider')
  ));

  $slider->add_field( array(
		'name'       => __('Subtitle', 'comet'),
		'id'         => '_slider-Subtitle',
		'type'       => 'text',
	) );

  $slider->add_field( array(
		'name'       => __('First Button Text', 'comet'),
		'id'         => '_button-text',
		'type'       => 'text',
	) );

  $slider->add_field( array(
		'name'       => __('First Button Link', 'comet'),
		'id'         => '_button-link',
		'type'       => 'text_url',
	) );

  $slider->add_field( array(
  	'name'             => 'First Button Select',
  	'id'               => '-button-select',
  	'type'             => 'select',
  	'default'          => 'custom',
  	'options'          => array(
  		'red' => __( 'Red Button', 'comet' ),
  		'transparent'   => __( 'Transparent', 'comet' ),

  	),
  ) );
  $slider->add_field( array(
		'name'       => __('Second Button Text', 'comet'),
		'id'         => '_2n-button-text',
		'type'       => 'text',
	) );

  $slider->add_field( array(
		'name'       => __('Second Button Link', 'comet'),
		'id'         => '_2n-button-link',
		'type'       => 'text_url',
	) );

  $slider->add_field( array(
  	'name'             => 'Second Button Select',
  	'id'               => '-2n-button-select',
  	'type'             => 'select',
  	'default'          => 'custom',
  	'options'          => array(
  		'red' => __( 'Red Button', 'comet' ),
  		'transparent'   => __( 'Transparent', 'comet' ),

  	),
  ) );

}
