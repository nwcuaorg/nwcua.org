<?php


function the_page_title() {

	// get the slides
	if ( has_cmb_value( 'page-title' ) ) {
		?>
		<div class="page-title <?php show_cmb_value( 'page-title-color' ) ?>">
			<h1><?php show_cmb_value( 'page-title' ) ?></h1>
		</div>
		<?php
	}
	
}



// add metabox(es)
function page_title_metabox( $meta_boxes ) {

	global $colors;

    // showcase metabox
    $page_settings_metabox = new_cmb2_box( array(
        'id' => 'page_settings_metabox',
        'title' => 'Page Settings',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $page_settings_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'page-title',
        'type' => 'text',
        'sanitization_cb' => 'cmb2_sanitize_allow_span',
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'page-title-color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $event_cats = get_terms( 'event_cat' );
    $event_groups = array( '' => '- select an event category -' );
    foreach ( $event_cats as $cat ) {
        $event_groups[$cat->slug] = $cat->name;
    }
    $page_settings_metabox->add_field( array(
        'name' => 'Sidebar Event Category',
        'id'   => CMB_PREFIX . 'page-events',
        'type' => 'select',
        'options' => $event_groups
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'Menu Title',
        'id'   => CMB_PREFIX . 'page-menu-title',
        'type' => 'text'
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'Menu Title Link',
        'id'   => CMB_PREFIX . 'page-menu-title-link',
        'type' => 'text'
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'Menu',
        'id'   => CMB_PREFIX . 'page-menu',
        'type' => 'select',
        'options' => get_all_menus()
    ) );

    $ad_cats = get_terms( 'ad_group' );
    $ad_groups = array( '' => '- select an ad group -' );
    foreach ( $ad_cats as $cat ) {
        $ad_groups[$cat->slug] = $cat->name;
    }
    $page_settings_metabox->add_field( array(
        'name' => 'Sidebar Ad Group',
        'id'   => CMB_PREFIX . 'page-ad-group',
        'type' => 'select',
        'options' => $ad_groups
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'People',
        'id'   => CMB_PREFIX . 'page-people',
        'type' => 'select',
        'options' => get_all_people_cats()
    ) );

    $cats = get_categories();
    $page_cats = array( '' => '- select an article category -' );
    foreach ( $cats as $cat ) {
        $page_cats[$cat->slug] = $cat->name;
    }
    $page_settings_metabox->add_field( array(
        'name' => 'Articles',
        'id'   => CMB_PREFIX . 'page-articles',
        'type' => 'select',
        'options' => $page_cats
    ) );

    $page_settings_metabox->add_field( array(
        'name' => 'Member Only?',
        'id'   => CMB_PREFIX . 'member-only',
        'type' => 'checkbox'
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
