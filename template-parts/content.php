<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BP-Origin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
  <div class="row">
    <div class="large-3 small-3 columns thumbnail">
      <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'bp_origin' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
          <img src="<?php echo get_thumbnail_url( 'mideum' ); ?>" alt="" title="" />
      </a>
    </div> <!-- 3 thumbnail -->
    <div class="large-9 small-9 columns">
      <header class="entry-header">
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'bp_origin' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
          <?php bp_origin_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
      </header><!-- .entry-header -->

      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->

      <footer class="entry-meta">
      <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
        <?php
          /* translators: used between list items, there is a space after the comma */
          $categories_list = get_the_category_list( esc_html__( ', ', 'bp_origin' ) );
          if ( $categories_list && bp_origin_categorized_blog() ) :
        ?>
        <span class="cat-links">
          <?php printf( '<i class="fa fa-tags fa-fw" aria-hidden="true"></i>%1$s', $categories_list ); ?>
        </span>
        <?php endif; // End if categories ?>

        <?php
          /* translators: used between list items, there is a space after the comma */
          $tags_list = get_the_tag_list( '', esc_html__( ', ', 'bp_origin' ) );
          if ( $tags_list ) :
        ?>
        <span class="tags-links">
          <?php printf( '%1$s', $tags_list ); ?>
        </span>
        <?php endif; // End if $tags_list ?>
      <?php endif; // End if 'post' == get_post_type() ?>

      <?php edit_post_link( esc_html__( 'Edit', 'bp_origin' ), '<span class="edit-link">', '</span>' ); ?>
      </footer><!-- .entry-meta -->
    </div><!-- 9 title excerpt -->
  </div><!-- .row -->
</article><!-- #post-## -->
