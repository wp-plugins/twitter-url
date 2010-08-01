<?php
/*
Plugin Name: Twitter URL  
Plugin URI: http://wordpress.org/extend/plugins/twitter-url/
Description: A Wordpress plugin that replaces Twitter @replies and #hashtags with the appropriate Twitter links.
Version: 1.0
Author: LMP
Author URI: http://liamparker.com/
*/
function hashTags($matches){
$hash = $matches[2];
$result = ("<a href='http://twitter.com/search?q=$hash'>#$hash</a>");
return($result);
}
function twitterUsernames($matches){
$username= $matches[2];
$result = ("<a href='http://twitter.com/$username'>@$username</a>");
return($result);
}
function twitterURL($content){
$content = preg_replace_callback('/(^|[^a-z0-9_])@([a-z0-9_]+)/i','twitterUsernames',$content);
$content = preg_replace_callback('/(^|[^a-z0-9_])#([a-z0-9_]+)/i','hashTags',$content);
return $content;
}
add_filter('the_content', 'twitterURL');
?>