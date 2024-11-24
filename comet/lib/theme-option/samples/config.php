<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix ='comet';

//
// Create options
//
CSF::createOptions( $prefix, array(
  'framework_title' => __('Comet Framework', 'comet'),
  'menu_title'      => __('Theme Option', 'comet'),
  'menu_slug'       => 'comet-theme',
) );



CSF::createSection( $prefix, array(
  'title'  => __('Header', 'comet'),
  'icon'   => 'fa fa-rocket',
  'fields' => array(

    array(
     'id'    => 'opt-upload-1',
     'type'  => 'media',
     'title' => __('White Logo', 'comet'),
    ),
    array(
     'id'    => 'opt-upload-2',
     'type'  => 'media',
     'title' => __('Black Logo', 'comet')
    ),

    array(
      'id'    => 'opt-background-1',
      'type'  => 'media',
      'title' => __('Header Image','comet')
    ),

    array(
      'id'    => 'header-text-1',
      'type'  => 'text',
      'title' => __('Heading', 'comet')
    ),
    array(
      'id'    => 'header-text-2',
      'type'  => 'text',
      'title' => __('Description','comet')
    ),

  )
) );



CSF::createSection( $prefix, array(
  'title'  => __('Footer Area', 'comet'),
  'icon'   => 'fa fa-rocket',
  'id'     => 'footer'
) );

CSF::createSection( $prefix, array(
  'title'  => __('Footer First', 'comet'),
  'icon'   => 'fa fa-square-o',
  'parent' => 'footer',
  'fields' => array(

    array(
      'id'    => 'footer-text-1',
      'title' => __('Footer Copyrihgt', 'comet'),
      'type'  => 'text',
      'default' => '© 2019 Comet Agency.',
    ),

  )
) );

CSF::createSection( $prefix, array(
  'title'  => __('Footer Last', 'comet'),
  'icon'   => 'fa fa-square-o',
  'parent' => 'footer',
  'fields' => array(
    array(
      'id'            => 'footer-social-icon',
      'type'          => 'group',
      'title'         =>  __('Social Icon', 'comet'),
      'button_title'     => __('Add New Icon', 'comet'),
      'fields'  => array(
        array(
          'id'    => 'social-icon',
          'type'  => 'icon',
          'title' => __('Social Icon', 'comet'),
        ),
        array(
          'id'    => 'social-link',
          'type'  => 'text',
          'title' => __('Social Link', 'comet'),
        ),

      ),


    ),

  )
) );
