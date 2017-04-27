<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BP-Origin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="large-3 small-3 columns thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'bp_origin' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                    <img src="<?php echo get_thumbnail_url( 'mideum' ); ?>" alt="" title="" />
            </a>
        </div> <!-- 3 thumbnail -->
        <div class="large-9 small-9 columns">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php bp_origin_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php bp_origin_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- 9 title excerpt -->
    </div><!-- .row -->
</article><!-- #post-## -->
