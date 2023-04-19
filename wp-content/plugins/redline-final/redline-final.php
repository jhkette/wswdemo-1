<?php

/**
 * Plugin Name: Red line container
 * Plugin URI: 
 * Description: Red line container
 * Author: Joseph Ketterer
 * Author URI: 
 */

function redline_firstblock_init() {
    register_block_type_from_metadata( __DIR__ );
}

add_action( "init", "redline_firstblock_init" );