$(document).ready(function() {
    $(this).scroll(function() {
        var menuBar = $('.sticky-top-container');
        if ($(this).scrollTop() > 0) {
            $(menuBar).removeClass('top');
            $('#logo-white').removeClass('hidden');
            $('#logo-black').addClass('hidden');
        } else {
            $(menuBar).addClass('top');
            $('#logo-white').addClass('hidden');
            $('#logo-black').removeClass('hidden');
        }
    });

    $('.main-menu-clickable[data-href]').each(function(idx, elem) {
        if (elem.dataset.href.startsWith('#') ||  elem.dataset.href.startsWith('.')) {
            $(elem).click(function() {
                scrollToElement(elem.dataset.href, -64);
            });
        } else {
            $(elem).click(function() {
                window.location.href=elem.dataset.href;
            });
        }
    });
});