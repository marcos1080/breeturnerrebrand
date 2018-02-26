<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bree_Turner_v2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php bree_turner_v2_post_thumbnail(); ?>

	<div class="entry-content">
            <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bree-turner-v2' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );
            
                if( get_post_type() === 'audio' ) : ?>
                    <div id="audio-player">
                        <?php echo do_shortcode( "[audio src='$audio_url']" ); ?>
                    </div>
                <?php
                endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
