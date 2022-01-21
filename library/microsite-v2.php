<?php


// add metabox(es)
function microsite2_metaboxes( $meta_boxes ) {


    // set up the colors
    global $colors;


    // brand metabox
    $microsite2_metabox = new_cmb2_box( array(
        'id' => 'microsite2_metabox',
        'title' => 'Microsite (v2)',
        'desc' => 'This is the description at the top of this metabox',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 
            'key' => 'page-template', 
            'value' => 'page-microsite-v2.php' 
        ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );


    
    $microsite2_metabox->add_field( array(
        'name' => 'Header & Introduction',
        'desc' => 'Enter a header image to display at the top of the microsite, and then provide the content for the first section of the page.',
        'id'   => CMB_PREFIX . 'microsite2_title_top',
        'type' => 'title'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Header',
        'id'   => CMB_PREFIX . 'microsite2_header',
        'type' => 'file',
        'preview_size' => array( 100, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Top Content',
        'id'   => CMB_PREFIX . 'microsite2_content_top',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    
    
    $microsite2_metabox->add_field( array(
        'name' => 'Microsite Icons',
        'desc' => 'Enter the icons to display in the center of the page, select colors, and enter the title and content for each icon. Entering less than 3 will result in them expanding to fill the space available.',
        'id'   => CMB_PREFIX . 'microsite2_title_icons',
        'type' => 'title'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Image (#1)',
        'id'   => CMB_PREFIX . 'microsite2_icon_image_1',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Color (#1)',
        'id'   => CMB_PREFIX . 'microsite2_icon_color_1',
        'type' => 'select',
        'options' => $colors,
        'default' => 'navy'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Title (#1)',
        'id'   => CMB_PREFIX . 'microsite2_icon_title_1',
        'type' => 'text'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Content (#1)',
        'id'   => CMB_PREFIX . 'microsite2_icon_content_1',
        'type' => 'text'
    ) );
    
    $microsite2_metabox->add_field( array(
        'name' => 'Icon Image (#2)',
        'id'   => CMB_PREFIX . 'microsite2_icon_image_2',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Color (#2)',
        'id'   => CMB_PREFIX . 'microsite2_icon_color_2',
        'type' => 'select',
        'options' => $colors,
        'default' => 'navy'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Title (#2)',
        'id'   => CMB_PREFIX . 'microsite2_icon_title_2',
        'type' => 'text'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Content (#2)',
        'id'   => CMB_PREFIX . 'microsite2_icon_content_2',
        'type' => 'text'
    ) );
    
    $microsite2_metabox->add_field( array(
        'name' => 'Icon Image (#3)',
        'id'   => CMB_PREFIX . 'microsite2_icon_image_3',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Color (#3)',
        'id'   => CMB_PREFIX . 'microsite2_icon_color_3',
        'type' => 'select',
        'options' => $colors,
        'default' => 'navy'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Title (#3)',
        'id'   => CMB_PREFIX . 'microsite2_icon_title_3',
        'type' => 'text'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Icon Content (#3)',
        'id'   => CMB_PREFIX . 'microsite2_icon_content_3',
        'type' => 'text'
    ) );



    $microsite2_metabox->add_field( array(
        'name' => 'Middle Content',
        'desc' => 'Enter the content to display between the icons and the infographic sections of the microsite.',
        'id'   => CMB_PREFIX . 'microsite2_title_middle',
        'type' => 'title'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Middle Content',
        'id'   => CMB_PREFIX . 'microsite2_content_middle',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );



    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Content',
        'desc' => 'Enter the background, icon, and text for the infographic section of the microsite.',
        'id'   => CMB_PREFIX . 'microsite2_title_infographic',
        'type' => 'title'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Content',
        'id'   => CMB_PREFIX . 'microsite2_info_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Background Image',
        'id'   => CMB_PREFIX . 'microsite2_info_background',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Icon Image',
        'id'   => CMB_PREFIX . 'microsite2_info_icon_image',
        'type' => 'select',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Icon Color',
        'id'   => CMB_PREFIX . 'microsite2_info_icon_color',
        'type' => 'select',
        'options' => $colors,
        'default' => 'navy'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Icon Title',
        'id'   => CMB_PREFIX . 'microsite2_info_icon_title',
        'type' => 'text'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Infographic Icon Conten',
        'id'   => CMB_PREFIX . 'microsite2_info_icon_content',
        'type' => 'text'
    ) );


    $microsite2_metabox->add_field( array(
        'name' => 'Bottom Content & Footer',
        'desc' => 'Enter the content to display between the infographic and footer.',
        'id'   => CMB_PREFIX . 'microsite2_title_bottom',
        'type' => 'title'
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Bottom Content',
        'id'   => CMB_PREFIX . 'microsite2_content_bottom',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

    $microsite2_metabox->add_field( array(
        'name' => 'Footer Content',
        'id'   => CMB_PREFIX . 'microsite2_content_footer',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );

}
add_filter( 'cmb2_admin_init', 'microsite2_metaboxes' );

