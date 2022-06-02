<?php global $sli; ?><!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'sitename' ) ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
<link href="<?php bloginfo( "template_url" ) ?>/css/main.css?v=77" rel="stylesheet" type="text/css">
<link href="<?php bloginfo( "template_url" ) ?>/css/print.css" rel="stylesheet" media="print">

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23488192-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-23488192-1');
</script>

</head>
<body <?php body_class(); ?>>

<?php the_notice_bar(); ?>

<div class="container<?php print ( $sli ? ' sli' : '' ); ?>">
<header class="main">
	
	<div class="logo">
		<?php if ( $sli ) { ?>
		<a href="/service-corporation/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-main">
			<img src="<?php bloginfo( "template_url" ) ?>/img/logo-sli.png" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-aux">
			<img src="<?php bloginfo( "template_url" ) ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php } else { ?>
		<a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php bloginfo( "template_url" ) ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php } ?>
	</div>

	<div class="search-form">
		<?php get_search_form(); ?>
	</div>

	<div class="account-tools">
		<?php account_button() ?>
	</div>

	<nav>
		<button class="menu-toggle">Show/hide Menu</button>
		<?php 
		if ( $sli ) {
			wp_nav_menu( array( 'theme_location' => 'main-menu-sli', 'menu_class' => 'nav-menu sli' ) );
		} else {
			wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu' ) );
		}
		?>
	</nav>
	
</header>

<section class="content">
	<a name="content"></a>
