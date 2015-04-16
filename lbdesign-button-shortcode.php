<?php
/**
* Plugin Name: LBDesign Button Shortcode
* Description: A simple button shortcode
* Author: Lauren Pittenger @ LBDesign
* Version: 1.0
* Last Updated: 2015-04-15
*/

/* our main shortcode function */
function lbdesign_button($atts, $content = null) {
   $atts = shortcode_atts(array(
		'link' => '#',
		'type' => 'default',
        'color' => '',
		'size' => 'default'
    ), $atts, 'lbdesign_button');
   return '<a class="button ' . $atts['type'] . ' ' . $atts['color'] . ' ' . $atts['size'] . '" href="'.$atts['link'].'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'lbdesign_button');



/* enqueue the default button styles */
function lbdesign_button_styles() {

    /* default styles */
    wp_register_style( 'lbdesign-button-shortcode', plugins_url() . '/lbdesign-button-shortcode/css/style.css');
    wp_enqueue_style( 'lbdesign-button-shortcode' );

}
add_action( 'wp_enqueue_scripts', 'lbdesign_button_styles' );



add_action( 'init', 'lbdesign_tinymce_buttons' );
function lbdesign_tinymce_buttons() {
    add_filter( "mce_external_plugins", "lbdesign_add_buttons" ); // hooks plugin to TinyMCE
    add_filter( 'mce_buttons', 'lbdesign_register_buttons' ); // used to show which buttons to show on TinyMCE
}
/* add custom button to wp editor */
function lbdesign_add_buttons( $plugin_array ) {
    $plugin_array['lbdesign'] = plugins_url('/js/lbdesign-button-shortcode.js',__FILE__); // LBDesignButtonShortcode is the plugin ID
    return $plugin_array;
}
function lbdesign_register_buttons( $buttons ) {
    array_push( $buttons, 'buttonshortcode' ); // buttonshortcode is the button ID
    return $buttons;
}
