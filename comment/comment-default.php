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

global $post;
global $comment;

// Extract data passed in from threaded.php for comment reply link
extract($data);

if ($comment->comment_approved == '0') {
?>
<div class="notice">
	<div class="content"><?php _e('Your comment is awaiting moderation.', 'carrington-blueprint'); ?></div>
</div>
<?php
}
?>
<div id="comment-<?php comment_ID(); ?>" <?php comment_class('reply clearfix'); ?>>
	<div class="reply-header vcard c1-2">
			<?php echo get_avatar($comment, 40); ?><br/>
			<?php comment_author_link(); ?> said:		
	</div>

	<div class="reply-content c3-7">
		<?php comment_text(); ?>

		<small><?php printf(__('On %s at %s', 'carrington-blueprint'), get_comment_date(), get_comment_time()); ?></small>
	</div>
</div><!-- .reply -->