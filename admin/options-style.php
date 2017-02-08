<?php
/*
* Dyanamic CSS
 */

function wpautomate_options_css() {
    wp_enqueue_style('wpautomate-theme-options', get_template_directory_uri() . '/css/theme-options.css');

    $color = "#000111";
    $css = ".mycolor{ background: {$color}; }";
    wp_add_inline_style( 'wpautomate-theme-options', $css );

    $custom_css = wpautomate_theme_opt('css_editor');
    wp_add_inline_style( 'wpautomate-theme-options', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'wpautomate_options_css', 101 );

function wpautomate_inline_script() {
	$custom_js = wpautomate_theme_opt('js_editor');
  if ( wp_script_is( 'jquery', 'done' ) ) {
?>
<script type="text/javascript">
<?php echo $custom_js; ?>
</script>
<?php
  }
}
add_action( 'wp_footer', 'wpautomate_inline_script' );
