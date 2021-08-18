<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

?>

	<div class="page-title">
		<h1><span>Category:</span> <?php printf( single_cat_title( '', false ) ); ?></h1>
	</div>
	<div class="content-wide" role="main">
		<div class="category-description">
			
		</div>
		<div class="anthem-listing">
		<?php 
		if ( have_posts() ) : 

			while ( have_posts() ) : the_post(); 
		        $categories = get_the_category();
		        $cat = $categories[0];
		        $color = get_category_color( $cat->term_id );
				?>
	       	<div class="entry">
	        	<div class="entry-thumbnail">
	        		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( null, array( 768, 480 ) ); ?></a>
		    		<div class="entry-category <?php print $cat->slug ?> <?php print $color ?>"><?php print $cat->name ?></div>
		   		</div>
	        	<div class="entry-inner">
		    		<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		    		<?php the_excerpt(); ?>
		    	</div>
		    </div>
				<?php
			endwhile;

		endif;
		?>
		</div>
	</div><!-- #content -->

	<?php pagination(); ?>

<?php

get_footer();

?>