<?php

/** 
 * Arquivo mágico do tema. Não é um arquivo obrigatório, mas é essencial para a
 * organização do código, para ativar funcionalidades no tema como menus, thumbnails,
 * novos tamanhos de imagem, entre outros. Funciona basicamente como um plugin
 * dentro do tema, e é carregado primeiro, antes de qualquer template do tema.
 * 
 * @since Essential
 */

	/**
	 * Função de segurança para evitar que o arquivo seja lido diretamente no 
	 * navegador, o que pode expor o caminho físico do arquivo no servidor. Insira
	 * esse trecho de código em todos os arquivos do tema.
	 * 
	 * @since Standard
	 */
	if ( ! function_exists( 'add_action' ) ) exit;

/**
 * Hook de ação do WordPress executado sempre que uma página é carregada logo após
 * o tema ser inicializado. Utilize-o para organizar melhor seu arquivo functions.
 * 
 * @since Standard
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 */
add_action( 'after_setup_theme', 'moustache_setup_theme' );

/**
 * Moustache Setup Theme
 * 
 * Função de setup do tema, inicializa todos os hooks do tema, e realiza a chamada
 * para funções que criam algumas "features" do tema.
 * 
 * Chamada no hook after_setup_theme
 * 
 * @return void
 * @since Standard
 */
function moustache_setup_theme(){
	/**
	 * Crie funções que façam somente um procedimento, tenham somente uma lógica, 
	 * para facilitar futuras manutenções no código.
	 * 
	 * Sempre utilize prefixos nas funções criadas para evitar conflitos com outras
	 * funções já existentes.
	 * 
	 * @since Standard
	 */
	moustache_theme_supports();
	moustache_nav_menus();

	/**
	 * Assinatura de todos os hooks do WordPress. Os hooks (ganchos) são a maneira 
	 * que temos de personalizar/modificar algum comportamento padrão do WordPress
	 * sem precisar alterar seu código fonte. Existem dois tipos de hooks, os de 
	 * ação e os de filtro. Para os hooks de ação sempre utilizamos add_action() e 
	 * para os filtros utilizamos add_filter().
	 * 
	 * @since Standard
	 * @link https://codex.wordpress.org/Function_Reference/add_action
	 * @link https://codex.wordpress.org/Function_Reference/add_filter
	 */
	add_action( 'the_generator', '__return_false' ); 
	// Segurança: Remove a meta tag generator do cabeçalho

	add_filter( 'excerpt_length', 'moustache_excerpt_length' ); 
	// Filtro que define a quantidade de palavras exibidas em um resumo
	
	include_once('inc/style-scripts.php');     
	// Chamar arquivo responsável por carregar os script e estilos do site

	add_action( 'admin_menu', 'moustache_admin_menu' ); 
	// Faz alterações (inclui/exclui) no menu administrativo do WordPress
	
	add_action( 'admin_init', 'moustache_wp_settings' ); 
	// Utiliza a Settings API para iniciar as options que serão inseridas em paginas do WordPress
	
	add_action( 'admin_init', 'moustache_theme_settings' ); 
	// Utiliza a Settings API para iniciar as options que serão inseridas na página que criamos na administração
	
	
	add_action( 'wp_ajax_nopriv_more_posts', 'moustache_more_posts_ajax' ); 
	// Captura uma requisição ajax para usuários não logados

	add_action( 'the_generator', '__return_false' ); // Segurança: Remove a meta tag generator do cabeçalho

}

function moustache_theme_supports(){
	/**
	 * Adiciona ao tema suporte à imagem destacadas
	 * 
	 * @since Essential
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', 
		array( 'search-form',) 
	);
}

/**
 * Moustache Nav Menus
 * 
 * Função do tema criada para registrar as áreas de menu. Não é chamada por nenhum
 * hook, mas pela função de setup do tema.
 * 
 * @since Standard
 */
function moustache_nav_menus(){
	/**
	 * Adiciona ao tema áreas de menu que podem ser configuradas via administração
	 * 
	 * @since Essential
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menu
	 */
	register_nav_menu( 'moustache-menu-header', 'Menu do cabeçalho.' );
}


if ( ! function_exists( 'moustache_apiki_excerpt_length' ) ) :
	/**
	 * Moustache Excerpt Length
	 * 
	 * Chamada pelo hook de filtro excerpt_length, utilizada para customizar o tamanho do 
	 * resumo dos posts.
	 * 
	 * @param int $length O número de palavras que serão exibidas pelo resumo, por padrão 55.
	 * @since Standard
	 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
	 */
	function moustache_excerpt_length( $length )
	{
		$length = 20;

		/**
		 * Tag condicional do WordPress, que retorna um verdadeiro/falso, testa se a 
		 * página em exibição é a página de listagem de posts por tag.
		 * 
		 * @since Standard
		 * @link https://codex.wordpress.org/Function_Reference/is_tag
		 */
		if ( is_home() or is_category() or is_search() ) :
			$length = 22;
		endif;

		/**
		 * Notem que todas as funções que são chamadas dentro de um hook de filtro devem
		 * retornar um valor.
		 * 
		 * @since Standard
		 */
		return $length;
	}
endif;


/**
  * Função que lista todos os posts e paginas utilizando a WP_Query e faz requisição em Ajax
  * @since Essential
  * @link  https://developer.wordpress.org/reference/classes/wp_query/
  *
  */
function ajax_search() {
	$args = new WP_Query( array(
		'post_type'     => array( 'post', 'page' ),
		'post_status'   => 'publish',
		'nopaging'      => true,
		'posts_per_page'=> -1,
		's'             => stripslashes( $_POST['search'] ),
	) );

	$items = array();

	if ( !empty( $args->posts ) ) {
		foreach ( $args->posts as $result ) {
			$items[] = $result->post_title;
		}
	}

	wp_send_json_success( $items );
}
add_action( 'wp_ajax_search_site',        'ajax_search' );
add_action( 'wp_ajax_nopriv_search_site', 'ajax_search' );


//Adicionando classes para li do menu
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);



// Registrando sidebar 
register_sidebar( array(
	'name' 			=> 'Sidebar 1',
	'id' 			=> 'sidebar-1',
	'description' 	=> 'Escritório de Atendimento',
	'before_widget'	=> '<div class="col-lg-4">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h3>',
	'after_title' 	=> '</h3>',
));

register_sidebar( array(
	'name' 			=> 'Sidebar 2',
	'id' 			=> 'sidebar-2',
	'description' 	=> 'Núcleo de desenvolvimento',
	'before_widget'	=> '<div class="col-lg-4">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h3>',
	'after_title' 	=> '</h3>',
));

register_sidebar( array(
	'name' 			=> 'Sidebar 3',
	'id' 			=> 'sidebar-3',
	'description' 	=> 'Contas Internacionais',
	'before_widget'	=> '<div class="col-lg-4">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h3>',
	'after_title' 	=> '</h3>',
));

//Remover Versão do WordPress
function remove_version() {
	return '';
}
add_filter('the_generator', 'remove_version');


// Disable function REST API
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// Menu WordPress with Bootstrap
//require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


// Removendo os comentários
function remove_custom_post_comment() {
    remove_post_type_support( 'book', 'comments' );
}
add_action( 'init', 'remove_custom_post_comment' );
