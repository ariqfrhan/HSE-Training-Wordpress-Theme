<?php get_header(); ?>
<main id="main-content" class="content-page">
    <div class="container hse-container empty-state not-found">
        <p class="section-label">404</p>
        <h1>Halaman tidak ditemukan</h1>
        <p>Alamat mungkin berubah atau halaman sudah tidak tersedia.</p>
        <a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>">Kembali ke beranda</a>
    </div>
</main>
<?php get_footer(); ?>
