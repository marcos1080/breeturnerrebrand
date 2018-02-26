<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bree_Turner_v2
 */

get_header(); ?>

	<div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="post-wrapper">
		<?php
		while ( have_posts() ) : the_post(); ?>
                    <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif; ?>
                    </header><!-- .entry-header -->
                    <div class="post-navigation left-column">
                        <p class="back-link">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a>
                        </p>
                        <?php
                        $next_post = get_next_post();
                        if (! empty( $next_post ) ): ?>
                        <p>Newer Post:<br />
                            <a href="<?php echo $next_post->guid ?>"><?php echo $next_post->post_title ?></a>
                        </p>
                        <?php endif;
                        $prev_post = get_previous_post();
                        if (! empty( $prev_post ) ): ?>
                        <p class="prev-post">Later Post:<br />
                            <a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
                        </p>
                        <?php endif ?>
                    </div><!--
                 --><div class="right-column">
                        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                    </div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                            comments_template();
                    endif;
		endwhile; // End of the loop.
		?>
                </div>
            </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
