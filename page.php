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
		?>

		<div class="widget widget_media_image">
			<a href="#"><img src="<?php bloginfo( 'template_url' ) ?>/img/ad-glia.png"></a>
		</div>


		<?php
		$sidebar_people = get_cmb_value( 'page-people' );
		if ( !empty( $sidebar_people ) ) {
			?>
		<div class="widget widget_text">
			<div class="widget-title"><h4>Connect With Us</h4></div>
			<?php print do_shortcode( '[people category="' . $sidebar_people . '" /]' ) ?>
		</div>
			<?php 
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

		?>
		</div>
		<?php the_accordions(); ?>
	</div>
</div><!-- #content -->

<div class="page-articles">
	<?php print do_shortcode( '[articles posts_per_page=3 /]' ); ?>
</div>

<?php

get_footer();

?>