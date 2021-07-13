<?php


// add metabox(es)
function microsite_metaboxes( $meta_boxes ) {


    // set up the colors
    global $colors;


    // brand metabox
    $microsite_metabox = new_cmb2_box( array(
        'id' => 'microsite_metabox',
        'title' => 'Microsite',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 
            'key' => 'page-template', 
            'value' => 'page-microsite.php' 
        ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Header',
        'id'   => CMB_PREFIX . 'microsite_header',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Content (Row #1)',
        'id'   => CMB_PREFIX . 'microsite_content_one',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Image (Row #1)',
        'id'   => CMB_PREFIX . 'microsite_image_one',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );
    
    $microsite_metabox->add_field( array(
        'name' => 'Sidebar Background Color (Row #1)',
        'id'   => CMB_PREFIX . 'microsite_color_one',
        'type' => 'select',
        'default' => 'seafoam',
        'options' => $colors
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Content (Row #2)',
        'id'   => CMB_PREFIX . 'microsite_content_two',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Image (Row #2)',
        'id'   => CMB_PREFIX . 'microsite_image_two',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );
    
    $microsite_metabox->add_field( array(
        'name' => 'Sidebar Background Color (Row #2)',
        'id'   => CMB_PREFIX . 'microsite_color_two',
        'type' => 'select',
        'default' => 'grey-light',
        'options' => $colors
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Content (Row #3)',
        'id'   => CMB_PREFIX . 'microsite_content_three',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Image (Row #3)',
        'id'   => CMB_PREFIX . 'microsite_image_three',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );
    
    $microsite_metabox->add_field( array(
        'name' => 'Sidebar Background Color (Row #3)',
        'id'   => CMB_PREFIX . 'microsite_color_three',
        'type' => 'select',
        'default' => 'lime',
        'options' => $colors
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Subfooter Content',
        'id'   => CMB_PREFIX . 'microsite_subfooter_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Subfooter Background',
        'id'   => CMB_PREFIX . 'microsite_subfooter_bg',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Footer Content',
        'id'   => CMB_PREFIX . 'microsite_footer_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Footer Image',
        'id'   => CMB_PREFIX . 'microsite_footer_image',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Footer Link',
        'id'   => CMB_PREFIX . 'microsite_footer_link',
        'desc' => 'Set a URL for the footer image link.',
        'type' => 'text',
    ) );

    $microsite_metabox->add_field( array(
        'name' => 'Colophon Content',
        'id'   => CMB_PREFIX . 'microsite_colophon_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );



    // priority metabox
    $priority_metabox = new_cmb2_box( array(
        'id' => 'priority_metabox',
        'title' => 'Priority',
        'object_types' => array( 'page', 'post', 'event' ), // post type
        'context' => 'side',
        'priority' => 'high',
        'show_names' => false
    ));

    $priority_metabox->add_field( array(
        'name' => 'Priority',
        'id'   => CMB_PREFIX . 'priority',
        'type' => 'select',
        'default' => 0,
        'options' => array(
            -1 => 'Do Not Show',
            0 => 'Low',
            1 => 'Medium',
            2 => 'High'
        )
    ) );

}
add_filter( 'cmb2_admin_init', 'microsite_metaboxes' );

