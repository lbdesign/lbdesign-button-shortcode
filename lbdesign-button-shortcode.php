<?php
/**
* Plugin Name: LBDesign Button Shortcode
* Description: A simple button shortcode
* Author: Lauren Pittenger @ LBDesign
* Author URI: http://laurenpittenger.com
* License: GPL
* Version: 1.1
*/

/* our main shortcode function */
function lbdesign_button_shortcode( $atts, $content = null ) {

    $classes[] = '';

    $atts = shortcode_atts(array(
    	'link'  => null,
    	'type'  => 'default',
        'color' => 'default',
    	'size'  => 'default',
        'style' => 'default',
        'custom_class' => null,
    ), $atts, 'lbdesign_button' );

    foreach ( $atts as $key => $att ) {

        if( $key !== 'link' && $key !== 'custom_class' && $att !== null && $att !== '' && $att !== 'default' ) {
            $classes[] = 'lbdesign_' . esc_attr( $att );
        }

        if( $key == 'custom_class' ) {
            $classes[] = esc_attr( $att );
        }

    }

   return '<a class="lbdesign_button ' . implode( $classes, " " ) . '" href="' . esc_url( $atts['link'] ) . '">' . do_shortcode( $content ) . '</a>';

}
add_shortcode( 'lbdesign_button', 'lbdesign_button_shortcode' );


/* enqueue the default button styles */
function lbdesign_button_styles() {

    /* default styles */
    wp_register_style( 'lbdesign-button-shortcode', plugins_url() . '/lbdesign-button-shortcode/css/lbdesign_button_shortcode.css' );
    wp_enqueue_style( 'lbdesign-button-shortcode' );

}
add_action( 'wp_enqueue_scripts', 'lbdesign_button_styles' );

function lbdesign_tinymce_buttons() {

    add_filter( 'mce_external_plugins', 'lbdesign_add_buttons' ); // hooks plugin to TinyMCE
    add_filter( 'mce_buttons', 'lbdesign_register_buttons' ); // used to show which buttons to show on TinyMCE

}
add_action( 'init', 'lbdesign_tinymce_buttons' );

/* add custom button to wp editor */
function lbdesign_add_buttons( $plugin_array ) {

    $plugin_array['lbdesign'] = plugins_url( '/js/lbdesign-button-shortcode.js', __FILE__ ); // LBDesignButtonShortcode is the plugin ID
    return $plugin_array;

}

function lbdesign_register_buttons( $buttons ) {

    array_push( $buttons, '|', 'buttonshortcode' ); // buttonshortcode is the button ID
    return $buttons;

}

/**
 * Localize Script
 */
function lbdbs_admin_head() {
  $plugin_url = plugins_url( '/', __FILE__ );
  ?>
  <!-- TinyMCE Shortcode Plugin -->
  <script type='text/javascript'>
  var lbdbs_plugin = {
      'url': '<?php echo $plugin_url; ?>',
  };
  </script>
  <!-- TinyMCE Shortcode Plugin -->
  <?php
}
add_action( "admin_head", 'lbdbs_admin_head' );
