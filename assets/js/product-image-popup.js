
// modified code from Mario-Duarte image-zoom.js
(function ($) {
    function ReplaceWithPolyfill() {
        'use-strict';
        var parent = this.parentNode,
            i = arguments.length,
            currentNode;
        if (!parent) return;
        if (!i)
            parent.removeChild(this);

        while (i--) {

            currentNode = arguments[i];

            if (typeof currentNode !== 'object') {
                currentNode = this.ownerDocument.createTextNode(currentNode);
            } else if (currentNode.parentNode) {
                currentNode.parentNode.removeChild(currentNode);
            }


            if (!i)
                parent.replaceChild(currentNode, this); else
                parent.insertBefore(currentNode, this.previousSibling);
        }
    }

    if (!Element.prototype.replaceWith) {
        Element.prototype.replaceWith = ReplaceWithPolyfill;
    }

    if (!CharacterData.prototype.replaceWith) {
        CharacterData.prototype.replaceWith = ReplaceWithPolyfill;
    }

    if (!DocumentType.prototype.replaceWith) {
        DocumentType.prototype.replaceWith = ReplaceWithPolyfill;
    }

    const imageObj = {};

    $.fn.imageZoom = function (options) {
        let settings = $.extend({
            zoom: 150
        }, options);
        imageObj.template = `
              <figure class="containerZoom" style="background-image:url('${$(this).attr("src")}'); background-size: ${settings.zoom}%;">
                  <img draggable="false" id="imageZoom" src="${$(this).attr("src")}" alt="${$(this).attr("alt")}" />
                  <div class="containerCover"></div>
              </figure>
          `;

        function zoomIn(e) {
            let zoomer = e.currentTarget;
            let x, y, offsetX, offsetY;
            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX;
            e.offsetY ? offsetY = e.offsetY : offsetY = e.touches[0].pageX;
            x = offsetX / zoomer.offsetWidth * 100;
            y = offsetY / zoomer.offsetHeight * 100;
            $(zoomer).css({
                "background-position": `${x}% ${y}%`
            });
        }

        function attachEvents(container) {
            container = $(container);
            container.on('click', function (e) {
                if ("zoom" in imageObj == false) {
                    imageObj.zoom = false;
                }

                if (imageObj.zoom) {
                    imageObj.zoom = false;
                    $(this).removeClass('active');
                } else {
                    imageObj.zoom = true;
                    $(this).addClass('active');
                    zoomIn(e);
                }
            });
            container.on('mousemove', function (e) {
                imageObj.zoom ? zoomIn(e) : null;
            });
            container.on('mouseleave', function () {
                imageObj.zoom = false;
                $(this).removeClass('active');
            });
        }

        let newElm;
        console.log(this[0].nodeName);

        if (this[0].nodeName === "IMG") {
            newElm = $(this).replaceWith(String(imageObj.template));
            attachEvents($('.containerZoom')[$('.containerZoom').length - 1]);
        } else {
            newElm = $(this);
        }
        return newElm;
    };
})(jQuery);

var productImageDialog = $('#productImageDialog');

var productImageDialogThumbnails = productImageDialog.find('.product-image-popup__thumbnails');
var productImageDialogPreview = productImageDialog.find('.product-image-popup__preview')

const productImageDialogThumbnailsSwiperOptions = {
    slidesPerView: 'auto',
    slidesPerGroup: 3,
    spaceBetween: 5,
    direction: 'vertical',
    observer: true,
    navigation: {
        nextEl: ".swiper-product-dialog-thumbnails .swiper-button-next",
        prevEl: ".swiper-product-dialog-thumbnails .swiper-button-prev",
    },
}

function initProductDialogThumbnailsSwiper() {
    new Swiper(".swiper-product-dialog-thumbnails", productImageDialogThumbnailsSwiperOptions);
}

function productImageDialogPreviewTemplate(activeImage) {
    var type = activeImage.attr('data-type');
    var previewParent = $('.product-image-popup__preview');
    var videoEl = $('.product-image-popup--video');
    var youtubeIframeEl = $('.product-image-popup--youtube');
    var content = $('.product-image-popup__content');

    console.log(activeImage);

    videoEl[0].pause();
    youtubeIframeEl.attr('src', '')

    previewParent.children().hide();
    content.show();
    
    if (type === "image") {
        var image = activeImage.find('img').attr('data-high-reso-src');

        console.log(image)

        previewParent.find('.containerZoom').show().css({'background-image':'url(' + image + ')'});
        previewParent.find('#imageZoom').attr('src',image);
        

    } else if (type === 'video') {
        videoEl.show()
        var source = document.createElement('source');
        var previewVideoUrl = $(activeImage).find('.detail-thumb--video').data('video-src');
        console.log(activeImage, previewVideoUrl);
        source.setAttribute('src', previewVideoUrl);
        source.setAttribute('type', 'video/mp4');
        videoEl.append(source);

        console.log(videoEl,previewVideoUrl)

        videoEl[0].play();
        
    } else if (type === 'youtube') {
        youtubeIframeEl.show()
        var url = $(activeImage).find('.detail-thumb--youtube').data('youtube-src');
        var id = url.split("?v=")[1];
        var embedlink = "https://www.youtube.com/embed/" + id + '?enablejsapi=1&controls=1';
        youtubeIframeEl.attr('src', embedlink);
        content.hide();
    }

}

function productImageDialogThumbnailsTemplate() {
    var items = $('.detail-thumb li')

    var thumbnailsTemplate = "";
    items.each(function () {
        var active = $(this).hasClass('prd-active') ? 'active' : '';
        var type = $(this).attr('data-type');

        var media = $(this);

        if (media.length) {
            var item = '<li class="swiper-slide ' + active + '" data-type="' + type + '">' + media.clone().html() + '</li>'
            thumbnailsTemplate += item;

        }
    })
    productImageDialogThumbnails.find('.list').html('<ul class="swiper-wrapper">' + thumbnailsTemplate + '</ul>');
    // initProductDialogThumbnailsSwiper();

}


function generateProductImageContent() {
    var contentEl = $('.product-image-popup__thumbnails .content');
    var title = $('.product-title__title').text();
    var colorName = $('#clrname').text()

    contentEl.find('h2').html(title)
    contentEl.find('p>span').html(colorName)


    var previewImage = $('.product-image-popup__preview').find('.product-image-popup--image'); 
    if(previewImage.length) {
        previewImage.imageZoom({ zoom: 200 })
    };


    productImageDialogThumbnailsTemplate();

    productImageDialogPreviewTemplate($('.detail-thumb .prd-active'));

}


// generateProductImageContent()

// productImageDialog.show();
$(document).on('click', '#productImageDialog .product-image-popup__thumbnails li', 'click', function () {
    productImageDialogThumbnails.find('li').removeClass('active');
    $(this).addClass('active');
  
    productImageDialogPreviewTemplate($(this))
})

$('#mainimg ').on('click', function () {

    if ($(window).width() > 768) {
        $('body,html').css('overflow-y', 'hidden');
        generateProductImageContent()
        productImageDialog.show();
    }
})

productImageDialog.find('.product-image-popup__exit').on('click', function () {
    productImageDialog.hide()
    $('html').css('overflow: auto');
})

productImageDialog.on('click', function (e) {
    if (e.target !== e.currentTarget) return;
    productImageDialog.hide();
    $('html').css('overflow: auto');
}) 