<?php get_header(); ?>
<main id="main-content" class="content-page">
    <div class="container hse-container">
        <header class="page-header">
            <p class="section-label">Wawasan K3</p>
            <h1><?php echo is_home() ? esc_html__('Artikel dan panduan K3', 'hse-training') : esc_html(get_the_archive_title()); ?></h1>
            <?php if (get_the_archive_description()) : ?><div class="archive-description"><?php the_archive_description(); ?></div><?php endif; ?>
        </header>
        <?php if (have_posts()) : ?>
            <div class="article-grid archive-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="article-card">
                        <a class="article-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                            <?php $article_image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>
                            <img src="<?php echo esc_url($article_image ? $article_image : get_theme_file_uri('/images/image5-1024x767.jpeg')); ?>" alt="" width="1024" height="767" loading="lazy">
                        </a>
                        <p class="article-meta"><?php echo esc_html(get_the_date()); ?></p>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                        <a class="text-link" href="<?php the_permalink(); ?>">Baca artikel <span aria-hidden="true">&#8594;</span></a>
                    </article>
                <?php endwhile; ?>
            </div>
            <nav class="pagination" aria-label="Navigasi halaman"><?php the_posts_pagination(array('mid_size' => 1, 'prev_text' => 'Sebelumnya', 'next_text' => 'Berikutnya')); ?></nav>
        <?php else : ?>
            <div class="empty-state"><h2>Belum ada artikel.</h2><p>Artikel baru akan tampil di halaman ini setelah diterbitkan.</p></div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
