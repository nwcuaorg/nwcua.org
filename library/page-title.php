<?php


function the_page_title() {

	// get the slides
	if ( has_cmb_value( 'page-title' ) ) {
		?>
		<div class="page-title bg-<?php show_cmb_value( 'page-title-color' ) ?>">
			<h1><?php show_cmb_value( 'page-title' ) ?></h1>
		</div>
		<?php
	}
	
}



// add metabox(es)
function page_title_metabox( $meta_boxes ) {

	global $colors;

    // showcase metabox
    $title_metabox = new_cmb2_box( array(
        'id' => 'title_metabox',
        'title' => 'Page Title',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => 'page-title',
        'type' => 'text',
    ) );

    $title_metabox->add_field( array(
        'name' => 'Color',
        'id'   => 'page-title-color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

}
add_filter( 'cmb2_admin_init', 'page_title_metabox' );
