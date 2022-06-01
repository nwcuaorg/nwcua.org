<?php

/*
Template Name: Homepage (SLI)
*/

global $sli;
$sli = true;

get_header();

?>

	<?php the_showcase(); ?>

	<?php
	$partners = get_partners();
	if ( !empty( $partners ) ) {
	?>
    <div class="partner-logos-container">
		<div class="partner-logos">
			<?php
			foreach ( $partners as $partner ) {
				if ( has_post_thumbnail( $partner->ID ) ) { 
					?>
			<div class="slide">
				<a href="<?php print get_the_permalink( $partner->ID ); ?>">
                	<?php print get_the_post_thumbnail( $partner->ID, array( 500, 500 ) ); ?>
                </a>
			</div>
					<?php 
				} 
			}
			?>
		</div>
    </div>
	<?php
	}
	?>

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

<?php

get_footer();

?>