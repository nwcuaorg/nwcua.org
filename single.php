<?php
/**
 * The Template for displaying all single posts
 */

get_header();

the_showcase();

?>
	<?php if ( in_category( 'advocacy-on-the-move' ) ) { ?>
	<div class="page-title aotm">
		<h1>Advocacy on the Move</h1>
	</div>
	<?php } else { ?>
	<div class="page-title anthem">
		<h1>Anthem</h1>
	</div>
	<?php } ?>
	<div class="two-column" role="main">
		<div class="sidebar">
			<?php 
			if ( in_category( 'advocacy-on-the-move' ) ) {
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('aotm-sidebar') ) : ?><!-- no sidebar --><?php endif; 
			} else if ( in_category( 'compliance' ) ) {
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('compliance-sidebar') ) : ?><!-- no sidebar --><?php endif; 
			} else {
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('anthem-sidebar') ) : ?><!-- no sidebar --><?php endif; 
			}
			?>
		</div>
		<div class="right-column">
			<div class="right-column-inner">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
				<h1><?php the_title(); ?></h1>
				<p class="post-date"><?php the_date(); ?></p>
				<div class="featured-image">
					<?php the_post_thumbnail( 'full' ); ?>
					<?php if ( has_cmb_value( 'caption' ) ) { ?><div class="caption"><?php show_cmb_value( 'caption' ) ?></div><?php } ?>
				</div>
				<?php the_content(); ?>
				<p class="quiet">Posted in <?php print get_the_category_list( ', ' ) ?>.</p>
				<?php
			endwhile;
		endif;
		?>
			</div>
		</div>
	</div>

<?php

get_footer();

?>