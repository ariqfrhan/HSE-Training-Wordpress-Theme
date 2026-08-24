<footer class="site-footer" id="contact">
    <div class="container hse-container">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/LOGO-HSE-1.png')); ?>" alt="HSE Training Indonesia" width="190" height="66" loading="lazy">
                <p>Program pelatihan dan sertifikasi kompetensi untuk individu, perusahaan, lembaga pendidikan, dan pemerintahan.</p>
            </div>
            <div>
                <h2>Hubungi kami</h2>
                <address>
                    Ruko Caman Baru, Jl. Raya Kalimalang No. 17<br>
                    Jakasampurna, Kota Bekasi, Jawa Barat
                </address>
                <a href="<?php echo esc_url('tel:+62' . '85774001563'); ?>">+62 857-7400-1563</a><br>
                <a href="mailto:info@hse-training.co.id">info@hse-training.co.id</a>
            </div>
            <div>
                <h2>Tautan</h2>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-links'));
                } else {
                    ?>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('hse_training')); ?>">Jadwal training</a></li>
                        <li><a href="<?php echo esc_url(hse_blog_url()); ?>">Artikel K3</a></li>
                        <li><a href="<?php echo esc_url(home_url('/#about')); ?>">Tentang kami</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(wp_date('Y')); ?> PT Triyasa Mitra Solusi. Hak cipta dilindungi.</p>
            <p>HSE Training Indonesia</p>
        </div>
    </div>
</footer>
<a class="whatsapp-float" href="<?php echo esc_url(hse_whatsapp_url('Halo HSE Training Indonesia, saya ingin bertanya mengenai program training.')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Hubungi HSE Training Indonesia melalui WhatsApp">
    <span aria-hidden="true">WA</span>
</a>
<?php wp_footer(); ?>
</body>
</html>
