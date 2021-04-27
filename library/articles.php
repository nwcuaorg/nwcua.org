<?php


// articles shortcode
function articles_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'style' => "card",
		'tags' => '',
		'cats' => '',
		'posts_per_page' => 4
	), $atts );

	$args = array(
		'posts_per_page' => $a['posts_per_page']
	);

	if ( !empty( $a['tags'] ) ) {
		$args['tag'] = $a['tags'];
	}

	if ( !empty($a['cats']) ) {
		$args['category_name'] = $a['cats'];
	}

	$query = new WP_Query( $args );

	// Check that we have query results.
	if ( $query->have_posts() ) {

		$return = '<div class="article-cards">';
	  
	    // Start looping over the query results.
	    while ( $query->have_posts() ) {
	        $query->the_post();
	        $categories = get_the_category();
	        $cat = $categories[0];
	        $return .= '<div class="entry">';
	        $return .= '<div class="entry-thumbnail">';
	        $return .= '<a href="' . get_the_permalink() . '">';
	        $return .= get_the_post_thumbnail( null, array( 768, 480 ) );
	        $return .= '</a>';
		    $return .= '<div class="entry-category ' . $cat->slug . '">' . $cat->name . '</div>';
		    $return .= '</div>';
	        $return .= '<div class="entry-inner">';
		    $return .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
		    $return .= wpautop( get_the_excerpt() );
		    $return .= '</div>';
		    $return .= '</div>';
	    }

		$return .= '</div>';
	  
	} else {
		return '';
	}

	  
	// Restore original post data.
	wp_reset_postdata();
	  

	return $return;
}
add_shortcode( 'articles', 'articles_shortcode' );

