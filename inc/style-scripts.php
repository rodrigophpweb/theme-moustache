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
  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/assets/css/bootstrap.min.css');
  wp_enqueue_style( 'style.css', get_stylesheet_uri());  
  
  wp_deregister_script('jquery'); //Desregistrando versão antiga do jQuery
  wp_enqueue_script('jquery', get_template_directory_uri() .'/assets/js/jquery-3.4.1.min.js', array(), null, true);
  wp_enqueue_script( 'popper_js', get_template_directory_uri() .'/assets/js/popper.min.js', array('jquery'), '', true);    
  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), '', true);  
  wp_enqueue_script( 'jquery_mask_js', get_template_directory_uri() .'/assets/js/jquery.mask.js', array('jquery'), '', true);
  wp_enqueue_script( 'scripts_js', get_template_directory_uri() .'/assets/js/scripts.js', array('jquery'), '', true);  
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