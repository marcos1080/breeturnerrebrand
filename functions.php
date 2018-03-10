<?php
/**
 * Bree Turner v2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bree_Turner_v2
 */

if ( ! function_exists( 'bree_turner_v2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bree_turner_v2_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bree Turner v2, use a find and replace
		 * to change 'bree-turner-v2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bree-turner-v2', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bree-turner-v2' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bree_turner_v2_custom_background_args', array(
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
add_action( 'after_setup_theme', 'bree_turner_v2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bree_turner_v2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bree_turner_v2_content_width', 640 );
}
add_action( 'after_setup_theme', 'bree_turner_v2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bree_turner_v2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bree-turner-v2' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bree-turner-v2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bree_turner_v2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bree_turner_v2_scripts() {
	wp_enqueue_style( 'bree-turner-v2-style', get_stylesheet_uri() );

        wp_enqueue_script( 'bree-turner-v2-imagelinker', get_template_directory_uri() . '/js/imagelinker.js', array(), '20180310', true );
        
	wp_enqueue_script( 'bree-turner-v2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bree-turner-v2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bree_turner_v2_scripts' );

/**
 * Add scripts for the admin pages.
 */
if( !function_exists( 'bree_turner_v2_admin_scripts' ) ) {
    function bree_turner_v2_admin_scripts() {
        wp_enqueue_style( 'breeturner-admin-css', get_template_directory_uri().'/css/admin.css', array(), '1.0.0', 'all');
        
        // Wordpress media uploader. Used on the location pages.
        wp_enqueue_media();
        wp_enqueue_script( 'breeturner-admin-scripts', get_template_directory_uri().'/js/admin.js', array('jquery') );
    }

    add_action( 'admin_enqueue_scripts', 'bree_turner_v2_admin_scripts' );
}

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

// Add custom posts
include_once 'template-parts/post-audio.php';

// Add CV menu page
function bree_turner_v2_add_CV_page() {
    add_menu_page(
        __( 'CV', 'textdomain' ),
        'CV',
        'manage_options',
        'cv',
        'bree_turner_v2_dispay_CV_page',
        'dashicons-id-alt',
        6
    );
} 
add_action( 'admin_menu', 'bree_turner_v2_add_CV_page' );

function bree_turner_v2_dispay_CV_page() {
    ?>
	<div class="wrap">
		<h2>CV Selector</h2>
                <form method="post" action="options.php">
                    <?php settings_fields( 'bree_turner_v2_CV_group' ); ?>
                    <?php do_settings_sections( 'bree_turner_v2_CV_group' ); ?>
                    <table class="form-table">
                        <tr valign="top">
                        <th scope="row">Pdf file</th>
                        <td>
                            <input id="file-id" type="text" name="bree_turner_v2_CV" value="<?php echo esc_attr( get_option('bree_turner_v2_CV') ); ?>" hidden/>
                            <input id="file-name" type="text" value="<?php echo get_the_title( esc_attr( get_option('bree_turner_v2_CV') ) ); ?>" />
                            <input id="cv-select" class="button" type="button" value="Select">
                        </td>
                        </tr>
                    </table>

                    <?php submit_button(); ?>
                </form>
	</div>
<?php
}

// Add CV setting.
function bree_turner_v2_register_settings() {
   register_setting( 'bree_turner_v2_CV_group', 'bree_turner_v2_CV' );
}
add_action( 'admin_init', 'bree_turner_v2_register_settings' );