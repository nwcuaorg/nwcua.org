<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 


// parse the query string
$request = parse_query_string();

// lets globalize the wp_query var
global $wp_query;

// set the args based on current query
$args = $wp_query->query_vars;

// set paged value based on request
$args['paged'] = $request['paged'];

// rerun the query
query_posts( $args );


// calculate results range to show above the result listing
if ( $paged > 0 ) {
	$result_range_start = ( ( $paged - 1 ) * $args['posts_per_page'] ) + 1;
	$result_range_end = ( $result_range_start + ( $args['posts_per_page'] - 1 ) );
	if ( $wp_query->found_posts > $result_range_end ) {
		$result_range = $result_range_start . ' - ' . $result_range_end; 
	} else {
		$result_range = $result_range_start . ' - ' . $wp_query->found_posts;
	}
} else {
	if ( $wp_query->found_posts > $args['posts_per_page'] ) {
		$result_range = '1 - ' . $args['posts_per_page'];
	} else {
		$result_range = '1 - ' . $wp_query->found_posts;
	}
}


?>
	<div class="page-title">
		<h1>Anthem</h1>
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

		<?php pagination(); ?>

	</div><!-- #primary -->


<?php

get_footer();

?>