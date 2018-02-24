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
                                    // Print the home page content. ?>
                                    <div class="top-block-text">
                                        <?php the_content(); ?>
                                    </div>
                                    <?php
                                    if ( get_header_image() ) : ?>
                                        <div class="bio-image">			
                                                <img src="<?php echo header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                        </div>
                                    <?php 
                                    endif;
                                else :
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
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
                
                $categories = array(
                    'Published'     => 'post',
                    'Podcasts'      => 'audio'  
                );
                
                if( is_front_page() ) : ?>
                    <div id="portfolio" class="content-width-home">
                        <div class="left-column">
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
                                <?php
                                    while ( $query->have_posts() ) :
                                        $query->the_post();
                                        $date = get_the_date( "Y M j", "", "", false ); ?>
                                        <p><span><?php echo $date; ?></span>
                                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                        </p>
                                        <?php
                                    endwhile;
                                endif;
                                wp_reset_query();
                            endforeach; ?>
                        </div>
                    </div>
                    <div id="contact" class="content-width-home">
                        <div class="left-column">
                            <h2>Contact</h2>
                        </div><!--
                     --><div class="right-column">
                            <h3>General Enquiries:</h3>
                            <?php $email = get_bloginfo( 'admin_email' ); ?>
                            <a href="mailto:<?php echo $email; ?>?Subject=Bree%20Turner%20Website%20Enquiry" target="_top"><?php echo $email; ?></a>
                            <h3>Social Media</h3>
                            <div id="social-icons">
                                <div  class="social-icon">
                                    <a  class="social-main" href="https://www.facebook.com/breeturnerwriter/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/facebook.svg" ?>" alt="Facebook Icon"/>
                                    </a>
                                    <a href="https://www.facebook.com/breeturnerwriter/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/facebook_hover.svg" ?>" alt="Facebook Icon"/>
                                    </a>
                                </div>
                                <div  class="social-icon">
                                    <a  class="social-main" href="https://www.twitter.com/breekturner/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/twitter.svg" ?>" alt="Twitter Icon"/>
                                    </a>
                                    <a href="https://www.twitter.com/breekturner/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/twitter_hover.svg" ?>" alt="Twitter Icon"/>
                                    </a>
                                </div>
                                <div  class="social-icon">
                                    <a  class="social-main" href="https://www.instagram.com/breekturner/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/instagram.svg" ?>" alt="Instagram Icon"/>
                                    </a>
                                    <a href="https://www.instagram.com/breekturner/">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/instagram_hover.svg" ?>" alt="Instagram Icon"/>
                                    </a>
                                </div>
                                <div  class="social-icon">
                                    <a  class="social-main" href="https://au.linkedin.com/in/bree-turner-9055b6a7">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/linkedin.svg" ?>" alt="Linked-In Icon"/>
                                    </a>
                                    <a href="https://au.linkedin.com/in/bree-turner-9055b6a7">
                                        <img src="<?php echo get_template_directory_uri() . "/images/icons/linkedin_hover.svg" ?>" alt="Linked-In Icon"/>
                                    </a>
                                </div>
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
