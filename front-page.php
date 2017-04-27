<?php
/**
 * The template for displaying front-page
 */
get_header(); ?>
    <div class="row front-feature">
    <?php if ( get_page_by_path( 'concept' ) ) : ?>
        <div class="large-4 columns">
            <a href="<?php echo get_permalink( get_page_by_path( 'concept' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/1.jpg" alt=""></a>
            <h5><a href="<?php echo get_permalink( get_page_by_path( 'concept' )->ID ); ?>"><?php echo esc_html__( 'Front Menu 1', 'bp_origin' ); ?></a></h5>
            <p><?php echo esc_html__( 'Front Menu description sample 1. This menu sample to show description and link to page xxx/concept', 'bp_origin' ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( get_page_by_path( 'menu' ) ) : ?>
        <div class="large-4 columns">
            <a href="<?php echo get_permalink( get_page_by_path( 'menu' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/2.jpg" alt=""></a>
            <h5><a href="<?php echo get_permalink( get_page_by_path( 'menu' )->ID ); ?>"><?php echo esc_html__( 'Front Menu 2', 'bp_origin' ); ?></a></h5>
            <p><?php echo esc_html__( 'Front Menu description sample 2. This menu sample to show description and link to page xxx/menu', 'bp_origin' ); ?></p>
        </div>
    <?php endif; ?>
    <?php if ( get_page_by_path( 'access' ) ) : ?>
        <div class="large-4 columns">
            <a href="<?php echo get_permalink( get_page_by_path( 'access' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/3.jpg" alt=""></a>
            <h5><a href="<?php echo get_permalink( get_page_by_path( 'access' )->ID ); ?>"><?php echo esc_html__( 'Front Menu 3', 'bp_origin' ); ?></a></h5>
            <p><?php echo esc_html__( 'Front Menu description sample 3. This menu sample to show description and link to page xxx/access', 'bp_origin' ); ?></p>
        </div>
    <?php endif; ?>
    </div>

    <div class="front-news">
        <div class="row">
            <div class="large-12 columns">
                <h3><?php echo esc_html__( 'Latest Information', 'bp_origin' ); ?></h3>
                <div class="row">
                    <?php
                    $args = array(
                        'posts_per_page'=> '4',
                    );
                    $the_query = new WP_Query($args); ?>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
                        $the_query->the_post(); ?>
                    <div class="large-3 small-12 columns">
                        <a href="<?php the_permalink(); ?>">
                            <div class="newspost">
                                <div class="row">
                                    <div class="large-12 small-3 columns">
                                        <div class="thumbnail">
                                            <img src="<?php echo get_thumbnail_url( 'top-tumb' ); ?>" alt="" title="" />
                                        </div>
                                    </div>

                                    <div class="large-12 small-9 columns">
                                        <div class="news-meta">
                                            <div class="date">
                                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                                <?php the_time( 'Y/m/d' ); ?>
                                            </div>
                                            <p>
                                                <?php echo mb_substr( get_the_title(), 0, 40 ); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </div>
            </div>
        </div> <!-- /row -->
    </div> <!-- /front-news -->

    <div class="front-sp">
        <div class="row">
            <div class="large-6 columns">
                <div class="circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/4.jpg" alt="" />
                </div>
            </div> <!--  -->

            <div class="large-6 columns">
                <h2>みんなの来店を<br />待ってるワンッ！</h2>
                <p>たまに出勤する、店長のマルくんです。</p>
            </div>
        </div>
    </div>
    <div id="main" class="site-main row">
<?php get_footer(); ?>
