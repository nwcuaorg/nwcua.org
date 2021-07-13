<?php


// removing this constant will mess up any modules that add to the theme options dashboard area.
define( 'PURE', true );


// a prefix to use for all custom fields.
define( 'CMB_PREFIX', '_p_' );


// set up the colors
global $colors;
$colors = array(
	'aqua' => 'Aqua',
	'grey-dark' => 'Grey - Dark',
	'grey-light' => 'Grey - Light',
	'forest' => 'Forest',
	'green' => 'Green',
	'lime' => 'Lime',
	'navy' => 'Navy',
	'orange' => 'Orange',
	'river' => 'River',
	'seafoam' => 'Seafoam',
	'teal' => 'Teal',
	'yellow' => 'Yellow'
);


// require multiple - a little helper function to require multiple files from the library directory in a one 
function require_multi( $files ) {
    $files = func_get_args();
    foreach ( $files as $file )
        require_once 'library/' . $file . '.php';
}


// include utility functions
require_multi( 
	'core', 'metabox', 'page-settings', 'login', 'admin',

	'post-type/people', 'post-type/event', 'post-type/job',
	
	'images', 'metabox', 'showcase', 'showcase-simple', 'icons', 'accordion', 'partner-logos', 'button', 'articles', 'category-color', 'notice'
);

