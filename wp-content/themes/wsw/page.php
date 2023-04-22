<?php
get_header(); ?>
<main class="main-body-template">



  <div class="secondary-banner"> <h1><?php echo esc_html(
  	get_the_title()
  ); ?></h1>
    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?> 
      </div>
          <div class="lead subpage">
              <nav id="navigation" class="secondary-nav">
                <?php
                // get the parent page - if it is a parent will be 0 - else function will return id of parent
                $the_parent = wp_get_post_parent_id(get_the_ID());
                $the_title;
                $link;
                // if statement associates $findChildrenOf with the parent, or if value is zero, ie.
                // it IS the parent we simply get the page id with get_the_id
                if ($the_parent) {
                	$find_children_of = $the_parent;
                	$the_title = get_the_title($the_parent);
                	$link = get_permalink($the_parent);
                } else {
                	$find_children_of = get_the_ID();
                	$the_title = get_the_title();
                	$link = get_permalink();
                }
                ?>
                

              <h4 class="page-links__title"><a href="<?php echo esc_url(
              	$link
              ); ?>"><?php echo esc_html($the_title); ?></a></h4>
                  <ul class="nav-links">
                  
                
                  <?php // wordpress wp_list_pages function with an array parameter

// no title_li stops a title appearing on the list
                  // only want pages that are child of a certain page - ie
                  wp_list_pages([
                  	'title_li' => null,
                  	'child_of' => $find_children_of,
                  	'sort_column' => 'menu_order',
                  ]); ?>
                  </ul>
              </nav>

          <div class="activities-container">
          
              <?php esc_html(the_content()); ?>
          <!-- if there is no parent page found ie the page is the parent -->
          <?php if (!$the_parent) { ?>
            <div class="container-events">
              <!-- show childpages from shortcode - this is from custom-shortcode.php -->
              <?php echo do_shortcode('[show_childpages]'); ?>
            </div>
          
            <?php } ?>
             <!-- join us has a diificult layout that is basically impossible to code into the CMS so i've added 
            the layout into the theme -->
            <?php if (get_the_title(get_the_ID()) == 'Join Us') { 
                include("join.php");
            
            } ?>
          
          </div>
       </div>
    </main>
<?php get_footer();
?>
