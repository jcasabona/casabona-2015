<?php
function jlc_home_posts( $query ) {

	print (int)$query->is_home();
	print (int)$query->is_main_query();

    if ( $query->is_home()) {
        $query->set('post_type', 'post');
        $query->set('posts_per_page', 10);
    }
}
//add_action( 'pre_get_posts', 'jlc_home_posts' );

?>