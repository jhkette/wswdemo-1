<?php

/**
 * Plugin Name: accordion
 * Plugin URI: https://alialaa.com/
 * Description: accordion
 * Author: Joseph Ketterer
 * Author URI: https://jkette.com/
 */

function accordion_init() {
    register_block_type_from_metadata( __DIR__ );
}

add_action( "init", "accordion_init" );