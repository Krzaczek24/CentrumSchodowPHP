CSG.FullScreenGallery = {
    GalleryImageChanger: new GalleryImageChangerClass()
};

function GalleryImageChangerClass() { 
    var self = this;

    this.init = function(settings) {
        this.currentImageIndex = -1;
        this.timerTicks = 0;
        this.timerRunning = false;
        this.timerCheckInterval = 100;
        this.timerMaxTicks = settings.interval / this.timerCheckInterval;
        this.imagesAmount = $(settings.imagesSelector).length;
        this.interval = settings.interval;

        this.leftArrowImagePath = settings.leftArrowImagePath;
        this.rightArrowImagePath = settings.rightArrowImagePath;
        this.containerSelector = settings.containerSelector;
        this.imagesSelector = settings.imagesSelector;
        
        this.prepareGallery();
    };
    this.prepareGallery = function() {
        if (this.imagesAmount > 1) {
            if (this.imagesAmount == 2) { this.setPreviousImage = this.setNextImage; }
            this.addChangeImageButtons();
            this.setMouseTimerEvents();
            this.startAutoChanging();
        } else {
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
            previous: $(this.containerSelector + ' > img').get(modulo(this.currentImageIndex - 1, this.imagesAmount)),
            current: $(this.containerSelector + ' > img').get(this.currentImageIndex),
            next: $(this.containerSelector + ' > img').get(modulo(this.currentImageIndex + 1, this.imagesAmount))
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
            if (this.timerRunning && this.timerTicks++ >= this.timerMaxTicks) {
                this.timerTicks = 0;
                this.setNextImage();
            }
        }, this.timerCheckInterval);
    };
    this.setMouseTimerEvents = function() {
        $(this.containerSelector).hover(function() {
            self.timerRunning = false;
            self.timerTicks = 0;
        }, function() {
            self.timerRunning = true;
        });
    };
    this.addChangeImageButtons = function() {
        var template = '<div class="gallery-arrow gallery-side-arrow gallery-arrow-DIR" data-direction="DIR"><div class="non-hovered"><img src="IMG_SRC"></div><div class="hovered"></div></div>' ;
        var leftButton = template.replace(/DIR/g, 'left').replace(/IMG_SRC/, this.leftArrowImagePath);
        var rightButton = template.replace(/DIR/g, 'right').replace(/IMG_SRC/, this.rightArrowImagePath);

        $(this.containerSelector).append(leftButton + rightButton);
        $(this.containerSelector).find('.gallery-arrow-left').click(this.setPreviousImage);
        $(this.containerSelector).find('.gallery-arrow-right').click(this.setNextImage);
    };
};

/**
 * Setup automatic gallery image changer.
 * @param {integer} interval time between image change
 */
function setAutomaticGalleryImageChanger(containerSelector, interval = 1000) {
    CSG.FullScreenGallery.GalleryImageChanger.init({
        containerSelector: containerSelector,
        imagesSelector: containerSelector + ' > img',
        leftArrowImagePath: '/public/extras/images/icons/left-arrow.svg',
        rightArrowImagePath: '/public/extras/images/icons/right-arrow.svg',
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

function addBottomArrow(containerSelector) {
    $(containerSelector).append('<div class="gallery-arrow gallery-bottom-arrow" data-direction="down"><img src="/public/extras/images/icons/down-arrow.svg"></div>');    
}

function setDownScrollArrowButtonAction() {
    $('.gallery-arrow[data-direction="down"]').click(function() {
        scrollBelowElement($(this).parent());
    });
}

function runGallery(settings) {
    var containerSelector = '.auto-gallery-main-container';
    setAutomaticGalleryImageChanger(containerSelector, settings.interval);
    if (settings.bottomArrow === true) {
        addBottomArrow(containerSelector);
        setDownScrollArrowButtonAction();
    }
}
