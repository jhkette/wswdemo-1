<?php
/**
 * 
 *
 * @package twitter api
 * @author Joseph
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Twitter api
 * Description: Gets information from the twitter api and outputs event as html list
 * Version: 0.0.1
 * Author: Joseph Ketterer
 * Author URI: https://mysite.com
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */


 function twitter_call(){
    $remote_url = 'https://api.twitter.com/2/users/1311130765313351681/tweets?exclude=retweets&max_results=5&user.fields=profile_image_url&expansions=author_id';
    // this value should be defined in wp-config file
    $id_token = TWEET_API;
    $args = array(
    'headers'     => array(
        'Authorization' => 'Bearer ' . $id_token,
        ),
    ); 
    $string="";
    $result = wp_remote_get( $remote_url, $args );
    $body = wp_remote_retrieve_body($result);
    $items = json_decode($body, true);
   
    $user_url = $items["includes"]["users"][0]["profile_image_url"];
    $i = 0;
    foreach($items["data"] as $item){
        if( $i >= 4) break;
        $string .= "<div class=\"container-tweet\"> <img src=\"".$user_url."\"/><p>".   $item["text"]."</p></div>";
        $i++;

    }

    return $string;
 }
 add_shortcode("twitter", "twitter_call");



 ?>