<?php

get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
  
    <article class="post-item">
        <h2 class="page-banner__title"><?php esc_html__(the_title()); ?></h2>
        <div class="page-banner__intro">
       
        </div>
  </article>  
    </div>
   <div class ="lead singlecontainer">
    <article class="post-item">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail();
        } ?>
          <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url(
            "/news"
        ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a></p> 
        <p class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time(
     "n.j.y"
 ); ?> in <?php echo get_the_category_list(", "); ?></p>
      </div>

      <div class="generic-content"><?php esc_html__(the_content()); ?></div>

  </article>
  </div>
    

    
  <?php
}

get_footer();

?>
