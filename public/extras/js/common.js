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