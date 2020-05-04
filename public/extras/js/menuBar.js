$(document).ready(function() {
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