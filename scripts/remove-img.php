<?php

require( '../../../../wp-load.php' );


$query = new WP_Query( array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'date_query' => array(
		'before' => date('Y-m-d', strtotime('-365 days')) 
	),
	'posts_per_page' => 8000
) );


foreach ( $query->posts as $edit_post ) {
	if ( wp_update_post( array( 'ID' => $edit_post->ID, 'post_content' => preg_replace( "/<img[^>]+\>/i", "", $edit_post->post_content, 1 ) ) ) ) {
		print "Updated post " . $edit_post->ID . "\n";
	}
}

