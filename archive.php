<?php
if (is_post_type_archive('hse_training')) {
    get_header();
    ?>
    <main id="main-content" class="content-page">
        <div class="container hse-container">
            <header class="page-header">
                <p class="section-label">Pendaftaran</p>
                <h1>Jadwal training K3</h1>
                <p>Pilih program yang sesuai. Jadwal, kuota, dan investasi tercantum pada halaman detail.</p>
            </header>
            <?php if (have_posts()) : ?>
                <div class="training-grid archive-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php $training_id = get_the_ID(); ?>
                        <article class="training-card">
                            <div class="training-card-top">
                                <span><?php echo esc_html(get_post_meta($training_id, '_hse_certification', true)); ?></span>
                                <span><?php echo esc_html(get_post_meta($training_id, '_hse_status', true)); ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <dl>
                                <div><dt>Tanggal</dt><dd><?php echo esc_html(hse_format_training_date($training_id)); ?></dd></div>
                                <div><dt>Lokasi</dt><dd><?php echo esc_html(get_post_meta($training_id, '_hse_location', true)); ?></dd></div>
                                <div><dt>Investasi</dt><dd><?php echo esc_html(hse_price_text($training_id)); ?></dd></div>
                            </dl>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php echo esc_html(get_post_meta($training_id, '_hse_status', true) === 'Segera Hadir' ? 'Detail dan daftar minat' : 'Detail dan daftar'); ?></a>
                        </article>
                    <?php endwhile; ?>
                </div>
                <nav class="pagination" aria-label="Navigasi halaman"><?php the_posts_pagination(array('mid_size' => 1, 'prev_text' => 'Sebelumnya', 'next_text' => 'Berikutnya')); ?></nav>
            <?php else : ?>
                <div class="empty-state">
                    <h2>Jadwal terbaru sedang disiapkan.</h2>
                    <p>Hubungi kami untuk mengetahui batch terdekat atau meminta jadwal in-house.</p>
                    <a class="btn btn-primary" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin menanyakan jadwal training terbaru.')); ?>" target="_blank" rel="noopener noreferrer">Tanya jadwal</a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php
    get_footer();
    return;
}
require get_template_directory() . '/index.php';
