<?php get_header(); ?>
<h1>Calender</h1>
<div class="lead singlecontainer">

<?php if (have_posts()):
    while (have_posts()):
        the_post();
        the_content();
    endwhile;
else:
    ?>   <p>There is no information to show, please contact the administrator</p>
    

<?php
endif; ?>
</div>
<?php get_footer();

?>
