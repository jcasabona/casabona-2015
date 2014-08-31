<?php

/**
Template Name: Home
**/

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="primary" class="c1-7">
	<?php
	// For the loop used, look in /loops
	cfct_loop();
	cfct_misc('nav-posts');
	?>
</div><!-- #primary -->

<?php 
cfct_template_file('sidebar', 'sidebar-home');
get_footer();
?>