<?php

/**
 * Plugin Name: gutenberg accordion 
 *  Version: 1.0
 * Description: Accordion block for gutenberg. Please go to the settings button (the three dots) and ensure the 'Top toolbar' button is selected. This means that the toolbar won't interfere with the accordion.
 * Author: Joseph Ketterer
 * Author URI: https://jketterer.netlify.app/
 */

function accordion_init() {
    register_block_type_from_metadata( __DIR__ );
}

add_action( "init", "accordion_init" );