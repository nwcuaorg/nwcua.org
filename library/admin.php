<?php


// join the postmeta table to the main posts table for admin searches
add_filter( 'posts_join', 'nwcua_admin_search_join' );
function nwcua_admin_search_join( $join ) {
    global $pagenow, $wpdb;

    // we would add a post type clause to this if we wanted to narrow this postmeta search to only certain post types
    if ( is_admin() && 'edit.php' === $pagenow && ! empty( $_GET['s'] ) ) {    
        $join .= 'LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}



// add some where statements for admin searches
add_filter( 'posts_where', 'nwcua_admin_search_where' );
function nwcua_admin_search_where( $where ) {
    global $pagenow, $wpdb;

    // we would add a post type clause to this if we wanted to narrow this postmeta search to only certain post types
    if ( is_admin() && 'edit.php' === $pagenow && ! empty( $_GET['s'] ) ) {
        $where = preg_replace(
            "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where );
        $where.= " GROUP BY {$wpdb->posts}.id"; // Solves duplicated results
    }
    return $where;
}
