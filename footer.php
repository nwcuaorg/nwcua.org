<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$admin_email = get_option( 'admin_email' );
?>
	
	</section>
	
	<footer class="footer">
		<div class="columns">
			<div class="column">
				<?php print do_shortcode( '[snippet slug="footer-address" /]' ); ?>
			</div>
			<div class="column">
				<h3>Links</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-links' ) ) ?>
			</div>
			<div class="column">
				<h3>Resources</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-resources' ) ) ?>
			</div>
			<div class="column">
				<?php print do_shortcode( '[snippet slug="footer-subscribe" /]' ); ?>
			</div>
		</div>
	</footer>

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>