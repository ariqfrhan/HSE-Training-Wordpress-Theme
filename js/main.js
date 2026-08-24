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
        var cleanUrl = new URL(window.location.href);
        cleanUrl.searchParams.delete('registration');
        window.history.replaceState({}, '', cleanUrl.toString());
    }
});
