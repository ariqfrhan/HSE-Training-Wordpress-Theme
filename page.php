<?php get_header(); ?>
<main id="main-content" class="content-page">
    <?php while (have_posts()) : the_post(); ?>
        <article class="container hse-container page-detail">
            <header class="page-header"><h1><?php the_title(); ?></h1></header>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
