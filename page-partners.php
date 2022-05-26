<?php

/*
Template Name: Strategic Link Partners
*/

global $sli;
$sli = true;

get_header();

the_showcase();

the_page_title();

?>

<div class="two-column archive-partners <?php print ( has_showcase() ? '' : ' no-showcase' ) ?> reverse" role="main">
	<?php 
	if ( is_member() ) {

		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;

	} else {
		do_member_error();
	}
	?>
</div><!-- #content -->

<?php

get_footer();

?>