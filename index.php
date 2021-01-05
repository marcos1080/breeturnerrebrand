<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bree_Turner_v2
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
                                if( is_front_page() ) :
                                    if ( get_header_image() ) : ?>
                                        <div class="bio-image">			
                                                <img src="<?php echo header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                        </div>
                                    <?php 
                                    endif;
                                    // Print the home page content. ?>
                                    <div class="top-block-text">
                                        <?php the_content(); ?>
                                    </div>
                                <?php else :
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', get_post_format() );
                                endif;

			endwhile;

                        if( ! is_front_page() ) :
                            the_posts_navigation();
                        endif;
		endif; 
                
                $categories = array(
                    'Published'     => 'post',
                    'Podcasts'      => 'audio'  
                );
                
                if( is_front_page() ) : ?>
                    <div id="portfolio" class="content-width-home">
                        <div class="content">
                            <div class="left-column">
                                <div id="cv-container">
                                    <h2>Portfolio</h2>
                                    <?php
                                        $cv_id = esc_attr( get_option('bree_turner_v2_CV') );
                                        if( $cv_id !== '' ) : ?>
                                    <p>
                                        --<a href="<?php echo wp_get_attachment_url( $cv_id ); ?>">CV</a>--
                                    </p>
                                        <?php
                                        endif;
                                    ?>
                                </div>
                            </div><!--
                         --><div class="right-column">
                                <?php
                                foreach( $categories as $heading => $post_type ) :
                                    $query = new WP_Query( array(
                                        'post_type'         => array( $post_type ),
                                        'posts_per_page'    => -1,
                                    ));

                                    if( $query->have_posts() ) : ?>
                                <h3><?php echo $heading; ?></h3>
                                <table>
                                    <?php
                                        while ( $query->have_posts() ) :
                                            $query->the_post();
                                            $date = get_the_date( "Y M", "", "", false ); ?>
                                            <tr>
                                                <td class="date"><p><?php echo $date; ?></p></td>
                                                <td>
                                                    <p>
                                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <?php
                                        endwhile;
                                    endif;
                                    wp_reset_query(); ?>
                                </table>
                                <?php
                                endforeach; ?>
                                <h3>Appearances</h3>
                                <table>
                                    <td class="date"><p>2017</p></td>
                                    <td>
                                        <p>
                                            <a href="https://www.youtube.com/watch?v=tQIzdGsF-ss">Real Big Things: Sex, Drugs & Rock n Roll 'The Orgasm Gap'</a>
                                        </p>
                                    </td>
                                </table>
                                <h3>Zines</h3>
                                <table>
                                    <td class="date"><p>2018</p></td>
                                    <td>
                                        <p>
                                            <a href="https://www.etsy.com/au/shop/bbzines/">bbzines Etsy store</a>
                                        </p>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
