<?php


add_action('after_setup_theme', 'setup_theme_support');

function setup_theme_support(){
  add_theme_support('woocommerce');
}
