<?php get_header(); ?>
<main class="main-body">
  <div class="lead singlecontainer news">
          <?php if (have_posts()) {
          	while (have_posts()) {
          		the_post(); ?>
              <article class="post-item">
                <h2 class="headline"><a href="<?php esc_url(
                	the_permalink()
                ); ?>"><?php the_title(); ?></a></h2>
                
                <div>
                  <p class="highlight-link">Posted by <span class="blog-category"><?php esc_url(
                  	the_author_posts_link()
                  ); ?></span> on <?php esc_html__(
	the_time('n.j.y')
); ?> in <span class="blog-category"><?php echo get_the_category_list(
 	', '
 ); ?></span></p>
                </div>
          
                <div>
                  <?php esc_html__(the_excerpt()); ?>
                  <a href="<?php esc_url(the_permalink()); ?>" class="readmore"
              >Read more
              <div class="container-chevron" id="<?php echo esc_html__(
              	get_the_ID(the_post())
              ); ?>">
                <i class="fa-solid fa-chevron-right"></i
                ><i class="fa-solid fa-chevron-right"></i></div
            ></a>
                </div>
         
            </article>
            <?php
          	}
          } ?>
        
            <div><p>  <?php echo paginate_links(); ?> <p></div> 
            
          
         



         
                    
  </div>
</main>

<?php get_footer(); ?>
