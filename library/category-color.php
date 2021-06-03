<?php


// add category color metabox
function category_color_metabox( array $meta_boxes ) {

	global $colors;

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['category_color_metabox'] = array(
		'id' => 'category_color_metabox',
		'title' => __( 'Category Color', 'cmb2' ),
		'object_types' => array( 'category' ), // Taxonomy
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields' => array(
			array(
				'name' => __( 'Category Color', 'cmb2' ),
				'id' => CMB_PREFIX . 'category_color',
				'type'  => 'select',
				'default' => 'grey-light',
				'options' => $colors
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb2-taxonomy_meta_boxes', 'category_color_metabox' );



// get the category color
function get_category_color( $term_id ) {

	// get the category color if it's set
	$color = get_term_meta( $term_id, CMB_PREFIX . 'category_color', true );

	// return it if it's not empty, otherwise return a default.
	return ( !empty( $color ) ? $color : 'grey-light' );

}

