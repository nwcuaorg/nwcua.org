<?php
/**
 * The template for displaying Archive pages
 */


// parse the query string
$request = parse_query_string();

// lets globalize the wp_query var
global $wp_query;

// set the args based on current query
$args = $wp_query->query_vars;

if ( $paged > 0 ) {
	$args['posts_per_page'] = 15;
} else {
	$args['posts_per_page'] = 13;
}

// rerun the query
query_posts( $args );

get_header(); 

?>
	<div class="page-title anthem">
		<h1>Anthem</h1>
	</div>
	<div class="content-wide anthem-listing" role="main">

		<?php 
		if ( have_posts() ) : 

			// Start the Loop.
			$count = 0;
			while ( have_posts() ) : the_post(); 
		        $categories = get_the_category();
		        $cat = $categories[0];
		        $color = get_category_color( $cat->term_id );
		        if ( $count == 0 && $paged == 0 ) {
		        	?>
	       	<div class="entry first">
	        	<div class="entry-thumbnail">
	        		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( null, array( 768, 480 ) ); ?></a>
		    		<div class="entry-category <?php print $cat->slug ?> <?php print $color ?>"><?php print $cat->name ?></div>
		   		</div>
	        	<div class="entry-inner">
		    		<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		    		<?php the_excerpt(); ?>
		    	</div>
		    </div>
		    <div class="filter">
		    	<h3>Browse by Category</h3>
		    	<div class="browse-by-category">
		    		<?php wp_dropdown_categories( array( 'show_option_all' => 'Select Category', 'value_field' => 'slug', 'class' => 'category-select', 'orderby' => 'name' ) ); ?>
		    	</div>
		    	<h3>Browse by Date</h3>
		    	<div class="browse-by-date">
		    		<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
						<option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
						<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
					</select>
		    	</div>
	    		<?php do_ad_group( 'sidebar' ); ?>
		    </div>
		        <?php } else { ?>
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
				}
				$count++;
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