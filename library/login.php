<?php


// start a session if we don't have one already
if (!session_id()) {
    session_start();
}


global $sf_url;
// $sf_url = "https://staging-nwcua.cs14.force.com/s/";
$sf_url = "https://nwcua.force.com/s/";


// authenticate a user
/*
if ( is_dev() ) {
	$_SESSION['sf_user']['email'] = 'james@jpederson.com';
	$_SESSION['sf_user']['firstname'] = 'James';
	$_SESSION['sf_user']['lastname'] = 'Pederson';
}
*/


// get the request URI and remove the query string
$request = ( isset( $_SERVER['QUERY_STRING'] ) ? str_replace( "?" . $_SERVER['QUERY_STRING'], '',  $_SERVER['REQUEST_URI'] ) : $_SERVER['REQUEST_URI'] );


// check if this is an auth request.
if ( substr( $request, 0, 5 ) == '/auth' ) {
	$_SESSION['sf_user'] = $_REQUEST;
	if ( !is_user_logged_in() ) {
		wp_set_auth_cookie( 141615, false );
	}
	wp_redirect( 'https://nwcua.leagueinfosight.com/admin/client/is/frontend/nwcua_sso.php?' . http_build_query( $_REQUEST ) );
	exit;
}


// handle logout requests
if ( substr( $request, 0, 7 ) == '/logout' ) {

	// unset the salesforce user from session
	unset( $_SESSION['sf_user'] );

	// redirect to the homepage and exit
	wp_redirect( '/' );
	exit;
	
}


// [cal-link] shortcode handler
function cal_link() {

	// use the WP user if they're an admin
	if ( isset( $_SESSION['sf_user'] ) ) {

		// piece together the user information from SF to pass along to CAL
		$email = $_SESSION['sf_user']['email'];
		$fist_name = $_SESSION['sf_user']['firstname'];
		$last_name = $_SESSION['sf_user']['lastname'];

	} else if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {

		// get the WP user if it's an admin
		$user_info = wp_get_current_user();
		$user_meta = get_user_meta( $user_info->data->ID );
		$first_name = $user_meta['first_name'][0];
		$last_name = $user_meta['last_name'][0];
		$email = $user_info->data->user_email;

	}

	// generate a guid from the token, date, and email
	$guid = md5( CAL_TOKEN . date( 'n/j/Y') . $email );

	$redirect = urlencode( 'http://www.fuzeqna.com/nwcua/ext/kbdetail.aspx?kbid=468' );

	if ( isset( $email ) ) {
		return '<div class="buttons"><a href="https://www.fuzeqna.com/nwcua/membership/consumer/signon.asp?auth=' . $guid . '&uid=' . $email . '&email=' . $email . '&fname=' . $first_name . '&lname=' . $last_name . '&redir=' . $redirect . '" class="btn orange">Visit CAL</a></div>';
	} else {
		return "<strong>Please log in to access CAL.</strong>";
	}

}
add_shortcode( 'cal-link', 'cal_link' );




// only show the admin toolbar for admin users.
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if ( !current_user_can('administrator') && !is_admin() ) {
		show_admin_bar( false );
	}
}


// display the my account/login links based on user state.
function account_button() {

	// let's get the URL
	global $sf_url;

	// get the referer
	$referer = ( isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://' ) . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	// if the user is logged in.
	if ( isset( $_SESSION['sf_user'] ) ) {
		?><a href="<?php print $sf_url ?>my-account" class='account button'>My Account</a><?php
	} else {
		?><a href="<?php print $sf_url ?>redirect-with-url-params?url=<?php print $referer ?>" class='account button'>Log In</a><?php 
	}

}



// membership check - boolean function, that checks to see if there were previous access roles and adds the appropriate new meta.
function is_member() {

	global $post;

	// get old member roles meta data
	//$roles = get_post_meta( $post->ID, '_members_access_role' );

	// check for new member
	//$new_roles = get_cmb_value( 'members-only' );

	// if the old member roles are set, and the new ones aren't, let's automatically fix up the new 'members-only' meta data.
	if ( !empty( $roles ) && empty( $new_roles ) ) {
		// update_post_meta( $post->ID, CMB_PREFIX . 'members-only', 'on' );
	}

	/*
	print "<!--";
	print_r( $_SESSION['sf_user'] );
	print get_cmb_value( 'member-only' );
	print "-->";
	*/

	// see if there is a member's only value
	if ( has_cmb_value( 'member-only' )  ) {

		// if the content requires membership
		if ( get_cmb_value( 'member-only' ) == 'on' ) {

			return user_has_membership();

			// they don't have any of the required roles, they can't access it.
			return false;

		} else {

			// members only checkbox exists and is unchecked, they can access
			return true;
		}

	} else {

		// there's no value available for the member's only checkbox, they can access.
		return true;
	}

}


// new function to determine if the currently logged in user has a membership.
function user_has_membership() {

	// override so administrator accounts can view all content.
	if ( current_user_can( 'administrator' ) ) { 
		return true;
	}

	// check if we've got a salesforce user logged in
	if ( isset( $_SESSION['sf_user'] )  ) {

		// get the salesforce user
		$user = $_SESSION['sf_user'];

		// see if the user is an editor
		if ( $user['membershiptype'] != 'Non Member' ) return true;

	}

	// otherwise, the user isn't a member
	return false;

}


// member error
function do_member_error() {

	// lets get the url
	global $sf_url;
	
	// set the referrer
	$referer = ( isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://' ) . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	?>
	<div class="member-notice">
		<?php
		if ( isset( $_SESSION['sf_user'] ) ) {
			?>
		<h3>Your membership still needs approval.</h3>
		<p>You've successfully created your account and logged in, but association staff still needs to approve your membership. Get in touch with us to get assistance accessing our member resources.</p>
		<p>To check and see if your membership has been approved, please <a href="/logout">log out</a> and back in.</p>
			<?php
		} else {
			?>
		<h3>A membership is required to view this content.</h3>
		<p>Please <a href="<?php print $sf_url; ?>redirect-with-url-params?url=<?php print $referer ?>">log in</a> to view this content.</p>
			<?php
		}
		?> 
	</div>
	<?php
}


