CSG.FullScreenGallery = {
    GalleryImageChanger: new GalleryImageChangerClass()
};

function GalleryImageChangerClass() { 
    var self = this;

    this.init = function(settings) {
        this.currentImageIndex = -1;
        this.imagesAmount = $(settings.imagesSelector).length;
        this.interval = settings.interval;

        this.containerSelector = settings.containerSelector;
        this.imagesSelector = settings.imagesSelector;
        this.sideChangeButtonSelector = settings.sideChangeButtonSelector;
        
        this.prepareGallery();
    };
    this.prepareGallery = function() {
        if (this.imagesAmount > 1) {
            this.startAutoChanging();

            if (this.imagesAmount == 2) {
                this.setPreviousImage = this.setNextImage;
            }
        } else {
            $(this.sideChangeButtonSelector).remove();

            if (this.imagesAmount == 1) {
                var images = this.getImages();
                $(images.next).addClass('image-show');
            } else {
                $(this.containerSelector).append('<span class="no-image-message">Hej, nie dodano żadnego zdjęcia do galerii.<br/>Dodaje je proszę aby móc wykorzystać możliwości animowanej galerii.</span>');
            }
        }
    };
    this.getImages = function() {
        return {
            previous: $(this.imagesSelector).get(modulo(this.currentImageIndex - 1, this.imagesAmount)),
            current: $(this.imagesSelector).get(this.currentImageIndex),
            next: $(this.imagesSelector).get(modulo(this.currentImageIndex + 1, this.imagesAmount))
        }
    };
    this.setNextImage = function() {
        var thisOperation = 'setNextImage';
        if (thisOperation != self.lastOperation) {
            self.currentImageIndex = modulo(self.currentImageIndex + 1, self.imagesAmount);
        }

        var images = self.getImages();
        $(images.previous).addClass('image-prev').removeClass('image-show');
        $(images.current).addClass('image-show').removeClass('image-next');
        $(images.next).addClass('image-next').removeClass('image-prev');

        self.currentImageIndex = modulo(self.currentImageIndex + 1, self.imagesAmount);
        self.lastOperation = thisOperation;
    };
    this.setPreviousImage = function() {
        var thisOperation = 'setPreviousImage';
        if (thisOperation != self.lastOperation) {
            self.currentImageIndex = modulo(self.currentImageIndex - 1, self.imagesAmount);
        }

        var images = self.getImages();
        $(images.previous).addClass('image-show').removeClass('image-prev');
        $(images.current).addClass('image-next').removeClass('image-show');
        $(images.next).addClass('image-prev').removeClass('image-next');

        self.currentImageIndex = modulo(self.currentImageIndex - 1, self.imagesAmount);
        self.lastOperation = thisOperation;
    };    
    this.startAutoChanging = function() {
        this.setNextImage();
        setInterval(() => {
            this.setNextImage();
        }, this.interval);
    };
};

/**
 * Setup automatic gallery image changer.
 * @param {integer} interval time between image change
 */
function setAutomaticGalleryImageChanger(interval = 1000) {
    CSG.FullScreenGallery.GalleryImageChanger.init({
        containerSelector: '.full-screen-container',
        imagesSelector: '.full-screen-container > img',
        sideChangeButtonSelector: '.full-screen-container > .gallery-side-arrow',
        interval: interval
    });
};

function prepareArrowsHoverActions() {
    $('.gallery-arrow').each(function(idx, elem) {
        var direction = $(elem).attr('data-direction');
        switch (direction) {
            case 'left':
                $(elem).hover(function() {
                    //console.log($(this).attr('class') + ' hovered');
                }, function() {
                    //console.log($(this).attr('class') + ' unhovered');
                });

                $(elem).click(CSG.FullScreenGallery.GalleryImageChanger.setPreviousImage);
                break;
            case 'right':
                $(elem).hover(function() {
                    //console.log($(this).attr('class') + ' hovered');
                }, function() {
                    //console.log($(this).attr('class') + ' unhovered');
                });

                $(elem).click(CSG.FullScreenGallery.GalleryImageChanger.setNextImage);
                break;
            case 'down':
                $(elem).click(function() {
                    scrollBelowElement($(elem).parent());
                });
                break;
            default:
                throw new Error('Unrecognised arrow direction type: [' + direction + ']');
        }
    });

    $('.gallery-side-arrow').hover(function() {
        //console.log($(this).attr('class') + ' hovered');
    }, function() {
        //console.log($(this).attr('class') + ' unhovered');
    });
}

$(document).ready(function() {
    setAutomaticGalleryImageChanger(10000);
    prepareArrowsHoverActions();
});
