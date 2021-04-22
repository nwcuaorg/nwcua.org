<?php

get_header();

the_showcase();

the_page_title();

?>

<div class="two-column" role="main">
	<div class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>
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