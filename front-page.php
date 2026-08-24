<?php
get_header();

$training_query = new WP_Query(array(
    'post_type'      => 'hse_training',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'meta_key'       => '_hse_start_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        'relation' => 'OR',
        array('key' => '_hse_start_date', 'value' => wp_date('Y-m-d'), 'compare' => '>=', 'type' => 'DATE'),
        array('key' => '_hse_start_date', 'value' => '', 'compare' => '='),
        array('key' => '_hse_start_date', 'compare' => 'NOT EXISTS'),
    ),
));

$article_query = new WP_Query(array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true,
));
?>
<main id="main-content">
    <section class="hero" id="home">
        <div class="container hse-container hero-grid">
            <div class="hero-copy">
                <p class="section-label">HSE Training Indonesia</p>
                <h1>Kompetensi K3 yang siap diterapkan di tempat kerja</h1>
                <p class="hero-lead">Pelatihan dan sertifikasi BNSP untuk individu dan perusahaan, dikelola oleh PT Triyasa Mitra Solusi.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary btn-lg" href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Lihat jadwal</a>
                    <a class="text-link" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin konsultasi program BNSP.')); ?>" target="_blank" rel="noopener noreferrer">Konsultasi program <span aria-hidden="true">&#8594;</span></a>
                </div>
            </div>
            <div class="hero-media" aria-label="Dokumentasi kegiatan pelatihan HSE Training Indonesia">
                <figure class="hero-photo hero-photo-main">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/image5-1024x767.jpeg')); ?>" alt="Peserta mengikuti sesi pelatihan di ruang kelas" width="1024" height="767" fetchpriority="high">
                </figure>
                <figure class="hero-photo hero-photo-small">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/1-3.jpg')); ?>" alt="Dokumentasi peserta lokakarya keselamatan dan kesehatan kerja" width="1024" height="683">
                </figure>
            </div>
        </div>
    </section>

    <section class="trust-strip" aria-label="Layanan utama">
        <div class="container hse-container trust-grid">
            <p><strong>Public Training</strong><span>Untuk peserta individu dan lintas perusahaan</span></p>
            <p><strong>In-house Training</strong><span>Program sesuai kebutuhan organisasi</span></p>
            <p><strong>Konsultasi K3</strong><span>Dukungan penerapan sistem K3</span></p>
        </div>
    </section>

    <section class="section section-about" id="about">
        <div class="container hse-container about-grid">
            <div>
                <p class="section-label">Tentang kami</p>
                <h2>Pengalaman pelatihan sejak 2012</h2>
            </div>
            <div class="about-copy">
                <p>HSE Training Indonesia berada di bawah naungan PT Triyasa Mitra Solusi. Kami membantu pengembangan kompetensi K3 untuk sektor industri, lembaga pendidikan, dan pemerintahan.</p>
                <p>Program dikelola bersama tenaga profesional dan mitra pelaksana sesuai kebutuhan peserta, skema kompetensi, dan ketentuan yang berlaku.</p>
                <a class="text-link" href="#experience">Lihat dokumentasi kegiatan <span aria-hidden="true">&#8594;</span></a>
            </div>
        </div>
    </section>

    <section class="section section-services" id="services">
        <div class="container hse-container">
            <div class="section-heading">
                <h2>Layanan yang langsung menjawab kebutuhan K3</h2>
                <p>Pilih kelas publik, program khusus perusahaan, atau konsultasi penerapan K3.</p>
            </div>
            <div class="services-layout">
                <article class="service-feature">
                    <div>
                        <span class="service-number">01</span>
                        <h3>Public Training</h3>
                        <p>Jadwal reguler untuk peserta individu dan perusahaan dengan kebutuhan peserta terbatas.</p>
                    </div>
                    <a href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Lihat jadwal</a>
                </article>
                <div class="service-stack">
                    <article>
                        <span class="service-number">02</span>
                        <h3>In-house Training</h3>
                        <p>Pelaksanaan khusus di perusahaan dengan jadwal dan kebutuhan yang disesuaikan.</p>
                        <a href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin membahas in-house training.')); ?>" target="_blank" rel="noopener noreferrer">Minta penawaran</a>
                    </article>
                    <article>
                        <span class="service-number">03</span>
                        <h3>Konsultasi K3</h3>
                        <p>Pendampingan penerapan SMK3 dan kebutuhan keselamatan kerja organisasi.</p>
                        <a href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin berkonsultasi tentang kebutuhan K3 perusahaan.')); ?>" target="_blank" rel="noopener noreferrer">Konsultasi</a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section schedule-section" id="training">
        <div class="container hse-container">
            <div class="section-heading schedule-heading">
                <div>
                    <p class="section-label">Pendaftaran dibuka</p>
                    <h2>Jadwal training terbaru</h2>
                </div>
                <a class="btn btn-outline-primary" href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Semua jadwal</a>
            </div>

            <?php if ($training_query->have_posts()) : ?>
                <div class="training-grid">
                    <?php while ($training_query->have_posts()) : $training_query->the_post(); ?>
                        <?php
                        $training_id = get_the_ID();
                        $certification = get_post_meta($training_id, '_hse_certification', true);
                        $location = get_post_meta($training_id, '_hse_location', true);
                        $status = get_post_meta($training_id, '_hse_status', true);
                        ?>
                        <article class="training-card">
                            <div class="training-card-top">
                                <span><?php echo esc_html($certification ? $certification : 'Pelatihan K3'); ?></span>
                                <span><?php echo esc_html($status ? $status : 'Pendaftaran Dibuka'); ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <dl>
                                <div><dt>Tanggal</dt><dd><?php echo esc_html(hse_format_training_date($training_id)); ?></dd></div>
                                <div><dt>Lokasi</dt><dd><?php echo esc_html($location ? $location : 'Dikonfirmasi setelah pendaftaran'); ?></dd></div>
                                <div><dt>Investasi</dt><dd><?php echo esc_html(hse_price_text($training_id)); ?></dd></div>
                            </dl>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php echo esc_html(get_post_meta($training_id, '_hse_status', true) === 'Segera Hadir' ? 'Detail dan daftar minat' : 'Detail dan daftar'); ?></a>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php
                $programs = array('Ahli K3 Umum', 'Ahli K3 Listrik', 'Teknisi K3 Umum', 'First Aid', 'HAZOPS', 'Higiene Industri');
                ?>
                <div class="program-directory">
                    <div class="program-intro">
                        <h3>Program BNSP pilihan</h3>
                        <p>Jadwal dan harga setiap batch dikonfirmasi saat pendaftaran.</p>
                    </div>
                    <div class="program-list">
                        <?php foreach ($programs as $program) : ?>
                            <a href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin informasi program ' . $program . ' BNSP.')); ?>" target="_blank" rel="noopener noreferrer">
                                <span><?php echo esc_html($program); ?></span><span aria-hidden="true">&#8594;</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <section class="section experience-section" id="experience">
        <div class="container hse-container experience-grid">
            <div class="experience-copy">
                <h2>Dokumentasi nyata, bukan sekadar klaim</h2>
                <p>Arsip kegiatan menunjukkan pengalaman perusahaan dalam menyelenggarakan lokakarya, pelatihan, dan pendampingan K3.</p>
                <a class="text-link" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin melihat profil dan pengalaman perusahaan.')); ?>" target="_blank" rel="noopener noreferrer">Minta company profile <span aria-hidden="true">&#8594;</span></a>
            </div>
            <div class="experience-gallery">
                <figure class="gallery-wide"><img src="<?php echo esc_url(get_theme_file_uri('/images/image1-1-1024x767.jpeg')); ?>" alt="Peserta dan tim setelah kegiatan pelatihan" width="1024" height="767" loading="lazy"></figure>
                <figure><img src="<?php echo esc_url(get_theme_file_uri('/images/1-3.jpg')); ?>" alt="Peserta lokakarya sistem manajemen keselamatan kerja" width="1024" height="683" loading="lazy"></figure>
                <figure><img src="<?php echo esc_url(get_theme_file_uri('/images/image5-1024x767.jpeg')); ?>" alt="Suasana sesi pelatihan dan diskusi" width="1024" height="767" loading="lazy"></figure>
            </div>
        </div>
    </section>

    <?php if ($article_query->have_posts()) : ?>
        <section class="section article-section" id="articles">
            <div class="container hse-container">
                <div class="section-heading schedule-heading">
                    <div>
                        <h2>Artikel dan panduan K3</h2>
                        <p>Informasi praktis untuk memahami sertifikasi, kompetensi, dan penerapan K3.</p>
                    </div>
                    <a class="text-link" href="<?php echo esc_url(hse_blog_url()); ?>">Semua artikel <span aria-hidden="true">&#8594;</span></a>
                </div>
                <div class="article-grid">
                    <?php while ($article_query->have_posts()) : $article_query->the_post(); ?>
                        <article class="article-card">
                            <a class="article-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                <?php $article_image = hse_existing_thumbnail_url(get_the_ID(), 'medium_large'); ?>
                                <img src="<?php echo esc_url($article_image ? $article_image : get_theme_file_uri('/images/image5-1024x767.jpeg')); ?>" alt="" width="1024" height="767" loading="lazy">
                            </a>
                            <p class="article-meta"><?php echo esc_html(get_the_date()); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="section final-cta">
        <div class="container hse-container final-cta-inner">
            <div>
                <h2>Butuh program untuk tim perusahaan?</h2>
                <p>Sampaikan jumlah peserta, lokasi, dan kebutuhan kompetensi. Kami siapkan rekomendasi program dan penawaran.</p>
            </div>
            <a class="btn btn-light btn-lg" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin meminta penawaran training untuk perusahaan.')); ?>" target="_blank" rel="noopener noreferrer">Minta penawaran</a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
