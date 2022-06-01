<?php


// function to use on front-end templates to output the showcase.
function the_simple_showcase() {

	// get the slides
	$slides = get_post_meta( get_the_ID(), "simple_showcase", 1 );

	if ( !empty( $slides ) ) {
		?>
		<div class="showcase-simple">
		<?php
		$count = 0;
		foreach ( $slides as $key => $slide ) {
			if ( !empty( $slide["image"] ) ) {

				// store the content, link, image, and title (if applicable)
				$link = ( isset( $slide["link"] ) ? $slide["link"] : '' );
				$image = $slide['image'];

				?>
			<div class="slide<?php print ( $key==0 ? ' visible' : '' ); ?>">
				<?php if ( !empty( $link ) ) print '<a href="' . $link . '">'; ?>
				<img src="<?php print $image ?>" />
				<?php if ( !empty( $link ) ) print '</a>'; ?>
			</div>
				<?php

				$count++;
			}
		}

		if ( $count > 1 ) { 
			?>
			<div class="showcase-nav">
				<a class="previous">Previous</a>
				<a class="next">Next</a>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
}


// a small boolean function to just check and see if there's a showcase
function has_simple_showcase() {

	$slides = get_post_meta( get_the_ID(), "showcase", 1 );

	if ( !empty( $slides ) ) {
		return true;
	} else {
		return false;
	}

}


// add the showcase metabox
function simple_showcase_metabox( $meta_boxes ) {

    $simple_showcase_metabox = new_cmb2_box( array(
        'id' => 'simple_showcase_metabox',
        'title' => 'Simple Showcase',
        'object_types' => array( 'page' ), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => array( 'page-front.php', 'page-front-sli.php' ) ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $simple_showcase_metabox_group = $simple_showcase_metabox->add_field( array(
        'id' => 'simple_showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $simple_showcase_metabox->add_group_field( $simple_showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );

    $simple_showcase_metabox->add_group_field( $simple_showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

}
add_filter( 'cmb2_admin_init', 'simple_showcase_metabox' );


