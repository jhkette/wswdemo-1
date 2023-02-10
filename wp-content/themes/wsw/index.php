<?php get_header(); ?>
<main class="main-body">
  <div class="lead singlecontainer">
          <?php while (have_posts()) {
              the_post(); ?>
              <article class="post-item">
                <h2 class="headline"><a href="<?php esc_url(
                    the_permalink()
                ); ?>"><?php the_title(); ?></a></h2>
                
                <div>
                  <p class="highlight-link">Posted by <?php esc_html__(
                      the_author_posts_link()
                  ); ?> on <?php esc_html__(
      the_time("n.j.y")
  ); ?> in <?php echo get_the_category_list(", "); ?></p>
                </div>
          
                <div>
                  <?php esc_html__(the_excerpt()); ?>
                  <div class="container-reading"><p ><a href="<?php esc_html__(
                      the_permalink()
                  ); ?>">Continue reading</p>   <div class="container-chevron" id="chevron1">
                  <i class="fa-solid fa-chevron-right"></i
                  ><i class="fa-solid fa-chevron-right"></i></div
              ></a></div>
                </div>
          <?php  ?>
            </article>
            <?php
          } ?>  <div><p>  <?php echo paginate_links(); ?> <p></div> 
                    
  </div>
</main>

<?php get_footer(); ?>
