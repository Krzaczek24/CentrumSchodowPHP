var anchors = [];

/**
 * Prepares menu buttons
 * adds redirect functionality or attach scroll function to buttons which redirects to anchor,
 * if anchor element does not exitst then buttons are removed.
 */
var prepareMenuButtons = function() {
    $('.main-menu-clickable[data-href]').each(function(idx, elem) {
        if (elem.dataset.href.startsWith('#')) {
            if ($(elem.dataset.href).length == 0) {
                $(elem).parent().remove();
                return;
            }

            $(elem).data('anchorIdx', idx);

            anchors.push({
                'index': idx,
                'position': $(elem.dataset.href).offset().top
            });

            $(elem).click(function() {
                var baseOffset = -$('.sticky-top-container').height();
                var additionalOffset = -10;
                var offset = baseOffset + additionalOffset;
                scrollToElement(elem.dataset.href, offset);
            });
        } else {
            $(elem).click(function() {
                window.location.href=elem.dataset.href;
            });
        }
    });

    anchors.sort(function(a, b) {
        return a.position - b.position;
    });
};

/**
 * Changes main menu bar style depending on scroll position
 * if user is on the top or scrolled back to top of page then use top style,
 * else use secondary style.
 */
var switchMenuBarStyle = function() {
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
};

/**
 * @param {number} scrollPosition actual scroll position
 * @param {number} shift as value is higher the higlight is faster, default value is 64px
 */
var highlightProperButton = function(scrollPosition, shift = 64) {
    var scrollPositionShift = $('.sticky-top-container').height();
    scrollPosition += scrollPositionShift + shift;

    if (anchors.length <= 0) {
        $('.main-menu-clickable[data-href^="#"]').removeClass('scrolled-on');
        return;
    }

    for (index = 0; index < anchors.length; index++) {
        if (scrollPosition >= anchors[index].position) {
            //we past one of anchors but have to check if there is another one furher
            if (index + 1 < anchors.length && scrollPosition >= anchors[index + 1].position) {
                continue;
            } else {
                //there is no next anchor or we know between which anchors we are so we can highlight button
                $('.main-menu-clickable[data-href^="#"]').filter(function(idx, elem) {
                    $(elem).removeClass('scrolled-on');
                    return $(elem).data('anchorIdx') == anchors[index].index;
                }).addClass('scrolled-on');
                return;
            }
        } else {
            //we are before any anchors
            $('.main-menu-clickable[data-href^="#"]').removeClass('scrolled-on');
            return;
        }
    }
};

var handleScrollActions = function() {
    $(this).scroll(function(event) {
        var destScrollPosition = event.currentTarget.scrollY;
        switchMenuBarStyle();
        highlightProperButton(destScrollPosition);
    });
};

$(document).ready(function() {
    switchMenuBarStyle();
    prepareMenuButtons();
    handleScrollActions();
});