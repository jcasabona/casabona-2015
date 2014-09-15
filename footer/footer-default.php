<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2014 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

?>

	</div><!-- #main -->

</div><!-- .container -->

<footer id="footer" class="row site-footer" role="contentinfo">
		<div class="grid">
		<div class="c1-12">
<?php

	if (cfct_get_option('cfct_copyright') != null) {
		echo '<p>'.cfct_get_option('cfct_copyright').'</p>';
	}

	if (cfct_get_option('cfct_credit') == 'yes') {
?>
		<p id="developer-link"><?php printf(__('Powered By: WordPress. Hosted by: <a href="http://www.shareasale.com/r.cfm?b=394686&u=929869&m=41388&urllink=&afftrack=">WP Engine</a>. Based on Carrington Blueprint by <a href="http://crowdfavorite.com" title="Custom WordPress development, design and consulting services." rel="developer designer">%s</a>', 'carrington-blueprint'), 'Crowd Favorite'); ?></p>
<?php
	}
?>
		</div><!-- .c1-12 -->
	</div>
	</footer><!--#footer -->

<?php wp_footer() ?>

<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</body>
</html>
