<?php

/*
Template Name: One-Column
*/

get_header();

the_showcase();

the_page_title();

?>

<div class="content-wide" role="main">
	<?php 

	if ( is_member() ) {

		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content(); 
			endwhile;
		endif;

		the_icons();

		the_accordions();
	} else {
		do_member_error();
	}

	?>
</div><!-- #content -->

<?php if ( has_cmb_value( 'page-articles' ) ) { ?>
<div class="page-articles">
	<?php print do_shortcode( '[articles cats="' . get_cmb_value('page-articles') . '" posts_per_page=3 /]' ); ?>
</div>
	<?php 
}

get_footer();

