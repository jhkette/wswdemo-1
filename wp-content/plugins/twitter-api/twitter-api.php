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
 * Author URI: https://jketterer.netlify.app/ 
 * License: GPL v2 or later
 */


 function twitter_call(){
    // id of twitter profile taken from wp-config file
    $id = TWITTER_ID;
    /* this url has been constructed using the twitter api docs to get the */
    $remote_url = 'https://api.twitter.com/2/users/'.$id.'/tweets?exclude=retweets&max_results=5&user.fields=profile_image_url&expansions=author_id';
    // this value should be defined in wp-config file
    $id_token = TWEET_API;
    // creating an args array with the header information to be sent to Twitter Api
    $args = array(
    'headers'     => array(
        'Authorization' => 'Bearer ' . $id_token,
        ),
    ); 
    // initialise empty string variable
    
    try{
        $string="";
        // get rsult from api with url and args as arguments
        $result = wp_remote_get( $remote_url, $args );
        // get the body of data
        $body = wp_remote_retrieve_body($result);
        // decode json format to php
        $items = json_decode($body, true);
        print_r($items);
        if(!array_key_exists("data", $items)){
            throw new Exception($items["detail"]);
        }
        else{
            // get the url for image profile alongside tweet
            $user_url = $items["includes"]["users"][0]["profile_image_url"];
            $i = 0;

            // loop through each tweet
            foreach($items["data"] as $item){
                // if more than 4 break from loop
                if( $i >= 4) break;
                // construct html string with each tweet with a profile pic
                $string .= "<div class=\"container-tweet\"> <img src=\"".esc_url($user_url)."\" alt=\"profile image\"/><p>".esc_html($item["text"])."</p></div>";
                $i++;

            }
            // return the string value
            return $string;
        }
    }
    catch (Exception $e) {
        // return error mesage
        return $string .= "There was a problem reaching the Twitterr API " . $e->getMessage();

    }
}
 add_shortcode("twitter", "twitter_call");



 ?>