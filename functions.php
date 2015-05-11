<?php
/**
 * wpzaamx functions and definitions
 *
 * @package wpzaamx
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}


/**
 * BS menus support
 */
require get_template_directory() . '/library/inc/wp_bootstrap_navwalker.php';



if ( ! function_exists( 'wpzaamx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpzaamx_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wpzaamx, use a find and replace
	 * to change 'wpzaamx' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wpzaamx', get_template_directory() . '/library/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);


	// This theme uses wp_nav_menu() in one location.
	add_theme_support( 'menus' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wpzaamx' ),
		'footer' => esc_html__( 'Footer Menu', 'wpzaamx' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',             // title less blurb
		'gallery',           // gallery of images
		'link',              // quick link to other site
		'image',             // an image
		'quote',             // a quick quote
		'status',            // a Facebook like status update
		'video',             // video
		'audio',             // audio
		'chat'               // chat transcript
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpzaamx_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif; // wpzaamx_setup
add_action( 'after_setup_theme', 'wpzaamx_setup' );


/* ==================================================================================================================================================== 
 * ==================================================================================================================================================== 
 */

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpzaamx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpzaamx' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wpzaamx_widgets_init' );


/* ==================================================================================================================================================== 
 * ==================================================================================================================================================== 
 */

/**
 * Enqueue scripts and styles.
 */
function wpzaamx_scripts() {
	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	/* ==================================================================================================================================================== 
 		/* register first !! styles and scripts
		*/ 
	if (!is_admin()) {


		// register fontAwesome
		wp_register_style( 'wpzaamx-fontawesome', get_stylesheet_directory_uri() . '/library/fonts/font-awesome/css/font-awesome.min.css', array(), '', 'all' );

		
		// register main stylesheet
		wp_register_style( 'wpzaamx-stylesheet', get_stylesheet_directory_uri() . '/library/stylesheets/styles.css', array(), '', 'all' );

		// ie-only style sheet
		wp_register_style( 'wpzaamx-ie-only', get_stylesheet_directory_uri() . '/library/stylesheets/ie.css', array(), '' );

	    // comment reply script for threaded comments
	    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
	    }

		//adding scripts Bootstrap
		wp_register_script( 'wpzaamx-bootstrapJS', get_stylesheet_directory_uri() . '/library/javascripts/bootstrap.min.js', array( 'jquery' ), '', true );

		//adding scripts file in the footer
		wp_register_script( 'wpzaamx-js', get_stylesheet_directory_uri() . '/library/javascripts/scripts.js', array( 'jquery' ), '', true );



		/* ==================================================================================================================================================== 
 		/* enqueue styles and scripts
		*/ 
		
		wp_enqueue_style( 'wpzaamx-fontawesome' );
		wp_enqueue_style( 'wpzaamx-stylesheet' );
		wp_enqueue_style( 'wpzaamx-ie-only' );

		$wp_styles->add_data( 'wpzaamx-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

		/*
		I recommend using a plugin to call jQuery
		using the google cdn. That way it stays cached
		and your site will load faster.
		*/
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wpzaamx-bootstrapJS' );
		wp_enqueue_script( 'wpzaamx-js' );

		wp_enqueue_script( 'wpzaamx-navigation', get_template_directory_uri() . '/library/javascripts/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'wpzaamx-skip-link-focus-fix', get_template_directory_uri() . '/library/javascripts/skip-link-focus-fix.js', array(), '20130115', true );

	}
}
add_action( 'wp_enqueue_scripts', 'wpzaamx_scripts' );

/**
 * Enqueue external fonts
 */
function wpzaamx_googlefonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'wpzaamx_googlefonts');


/* ==================================================================================================================================================== 
 * ==================================================================================================================================================== 
 */





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/library/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/inc/jetpack.php';
