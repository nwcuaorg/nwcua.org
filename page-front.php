<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="content-pad">

		<div class="articles">
			<?php print do_shortcode( '[articles category__not_in="83,88,4358,6097" /]' ); ?>
		</div>

		<div class="events">
			<a href="/events" class="all-events">All Events</a>
			<?php print do_shortcode( '[events limit=3 category="featured-events" /]' ); ?>

			<?php do_ad_group( 'sidebar' ) ?>
		</div>

	</div>

	<?php the_simple_showcase(); ?>

	<?php the_partner_logos(); ?>

<?php

get_footer();

?>