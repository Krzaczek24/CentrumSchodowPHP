/**
 * Scrolls current page to selected element
 * @param {string} targetElement target element selector
 * @param {number} offset if scroll should stop above element set some negative number, else if should go below set some positive number
 * @param {number} animationTime duration time of scrolling animation, default 500ms
 */
function scrollToElement(targetElement, offset = 0, animationTime = 500) {
    var targetElementPosition = $(targetElement).offset().top;

    if (parseInt(offset) !== 'NaN') {
        targetElementPosition += offset;
    }

    $([document.documentElement, document.body]).animate({
        scrollTop: targetElementPosition
    }, animationTime);
};