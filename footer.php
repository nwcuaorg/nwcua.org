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

global $sli;

?>
	
	</section>

	<?php 
	if ( $sli ) {
		gowest_solutions_lightbox();
	} else {
		gowest_association_lightbox();
	}
	?>
	
	<footer class="footer">
		<div class="columns">
			<?php if ( $sli ) { ?>
			<div class="column">
				<?php print do_shortcode( '[snippet slug="footer-address-sli" /]' ); ?>
				<div class="copyright">Copyright &copy; <?php print date( 'Y' ) ?> GoWest Association.<br>All Rights Reserved.</div>
			</div>
			<div class="column">
				<h3>Links</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-links-sli' ) ) ?>
			</div>
			<div class="column">
				<h3>Resources</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-resources-sli' ) ) ?>
			</div>
			<div class="column">
				<?php print do_shortcode( '[snippet slug="footer-sli" /]' ); ?>
			</div>
			<?php } else { ?>
			<div class="column">
				<?php print do_shortcode( '[snippet slug="footer-address" /]' ); ?>
				<div class="copyright">Copyright &copy; <?php print date( 'Y' ) ?> NWCUA. All Rights Reserved.</div>
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
			<?php } ?>
		</div>

	</footer>

</div><!-- #container -->

<script type="text/javascript">
(function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
vgo('setAccount', '252687469');
vgo('setTrackByDefault', true);
vgo('process');
</script>
<?php wp_footer(); ?>
</body>
</html>