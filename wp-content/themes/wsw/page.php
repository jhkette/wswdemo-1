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
            <?php if (get_the_title(get_the_ID()) == 'Join Us') { ?> 
            <div class="join-member-container">
            <div class ="join-container">
            <ul class="list-intro join-us">
              <li>
              <i class="fa-solid fa-user"></i>
                <div>
                  <h3>Single Member, First Claim - £30</h3>
                  <p>
                  West Suffolk Wheelers is your primary (or only) club
                  </p>
                </div>
              </li>
              <li>
              <i class="fa fa-user-plus" ></i>
                <div>
                  <h3>Single Member, Second Claim - £20</h3>
                  <p>
                    The club is a community that encourages participation,
                    enjoyment and development in all aspects of cycling and
                    triathlon
                  </p>
                </div>
              </li>
              <li>
              <i class="fa-solid fa-user"></i>
                <div>
                  <h3>Over 60 or Unwaged - £20</h3>
                  <p>
                  Proof of status may be required
                  </p>
                </div>
              </li>
              <li>
              <i class='fas fa-child'></i>
                <div>
                  <h3>
Under 18 - £15</h3>
                  <p>
                  Under 18 on the date of joining/renewing
                  </p>
                </div>
              </li>
            </ul>
            <p>Membership is for 12 months from the date of signing up.</p>
            <p>For membership enquiries, please email: membership@westsuffolkwheelers.org</p>
            <div class="button-container">
              <a href="<?php echo esc_url(
              	site_url('/join')
              ); ?>" id="join">Join now!</a>
            </div>
            </div>
            <div class="membership">
              <h3> Membership Benefits</h3>
              <p>As well as being a great bunch of people, over 500 strong, there are many, 
                many benefits to being a member of the West Suffolk Wheelers; here’s just a few…</p>

                <h4>Affiliated club for access to competitive events</h4>
                <ul>
                  <li>British Cycling</li>
                  <li>Triathlon England</li>
                  <li>CTTA (Cycling Time Trials)</li>
                  <h4>Racing</h4>
                  <li>ERRL (Eastern Road Race League)</li>
                  <li>Eastern Cyclo-Cross League</li>
                </ul>
                <h4>Club Runs</h4>
                <ul>
                  <li>6 rides a week for all ability levels</li>
                </ul>
                    
                        
                <h4>Training</h4>
                <ul>
                  <li>Open Water Swimming</li>
                  <li>Coached Pool Sessions</li>
                  <li>Weekly training rides</li>
                  <li>Winter indoor turbo/rollers sessions</li>
                </ul>

                <h4>Trips</h4>
                <ul>
                  <li>Italy Spring Training Camp</li>
                  <li>Velodrome</li>
                </ul>
              </div>
            </div>
            
            <?php } ?>
          
          </div>
       </div>
    </main>
<?php get_footer();
?>
