<?php
/**
 * wpdev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpdev
 */

if ( ! function_exists( 'wpdev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpdev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpdev, use a find and replace
		 * to change 'wpdev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpdev', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wpdev' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpdev_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpdev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpdev_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wpdev_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpdev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpdev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpdev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpdev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpdev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpdev_scripts() {



  // <!-- Custom fonts for this template -->
  // <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  // <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  // <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  // <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  // <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>



	wp_enqueue_style( 'wpdev-style', get_stylesheet_uri() );

	wp_enqueue_style( 'slider1w', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css',false,'1.1','all');
	// wp_enqueue_style( 'agency', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css',false,'1.1','all');

	wp_enqueue_style( 'slider1', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css',false,'1.1','all');

	// wp_enqueue_style( 'wpdev-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wpdev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', false );


	wp_enqueue_script( 'wpdev-navigation', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array(), '20151215', false );
	wp_enqueue_script( 'wpdev-navigationw', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '20151215', false );
	wp_enqueue_script( 'wpdev-navigatione', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', array(), '20151215', false );
	wp_enqueue_script( 'wpdev-navigationr', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array(), '20151215', false );
	wp_enqueue_script( 'wpdev-navigationx', get_template_directory_uri() . '/js/contact_me.js', array(), '20151215', false );
	wp_enqueue_script( 'wpdev-navigationaa', get_template_directory_uri() . '/js/agency.min.js', array(), '20151215', false );


	wp_enqueue_script( 'wpdev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpdev_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

