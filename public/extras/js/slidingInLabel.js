$(document).ready(function() {
    animateSlidingInLabel();

    $(window).scroll(function (event) {
        animateSlidingInLabel();
    });
});

var animateSlidingInLabel = function(interval = 125) {
    $('.slide-in-label-main-container').each(function() {
        if (isInCurrentViewPort($(this)) && $(this).data('shown') === false)
        {
            $(this).data('shown', true);

            var lines = $(this).children();
            $.each(lines, function(idx, elem) {
                setTimeout(() => {
                    $(elem).animate({
                        transform: 'translateX(0)',
                        marginLeft: '25%'
                    }) 
                }, interval * idx)
            });
        }
    });
};
