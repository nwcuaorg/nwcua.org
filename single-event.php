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
			if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
				$start = get_cmb_value( 'event_start' );
				$end = get_cmb_value( 'event_end' );
				print "<h4>Date</h4>";
				if ( date( 'Ymd', $start ) != date( 'Ymd', $end ) ) {
					print "<p>" . date( "F jS g:i a", $start ) . " -<br>";
					print date( "F jS g:i a", $end ) . " P" . ( date( 'I', $start ) ? "D" : "S" ) . "T";
					print "<p>" . date( "F jS g:i a", $start + 3600 ) . " -<br>";
					print date( "F jS g:i a", $end + 3600 ) . " M" . ( date( 'I', $end ) ? "D" : "S" ) . "T";
				} else {
					print "<p>" . date( "F jS", $start ) . "</p>";
					print "<p>" . date( "g:i a", $start );
					print " - " . date( "g:i a", $end );
					print " P" . ( date( 'I', $start ) ? "D" : "S" ) . "T<br>";
					print date( "g:i a", $start + 3600 );
					print " - " . date( "g:i a", $end + 3600 );
					print " M" . ( date( 'I', $start ) ? "D" : "S" ) . "T</p>";
				}
			}

			// display the event duration.
			if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
				print "<p><label>Duration:</label><br>" . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";
			}

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
				print '<p class="event-registration"><a href="' . get_cmb_value( 'event_registration' ) . '" class="btn-arrow green">Register Now</a></p>';
			}


			if ( has_cmb_value( 'event_location_text' ) ) {
				print '<div class="event-location">';
				print "<h4>Location</h4>";
				show_cmb_wysiwyg_value( 'event_location_text' );
				print '</div>';
			}
			?>
		</div>
		<div class="right-column">
			<div class="right-column-inner">
				<?php the_content(); ?>
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