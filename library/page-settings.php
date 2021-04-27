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
        'title' => 'Page Settings',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'page-title',
        'type' => 'text',
    ) );

    $title_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'page-title-color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $title_metabox->add_field( array(
        'name' => 'Menu Title',
        'id'   => CMB_PREFIX . 'page-menu-title',
        'type' => 'text'
    ) );

    $title_metabox->add_field( array(
        'name' => 'Menu',
        'id'   => CMB_PREFIX . 'page-menu',
        'type' => 'select',
        'options' => get_all_menus()
    ) );

    $title_metabox->add_field( array(
        'name' => 'People',
        'id'   => CMB_PREFIX . 'page-people',
        'type' => 'select',
        'options' => get_all_people_cats()
    ) );

}
add_filter( 'cmb2_admin_init', 'page_title_metabox' );



// get all wp menus in an array.
function get_all_menus(){
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 

    $generated = array( '' => '- select a menu -' );
    foreach ( $menus as $menu ) {
        $generated[$menu->slug] = $menu->name;
    }

    return $generated;
}
