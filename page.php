<?php get_header(); ?>
<div id ="content-post">
<?php 
    if(have_posts()): 
        while(have_posts()) : 
            the_post();
			if (has_post_thumbnail()) {
              echo "<div id='thumbnail'>";
              echo the_post_thumbnail('on-post-thumbnail');
              echo "</div>";
            }
			?>
			<h2 id= "title-post"><?php the_title(); ?></h2>
            <?php 
			the_content();
        endwhile; 
    endif; 
?>
</div>
<?php get_footer(); ?>