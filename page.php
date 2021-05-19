<?php

get_header();

the_showcase();

the_page_title();

?>

<div class="two-column<?php print ( has_showcase() ? '' : ' no-showcase' ) ?>" role="main">
	<div class="sidebar">

		<?php 
		if ( has_cmb_value( 'page-menu' ) ) {
		?>
		<div class="widget widget_nav_menu">
			<?php if ( has_cmb_value( 'page-menu-title' ) ) ?><div class="widget-title"><h4><?php show_cmb_value( 'page-menu-title' ); ?></h4></div>
			<?php wp_nav_menu( array( 'menu' => get_cmb_value( 'page-menu' ) ) ); ?>
		</div>
		<?php
		}


		$event_group = get_cmb_value( 'page-events' );
		if ( !empty( $event_group ) ) {
			print do_shortcode( '[events category="' . $event_group . '" /]' );
		}

		?>

		<?php
		$group = get_cmb_value( 'page-ad-group' );
		if ( !empty( $group ) ) {
			?>
		<div class="widget widget_media_image">
			<?php do_ad_group( $group ); ?>
		</div>
			<?php 
		} ?>

		<?php
		$sidebar_people = get_cmb_value( 'page-people' );
		if ( !empty( $sidebar_people ) ) {
			?>
		<div class="widget widget_text">
			<div class="widget-title"><h4>Connect With Us</h4></div>
			<?php print do_shortcode( '[people category="' . $sidebar_people . '" /]' ) ?>
		</div>
			<?php 
		} else {
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif;
		}
		?>
		
	</div>
	<div class="right-column">
		<div class="right-column-inner">
		<?php 
		
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<?php the_content(); ?>
				<?php
			endwhile;
		endif;

		the_icons();

		?>
		</div>
		<?php the_accordions(); ?>
	</div>
</div><!-- #content -->

<?php
if ( has_cmb_value( 'page-articles' ) ) {
	?>
<div class="page-articles">
	<?php print do_shortcode( '[articles cats="' . get_cmb_value('page-articles') . '" posts_per_page=3 /]' ); ?>
</div>
	<?php
}
?>

<?php

get_footer();

?>