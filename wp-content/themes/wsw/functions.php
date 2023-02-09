<?php


function wsw_files()
{
    wp_enqueue_script(
        "slide",
        get_template_directory_uri() . "/assets/js/flickity.js",
        ["jquery"],
        "1.0",
        true
    );
    wp_enqueue_script(
        "slide",
        get_template_directory_uri() . "/assets/js/lazyload.js",
        ["jquery"],
        "1.0",
        true
    );

    wp_enqueue_script(
        "wsw-js",
        get_template_directory_uri() . "/assets/js/main.js",
        ["jquery"],
        "1.0",
        true
    );
    wp_enqueue_style(
        "icons",
        "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    );
}
    wp_enqueue_style(
        "carousel",
        get_template_directory_uri() . "/assets/css/slider.css"
    );
    wp_enqueue_style(
        "wsw_main",
        get_template_directory_uri() . "/assets/css/main.css"
    );

   
   

add_action("wp_enqueue_scripts", "wsw_files");

function wsw_features()
{
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "wsw_features");

// adds theme support for featured images
add_theme_support( 'post-thumbnails' );




// move admin bar to the bottom of the page to allow user to access common links
function move_admin_bar() {
    echo '
    <style type="text/css">
    body {margin-top: -28px;padding-bottom: 28px;}
    body.admin-bar #wphead {padding-top: 0;}
    body.admin-bar #footer {padding-bottom: 28px;}
    #wpadminbar { top: auto !important;bottom: 0;}
   

    #wpadminbar .quicklinks>ul>li {
        position:relative;
    }
    
    #wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper {
        bottom: 32px;
    }
    </style>';
    }
add_action( 'wp_head', 'move_admin_bar' );


include('custom-shortcodes.php');

?>