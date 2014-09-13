<?php
function mf_get_featured_image($html, $aid=false){
    $sizes= array('thumbnail', 'medium', 'large', 'full'); 
    
	$img= '<span data-picture data-alt="'.get_the_title().'">';
	$ct= 0;
	$aid= (!$aid) ? get_post_thumbnail_id() : $aid;

	foreach($sizes as $size){
		$url= wp_get_attachment_image_src($aid, $size);
		
		$width= ($ct < sizeof($sizes)-1) ? ($url[1]*0.66) : ($width/0.66)+25;
		
		$img.= '
			<span data-src="'. $url[0] .'"';
		$img.= ($ct > 0) ? ' data-media="(min-width: '. $width .'px)"></span>' :'></span>';
		
		$ct++;
	}
	$url= wp_get_attachment_image_src( $aid, $sizes[1]);
    $img.=  '<noscript>
            	<img src="'.$url[0] .'" alt="'.get_the_title().'">
			</noscript>
		</span>';
	return $img;
}

//add_filter( 'post_thumbnail_html', 'mf_get_featured_image');

function mf_responsive_image($atts, $content=null){ 
	extract( shortcode_atts( array(
		'src' => false
	), $atts ) );
			
	if(!$src){
		return '';
	}else{
		$aid= mf_get_attachment_id_from_src($src);
		$img= mf_get_featured_image('', $aid);
	}
	
	return $img;
	
}

//add_shortcode('mf_image', 'mf_responsive_image');

function mf_get_attachment_id_from_src($url) {
  global $wpdb;
  $prefix = $wpdb->prefix;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $url ));
    return $attachment[0];
}

function mf_replace_post_images($content){
	global $post;
	
	preg_match('#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#', $content, $matches);
	foreach($matches as $match){
		print $match;
		preg_replace( $match, mf_get_featured_image(mf_get_attachment_id_from_src ($match)), $content );
	}
	 return $content;
}

function mf_tag_cloud($args=''){
	$tags = get_tags($args);
	$html = '<ul class="wp-tag-cloud">';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );
	
	 
	$progress= $tag->count*2;
		
	$html .= "<li><a href='{$tag_link}' title='{$tag->count} posts' class='{$tag->slug}'>{$tag->name}</a>";
	$html .= "<progress max='100' value='{$progress}'>Count: {$tag->count}</progress></li>";
}
$html .= '</ul>';
echo $html;
}



?>