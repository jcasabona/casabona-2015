<?php

/**
Template Name: Home
**/

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();
?>

<div id="primary" class="c2-8">
	<?php
	// For the loop used, look in /loops
	cfct_loop();
cfct_misc('nav-posts');
	?>
</div><!-- #primary -->

<?php 
get_sidebar('home');
get_footer();
?>