<?php

$sli = true;

get_header();

the_showcase();


?>
<div class="page-title grey-dark">
	<h1><?php the_title(); ?></h1>
</div>

<div class="two-column single-partner <?php print ( has_showcase() ? '' : ' no-showcase' ) ?>" role="main">
	<div class="sidebar">
		<div class="partner-thumbnail">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
		<h3 class="partner-title"><?php the_title(); ?></h3>
		<p>For more information on this solution please reach out to the Strategic Link team below.</p>
		<p class="partner-buttons"><?php print do_shortcode( '[button url="mailto:strategic@nwcua.org" class="teal large"]Email Us[/button] [button url="tel:8009959064" class="teal large"]Call Us[/button]' ); ?></p>
		<p>For more information on this solution please reach out to the Strategic Link team below.</p>
		<p class="partner-social">
			<?php print do_shortcode( '[button url="' . get_cmb_value( 'partner_website' ) . '" class="teal large"]Visit Website[/button]' ); ?>
			<?php print partner_social_link( 'facebook' ); ?>
			<?php print partner_social_link( 'twitter' ); ?>
			<?php print partner_social_link( 'youtube' ); ?>
			<?php print partner_social_link( 'linkedin' ); ?>
		</p>
	</div>
	<div class="right-column">
		<div class="right-column-inner">
		<?php 

		if ( is_member() ) {

			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();

					if ( has_cmb_value( 'partner_video' ) ) {
						print '<div class="partner-video">' . wp_oembed_get( get_cmb_value( 'partner_video' ) ) . '</div>';
					}
				endwhile;
			endif;

		} else {
			do_member_error(); 
		}
		?>
		</div>
	</div>

</div><!-- #content -->

<?php
if ( has_cmb_value( 'partner_tag' ) ) {
	?>
<div class="page-articles">
	<?php print do_shortcode( '[articles tags="' . get_cmb_value('partner_tag') . '" posts_per_page=3 /]' ); ?>
</div>
	<?php
}
?>

<?php

get_footer();

?>