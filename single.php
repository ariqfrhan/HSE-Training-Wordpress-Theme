<?php get_header(); ?>
<main id="main-content" class="content-page single-page">
    <?php while (have_posts()) : the_post(); ?>
        <?php if (get_post_type() === 'hse_training') : ?>
            <?php
            $training_id = get_the_ID();
            $location = get_post_meta($training_id, '_hse_location', true);
            $duration = get_post_meta($training_id, '_hse_duration', true);
            $status = get_post_meta($training_id, '_hse_status', true);
            ?>
            <article class="container hse-container training-detail">
                <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a><span>/</span><a href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Jadwal</a></nav>
                <header class="training-detail-header">
                    <div>
                        <p class="section-label"><?php echo esc_html(get_post_meta($training_id, '_hse_certification', true)); ?></p>
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?><p class="lead"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
                    </div>
                    <?php if (has_post_thumbnail()) : ?><figure><?php the_post_thumbnail('large'); ?></figure><?php endif; ?>
                </header>
                <div class="training-facts" aria-label="Ringkasan program">
                    <div><span>Tanggal</span><strong><?php echo esc_html(hse_format_training_date($training_id)); ?></strong></div>
                    <div><span>Lokasi</span><strong><?php echo esc_html($location ? $location : 'Dikonfirmasi kemudian'); ?></strong></div>
                    <div><span>Durasi</span><strong><?php echo esc_html($duration ? $duration : 'Sesuai program'); ?></strong></div>
                    <div><span>Investasi</span><strong><?php echo esc_html(hse_price_text($training_id)); ?></strong></div>
                </div>
                <div class="training-content-grid">
                    <div class="entry-content"><?php the_content(); ?></div>
                    <aside class="registration-panel" id="registration">
                        <p class="registration-status"><?php echo esc_html($status ? $status : 'Pendaftaran Dibuka'); ?></p>
                        <h2>Daftar program ini</h2>
                        <?php $registration_status = isset($_GET['registration']) ? sanitize_key(wp_unslash($_GET['registration'])) : ''; ?>
                        <?php if ($registration_status === 'success') : ?>
                            <div class="form-notice success" role="status">Pendaftaran diterima. Tim kami akan menghubungi Anda.</div>
                        <?php elseif ($registration_status) : ?>
                            <div class="form-notice error" role="alert">Data belum dapat diproses. Periksa kembali nama, email, dan nomor telepon.</div>
                        <?php endif; ?>
                        <form class="registration-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                            <input type="hidden" name="action" value="hse_register">
                            <input type="hidden" name="training_id" value="<?php echo esc_attr($training_id); ?>">
                            <?php wp_nonce_field('hse_registration', 'hse_registration_nonce'); ?>
                            <div class="honeypot" aria-hidden="true"><label>Website<input type="text" name="company_site" tabindex="-1" autocomplete="off"></label></div>
                            <label for="full_name">Nama lengkap</label>
                            <input id="full_name" name="full_name" type="text" maxlength="100" autocomplete="name" required>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" maxlength="150" autocomplete="email" required>
                            <label for="phone">Nomor WhatsApp</label>
                            <input id="phone" name="phone" type="tel" maxlength="30" autocomplete="tel" required>
                            <label for="company">Perusahaan <span>(opsional)</span></label>
                            <input id="company" name="company" type="text" maxlength="150" autocomplete="organization">
                            <label for="participants">Jumlah peserta</label>
                            <input id="participants" name="participants" type="number" min="1" max="500" value="1" required>
                            <button class="btn btn-primary btn-lg" type="submit">Kirim pendaftaran</button>
                            <p class="form-privacy">Data digunakan untuk memproses pendaftaran dan menghubungi Anda terkait program ini.</p>
                        </form>
                    </aside>
                </div>
            </article>
        <?php else : ?>
            <article class="container hse-container article-detail">
                <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a><span>/</span><a href="<?php echo esc_url(hse_blog_url()); ?>">Artikel</a></nav>
                <header>
                    <p class="article-meta"><?php echo esc_html(get_the_date()); ?><?php if (get_the_category_list(', ')) : ?> | <?php echo wp_kses_post(get_the_category_list(', ')); ?><?php endif; ?></p>
                    <h1><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?><p class="lead"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
                    <?php $article_image = hse_existing_thumbnail_url(get_the_ID(), 'large'); ?>
                    <?php if ($article_image) : ?><figure class="article-hero"><img src="<?php echo esc_url($article_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="1024" height="767"></figure><?php endif; ?>
                </header>
                <div class="entry-content"><?php the_content(); ?></div>
                <nav class="post-navigation" aria-label="Artikel lainnya"><?php the_post_navigation(array('prev_text' => 'Sebelumnya: %title', 'next_text' => 'Berikutnya: %title')); ?></nav>
            </article>
        <?php endif; ?>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
