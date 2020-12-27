$(document).ready(function() {
    animateSlidingInLabel();

    $(window).scroll(function (event) {
        animateSlidingInLabel();
    });
});

var animateSlidingInLabel = function(interval = 250, duration = 1000) {
    $('.slide-in-label-main-container').each(function() {
        if (isInCurrentViewPort($(this)) && $(this).data('shown') === false)
        {
            $(this).data('shown', true);

            var parent = $(this).parent();
            var lines = $(this).children();
            $.each(lines, function(idx, elem) {
                setTimeout(() => {
                    $(elem).animate(getParameters(parent), duration) 
                }, interval * idx)
            });
        }
    });
};

var getParameters = function(node)
{
    if ($(node).attr('class').startsWith('side-by-side-gallery'))
    {
        return {
            transform: 'translateX(0)',
            marginLeft: '0px'
        };
    }
    else
    {
        return {
            transform: 'translateX(0)',
            marginLeft: '25%'
        }
    }
}