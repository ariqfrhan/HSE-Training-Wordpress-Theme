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
                <a href="<?php echo esc_url('tel:+62' . '85779051699'); ?>">+62 857-7905-1699</a><br>
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
<button class="whatsapp-float" id="hse-chat-open" type="button" aria-label="Buka Asisten HSE">
    <img src="<?php echo esc_url(get_theme_file_uri('/images/whatsapp.svg')); ?>" alt="" width="30" height="30" aria-hidden="true">
</button>
<dialog class="hse-chat-dialog" id="hse-chat-dialog" aria-labelledby="hse-chat-title">
    <header>
        <div><strong id="hse-chat-title">Asisten HSE</strong><span>Jawaban otomatis dari informasi website</span></div>
        <button id="hse-chat-close" type="button" aria-label="Tutup chat">&times;</button>
    </header>
    <div class="hse-chat-log" id="hse-chat-log" aria-live="polite"></div>
    <div class="hse-chat-suggestions" aria-label="Pertanyaan cepat">
        <button type="button" data-chat-question="Jadwal training terdekat">Jadwal terdekat</button>
        <button type="button" data-chat-question="Berapa harga training?">Harga training</button>
        <button type="button" data-chat-question="Bagaimana sertifikasi BNSP?">Sertifikasi BNSP</button>
        <button type="button" data-chat-question="Apakah bisa in-house training?">In-house</button>
    </div>
    <form class="hse-chat-form" id="hse-chat-form">
        <label class="screen-reader-text" for="hse-chat-input">Pertanyaan</label>
        <input id="hse-chat-input" type="text" maxlength="300" placeholder="Tulis pertanyaan..." autocomplete="off" required>
        <button type="submit">Kirim</button>
    </form>
    <footer>
        <span>Perlu bantuan lanjutan?</span>
        <a href="<?php echo esc_url(hse_direct_whatsapp_url('6285774001563', 'Halo HSE Training Indonesia, saya ingin bertanya mengenai program training.')); ?>" target="_blank" rel="noopener noreferrer">WhatsApp 1</a>
        <a href="<?php echo esc_url(hse_direct_whatsapp_url('6285779051699', 'Halo HSE Training Indonesia, saya ingin bertanya mengenai program training.')); ?>" target="_blank" rel="noopener noreferrer">WhatsApp 2</a>
    </footer>
</dialog>
<?php wp_footer(); ?>
</body>
</html>
