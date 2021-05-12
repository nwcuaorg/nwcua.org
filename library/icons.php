<?php



// function to use on front-end templates to output the icons.
function the_icons() {

	// get the icons
	$icons = get_post_meta( get_the_ID(), "icons", 1 );

	if ( !empty( $icons ) ) {
		?>
		<hr />
		<div class="icons">
		<?php
		$count = 0;
		foreach ( $icons as $key => $icon ) {
			$image = $icon['image'];
			$content = $icon["content"];

			if ( !empty( $image ) && !empty( $content ) ) {
				?>
			<div class="icon">
				
				<div class="icon-image">
					<img src="<?php print $image; ?>" />
				</div>
				<?php if ( !empty( $content ) ) { ?>
				<div class="icon-content">
					<?php print apply_filters( 'the_content', $content ); ?>
				</div>
				<?php } ?>

			</div>
				<?php
			}

		}
		?>
		</div>
		<?php
	}

}


// a small boolean function to just check and see if there are icons
function has_icons() {

	$icons = get_post_meta( get_the_ID(), "icons", 1 );

	if ( !empty( $icons ) ) {
		return true;
	} else {
		return false;
	}

}


// add the icon metabox
function icon_metabox( $meta_boxes ) {

    $showcase_metabox = new_cmb2_box( array(
        'id' => 'icons_metabox',
        'title' => 'Icons',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => 'icons',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Icon', 'cmb2'),
            'remove_button' => __('Remove Icon', 'cmb2'),
            'group_title'   => __( 'Icon {#}', 'cmb' ),
            'sortable' => true, // beta
        )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Content',
        'desc' => 'Enter the content for the slide.',
        'id'   => 'content',
        'type' => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
	    ),
    ) );

}
add_filter( 'cmb2_admin_init', 'icon_metabox' );


