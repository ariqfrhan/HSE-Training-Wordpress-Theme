document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('img[data-fallback]').forEach(function (image) {
        function useFallback() {
            if (image.dataset.fallback && image.src !== image.dataset.fallback) {
                image.src = image.dataset.fallback;
            }
        }
        image.addEventListener('error', useFallback, { once: true });
        if (image.complete && image.naturalWidth === 0) useFallback();
    });

    var nav = document.getElementById('primary-navigation');
    if (!nav) return;

    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.bootstrap && nav.classList.contains('show')) {
                window.bootstrap.Collapse.getOrCreateInstance(nav).hide();
            }
        });
    });
});
