<?php 

/*
Template Name: Microsite (Merger)
*/

?><!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?> Northwest Credit Union Association</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<link href="<?php bloginfo( "template_url" ) ?>/css/micro-merger.css?v=3" rel="stylesheet" type="text/css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23488192-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-23488192-1');
</script>

</head>
<body <?php body_class(); ?>>

<div class="microsite-container">
	<header>

		<div class="microsite-header">
			<img src="<?php bloginfo( 'template_url' ) ?>/img/merger/logo-mwcua.png" />
			<img src="<?php bloginfo( 'template_url' ) ?>/img/merger/logo-nwcua.png" class="nwcua" />
		</div>
		<div class="microsite-masthead">
			<img src="<?php show_cmb_value( 'microsite_merger_header' ) ?>" />
		</div>

	</header>


	<section class="content">
		<?php

		if ( is_member() ) { ?>
		<div class="microsite-content top">
			<?php show_cmb_wysiwyg_value( 'microsite_merger_content_top' ); ?>
		</div>
		<div class="microsite-sections">
			<?php
			$sections = get_cmb_value( 'microsite_merger_title_icons' );
			if ( !empty( $sections ) ) {
				foreach ( $sections as $section ) {
					if ( !empty( $section['title'] ) && !empty( $section['image'] ) && !empty( $section['color'] ) && !empty( $section['content'] ) ) {
					?>
			<div class="section <?php print $section['color']; ?>">
				<div class="section-title">
					<h4><?php print $section['title'];?></h4>
					<img src="<?php print $section['image'] ?>">
				</div>
				<div class="section-content">
					<?php print apply_filters( 'the_content', $section['content'] ) ?>
				</div>
			</div>
					<?php 
					} 
				}
			}
			?>
		</div>
		<?php
		} else {
			?>
			<div class="microsite-content top">
				<?php do_member_error(); ?>
			</div>
			<?php
		}

		?>	
		<img src="<?php bloginfo( 'template_url' ); ?>/img/merger/footer.jpg" style="display: block;" />
	</section>
		
	<footer class="footer">
		
	</footer><!-- #colophon -->

</div>
<?php wp_footer(); ?>
</body>
</html>