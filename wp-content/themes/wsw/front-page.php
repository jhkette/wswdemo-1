<?php get_header(); ?>



<div class="carousel">
      <div class="carousel-cell"  id="lead"><h1>Hello</h1></div>
      <div class="carousel-cell" id="lead2"></div>
      <div class="carousel-cell" id="lead3"></div>
     
    </div>
    <main class="main-body">
      <div class="lead">
        <article class="container-club">
          <h2>The Club</h2>
          <p>
            Based in Bury St Edmunds and formed in 1922, West Suffolk Wheelers
            is a welcoming and friendly cycling and triathlon club. If you're
            just getting into cycling for fitness or a race hardened triathlete,
            you'll find something for you and plenty of like minded individuals
            to help you achieve your goals.
          </p>
          <p>
            There are activities and events on nearly every day of the week and
            a thriving community to welcome you. We offer a "try before you buy"
            policy, so feel free to come along to one of our regular activities
            to see how you like us.
          </p>
          <div class="button-container">
            <a href="#" class="join">Join now!</a>
          </div>
        
        </article>
        <article class="container-aims">
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
        
        </article>
      </div>
      <div class="container-secondary">
        <article class="container-news">
          <h2>Latest News</h2>
         <?php $homepagePosts = new WP_Query(array(
            'posts_per_page' => 3
          )); ?>

          <?php 
          if(have_posts()){
          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
          <article class="feature-item">
            <h3><?php esc_html__(the_title());?></h3>
            <p> <?php echo esc_html__(wp_trim_words(get_the_content(), 20)); ?> </p>
            <a href="<?php  esc_url(the_permalink()); ?>" class="readmore"
              >Read more
              <div class="container-chevron" >
                <i class="fa-solid fa-chevron-right"></i
                ><i class="fa-solid fa-chevron-right"></i></div
            ></a>
          </article>
          <?php } wp_reset_postdata(); }
          else{
            ?><p>No posts to view.</p> <?php
          }?> 
        
        </article>
        <article class="container-twitter">
          <h2>Twitter</h2>
          [twitter]
          <?php echo do_shortcode("[twitter]"); ?>
        </article>

 
      
      </div>
      <div class="container-third">
        <section class="container-calender">
         
         
            <h2>Calender</h2>
            <?php echo do_shortcode("[google_calender]"); ?>
            </ul>
        </section>
        <section class="container-images">
          <div class="image-container">
            <div class="imagelink">
              <a href="<?php echo site_url("/activities")?>">
                <div class="authorimage one"></div>
              </a>
            </div>
            <h3 id="activities">Activities</h3>
          </div>
          <div class="image-container">
            <div class="imagelink">
              <a href="<?php echo site_url("/events")?>">
                <div class="authorimage two"></div>
              </a>
            </div>
            <h3 id="events">Events</h3>
          </div>
  
      
  
          <div class="image-container">
            <div class="imagelink">
              <!-- cc licensed from https://www.flickr.com/photos/medmss/6882587043 -->
              <a href="<?php echo site_url("/information")?>">
                <div class="authorimage four"></div>
              </a>
            </div>
            <h3 id="information">Information</h3>
          </div>
        </section>
      </div>
      
     
     
    </main>
    <?php get_footer(); ?>
