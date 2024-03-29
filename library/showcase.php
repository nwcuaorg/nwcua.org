<?php


// function to use on front-end templates to output the showcase.
function the_showcase() {

	// get the slides
	$slides = get_post_meta( get_the_ID(), "showcase", 1 );
	$showcase_nav = get_cmb_value( 'showcase_nav' );

	if ( !empty( $slides ) ) {
		?>
		<div class="showcase">
		<?php
		$count = 0;
		foreach ( $slides as $key => $slide ) {
			if ( !empty( $slide["image"] ) ) {

				// store the content, link, image, and title (if applicable)
				$content = ( isset( $slide["content"] ) ? $slide["content"] : '' );
				$link = ( isset( $slide["link"] ) ? $slide["link"] : '' );
				$image = $slide['image'];
				$video = $slide['video'];
				$title = ( isset( $slide['title'] ) ? $slide['title'] : '' );

				?>
			<div class="slide slide-<?php print ( $key==0 ? ' visible' : '' ); ?>" data-id="<?php print $key; ?>" style="background-image: url(<?php print $slide["image"]; ?>);<?php print ( !empty( $link ) ? 'cursor: pointer;' : '' ) ?>"<?php print ( !empty( $link ) ? ' onclick="location.href=\'' . $link . '\'"' : '' ) ?>>
				
				<?php if ( stristr( $video, '.webm' ) ) { ?>
				<video class="slide-video" autoplay muted loop>
					<source src="<?php print $video; ?>" type="video/webm">
				</video>
				<?php } ?>

				<?php if ( !empty( $content ) ) { ?>
				<div class="slide-content">
				<?php 
				if ( !empty( $content ) ) { 
					print apply_filters( 'the_content', $content );
				}
				?>
				</div>
				<?php } else if ( !empty( $title ) ) { ?>
				<h1 class="slide-title"><?php print $title; ?></h1>
				<?php } ?>
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
			<div class="showcase-buttons">
				<?php
				foreach ( $slides as $key => $slide ) {
					print '<a class="button' . ( $key == 0 ? ' current' : '' ) . '" data-id="' . $key . '"></a>';
				}
				?>
			</div>
			<?php
		}
		?>
		</div>
		<?php

		if ( !empty( $showcase_nav ) ) {

			// get menu info, so we have a menu item count.
			$my_menu = wp_get_nav_menu_object( $showcase_nav );
			
			// set the menu class based on the number of items
			if ( $my_menu->count <= 6 ) {
				$count_class = 'three';
			} else if ( $my_menu->count <= 8 ) {
				$count_class = 'four';
			} else {
				$count_class = 'five';
			}

			// output the menu container and menu
			print '<div class="showcase-subnav ' . $count_class . '">';
			wp_nav_menu( array( 'menu' => $showcase_nav ) );
			print '</div>';

		}
	}

}


// a small boolean function to just check and see if there's a showcase
function has_showcase() {

	$slides = get_post_meta( get_the_ID(), "showcase", 1 );

	if ( !empty( $slides ) ) {
		return true;
	} else {
		return false;
	}

}


// add the showcase metabox
function showcase_metabox( $meta_boxes ) {

	$all_menus = get_all_menus();

    $showcase_metabox = new_cmb2_box( array(
        'id' => 'showcase_metabox',
        'title' => 'Showcase',
        'object_types' => array( 'page', 'event' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox->add_field( array(
        'title' => 'Showcase Menu',
        'id' => CMB_PREFIX . 'showcase_nav',
        'desc' => 'Select a menu to be positioned over the bottom of the showcase.',
        'type' => 'select',
        'options' => $all_menus
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => 'showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Upload a .webm video file to use on large screens.',
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

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Title',
        'desc' => "Enter the title for this page - this will only be visible if you don't enter any content.",
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

}
add_filter( 'cmb2_admin_init', 'showcase_metabox' );



