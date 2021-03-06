<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BP-Origin
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns#">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if( is_home() || is_front_page() ): // トップページ用のメタデータ ?>
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
  <meta property="og:url" content="<?php echo esc_url(home_url( '/' )); ?>">
  <meta property="og:description" content="<?php echo esc_attr( wp_trim_words( $post->post_excerpt, 100, '…' ) ); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/site-top.png">
<?php endif; // トップページ用のメタデータ【ここまで】 ?>
<?php if( is_single() || is_page() ): //記事の個別ページ用のメタデータ ?>
  <meta name="description" content="<?php echo wp_trim_words( $post->post_content, 100, '…' ); ?>">
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:description" content="<?php echo esc_attr( wp_trim_words( $post->post_excerpt, 100, '…' ) ); ?>">
  <meta property="og:image" content="<?php echo get_thumbnail_url( 'large' ); ?>">
<?php endif; //記事の個別ページ用のメタデータ【ここまで】?>
<?php if( is_category() || is_tag() ): // カテゴリー・タグページ用のメタデータ ?>
<?php if( is_category() ) {
    $termid = $cat;
    $taxname = 'category';
} elseif( is_tag() ) {
    $termid = $tag_id;
    $taxname = 'post_tag';
} ?>
  <meta name="description" content="<?php single_term_title(); ?><?php echo esc_attr(__(' Events List', 'SagasWhat')); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php single_term_title(); ?> | <?php bloginfo( 'name' ); ?>">
  <meta property="og:url" content="<?php echo get_term_link( $termid, $taxname ); ?>">
  <meta property="og:description" content="<?php single_term_title(); ?><?php echo esc_attr(__(' Events List', 'SagasWhat')); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/site-top.png">
<?php endif; // カテゴリ・タグページ用のメタデータ【ここまで】 ?>

<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:locale" content="ja_JP">
<meta property="og:locale:alternate" content="en_US">
<meta property="og:locale:alternate" content="en_GB">
<meta property="og:locale:alternate" content="zh_TW">

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<div id="fb-root"></div>
<?php if ( 'ja' == get_bloginfo('language') ) : ?>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<?php else : ?>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>

<script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bp_origin' ); ?></a>

  <header id="masthead" class="site-header" role="banner">
    <div class="row">
      <div class="site-branding large-6 columns">
        <h1 class="site-logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="wpd-cafe" />
          </a>
        </h1>
      </div>
      <div class="site-address large-6 columns">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>Any wording display here<br />you can write second Line
      </div>
    </div>
    <div id="site-navi" class="main-navi">
      <div id="small-navi"></div>
      <div class="row">
        <div class="large-12 columns">
          <button type="button" id="navbtn">
          <i class="fa fa-bars"></i><span>MENU</span>
          </button>
          <?php wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container' => 'nav',
                  'container_class' => 'header-nav',
                  'container_id' => 'header-nav'
          ) ); ?>
        </div>
      </div>
    </div>
    <!-- #site-navigation -->
  </header>
  <!-- #masthead -->
<?php if ( is_home() || is_front_page() ) : ?>
  <div id="main-img">
    <img src="<?php header_image(); ?>" alt="" />
    <h1 class="site-description">
      <?php bloginfo( 'description' ); ?>
    </h1>
  </div>
<?php endif; ?>

<?php if ( ! is_home() && ! is_front_page() && is_bp_plugin_active( 'show-adsense/show-adsense.php' ) ) : ?>
  <div class="row">
    <div class="large-12 columns">
      <?php echo do_shortcode( '[showad id="header"]' ); ?>
    </div>
  </div>
<?php endif; ?>

<?php if ( ! is_front_page() ) : ?>
  <div id="content" class="site-content row">
<?php endif; ?>
