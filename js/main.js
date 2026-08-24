document.addEventListener('DOMContentLoaded', function () {
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
