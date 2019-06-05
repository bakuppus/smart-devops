<?php
/**
 * OneAcademy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OneAcademy
 */

if ( ! function_exists( 'oneacademy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oneacademy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on OneAcademy, use a find and replace
		 * to change 'oneacademy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oneacademy', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'oneacademy' ),
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
		add_theme_support( 'custom-background', apply_filters( 'oneacademy_custom_background_args', array(
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
add_action( 'after_setup_theme', 'oneacademy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oneacademy_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'oneacademy_content_width', 640 );
}
add_action( 'after_setup_theme', 'oneacademy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oneacademy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oneacademy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'oneacademy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'oneacademy_widgets_init' );



function my_customize_register( $wp_customize ) {
$wp_customize->add_panel( 'oneacademy_theme', array(
  'title' => __( 'OneAcademy Theme' ),
  // 'description' => $description, // Include html tags such as <p>.
  'priority' => 160, // Mixed with top-level-section hierarchy.
) );

$wp_customize->add_section('oneacademy_section', array(
        'title'    => __('Sections', 'oneacademy'),
				'panel' => 'oneacademy_theme',
        'priority' => 120,
    ));

$oneacademy_theme_sections= [
    'welcome',
    'lms',
    'vclassrooms',
    'ecommerce',
    'successStories',
    'partners',
    'emailSubscribe'
  ];

foreach ($oneacademy_theme_sections as $oneacademy_theme_section) {
// echo $oneacademy_theme_section;
	$wp_customize->add_setting('section_'.$oneacademy_theme_section, array(
			'default'        => !is_null($wp_customize->get_setting('section_['.$oneacademy_theme_section.']')) ? $wp_customize->get_setting('section_['.$oneacademy_theme_section.']') : 'text',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
	));
	$wp_customize->add_control('section_'.$oneacademy_theme_section, array(
			'label'      => __($oneacademy_theme_section.' Section', 'oneacademy'),
			'section'    => 'oneacademy_section',
			'settings'   => 'section_'.$oneacademy_theme_section,
	));
}

}
add_action('customize_register','my_customize_register');


/**
 * Enqueue scripts and styles.
 */
function oneacademy_scripts() {
	wp_enqueue_style( 'oneacademy-style', get_stylesheet_uri() );
	wp_enqueue_style( 'oneacademy-fullPageCss', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.3/fullpage.css' );
	wp_enqueue_style( 'oneacademy-bs4-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'oneacademy-fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	wp_enqueue_style( 'oneacademy-fontMuli', 'https://fonts.googleapis.com/css?family=Muli' );


	wp_enqueue_script( 'oneacademy-JQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '20151215', true );
wp_enqueue_script( 'oneacademy-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '20151215', true );
wp_enqueue_script( 'oneacademy-bs4-scripts', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '20151215', true );

	wp_enqueue_script( 'oneacademy-fullPage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.3/fullpage.extensions.min.js', array(), '20151215', true );
	wp_enqueue_script( 'oneacademy-scrolloverflow', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.3/vendors/scrolloverflow.min.js', array(), '20151215', true );
	wp_enqueue_script( 'oneacademy-sectionInfo', get_template_directory_uri() . '/js/sectionsInfo.js', array(), '20151215', true );
	wp_enqueue_script( 'oneacademy-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	wp_enqueue_script( 'oneacademy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'oneacademy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oneacademy_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
