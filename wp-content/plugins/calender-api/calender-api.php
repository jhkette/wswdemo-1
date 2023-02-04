<?php
/**
 * 
 *
 * @package google calender plugin
 * @author Joseph
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Google Calender
 * Description: Gets information from the google calender api and outputs event as html list
 * Version: 0.0.1
 * Author: Joseph Ketterer
 * Author URI: https://mysite.com
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */

function format_date($date){
     
    $date_pieces =explode("-", $date);
    $month = get_month((int)($date_pieces[1] -1));
    $day = day_ending($date_pieces[2]);
    $year = $date_pieces[0];

    //  $month = getMonth(int($split_date[1]) - 1);
    return $day." ".$month." ".$year;
  };
  
  function get_month($month){
   $final_month = [
      "January",
      "Febuary",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
   ];
    return  $final_month[$month];
  }

 function day_ending($day){
    $ending  = '';
    switch($day[1]){
        case '1':
            $ending = 'st';
            break;
        case '2':
            $ending = 'nd';
            break;
        case '3':
            $ending = 'rd';
            break;
        default:
            $ending = 'th';
    };
    
    return (int)$day . $ending;
 }

function google_calender_func()
{
    $date = gmdate("Y-m-d\TH:i:s\Z"); // current date in correct format for api call
    $api = "AIzaSyBs4W8WmNLu8Kx3H7b9bjYUn5qPYcRwo-k"; // api key
    $baseparams = "orderBy=startTime&singleEvents=true&timeMin=" . $date; //params for url
    $url =
        "https://www.googleapis.com/calendar/v3/calendars/joseph.ketterer@gmail.com/events?" .
        $baseparams; // url with base params
    $final_url = $url . "&key=" . $api; // final url to call 
    try {
        $response = wp_remote_get($final_url);
        $body = wp_remote_retrieve_body($response);
      
        $events = json_decode($body, true);
        $string = "";

        if ($events["items"]){
            $i = 0;
            foreach ($events["items"] as $event) {
                // print_r($event);
                if( $i >= 3) break;
                $string .= "<li> <a href='".esc_url($event["htmlLink"])."'><h3>".esc_html__($event["summary"])."</h3></a>";
                $string .= "<p>".esc_html__($event["description"]). "</p>";
                $date = explode("T", $event["start"]["dateTime"]);
                $final_date = format_date($date[0]);
                $string .= "<p>".esc_html__($final_date). "</p> </li>";
                
                $i++;
            }
        return $string;
    }else{
        return $string .= "There are no events scheduled at the moment";
    }
        
    } catch (\Throwable $th) {
        return $string .= "There was a problem reaching the Google Calender API";
    }
}
add_shortcode("google_calender", "google_calender_func");

?>
