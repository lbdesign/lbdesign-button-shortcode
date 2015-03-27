<?php
/**
* Plugin Name: LBDesign Button Shortcode
* Description: A simple button shortcode
* Author: Lauren Pittenger @ LBDesign
* Version: 1.0
* Last Updated: 2015-03-11
*/

function lbdesign_button($atts, $content = null) {
   $atts = shortcode_atts(array(
		'link' => '#',
		'color' => '',
		'size' => ''
   	), $atts));
   return '<a class="button ' . $color . ' ' . $size . '" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'lbdesign_button');