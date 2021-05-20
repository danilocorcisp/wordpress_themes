<?php

load_theme_textdomain( 'kakadu', get_template_directory() . '/languages' );
show_admin_bar( false );

// ADDING CSS AND JS

function kakadu_setup(){
   
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600;1,700;1,900&display=swap');
    wp_enqueue_style('andbank', get_theme_file_uri( '/css/andbank.css' ), NULL, microtime(), 'all');
    wp_enqueue_style('custom', get_theme_file_uri( '/css/custom.css' ), NULL, microtime(), 'all');
    // wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), false, true );
    wp_enqueue_script( 'main', 'http://www.marqueterie.com.br/andbank/js/main.js', null, null, true );
    
    
    
    
    
    
    
}

add_action( 'wp_enqueue_scripts', 'kakadu_setup');

// ADDING THEME SUPPORT

function kakadu_init() {
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag');
    add_theme_support( 'html5',
    array('comment-list', 'comment-form', 'search-form', 'navigation-widgets')    
    );

    // Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// // Add support for full and wide align images.
		// add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

        // Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height.
		add_theme_support( 'custom-line-height' );
}

add_action( 'after_setup_theme', 'kakadu_init');

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

// disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');


function html5_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  $src  = wp_get_attachment_image_src( $id, $size, false );
  $html5 = "<figure id=\"post-$id media-$id\" class=\"align-$align\">";

  if ( $url ) {
    $html5 .= "<a href=\"$url\" class=\"image-link\"><img src=\"$src[0]\" alt=\"$alt\" /></a>";
  } else {
    $html5 .= "<img src=\"$src[0]\" alt=\"$alt\" />";
  }

  if ( $caption ) {
    $html5 .= "<figcaption>$caption</figcaption>";
  }

  $html5 .= "</figure>";
  return $html5;
}
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

// function html5_insert_image($html, $id, $caption, $title, $align, $url) {
//   $html5 = "<figure id='post-$id media-$id' class='align-$align'>";
//   $html5 .= "<img src='$url' alt='$title' />";
//   if ($caption) {
//     $html5 .= "<figcaption>$caption</figcaption>";
//   }
//   $html5 .= "</figure>";
//   return $html5;
// }
// add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

// // removing caption

// add_shortcode( 'wp_caption', 'fixed_img_caption_shortcode' );
// add_shortcode( 'caption', 'fixed_img_caption_shortcode' );

// function fixed_img_caption_shortcode($attr, $content = null) {
// if ( ! isset( $attr['caption'] ) ) {
// if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
//      $content = $matches[1];
//      $attr['caption'] = trim( $matches[2] );
//      }
//  }
//  $output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
//      if ( $output != '' )
//      return $output;
//  extract( shortcode_atts(array(
//  'id'      => '',
//  'align'   => 'alignnone',
//  'width'   => '',
//  'caption' => ''
//  ), $attr));
//  if ( 1 > (int) $width || empty($caption) )
//  return $content;
//  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
//  return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' 
//  . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
//  }




// ADDING CUSTOM MENU

function kakadu_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' ),
      'footer-menu' => __( 'Footer Menu' )
     )
   );
 }
 add_action( 'init', 'kakadu_menus' );

 //LOGO MARKUP

function kakadu_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 700,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'kakadu_custom_logo_setup' );


// ADDING CUSTOM POSTS

function kakadu_antes(){
    register_post_type( 'antes', 
     array(
        'rewrite' => array('slug' => 'antes'),
        'labels' => array(
            'name' => '00. Anteriores',
            'singular_name' => 'Anteriores',
            'add_new_name' => "Adicionar novo Anteriores",
            'edit_item' => 'Edit Anteriores'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_antes');

function kakadu_indice(){
    register_post_type( 'indice', 
     array(
        'rewrite' => array('slug' => 'indice'),
        'labels' => array(
            'name' => '00. Índice',
            'singular_name' => 'Índice',
            'add_new_name' => "Adicionar novo Índice",
            'edit_item' => 'Edit Índice'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_indice');

function kakadu_header(){
    register_post_type( 'cabecalho', 
     array(
        'rewrite' => array('slug' => 'cabecalho'),
        'labels' => array(
            'name' => '00. Header',
            'singular_name' => 'Header',
            'add_new_name' => "Adicionar novo Header",
            'edit_item' => 'Edit Header'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_header');


function kakadu_editorial(){
    register_post_type( 'editorial', 
     array(
        'rewrite' => array('slug' => 'editorial'),
        'labels' => array(
            'name' => '02. Carta Editorial',
            'singular_name' => 'Carta Editorial',
            'add_new_name' => "Adicionar nova Carta Editorial",
            'edit_item' => 'Edit Carta Editorial'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_editorial');

function kakadu_mercado(){
    register_post_type( 'mercado', 
     array(
        'rewrite' => array('slug' => 'mercado'),
        'labels' => array(
            'name' => '03. De Olho no Mercado',
            'singular_name' => 'De Olho no Mercado',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit De Olho no Mercado'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_mercado');

function kakadu_fique(){
    register_post_type( 'fique', 
     array(
        'rewrite' => array('slug' => 'fique'),
        'labels' => array(
            'name' => '04. Fique por Dentro',
            'singular_name' => 'Fique por Dentro',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Fique por Dentro'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_fique');

function kakadu_aniversario(){
    register_post_type( 'aniversario', 
     array(
        'rewrite' => array('slug' => 'aniversario'),
        'labels' => array(
            'name' => '05. Aniversariantes',
            'singular_name' => 'Aniversariantes',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Aniversariantes'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_aniversario');

function kakadu_porai(){
    register_post_type( 'porai', 
     array(
        'rewrite' => array('slug' => 'porai'),
        'labels' => array(
            'name' => '06. Por Aí',
            'singular_name' => 'Por Aí',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Por Aí'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_porai');

function kakadu_conexao(){
    register_post_type( 'conexao', 
     array(
        'rewrite' => array('slug' => 'conexao'),
        'labels' => array(
            'name' => '07. Conexão',
            'singular_name' => 'Conexão',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Conexão'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_conexao');

function kakadu_bemestar(){
    register_post_type( 'bemestar', 
     array(
        'rewrite' => array('slug' => 'bemestar'),
        'labels' => array(
            'name' => '08. Bem-Estar',
            'singular_name' => 'Bem-Estar',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Bem-Estar'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_bemestar');

function kakadu_gente(){
    register_post_type( 'gente', 
     array(
        'rewrite' => array('slug' => 'gente'),
        'labels' => array(
            'name' => '09. Gente Interessante',
            'singular_name' => 'Gente Interessante',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Gente Interessante'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_gente');

function kakadu_mundo(){
    register_post_type( 'mundo', 
     array(
        'rewrite' => array('slug' => 'mundo'),
        'labels' => array(
            'name' => '10. Anbank no Mundo',
            'singular_name' => 'Anbank no Mundo',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Anbank no Mundo'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_mundo');

function kakadu_mensagem(){
    register_post_type( 'mensagem', 
     array(
        'rewrite' => array('slug' => 'mensagem'),
        'labels' => array(
            'name' => '11. Mensagem',
            'singular_name' => 'Mensagem',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Mensagem'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_mensagem');

function kakadu_aberta(){
    register_post_type( 'aberta', 
     array(
        'rewrite' => array('slug' => 'aberta'),
        'labels' => array(
            'name' => '12. Seção Aberta',
            'singular_name' => 'Seção Aberta',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Seção Aberta'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_aberta');

function kakadu_off(){
    register_post_type( 'off', 
     array(
        'rewrite' => array('slug' => 'off'),
        'labels' => array(
            'name' => '13. Momento OFF',
            'singular_name' => 'Momento OFF',
            'add_new_name' => "Adicionar nova matéria",
            'edit_item' => 'Edit Momento OFF'
        ),
        'menu-icon' => 'dashicons-heart',
        'public' => true,
        'has_archives' => true,
        'taxonomies' => array('post_tag','category'),
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments'
        )


     ) 
    );
}

add_action( 'init', 'kakadu_off');

// ADD IMAGE FILTER


function kakadu_add_image_class ($class){
    $class .= ' img-fluid';
    return $class;
    }

    add_filter('get_image_tag_class','kakadu_add_image_class');


function kakadu_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}


// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'BQ Estilo Preto',  
			'block' => 'div',  
			'classes' => 'bg-quotes2',
			'wrapper' => true,
		), 
        array(  
			'title' => 'BQ Estilo Vermelho',  
			'block' => 'div',  
			'classes' => 'bg-quotes',
			'wrapper' => true,
		), 
        array(  
            'title' => 'BQ Texto',  
            'block' => 'blockquote',  
            'classes' => 'blockquote',
            'wrapper' => false,
        ),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

