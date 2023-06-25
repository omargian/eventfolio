<?php

//Poner en cola scripts y hojas de estilo
/*
Para que estos se inserten correctamente en su tema, <?php wp_head(); ?>
* deben colocarse antes de la </head> etiqueta de cierre y <?php wp_footer(); ?>
* antes de la </body> etiqueta de cierre.
* Por convención común de WordPress, estoy nombrando mi script después de mi tema
* ( startwordpress_scripts()). wp_enqueue_stylees para insertar CSS y wp_enqueue_script para JS.
* Después de eso, la matriz contiene el ID, la ubicación del archivo, una matriz adicional con
* las dependencias necesarias (como jQuery) y el número de versión.
*/

//funcion para que google no indexe algunas paginas por id

/* add_filter( 'wp_robots', function( $robots ) {
    $id = get_the_ID();
 
    if ( 28 === $id || 29 === $id || 30 === $id || 3 === $id ) {
		unset( $robots['max-image-preview'] );
        $robots['noindex'] = true;
		$robots['nofollow'] = true;
		$robots['none'] = true;
		$robots['follow'] = false;	
    }else {
        $robots['index'] = true;
		$robots['follow'] = true;
    }
    return $robots;
} ); */
///////////////////////////////////////////


//Agregar etiquetas open graph 
/* function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="fb:app_id" content="Your Facebook App ID" />'; echo"\n";
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';  echo"\n";
	    echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>';  echo"\n";
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';  echo"\n";
        echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>';  echo"\n";
		echo '<meta name="twitter:card" content="summary" />'; echo"\n";
		echo '<meta name="twitter:description" content="' . get_the_excerpt() . '" />'; echo"\n";
		echo '<meta name="twitter:title" content="' . get_the_title() . '" />'; echo"\n";
		
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        $default_image="https://neontikitiger.com/wp-content/uploads/2021/11/Logo-neontt-blanco-y-negro.png"; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';  echo"\n";
		echo '<meta name="twitter:image" content="' . $default_image . '" />'; echo"\n";
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>'; echo"\n";
		echo '<meta name="twitter:image" content="' . esc_attr( $thumbnail_src[0] ) . '" />';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 ); */

function css_scripts() {
	//wp_enqueue_script( 'jquery_cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array(), '1.4.1', true );
	//Favicons
	wp_enqueue_style( 'favicon', get_template_directory_uri() . '/assets/img/favicon.png', array(), '5.1.0' );
	wp_enqueue_style( 'apple-touch', get_template_directory_uri() . '/assets/img/apple-touch-icon.png', array(), '5.1.0' );
	
	//Vendor CSS Files
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '5.1.0' );
	wp_enqueue_style( 'bs-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), '5.1.0' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), '5.1.0' );
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), '5.1.0' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '5.1.0' );
	//Template Main CSS File
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '5.1.0' );	
}
add_action( 'wp_enqueue_scripts', 'css_scripts' );


function js_scripts() {
	//Vendor JS Files
	wp_enqueue_script( 'bs-bundle', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '0.0.0', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '0.0.0', true );
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '0.0.0', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '0.0.0', true );
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), '0.0.0', true );
	wp_enqueue_script( 'simpleParallax', get_template_directory_uri() . '/assets/simpleParallax.js-master/dist/simpleParallax.min.js', array(), '5.6.2', true );
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/gsap-3.3.4/gsap.min.js', array(), '3.3.4', true );
	wp_enqueue_script( 'scrollTrigger', get_template_directory_uri() . '/assets/gsap-3.3.4/ScrollTrigger.min.js', array(), '3.3.4', true );
	wp_enqueue_script( 'typedjs', 'https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js', array(), '2.0.12', true );

	//Template Main JS File
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'js_scripts' );


//Agregamos custom fonts para aaleyahs
function custom_fonts() {
	//wp_enqueue_style( 'custom_fonts_title', get_template_directory_uri() . '/fonts/abel.ttf' );
}
add_action( 'wp_enqueue_scripts', 'custom_fonts' );

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/* Una función de setup, donde indicar el texdomain en caso de que nuestro tema sea multi-idioma,
si soporta thumbnails, title-tag, custom-logo, registrar las áreas de menú, etc…
*/
function my_theme_setup() {
    // Ready for i18n
    load_theme_textdomain( "my_theme", TEMPLATEPATH . "/languages");
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    // Enable support for custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height' => 100,
			'width'  => 100
		)
	);
	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	//Agregar soporte para distintos tamanos de imagenes en imagenes destacadas
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

function my_custom_image_sizes() {
	add_image_size( 'gallery-thumbnail', 150, 150, true );
  }
  add_action( 'after_setup_theme', 'my_custom_image_sizes' );

//Función para eliminar algunos links de la cabecera:
function my_theme_remove_headlinks() {
	remove_action( 'wp_head', 'wp_generator' ); //<meta name="generator" content="WordPress 5.8.1">
	remove_action( 'wp_head', 'rsd_link' ); //<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://mydomain.com/xmlrpc.php?rsd">
	remove_action( 'wp_head', 'wlwmanifest_link' ); //<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="mydomain.com/wp-includes/wlwmanifest.xml">
	remove_action( 'wp_head', 'start_post_rel_link' ); //Muestra el link relacional a la primera entrada
	remove_action( 'wp_head', 'index_rel_link' ); //Etiqueta que muestra cual es la Home de nuestra página web
	remove_action( 'wp_head', 'wp_shortlink_wp_head' ); //Inserta una etiqueta con el shortlink si está definido
	remove_action( 'wp_head', 'adjacent_posts_rel_link' ); //Muestra el link relacional a las entradas adyacentes de la entrada actual
	remove_action( 'wp_head', 'parent_post_rel_link' ); //Muestra el link al padre si está definido
	remove_action( 'wp_head', 'feed_links_extra', 3 ); //Muestra enlace a feed extra como categorias
	remove_action( 'wp_head', 'feed_links', 2 ); //Muestra enlaces al feed general
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //Elimina la carga del JS necesario para los emoji icons en los comentarios
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); //Elimina la carga del CSS necesario para los emoji icons en los comentarios
	remove_action( 'wp_head', 'rest_output_link_wp_head' ); //<link rel="https://api.w.org/" href="http://mydomain.com/wp-json/">
	remove_action( 'wp_head', 'wp_resource_hints', 2 ); // Remove dns-prefetch Link from WordPress Head (Frontend)
}
add_action( 'init', 'my_theme_remove_headlinks' );

//Agregar estracto
add_post_type_support( 'page', 'excerpt' );

//widget
add_theme_support( 'widgets' );

// Disable WordPress Admin Bar for all users
add_filter( 'show_admin_bar', '__return_false' );

// Habilitar la carga de archivos SVG
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

  
