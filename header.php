<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b4d85">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/images/LOGO-HSE-1.png')); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e('Lewati ke konten utama', 'hse-training'); ?></a>
<header class="site-header">
    <nav class="navbar navbar-expand-lg" aria-label="Navigasi utama">
        <div class="container hse-container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="HSE Training Indonesia - Beranda">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/LOGO-HSE-1.png')); ?>" alt="HSE Training Indonesia" width="168" height="58">
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="primary-navigation">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ms-auto align-items-lg-center',
                        'fallback_cb'    => false,
                    ));
                } else {
                    ?>
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/#about')); ?>">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/#services')); ?>">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(hse_blog_url()); ?>">Artikel</a></li>
                        <li class="nav-item nav-cta"><a class="btn btn-primary" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin berkonsultasi mengenai program training.')); ?>" target="_blank" rel="noopener noreferrer">Konsultasi</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </nav>
</header>
