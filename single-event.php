<?php
/**
 * The Template for displaying all single posts
 */

get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			global $post;
			$slug = $post->post_name;
			$header_title = get_the_title();
			$header_color = ( has_cmb_value( 'event_color' ) ? get_cmb_value( 'event_color' ) : 'green' );
			?>

	<?php
	if ( has_showcase() ) {
		the_showcase(); 
	} else {
		?>
		<div class="page-title bg-<?php print $header_color ?>">
			<h1><?php print $header_title ?></h1>
		</div>
		<?php
	}
	?>

	<div class="two-column event" role="main">
		<div class="sidebar event-info">
			<?php 
			// display credit union name
			print '<div class="event-date">';
			if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
				$start = get_cmb_value( 'event_start' );
				$end = get_cmb_value( 'event_end' );

				// timezone strings
				$mst_start = "M" . ( date( 'I', $start ) ? "D" : "S" ) . "T";
				$mst_end = "M" . ( date( 'I', $end ) ? "D" : "S" ) . "T";

				print "<h4>Date</h4>";

				if ( date( 'Ymd', $start ) != date( 'Ymd', $end ) ) {

					print "<p><strong>" . date( "F j, Y", $start ) . "</strong><br>" . date( "g:i a", $start ) . " (" . date( "g:i a", $start + 3600 ) . " $mst_start)<br>";
					print "&#8212;<br>" .
							"<strong>" . date( "F j, Y", $end ) . "</strong><br>" . date( "g:i a", $end ) . " (" . date( "g:i a", $end + 3600 ) . " $mst_end)</p><br>";
					print "<p><label><strong>Duration:</strong></label><br>" . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";

				} else {

					print "<p><strong>" . date( "F j, Y", $start ) . "</strong><br>" . 
					date( "g:i a", $start ) . " (" . date( "g:i a", $start + 3600 ) . " $mst_start) &#8212;<br>";
					print date( "g:i a", $end ) . " (" . date( "g:i a", $start + 3600 ) . " $mst_start)</p><br>";
					print "<p><label><strong>Duration:</strong></label><br>" . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";
				}

			}
			print "</div>";

			// display price
			$early_date = get_cmb_value( 'event_early_date' );
			// $early_price = get_cmb_value( 'event_early_price' );
			$regular_price = get_cmb_value( 'event_price' );
			$late_date = get_cmb_value( 'event_late_date' );
			// $late_price = get_cmb_value( 'event_late_price' );
			$is_early = ( time() <= $early_date ? 1 : 0);
			$is_late = ( time() >= $late_date ? 1 : 0 );
			// $current_price = ( $is_early ? $early_price : ( $is_late ? $late_price : $regular_price ) );
			$current_price = $regular_price;
			if ( !empty( $current_price ) ) {
				print '<div class="event-price">';
				print "<h4>Price</h4>";
				print "<p>$" . $current_price . ( $is_early ? ' (early bird price)' : ( $is_late ? ' (late registration price)' : '' ) ) . "</p>";
				print '</div>';
			}
			
			if ( has_cmb_value( 'event_registration' ) ) {
				print '<p class="event-registration"><a href="' . get_cmb_value( 'event_registration' ) . '" class="btn green large">Register Now</a></p>';
			}

			if ( has_cmb_value( 'event_location_text' ) ) {
				print '<div class="event-location">';
				print "<h4>Location</h4>";
				show_cmb_wysiwyg_value( 'event_location_text' );
				print '</div>';
			}

			// get event people group
			$event_people_group = get_cmb_value( 'people_group' );
			
			// if we have a people group
			if ( !empty( $event_people_group ) ) {

				// get the people group title
				$event_connect_title = get_cmb_value( 'event_connect_title' );

				// show a title if we have one.
				print ( !empty( $event_connect_title ) ? "<h4>" . $event_connect_title . "</h4>" : '' );

				print '<div class="event-people">';
				do_people_group( $event_people_group );
				print '</div>';
			}

			// get event ad group
			$event_ad_group = get_cmb_value( 'ad_group' );
			
			// if we have an ad group
			if ( !empty( $event_ad_group ) ) {

				// get the ad title
				$event_ad_title = get_cmb_value( 'event_ad_title' );

				// show a title if we have one.
				print ( !empty( $event_ad_title ) ? "<h4>" . $event_ad_title . "</h4>" : '' );

				print '<div class="event-ad">';
				do_ad_group( $event_ad_group );
				print '</div>';
			}
			?>
		</div>
		<div class="right-column">
			<div class="right-column-inner">
				<?php the_content(); ?>

				<?php the_icons(); ?>
			</div>
		</div>
	</div><!-- #content -->
	
	<div class="single-column">
		<?php the_accordions(); ?>
	</div>

			<?php
		endwhile;
	endif;
	?>
<?php

get_footer();

?>