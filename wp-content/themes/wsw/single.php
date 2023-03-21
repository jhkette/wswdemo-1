<?php

get_header();

while (have_posts()) {
	the_post(); ?>
    <div class="page-banner">
  
    <div class="post-item">
        <h2 class="page-banner__title"><?php esc_html__(the_title()); ?></h2>
        <div class="page-banner__intro">
       
        </div>
</div>  
    </div>
   <div class ="lead singlecontainer news">
    <div class="post-item">
        <?php if (has_post_thumbnail()) {
        	the_post_thumbnail();
        } ?>
          <div>
         
        <p class="highlight-link"><a href="<?php echo site_url(
        	'/news'
        ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a></p> 
         <h2 class="blog-title"><?php echo esc_html__(the_title()); ?></h2>
        <p>Posted by <span class="blog-category"><?php the_author_posts_link(); ?></span> on <?php the_time(
	'n.j.y'
); ?> in <span class="blog-category"><?php echo get_the_category_list(
 	', '
 ); ?></span></p>
      </div>

      <div class="generic-content"><?php esc_html__(the_content()); ?></div>

</div>
</div>
    

    
  <?php
}

get_footer();

?>
