
// onload title layout changes
jQuery(document).ready(function($){

	var set_title_class = function(){

		// get overall layout width
		var layout_width = $('.container').width();

		// get the page title
		var page_title = $('.page-title');

		// only on large screens
		if ( layout_width >= 1007 ) {

			// measure page title padding and the width of the actual title
			var page_title_left_padding = page_title.css( 'padding-left' ).replace( 'px', '' );
			var page_title_text_width = page_title.find( 'h1' ).width();

			// get the menu width and add the :after element width
			var menu_width = $('.menu-main-menu-container ul').width() + 85;

			// calculate the amount of space available for text in page title
			var page_title_space = layout_width - menu_width - page_title_left_padding;

			// if the page title text is greater than the space we have
			if ( page_title_space < page_title_text_width ) {
				page_title.addClass( 'long-title' );
			} else {
				page_title.removeClass( 'long-title' );
			}

		} else { // if we're on a small screen
			page_title.removeClass( 'long-title' );
		}

	};

	// set the title class on pageload
	set_title_class();

	// set the title class when the browser gets resized.
	$(window).resize( set_title_class );

});

