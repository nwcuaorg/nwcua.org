<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

if ( is_day() ) :
	$page_title = '<span>Daily Archives:</span> ' . get_the_date();

elseif ( is_month() ) :
	$page_title = '<span>Monthly Archive:</span> ' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) );

elseif ( is_year() ) :
	$page_title = '<span>Yearly Archive:</span> ' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyfourteen' ) );

else :
	$page_title = 'Anthem';

endif;

?>
	<div class="page-title">
		<h1><?php print $page_title; ?></h1>
	</div>
	<div class="content-wide anthem-listing" role="main">

		<?php 
		if ( have_posts() ) : 

			// Start the Loop.
			while ( have_posts() ) : the_post(); 
	        $categories = get_the_category();
	        $cat = $categories[0];
	        ?>
	       	<div class="entry">
	        	<div class="entry-thumbnail">
	        		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( null, array( 768, 480 ) ); ?></a>
		    		<div class="entry-category <?php print $cat->slug ?>"><?php print $cat->name ?></div>
		   		</div>
	        	<div class="entry-inner">
		    		<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		    		<?php the_excerpt(); ?>
		    	</div>
		    </div>
		    <?php
			endwhile;

		else :

			print "<p>There are currently no posts to list here.</p>";

		endif;
		?>

	</div><!-- #primary -->

	<?php pagination(); ?>

<?php

get_footer();

?>