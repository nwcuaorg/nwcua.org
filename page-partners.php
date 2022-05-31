<?php

/*
Template Name: Strategic Link Partners
*/

global $sli;
$sli = true;

get_header();

the_page_title();

?>

<div class="content-wide no-showcase" role="main">
	<div class="partners-intro">
		<div class="partners-intro-content">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
		</div>
		<div class="partners-intro-filters">
			<h4>Category</h4>
			<?php 

			// get the partner categories
			$partner_cats = get_partner_cats();

			// loop through the partner categories
			foreach ( $partner_cats as $part_cat ) {
				print '<label><input type="checkbox" name="partner-filter" class="partner-filter" value="' . $part_cat->slug . '" /> ' . $part_cat->name . '</label>';
			}

			?>
		</div>
	</div>
<!--
</div>
<div class="content-wide archive-partners no-showcase" role="main">
-->
	<?php
	$vars['post_type'] = 'partner';

    $p = new WP_Query( $vars );

	if ( $wp_query->have_posts() ) : 

		print '<div class="partners-listing">';

		// Start the Loop.
		while ( $p->have_posts() ) : $p->the_post();
			$partner_id = get_the_ID();

			// get the partner terms
			$partner_terms = get_the_terms( $partner_id, 'partner_cat' );

			// get array of partner term slugs
			$part_terms = array();
			if ( !empty( $partner_terms ) ) {
				foreach ( $partner_terms as $part_term ) {
					$part_terms[] = $part_term->slug;
				}
			}

			// compile a string of classes
			$part_terms_string = implode( ' ', $part_terms );

			?>
			<div class="partner-entry visible <?php print $part_terms_string ?>" data-id="<?php print $partner_id; ?>" data-slug="<?php print $post->post_name; ?>">
				<?php the_post_thumbnail( array( 400, 400 ) ) ?>
			</div>
			
			<!-- start partner hidden info -->
			<div class="partner-overlay-hidden" id="partner-<?php print $partner_id ?>">
			<div class="two-column single-partner <?php print ( has_showcase() ? '' : ' no-showcase' ) ?>" role="main">
				<div class="sidebar">
					<div class="partner-thumbnail">
						<?php the_post_thumbnail( array( 500, 500 ) ); ?>
					</div>
					<h3 class="partner-title"><?php the_title(); ?></h3>
					<p>For more information on this solution please reach out to the Strategic Link team below.</p>
					<p class="partner-buttons"><?php print do_shortcode( '[button url="mailto:strategic@nwcua.org" class="teal large"]Email Us[/button] [button url="tel:8009959064" class="teal large"]Call Us[/button]' ); ?></p>
					<p>Learn more about <?php the_title(); ?> by visiting their social media accounts or website below.</p>
					<div class="partner-links">
						<div class="partner-website">
							<?php print do_shortcode( '[button url="' . get_cmb_value( 'partner_website' ) . '" class="teal large"]Visit Website[/button]' ); ?>
						</div>
						<div class="partner-social">
							<?php print partner_social_link( 'twitter' ); ?>
							<?php print partner_social_link( 'facebook' ); ?>
							<?php print partner_social_link( 'youtube' ); ?>
							<?php print partner_social_link( 'linkedin' ); ?>
						</div>
					</div>
				</div>
				<div class="right-column">
					<div class="right-column-inner">
					<?php 
					the_content();

					// if we have a video
					if ( has_cmb_value( 'partner_video' ) ) {
						// output the video and process the oembed
						print '<div class="partner-video">' . wp_oembed_get( get_cmb_value( 'partner_video' ) ) . '</div>';
					}

					// if we have products
					if ( has_cmb_value( 'partner_products' ) ) {

						// get the products
						$products_string = get_cmb_value( 'partner_products' );

						// get the products into an array
						$products = explode( "\n", $products_string );

						// count the products
						$product_count = count( $products );

						if ( !empty( $products ) ) {

							// set counter
							$c = 1;

							// output the start of the products section
							print '<h4 class="partner-products-title">Products Offered</h4><div class="partner-products"><div class="products-column"><ul>';

							// loop through the products
							foreach ( $products as $product ) {

								// display product
								print '<li>' . $product . '</li>';

								// if we're halfway or more through the array, break to the second column.
								if ( $c == round( $product_count/2 ) ) {
									print '</ul></div><div class="products-column"><ul>';
								}

								// increment
								$c++;

							}

							// close the products section
							print '</ul></div></div>';

						}

					}
					?>
					</div>
				</div>

			</div>
			</div>
			<!-- end partner hidden info -->

			<?php
		endwhile;

		print "</div>";

	else :
		
		print '<p>No partners found in database.</p>';

	endif;

	?>
</div><!-- #content -->

<?php

get_footer();

?>