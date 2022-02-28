<?php


// add metabox(es)
function microsite_merger_metaboxes( $meta_boxes ) {


    // set up the colors
    global $colors;


    // brand metabox
    $microsite_merger_metabox = new_cmb2_box( array(
        'id' => 'microsite_merger_metabox',
        'title' => 'Microsite (Merger)',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 
            'key' => 'page-template', 
            'value' => 'page-microsite-merger.php' 
        ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );


    
    $microsite_merger_metabox->add_field( array(
        'name' => 'Header & Introduction',
        'desc' => 'Enter a header image to display at the top of the microsite, and then provide the content for the first section of the page.',
        'id'   => CMB_PREFIX . 'microsite_merger_title_top',
        'type' => 'title'
    ) );

    $microsite_merger_metabox->add_field( array(
        'name' => 'Header',
        'id'   => CMB_PREFIX . 'microsite_merger_header',
        'type' => 'file',
        'preview_size' => array( 100, 30 )
    ) );

    $microsite_merger_metabox->add_field( array(
        'name' => 'Top Content',
        'id'   => CMB_PREFIX . 'microsite_merger_content_top',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 10 )
    ) );

    
    
    $microsite_sections_group = $microsite_merger_metabox->add_field( array(
        'name' => 'Microsite Icon Sections',
        'id'   => CMB_PREFIX . 'microsite_merger_title_icons',
        'type' => 'group',
        'options'     => array(
            'group_title'       => __( 'Section {#}', 'cmb2' ),
            'add_button'        => __( 'Add Another Section', 'cmb2' ),
            'remove_button'     => __( 'Remove Section', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );

    $microsite_merger_metabox->add_group_field( $microsite_sections_group, array(
        'name' => 'Icon',
        'id'   => 'image',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite_merger_metabox->add_group_field( $microsite_sections_group, array(
        'name' => 'Color',
        'id'   => 'color',
        'type' => 'select',
        'options' => $colors,
        'default' => 'navy'
    ) );

    $microsite_merger_metabox->add_group_field( $microsite_sections_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $microsite_merger_metabox->add_group_field( $microsite_sections_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 10 ),
        'sanitization_cb' => false
    ) );
    

}
add_filter( 'cmb2_admin_init', 'microsite_merger_metaboxes' );

