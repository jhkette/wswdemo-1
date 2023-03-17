<?php get_header(); ?>
<?php 
      // these variables come from advanced custom field plugin images. They are called 
      // carousel, carousel2, carousel3 etc.
      // they can only be uploaded on the home page.
      $image1 = get_field("carousel");
      $image2 = get_field("carousel2");
      $image3 = get_field("carousel3");
      $image4 = get_field("carousel4"); 
      // error handling - the admin needs to add images if they are not present
      if(!$image1 and !$image2 and !$image3 and !$image3 and !$image4){
        echo("<p>Please add carousel images on the home page with captions</p>");
      }
      ?>



<div class="carousel">

 
      
     <!-- here i am adding some conditional checks to only display image field if it present and uploaded -->
     <?php  if($image1) {?> <div class="carousel-cell" style="background-image:url('<?php echo $image1[
          "url"
      ]; ?>')"><h1><?php echo $image1["caption"]; ?></h1> 
    <?php  echo $image1["description"] ? '<h1 class="title-small">'.  $image1["description"].'</h1>': ''; ?>
    </div><?php }?>; 
     
      <?php  if($image2) {?> <div class="carousel-cell" style="background-image:url('<?php echo $image2[
          "url"
      ]; ?>')"><h1><?php echo $image2["caption"]; ?></h1>
       <?php  echo $image2["description"] ? '<h1 class="title-small">'.  $image2["description"].'</h1>': ''; ?>
    </div><?php }?>; 
     
      <?php  if($image3) {?>  <div class="carousel-cell" style="background-image:url('<?php echo $image3[
          "url"
      ]; ?>')"><h1><?php echo $image3["caption"]; ?></h1>
       <?php  echo $image3["description"] ?'<h1 class="title-small">'.  $image3["description"].'</h1>': ''; ?>
    </div><?php }?>; 

        <?php  if($image4){?>  <div class="carousel-cell" style="background-image:url('<?php echo $image4[
          "url"
      ]; ?>')"><h1><?php echo $image4["caption"]; ?></h1>
       <?php  echo $image1["description"] ? '<h1 class="title-small">'.  $image4["description"].'</h1>': ''; ?>
    </div><?php }?>; 
     
    </div>
    <main class="main-body">
      <div class="lead">
        <section class="container-club">
          <h2>The Club</h2>
          <!-- display home page text content -->
          <?php if (have_posts()){
              while (have_posts()){
                  the_post();
                  the_content();
                }
              } ?>
      
          <div class="button-container">
            <a href="#" class="join">Join now!</a>
          </div>
        
        </section>
        <section class="container-aims">
          <h2>Our Aims</h2>

          <ul class="list-intro">
            <li>
              <img
                src=<?php echo get_theme_file_uri(
                    "assets/images/child-reaching-solid.svg"
                ); ?>
                class="community"
                alt="community"
              />
              <div>
                <h3>Open to All</h3>
                <p>
                  The club is open to all cyclists and triathletes, whether new
                  to the sport or a seasoned veteran
                </p>
              </div>
            </li>
            <li>
              <img src=<?php echo get_theme_file_uri(
                  "assets/images/bicycle-solid.svg"
              ); ?> class="bike" alt="bike"  />
              <div>
                <h3>Participation and Community</h3>
                <p>
                  The club is a community that encourages participation,
                  enjoyment and development in all aspects of cycling and
                  triathlon
                </p>
              </div>
            </li>
            <li>
              <img src=<?php echo get_theme_file_uri(
                  "assets/images/trophy-solid.svg"
              ); ?> class="trophy" alt="trophy" />
              <div>
                <h3>Racing and Competition</h3>
                <p>
                  The club provides avenues for members to race, train, and
                  compete and works together to promote open events
                </p>
              </div>
            </li>
          </ul>
        
            </section>
      </div>
      <div class="container-secondary">
        <section class="container-news">
          <h2>Latest News</h2>
         <?php
         // only show first three posts on news section 
         $homepagePosts = new WP_Query(["posts_per_page" => 3]);
         if (have_posts()) {
             while ($homepagePosts->have_posts()) {
                 $homepagePosts->the_post(); ?>
          <article class="feature-item">
            <h3><?php esc_html__(the_title()); ?></h3>
            <p> <?php echo esc_html__(
                wp_trim_words(get_the_content(), 25)
            ); ?> </p>
            <a href="<?php esc_url(the_permalink()); ?>" class="readmore"
              >Read more
              <div class="container-chevron" id="<?php echo esc_html__(get_the_ID())?>">
                <i class="fa-solid fa-chevron-right"></i
                ><i class="fa-solid fa-chevron-right"></i></div
            ></a>
          </article>
          <?php
             }
             wp_reset_postdata();
         } else {
              ?><p>No posts to view.</p> <?php
         }
         ?> 
        
        </section>
        <section class="container-twitter">
          <h2>Twitter</h2>
      
          <?php echo do_shortcode("[twitter]"); ?>
        </section>

 
      
      </div>
      <div class="container-third">
        <section class="container-calender">
         
            <h2>Calender</h2>
            <!-- call shortcode from google calender plugin -->
            <?php echo do_shortcode("[google_calender]"); ?>
            
        </section>
        <section class="container-images">
          <div class="image-container">
            <div class="imagelink">
              <a href="<?php echo site_url("/activities"); ?>">
                <div class="authorimage one"></div>
              </a>
            </div>
            <h3 id="activities">Activities</h3>
          </div>
          <div class="image-container">
            <div class="imagelink">
              <a href="<?php echo site_url("/events"); ?>">
                <div class="authorimage two"></div>
              </a>
            </div>
            <h3 id="events">Events</h3>
          </div>
  
      
  
          <div class="image-container">
            <div class="imagelink">
              <!-- cc licensed from https://www.flickr.com/photos/medmss/6882587043 -->
              <a href="<?php echo site_url("/information"); ?>">
                <div class="authorimage four"></div>
              </a>
            </div>
            <h3 id="information">Information</h3>
          </div>
        </section>
      </div>
      
  

     
    </main>
    <?php get_footer(); ?>
