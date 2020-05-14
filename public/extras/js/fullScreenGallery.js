/**
 * Setup automatic gallery image changer.
 * @param {integer} interval time between image change
 */
function setAutomaticGalleryImageChanger(interval = 1000) {
    var index = 0;
    var maxIdx = $('.full-screen-container img').length;

    setImagesClasses(index, maxIdx);
    setInterval(function() {
        index = modulo(index + 1, maxIdx);
        setImagesClasses(index, maxIdx);
    }, interval);
};

function setImagesClasses(index, maxIdx) {
    var previousImage = $('.full-screen-container img').get(modulo(index - 1, maxIdx));
    $(previousImage).addClass('image-prev').removeClass('image-show');

    var currentImage = $('.full-screen-container img').get(index);
    $(currentImage).addClass('image-show').removeClass('image-next');

    var nextImage = $('.full-screen-container img').get(modulo(index + 1, maxIdx));
    $(nextImage).addClass('image-next').removeClass('image-prev');
}

$(document).ready(function() {
    setAutomaticGalleryImageChanger(10000);
});
