document.addEventListener('DOMContentLoaded', function () {
    var nav = document.getElementById('primary-navigation');
    if (nav) {
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.bootstrap && nav.classList.contains('show')) {
                    window.bootstrap.Collapse.getOrCreateInstance(nav).hide();
                }
            });
        });
    }

    document.querySelectorAll('a[href*="wa.me"]').forEach(function (link) {
        link.addEventListener('click', function () {
            if (typeof window.gtag === 'function') window.gtag('event', 'generate_lead', { method: 'whatsapp' });
        });
    });

    if (new URLSearchParams(window.location.search).get('registration') === 'success' && typeof window.gtag === 'function') {
        window.gtag('event', 'generate_lead', { method: 'training_form' });
        var registrationUrl = new URL(window.location.href);
        registrationUrl.searchParams.delete('registration');
        window.history.replaceState({}, '', registrationUrl.toString());
    }

    var dialog = document.getElementById('hse-chat-dialog');
    var openButton = document.getElementById('hse-chat-open');
    var closeButton = document.getElementById('hse-chat-close');
    var form = document.getElementById('hse-chat-form');
    var input = document.getElementById('hse-chat-input');
    var log = document.getElementById('hse-chat-log');
    if (!dialog || !openButton || !form || !input || !log) return;

    var trainings = window.hseChatData && Array.isArray(window.hseChatData.trainings) ? window.hseChatData.trainings : [];

    function escapeHtml(value) {
        return String(value || '').replace(/[&<>"]/g, function (character) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[character];
        });
    }

    function normalize(value) {
        return String(value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9]+/g, ' ').trim();
    }

    function addMessage(message, role, html) {
        var node = document.createElement('div');
        node.className = 'hse-chat-message ' + role;
        if (html) node.innerHTML = message;
        else node.textContent = message;
        log.appendChild(node);
        log.scrollTop = log.scrollHeight;
    }

    function findTraining(question) {
        var ignored = ['harga', 'biaya', 'jadwal', 'kapan', 'training', 'pelatihan', 'program', 'k3', 'bnsp', 'sertifikasi', 'berapa', 'untuk', 'yang'];
        var words = normalize(question).split(' ').filter(function (word) { return word && ignored.indexOf(word) === -1; });
        var best = null;
        var bestScore = 0;
        trainings.forEach(function (training) {
            var titleWords = normalize(training.title).split(' ').filter(function (word) { return ignored.indexOf(word) === -1; });
            var score = words.filter(function (word) { return titleWords.indexOf(word) !== -1; }).length;
            if (score > bestScore) {
                best = training;
                bestScore = score;
            }
        });
        return bestScore >= 2 || (bestScore === 1 && words.length === 1) ? best : null;
    }

    function trainingAnswer(training) {
        return '<strong>' + escapeHtml(training.title) + '</strong><br>' +
            'Jadwal: ' + escapeHtml(training.date) + '<br>' +
            'Promo Relaunch 2026: <strong>' + escapeHtml(training.price) + '</strong><br>' +
            'Lokasi: ' + escapeHtml(training.location) + '<br>' +
            '<a href="' + escapeHtml(training.url) + '">Lihat detail dan daftar</a>';
    }

    function answer(question) {
        var text = normalize(question);
        var training = findTraining(question);
        if (training) return trainingAnswer(training);

        if (/jadwal|kapan|batch/.test(text)) {
            if (!trainings.length) return 'Jadwal terbaru sedang disiapkan. Silakan lanjut ke WhatsApp untuk konfirmasi.';
            return '<strong>Jadwal yang tersedia:</strong><br>' + trainings.slice(0, 6).map(function (item) {
                return escapeHtml(item.title) + ': ' + escapeHtml(item.date) + ' (' + escapeHtml(item.price) + ')';
            }).join('<br>') + '<br><a href="/training/">Lihat semua jadwal</a>';
        }
        if (/harga|biaya|promo|investasi/.test(text)) return 'Harga berbeda untuk setiap program. Sebutkan nama training, misalnya “harga Ahli K3 Umum” atau pilih jadwal terdekat.';
        if (/bnsp|sertifikat|sertifikasi|lsp/.test(text)) return 'Program BNSP mencakup pelatihan dan asesmen kompetensi melalui LSP sesuai skema. LSP, metode asesmen, persyaratan, dan dokumen akhir dikonfirmasi sebelum pembayaran.';
        if (/in house|inhouse|perusahaan|corporate/.test(text)) return 'Bisa. Jadwal dan materi in-house disesuaikan dengan kebutuhan perusahaan. Siapkan nama program, jumlah peserta, lokasi, dan target waktu, lalu lanjutkan ke salah satu WhatsApp.';
        if (/lokasi|online|offline|hybrid/.test(text)) return 'Program pada kalender 2026 tersedia secara hybrid: online atau offline di area Summarecon Bekasi. Lokasi final dikonfirmasi sebelum pembayaran.';
        if (/daftar|pendaftaran|registrasi/.test(text)) return 'Buka halaman program yang dipilih lalu isi formulir pendaftaran. Tim akan menghubungi Anda untuk konfirmasi batch sebelum pembayaran.';
        if (/halo|hai|pagi|siang|sore|malam/.test(text)) return 'Halo. Saya bisa membantu mengecek jadwal, harga, lokasi, sertifikasi BNSP, atau kebutuhan in-house training.';
        return 'Saya belum menemukan jawaban yang tepat dari informasi website. Silakan lanjut ke WhatsApp 1 atau WhatsApp 2 di bawah agar pertanyaan Anda dapat ditindaklanjuti.';
    }

    function ask(question) {
        if (!question.trim()) return;
        addMessage(question.trim(), 'user', false);
        addMessage(answer(question), 'assistant', true);
    }

    function openChat(topic) {
        if (!dialog.open) {
            if (typeof dialog.showModal === 'function') dialog.showModal();
            else dialog.setAttribute('open', '');
        }
        if (!log.children.length) addMessage('Halo. Tanyakan jadwal, harga, lokasi, sertifikasi, atau kebutuhan training perusahaan.', 'assistant', false);
        if (topic) ask(topic);
        input.focus();
    }

    openButton.addEventListener('click', function () { openChat(''); });
    closeButton.addEventListener('click', function () { dialog.close(); });
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        ask(input.value);
        input.value = '';
    });
    document.querySelectorAll('[data-chat-question]').forEach(function (button) {
        button.addEventListener('click', function () { ask(button.getAttribute('data-chat-question')); });
    });

    var params = new URLSearchParams(window.location.search);
    if (params.get('hse_chat') === '1') {
        openChat(params.get('topic') || '');
        var cleanUrl = new URL(window.location.href);
        cleanUrl.searchParams.delete('hse_chat');
        cleanUrl.searchParams.delete('topic');
        window.history.replaceState({}, '', cleanUrl.toString());
    }
});
