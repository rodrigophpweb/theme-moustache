<?php

/**
 *
 *
 * Função files_scripts() é responsável por definir onde estão os estilos e scripts 
 * para o carregamento do tema
 *
 *
*/

// Chamando os Arquivos CSS e JS
function files_scripts(){
  // Chamando Arquivos CSS
  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/assets/css/bootstrap.min.css');
  wp_enqueue_style( 'jquery_autocomplete_css', get_template_directory_uri() .'/assets/css/jquery.auto-complete.css');
  wp_enqueue_style( 'slick_css', get_template_directory_uri() .'/assets/css/slick.css');
  wp_enqueue_style( 'slick_theme_css', get_template_directory_uri() .'/assets/css/slick-theme.css');
  wp_enqueue_style( 'style.css', get_stylesheet_uri());  
  

  // Chamando Arquivos JavaScript
  wp_deregister_script('jquery'); //Desregistrando versão antiga do jQuery
  wp_enqueue_script('jquery', get_template_directory_uri() .'/assets/js/jquery-3.4.1.min.js', array(), null, true);
  wp_enqueue_script( 'popper_js', get_template_directory_uri() .'/assets/js/popper.min.js', array('jquery'), '', true);    
  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), '', true);  
  wp_enqueue_script( 'jquery_mask_js', get_template_directory_uri() .'/assets/js/jquery.mask.js', array('jquery'), '', true);
  wp_enqueue_script( 'jquery_autocomplete_js', get_template_directory_uri() .'/assets/js/jquery.auto-complete.min.js', array('jquery'), '', true);
  wp_enqueue_script( 'slick_js', get_template_directory_uri() .'/assets/js/slick.min.js', array('jquery'), '', true);
  wp_enqueue_script( 'scripts_js', get_template_directory_uri() .'/assets/js/scripts.js', array('jquery'), '', true);  

  // Localizar Script JS
  wp_localize_script('scripts_js', 'scripts_js', array('ajax' => admin_url( 'admin-ajax.php' )));

}
add_action('wp_enqueue_scripts', 'files_scripts');

//Removing the version of WordPress on Files CSS and JS
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) {
  $handles_with_version = [ 'style' ];
  if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
      $src = remove_query_arg( 'ver', $src );
  return $src;
}