<?php
/**
 * BP-Origin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BP-Origin
 */

if ( ! function_exists( 'bp_origin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bp_origin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BP-Origin, use a find and replace
	 * to change 'bp_origin' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bp_origin', get_template_directory() . '/languages' );

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
	add_image_size( 'top-tumb', 210, 210, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bp_origin' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bp_origin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'bp_origin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bp_origin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bp_origin_content_width', 640 );
}
add_action( 'after_setup_theme', 'bp_origin_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bp_origin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bp_origin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bp_origin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bp_origin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bp_origin_scripts() {
	wp_enqueue_style( 'foundation-style', get_template_directory_uri().'/layouts/foundation.min.css' );
	wp_enqueue_style( 'bp_origin-style', get_stylesheet_uri(), array(), date('U') );
	wp_enqueue_style( 'font-awesone', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Averia+Serif+Libre:300,400,700|Oleo+Script:400,700|Open+Sans+Condensed:300,700|Open+Sans:300,400,700,800|Roboto+Condensed:300,400,700|Roboto+Slab:300,400,700|Roboto:300,400,700,900' );
	wp_enqueue_style( 'google-mplus1p', 'https://fonts.googleapis.com/earlyaccess/mplus1p.css' );
	wp_enqueue_style( 'google-roundedmplus1c', 'https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css' );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'navbtn-script', get_template_directory_uri() .'/js/navbtn.js', array( 'jquery' ) );
//	wp_enqueue_script( 'bp_origin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bp_origin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'header-fix', get_template_directory_uri() .'/js/header-fix.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bp_origin_scripts' );

// エディタスタイルシート
add_editor_style( get_template_directory_uri() . '/editor-style.css?ver=' . date( 'U' ) );
add_editor_style( '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// 抜粋欄を使用した時の抜粋文の文字制限
function bp_the_excerpt($myexcerpt) {
    $myexcerpt = mb_strimwidth($myexcerpt, 0, 160, "…", "UTF-8");
    return $myexcerpt;
}
add_filter('the_excerpt', 'bp_the_excerpt');

// 概要（抜粋）の省略記号
function bp_more( $more ) {
	return '…';
}
add_filter( 'excerpt_more', 'bp_more' );

/**
 * 管理画面カスタマイズ
 */
// 編集画面の設定
function editor_setting($init) {
	$init[ 'block_formats' ] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre';

	$style_formats = array(
		array( 'title' => 'Tips info',
			'block' => 'div',
			'classes' => 'tips',
			'wrapper' => true ),
		array( 'title' => 'Attention',
			'block' => 'div',
			'classes' => 'attention',
			'wrapper' => true ),
		array( 'title' => 'Highlight',
			'inline' => 'span',
			'classes' => 'highlight') );
	$init[ 'style_formats' ] = json_encode( $style_formats );

	return $init;
}
add_filter( 'tiny_mce_before_init', 'editor_setting');

// スタイルメニューを有効化
function add_stylemenu( $buttons ) {
			array_splice( $buttons, 1, 0, 'styleselect' );
			return $buttons;
}
add_filter( 'mce_buttons_2', 'add_stylemenu' );

// 投稿一覧にサムネイルを追加
function add_thumbnail_column( $columns ) {
	$post_type = isset( $_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : 'post';
	if ( post_type_supports( $post_type, 'thumbnail' ) ) {
		$columns['thumbnail'] = __( 'Featured Images' );
	}
	return $columns;
}
add_filter( 'manage_posts_columns', 'add_thumbnail_column' );

function display_thumbnail_column( $column_name, $post_id ) {
	if ( $column_name == 'thumbnail' ) {
		if ( has_post_thumbnail( $post_id ) ) {
			echo get_the_post_thumbnail( $post_id, array( 50, 50 ) );
		} else {
			_e( 'None' );
		}
	}
}
add_action( 'manage_posts_custom_column', 'display_thumbnail_column', 10, 2 );

/**
 * コメント欄の停止（非表示）
 */
function add_comment_close( $open, $post_id ) {
 $post = get_post( $post_id );
 if ( $post && in_array( $post->post_type, array( 'page', 'post' ) ) ) {
	 $open = false;
 }
 return $open;
}
add_filter( 'comments_open', 'add_comment_close', 10, 2 );

// サムネイル画像取得
function get_thumbnail_url( $size ) {
	global $post;

	if ( has_post_thumbnail() ) {
		$postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
		$url = $postthumb[0];
	} elseif( preg_match( '/wp-image-(\d+)/s', $post->post_content, $thumbid ) ) {
		$postthumb = wp_get_attachment_image_src( $thumbid[1], $size );
		$url = $postthumb[0];
	} else {
		$url = get_template_directory_uri() . '/img/no-image.png';
	}
	return $url;
}

// サムネイル付き最近の投稿一覧ウィジェット
get_template_part('inc/class-bp-widget-recent-posts');
function register_bp_recent_posts_widget() {
    register_widget( 'BP_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'register_bp_recent_posts_widget' );

// サムネイル付きピックアップ投稿一覧ウィジェット
register_nav_menu( 'pickupnav', __( 'Pickup Posts', 'bp_origin' ) );
get_template_part('inc/class-bp-widget-pickup-posts');
function register_bp_pickup_posts_widget() {
    register_widget( 'BP_Widget_Pickup_Posts' );
}
add_action( 'widgets_init', 'register_bp_pickup_posts_widget' );

/**
 * プラグインの有効・無効確認
 */
function is_bp_plugin_active( $plugin ) {
	if ( ! function_exists( 'is_plugin_active' ) ) {
	    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	return is_plugin_active( $plugin );
}
