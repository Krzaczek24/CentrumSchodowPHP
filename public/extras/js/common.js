var CSG = {
    DefaultAnimationTime: 1000
};

/**
 * Scrolls current page to selected element
 * @param {string} targetElement target element selector
 * @param {number} offset if scroll should stop above element set some negative number, else if should go below set some positive number
 * @param {number} animationTime duration time of scrolling animation, default 500ms
 */
function scrollToElement(targetElement, offset = 0, animationTime = CSG.DefaultAnimationTime) {
    var targetElementPosition = $(targetElement).offset().top;

    if (parseInt(offset) !== 'NaN') {
        targetElementPosition += offset;
    }

    $([document.documentElement, document.body]).stop();
    $([document.documentElement, document.body]).animate({
        scrollTop: targetElementPosition
    }, animationTime);
};

/**
 * Scrolls current page below selected element
 * @param {string} targetElement target element selector
 * @param {number} offset if scroll should stop above element set some negative number, else if should go below set some positive number
 * @param {number} animationTime duration time of scrolling animation, default 500ms
 */
function scrollBelowElement(targetElement, offset = 0, animationTime = CSG.DefaultAnimationTime) {
    var targetElementEndPosition = $(targetElement).offset().top + $(targetElement).height();

    if (parseInt(offset) !== 'NaN') {
        targetElementEndPosition += offset;
    }

    $([document.documentElement, document.body]).animate({
        scrollTop: targetElementEndPosition
    }, animationTime);
};

/**
 * Return modulus
 * @param {integer} divident to negative value of divident will be add divisor value until divident will be non-negative
 * @param {integer} divisor negative value will be changed to positive
 */
function modulo(divident, divisor) {
    if (divisor == 0) {
        throw new Error('Divisor cannot be zero!');
    }

    divisor = Math.abs(divisor);

    while (divident < 0) {
        divident += divisor;
    }

    return divident % divisor;
}

/**
 * Check if element is visible in current window
 */
function isInCurrentViewPort($element) {
    var viewPortStart = $(window).scrollTop();
    var viewPortEnd = viewPortStart + $(window).height();

    var elementStart = $element.offset().top;
    var elementEnd = elementStart + $element.height();

    return elementEnd < viewPortEnd && elementStart > viewPortStart;
}