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


remove_all_filters( 'wp_title' );
add_filter('wp_title', 'filter_pagetitle', 99,1);
function filter_pagetitle( $title ) {
    $title = single_cat_title( '', false ) . ' | ';
    return $title;
}


// parse the query string
$request = parse_query_string();

// lets globalize the wp_query var
global $wp_query;

// set the args based on current query
$args = $wp_query->query_vars;

// set paged value based on request
$args['paged'] = $request['paged'];
$args['posts_per_page'] = 15;

// rerun the query
query_posts( $args );

get_header();

?>

	<div class="page-title">
		<h1><span>Category:</span> <?php printf( single_cat_title( '', false ) ); ?></h1>
	</div>
	<div class="content-wide anthem-listing" role="main">

		<?php 
		if ( have_posts() ) : 

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

		endif;
		?>

	</div><!-- #content -->

	<?php pagination(); ?>

<?php

get_footer();

?>