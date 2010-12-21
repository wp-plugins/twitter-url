<?php
/*
Plugin Name: Twitter URL
Description: A Wordpress plugin that replaces Twitter @replies and #hashtags with the appropriate Twitter links.
Version: 1.2
Author: LMP
Author URI: http://liamparker.com/
*/
function twitter_url($content){
$patterns = array("/\B(?<![=\/])@([\w]+[a-z]+([0-9]+)?)/i","/\B(?<![=\/])#([\w]+[a-z]+([0-9]+)?)/i");
$replacements = array("<a href='http://twitter.com/$1'>@$1</a>","<a href='http://twitter.com/search?q=$1'>#$1</a>");
return preg_replace($patterns , $replacements, $content);
}
add_filter('the_content', 'twitter_url');
add_filter('the_title', 'twitter_url');
?>