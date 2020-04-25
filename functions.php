<?php
/**
 * Paraguas functions and definitions
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//add_theme_support( 'post-thumbnails' );


$paraguas_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/paraguas-customs.php',				// Load Custom Paraguas functions
);

foreach ( $paraguas_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/* Custom Post Type Start */

class sm_texto {

	function sm_texto() {
		add_action('init',array($this,'create_post_type'));
		add_action('init',array($this,'create_taxonomies'));
		add_action('manage_sm_texto_posts_columns',array($this,'columns'),10,2);
		add_action('manage_sm_texto_posts_custom_column',array($this,'column_data'),11,2);
		add_filter('posts_join',array($this,'join'),10,1);
		add_filter('posts_orderby',array($this,'set_default_sort'),20,2);
	}

	function create_post_type() {
		$labels = array(
			'name'               => 'Textos',
			'singular_name'      => 'Texto',
			'menu_name'          => 'Textos',
			'name_admin_bar'     => 'Texto',
			'add_new'            => 'Agregar nuevo',
			'add_new_item'       => 'Agregar nuevo Texto',
			'new_item'           => 'Nuevo Texto',
			'edit_item'          => 'Editar Texto',
			'view_item'          => 'Ver Texto',
			'all_items'          => 'Todos los Textos',
			'search_items'       => 'Buscar Textos',
			'parent_item_colon'  => 'Texto Raíz',
			'not_found'          => 'Ningun Texto Encontrado',
			'not_found_in_trash' => 'Ningun Texto Encontrado en la papelera'
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-book-alt',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
			'has_archive'         => true,
			'rewrite'             => array( 'slug' => 'textos' ),
			'query_var'           => true
		);

		register_post_type( 'sm_texto', $args );
	}

	function create_taxonomies() {

		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => 'Categorías',
			'singular_name'     => 'Categoría',
			'search_items'      => 'Buscar categorías',
			'all_items'         => 'Todas las categorías',
			'parent_item'       => 'Categoría Raíz',
			'parent_item_colon' => 'Categoría Raíz:',
			'edit_item'         => 'Editar categoría',
			'update_item'       => 'Actualizar categoría',
			'add_new_item'      => 'Agregar nueva categoría',
			'new_item_name'     => 'Nuevo nombre de categoría',
			'menu_name'         => 'Categorías',
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tipo' ),
		);

		register_taxonomy('sm_texto_type',array('sm_texto'),$args);

		// Add new taxonomy, NOT hierarchical (like tags)
		$labels = array(
			'name'                       => 'Géneros',
			'singular_name'              => 'Género',
			'search_items'               => 'Géneros',
			'popular_items'              => 'Géneros populares',
			'all_items'                  => 'Todos los Géneros',
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => 'Editar Género',
			'update_item'                => 'Actualizar Género',
			'add_new_item'               => 'Agregar Género Nuevo',
			'new_item_name'              => 'Nuevo Género',
			'separate_items_with_commas' => 'Separe los géneros con comas',
			'add_or_remove_items'        => 'Agregar o quitar Géneros',
			'choose_from_most_used'      => 'Elegir entre los géneros más usados',
			'not_found'                  => 'No se han encontrado géneros',
			'menu_name'                  => 'Géneros',
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'generos' ),
		);

		register_taxonomy('sm_texto_genero','sm_texto',$args);
	}

	function columns($columns) {
		unset($columns['date']);
		unset($columns['taxonomy-sm_texto_genero']);
		unset($columns['comments']);
		unset($columns['author']);
		return array_merge(
			$columns,
			array(
				'sm_autores' => 'Autores',
				'sm_encuadernacion' => 'Encuadernación'
			));
	}

	function column_data($column,$post_id) {
		switch($column) {
			case 'sm_autores' :
				echo get_post_meta($post_id,'autor',1);
				break;
			case 'sm_encuadernacion' :
				echo get_post_meta($post_id,'timeframe',1);
				break;
		}
	}

	function join($wp_join) {
		global $wpdb;
		if(get_query_var('post_type') == 'sm_texto') {
			$wp_join .= " LEFT JOIN (
					SELECT post_id, meta_value AS autor
					FROM $wpdb->postmeta
					WHERE meta_key = 'autor' ) AS meta
					ON $wpdb->posts.ID = meta.post_id ";
		}
		return ($wp_join);
	}

	function set_default_sort($orderby,&$query) {
		global $wpdb;
		if(get_query_var('post_type') == 'sm_project') {
			return "meta.awards DESC";
		}
	 	return $orderby;
	}
}

new sm_texto();

?>