<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bree_Turner_v2
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
                <div id="contact">
                    <h3>Contact:</h3>
                    <?php $email = get_bloginfo( 'admin_email' ); ?>
                    <p>
                        <a href="mailto:<?php echo $email; ?>?Subject=Bree%20Turner%20Website%20Enquiry" target="_top"><?php echo $email; ?></a>
                    </p>
                    <div id="social-icons">
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
		<div class="site-info">
                    <p>&copy; <?php echo date( 'Y' ); ?>, Bree Turner, Site by <a href="https://www.mark-stuart.me">Mark Stuart</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
