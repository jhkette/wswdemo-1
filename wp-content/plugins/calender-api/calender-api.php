<?php
/**
 * 
 *
 * @package google calender plugin
 * @author Joseph
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Google Calender api plugin
 * Description: Gets information from the google calender api and outputs event as html list with icons
 * Version: 0.0.1
 * Author: Joseph Ketterer
 * Author URI: https://jketterer.netlify.app/
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */

// function that formats date to a human readable form
function format_date($date){
    $date_pieces =explode("-", $date); // explode date
    $month = get_month((int)($date_pieces[1] -1)); // call get month function
    $day = day_ending($date_pieces[2]); // get day ending
    $year = $date_pieces[0];
    return $day." ".$month." ".$year;
  };
  // returns month with a month number as paramater
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
// return day ending based on day of the month
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

function google_calender_func(){
    
    $date = gmdate("Y-m-d\TH:i:s\Z"); // current date in correct format for api call
    $api = GOOGLE_API; // api key defined in wp-config 
    $baseparams = "orderBy=startTime&singleEvents=true&timeMin=" . $date; //params for url
    $url =
        "https://www.googleapis.com/calendar/v3/calendars/joseph.ketterer@gmail.com/events?" .
        $baseparams; // url with base params
    $final_url = $url . "&key=" . $api; // final url to call 
    try {
        // call api
        $response = wp_remote_get($final_url);
        $body = wp_remote_retrieve_body($response);
        // decode json into php
        $events = json_decode($body, true);
        // check for error key in php associative array
        if(array_key_exists("error", $events)){
            // throw error with message if there is an error key
            throw new Exception($events["error"]["message"]);
        }
        // initalise string variable
        $string = "";
       
        if (count($events["items"]) > 0){ // check there are events - otherwise else block runs
            $string .= "<ul>"; // initialise a list
            $i = 0; // initialise counter
            foreach ($events["items"] as $event) { // start the loop through the events
              
                if( $i >= 4) break; // break if the counter >= 4 - we only want 4 events shown
                    // add event info to string
                    $string .= "<li> <a href='".esc_url($event["htmlLink"])."'><h3>".esc_html__($event["summary"])."</h3></a>"; 
                    if(array_key_exists("description",  $event)){
                        $string .= "<p>".esc_html__($event["description"]). "</p>";
                    } 
                    // there are two different type of date/time key sent by the api
                    // depending on if event is all day or on a specific time - so these have to be checked
                    if(array_key_exists("dateTime",  $event["start"])) {
                        $date = explode("T", $event["start"]["dateTime"]);
                        $final_date = format_date($date[0]);
                    }else{
                        // otherwise the api is sending an $event["start"]["date"] key - this also needs to be formatted
                        $final_date = format_date($event["start"]["date"]);
                    }
                    $string .= "<p>".esc_html__($final_date). "</p> </li>";
                
                $i++; // increment counter
            }
            // close list
            $string .= "</ul>";
            // return the entire string
            return $string;
        }else{
            return $string .= "<p>There are no events scheduled at the moment</p>"; // if there are no events
        }     
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
add_shortcode("google_calender", "google_calender_func");

?>
