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
    $remote_url = 'https://api.twitter.com/2/users/1311130765313351681/tweets?exclude=retweets&max_results=5&user.fields=profile_image_url,created_at&expansions=author_id';
$id_token = 'AAAAAAAAAAAAAAAAAAAAABOulgEAAAAAbkmecjNGMtjbJNBOpYQJ9FjAorw%3DO56kDoU2ymuENPHA5iAdqQmq8W7aiDvz2RnYvHrV6HDjIBm9rp';
$args = array(
    'headers'     => array(
        'Authorization' => 'Bearer ' . $id_token,
    ),
); 
$result = wp_remote_get( $remote_url, $args );
$body = wp_remote_retrieve_body($result);

return $body;

 }
 add_shortcode("twitter", "twitter_call");

//  curl --request GET --url 'https://api.twitter.com/2/tweets?ids=1260294888811347969&tweet.fields=attachments,author_id,created_at,public_metrics,source&expansions=attachments.media_keys' \
//  --header 'Authorization: Bearer $BEARER_TOKEN'

// curl --request GET --url 'https://api.twitter.com/2/tweets?ids=1260294888811347969&tweet.fields=attachments,author_id,created_at,public_metrics,source' \
//   --header 'Authorization: Bearer $BEARER_TOKEN'


// (async () => {
//     try {
//       const usersTweets = await twitterClient.tweets.usersIdTweets(
  
//         //The ID of the User to list Tweets of
//         2244994945
//       );
//       console.dir(usersTweets, {
//         depth: null,
//       });
//     } catch (error) {
//       console.log(error);
//     }
//   })();


 ?>