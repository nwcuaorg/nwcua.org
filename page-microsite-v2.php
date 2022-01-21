<?php 

/*
Template Name: Microsite (v2)
*/

global $is_anthem; 

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
<link href="<?php bloginfo( "template_url" ) ?>/css/micro.css?v=3" rel="stylesheet" type="text/css">

</head>
<body <?php body_class(); ?>>

<div class="microsite-container">
	<header>

		<div class="wrap microsite-header">
			<img src="<?php show_cmb_value( 'microsite2_header' ) ?>" />
		</div>

	</header>

	<section class="content">
		<div class="microsite-content top">
			<?php show_cmb_wysiwyg_value( 'microsite2_content_top' ); ?>
		</div>
		<div class="microsite-icons">
			<?php 
			for ( $x = 1; $x <= 3; $x++ ) {
				if ( has_cmb_value( 'microsite2_icon_image_' . $x ) ) { 
					?>
			<div class="icon <?php show_cmb_value( 'microsite2_icon_color_' . $x ) ?>">
				<div class="icon-image">
					<img src="<?php show_cmb_value( 'microsite2_icon_image_' . $x ) ?>">
				</div>
				<div class="icon-inner">
					<h4><?php show_cmb_value( 'microsite2_icon_title_' . $x ) ?></h4>
					<p><?php show_cmb_value( 'microsite2_icon_content_' . $x ) ?></p>
				</div>
			</div>
					<?php 
				} 
			} ?>
		</div>
		<div class="microsite-content middle">
			<?php show_cmb_wysiwyg_value( 'microsite2_content_middle' ); ?>
		</div>
		<div class="microsite-infographic" style="background-image: url(<?php show_cmb_value( 'microsite2_info_background' ) ?>);">
			<div class="icon <?php show_cmb_value( 'microsite2_info_icon_color' ) ?>">
				<div class="icon-image">
					<img src="<?php show_cmb_value( 'microsite2_info_icon_image' ) ?>">
				</div>
				<div class="icon-inner">
					<h4><?php show_cmb_value( 'microsite2_info_icon_title' ) ?></h4>
					<p><?php show_cmb_value( 'microsite2_info_icon_content' ) ?></p>
				</div>
			</div>
			<?php show_cmb_wysiwyg_value( 'microsite2_info_content' ) ?>
		</div>
		<div class="microsite-content bottom">
			<?php show_cmb_wysiwyg_value( 'microsite2_content_bottom' ); ?>
		</div>
		<img src="/wp-content/themes/nwcua/img/microsite-footer-border.jpg" style="display: block;" />
		<div class="microsite-footer bg-navy microsite-content text-white">
			<img src="https://nwcua.org/wp-content/uploads/2019/01/micro-footer-search-1.png" class="imageright" />
			<?php show_cmb_wysiwyg_value( 'microsite2_content_footer' ) ?>
		</div>
	</section>
		
	<footer class="footer">
		
	</footer><!-- #colophon -->

</div>
<?php wp_footer(); ?>
</body>
</html>