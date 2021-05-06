<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="content-pad">

		<div class="articles">
			<?php print do_shortcode( '[articles /]' ); ?>
		</div>

		<div class="events">
			<?php print do_shortcode( '[events limit=3 /]' ); ?>

			<?php do_ad_group( 'sidebar' ) ?>

		</div>

	</div>

	<?php the_simple_showcase(); ?>

	<?php the_partner_logos(); ?>

<?php

get_footer();

?>