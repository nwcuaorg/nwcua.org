<?php


// get CMB value
function get_cmb_value( $field, $id = 0 ) {
    return get_post_meta( ( !empty( $id ) ? $id : get_the_ID() ), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field, $id = 0 ) {
    $cval = get_cmb_value( $field, $id );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


function cmb2_metabox_show_on_template( $display, $meta_box ) {
    if ( isset( $meta_box['show_on']['key'] ) && isset( $meta_box['show_on']['value'] ) ) :
        if( 'template' !== $meta_box['show_on']['key'] )
            return $display;

        // Get the current ID
        if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
        elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
        if( !isset( $post_id ) ) return false;

        $template_name = get_page_template_slug( $post_id );
        if ( !empty( $template_name ) ) $template_name = substr($template_name, 0, -4);

        // If value isn't an array, turn it into one
        $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

        // See if there's a match
        return in_array( $template_name, $meta_box['show_on']['value'] );
    else:
        return $display;
    endif;
}
add_filter( 'cmb2_show_on', 'cmb2_metabox_show_on_template', 10, 2 );


// a sanitization callback to allow html inside a field.
function cmb2_sanitize_allow_span( $value, $field_args, $field ) {

    /*
     * Do your custom sanitization. 
     * strip_tags can allow whitelisted tags
     * http://php.net/manual/en/function.strip-tags.php
     */
    $value = strip_tags( $value, '<span></span>' );

    return $value;
}
