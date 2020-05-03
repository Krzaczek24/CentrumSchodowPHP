$(document).ready(function() {
    $('.main-menu-bar-table-item[data-href]').each(function(idx, elem) {
        $(elem).click(function() {
            scrollToElement(elem.dataset.href, -64);
        });
    });
});