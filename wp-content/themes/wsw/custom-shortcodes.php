<?php

function show_childpages_shortcode()
{
    $current_page_id = get_the_ID();
    $child_pages = get_pages([
        "child_of" => $current_page_id,
    ]);

    $output = "";
    if ($child_pages) {
        foreach ($child_pages as $item) {
            $title = $item->post_title;

            $id = $item->ID;
            $link = esc_url(get_permalink($id));

            $page_img = get_post_thumbnail_id($id);

            $thumbnail_url = esc_url(
                wp_get_attachment_image_url($page_img, "medium")
            );

            $html =
                "<div class=\"image-container activities\"><div class=\"imagelink activities\"> <a href=\"" .
                $link .
                "\">
           <div class=\"authorimage\" style=\"background-image: url('" .
                $thumbnail_url .
                "')\";></div></a></div><h3>" .
                $title .
                "</h3></div>";
            $output .= $html;
        }
    }

    return $output;
}

add_shortcode("show_childpages", "show_childpages_shortcode");

?>
