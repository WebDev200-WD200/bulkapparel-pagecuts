$(document).ready(function () {

    var ratingNew = $(".rating-new");
    var starOverall = $(".star-overall");

    function validateStarYoData(data) {
        return data === "nan" || data === undefined || data === null ? 0 : data;
    }

    if (ratingNew.length) {
        ratingNew.rateYo({
            rating: validateStarYoData($(".rating-new").data("rating")),
            fullStar: false,
            ratedFill: "#002868",
            normalFill: "lightgray",
            starWidth: $(window).width() <= 600 ? "25px" : "30px",
            readOnly: true,
        });
    }

    if (starOverall.length) {
        starOverall.rateYo({
            rating: validateStarYoData($(".star-overall").data("rating")),
            fullStar: true,
            ratedFill: "#002868",
            normalFill: "lightgray",
            starWidth: $(window).width() <= 600 ? "30px" : "35px",
            readOnly: true,
        });
    }
    // End - Sl6 Manual Missing, Error, Bug List - CL - 10/6/2021
    // End - On item not available page add similar items - CL - 9/9/2021
    //<!-- End - Live pagespeed report. please do adjustments - CL  -->
    $("#md-color-slider li").addClass("swiper-slide");

    var swiperColors = new Swiper(".swiper-container.featured-colors", {
        // Optional parameters
        direction: "horizontal",
        slidesPerGroup: 4,
        slidesPerView: "auto",
        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Start - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1132022  - Moved addMinHeightOnImage scripts to pdetails_scripts_top.php

    $(window).scroll(hideGiveFeedbackButton);

    function hideGiveFeedbackButton() {
        if ($("#btn-feedback").length) {
            var colorContainer = $(".featured-container");
            var btnFeedback = $("#btn-feedback");
            var titlePost = $("#title-1").offset().top;
            var feedbackPos = btnFeedback.offset().top;
            var feedbackHeight = btnFeedback.outerHeight();

            if (titlePost <= feedbackPos + feedbackHeight) {
                btnFeedback.css({
                    visibility: "visible",
                });
            } else {
                btnFeedback.css({
                    visibility: "hidden",
                });
            }
        }
    }
    // Modal | Transfer from dev WL

    // Clone size_chart button to product quantity header
    var sizeChartBtn = $(".size_chart");
    $(".product-quantity__header").append(sizeChartBtn.clone());

    $(document).on("click", 'a[href^="#"]', function (e) {
        var id = $(this).attr("href");
        var $id = $(id);
        if(!$id) return;
        if ($id.length === 0) {
            return;
        }
        e.preventDefault();
        //Start - new product details page mobile view - CL - 12/22/2020
        var pos = $id.offset().top - 150;
        $("body, html").animate(
            {
                scrollTop: pos,
            }, 0
        );
        //End - new product details page mobile view - CL - 12/22/2020
    });
});


// Start -  Scroll is not working when you click more colors and then click outside of popup more colors - CL - 1272020
var mobileColorModal = $("#md-modal-color");

function showColorModal(show) {
    console.log('Hello COlor Modal', show);
    if (show) { $("#md-modal-color").show() } else { $("#md-modal-color").hide() };
    $("html").css("overflow-y", show ? "hidden" : "visible");
}

$("#md-modal-color-close").click(function (e) {
    showColorModal(false);
});

$("#md-view-colors").click(function (e) {
    showColorModal(true);
});

$("#md-modal-color").click(function (e) {
    if (e.target != this) return;
    showColorModal(false);
})
// End -  Scroll is not working when you click more colors and then click outside of popup more colors - CL - 1272020

// Start - relayout FE product page in mobile view - Cl - 12/23/2020

function showChat() {
    var chatEl = $('#chat-widget-container');
    chatEl.css({
        'pointer-events': 'auto',
        'opactiy': '1',
        'visibility': 'visible'
    })
}

function hideChat() {
    var chatEl = $('#chat-widget-container');
    chatEl.css({
        'pointer-events': 'none',
        'opactiy': '0',
        'visibility': 'hidden'
    })
}

$(window).scroll(function () {
    if ($('#chat-widget-container').length && $('.featured-container').length) {

        var colorEl = $('.featured-container');
        var colorYPos = colorEl.offset().top;
        var colorHeight = colorEl.height();
        var colorTot = colorYPos + colorHeight;

        var chatEl = $('#chat-widget-container');
        var chatYPos = chatEl.offset().top;
        if (chatYPos >= (colorYPos - colorHeight) && chatYPos <= colorTot) {
            hideChat();
        } else if (chatYPos > colorTot) {
            showChat();
        } else {
            showChat();
        }
    }
})

// Start - show review popup pane - John - 06/04/2020 9:25 AM
$(document).on('mouseenter', '.toggleReviewPane', function (e) {
    e.preventDefault();

    if ($('.reviewPane').is(':visible')) {
        $('.reviewPane').hide();
    } else {
        $('.reviewPane').show();
    }
});


$(document).on('mouseleave', '.toggleReviewPane', function (e) {
    e.preventDefault();
    $('.reviewPane').hide();
});
// End - show review popup pane - John - 06/04/2020 9:25 AM

//Start - Add a lock under our checkout buttons and our add to cart - Roi - 09/03/2020
$('.secured__btn').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation(); //Start - Secure Checkout allows hiding if click outside - Roi - 09/17/2020
    $('#securedPane').toggleClass('scr-show');
});

//Start - Secure Checkout allows hiding if click outside - Roi - 09/17/2020
$(document).click(function (e) {
    if (!$(e.target).closest('#securedPane').hasClass('scr-show')) {
        $('#securedPane').removeClass('scr-show');
    }
});

$('#scr-exit').on('click', function (e) {
    e.preventDefault();
    $('#securedPane').removeClass('scr-show');
});


$(document).ready(function () {
    var reviewsLoaded = 0; // Start - Website optimization - AP - 11/26/2020
    // Start - Fix mass add to cart form not showing - John - 07/17/2020 6:45 AM

    var page = 1;

    // Start - Website optimization - AP - 11/26/2020
    // Start - Website optimization - CL - 11/26/2020
    var lazyLoaded = false;
    $(document).on('scroll.lzreview', function () {
        var reviewEl = $('#reviewsContainer'); // Start - New review look similar to jiffy and top stores  - CL - 6/03/2021

        if (reviewEl.length) {
            var position = $(window).scrollTop();
            var reviewPos = reviewEl.position().top - 500;
            if (position >= reviewPos && lazyLoaded === false) {
                lazyLoaded = true;
                fetchReviews();
                $(document).off('.lzreview');
            }
        }
    });

    function fullDetailsOfReview() {
        $.ajax({
            type: 'GET',
            url: base_url_site + 'includes/pdetails-reviews.php',
            data: 'styleID=' + product_style_id,
            success: function (html) {
                $('#loadReviewHere').html(html);
                fetchReviews();
            }
        });

    }
    // <!-- Start - Live pagespeed report. please do adjustments - CL  -->
    function setReviewsStarRating(rating, size) {
        var blankStar = `<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="${size}px" height="${size}px" fill="lightgray"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>`;
        var fullStar = `<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="${size}px" height="${size}px" fill="#002868"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg>`

        var blankStarTemplate = '';
        var fullStarTemplate = '';
        var percentage = (rating / 5) * 100;

        for (let i = 1; i <= 5; i++) {
            blankStarTemplate += blankStar;
            fullStarTemplate += fullStar;
        }

        return `
        <div class="rating rating-new jq-ry-container" disabled="disabled" readonly="readonly" style="width: ${size * 5}px;">
            <div class="jq-ry-group-wrapper">
                <div class="jq-ry-normal-group jq-ry-group">
                    ${blankStarTemplate}
                </div>
                <div class="jq-ry-rated-group jq-ry-group" style="width: ${percentage}%;">
                    ${fullStarTemplate}
                </div>
            </div>
        </div>`
    }
    // <!-- End - Live pagespeed report. please do adjustments - CL  -->
    // Start - Website optimization - AP - 11/26/2020
    function fetchReviews() {
        $.ajax({
            type: 'GET',
            url: base_url_site + 'addon/ajax_reviews',
            data: {
                style_id: product_style_id,
                count: 10,
                start: page == 0 ? 0 : ((page - 1) * 10),
                sortBy: $('#reviewSort').val() // Start - New review look similar to jiffy and top stores - 06/09/2021
            },

            success: function (response) {
                // <!-- Start - Live pagespeed report. please do adjustments - CL  -->
                reviewsLoaded += response.length;
                let reviewsTemplate = '';
                response.forEach(function (review) {

                    //Start - Limit review display to 10 reviews and add an AJAX "More Reviews" button that loads an extra 10 reviews, Add button only if there are more reviews. - Roi - 07/03/2020
                    // Start - New review look similar to jiffy and top stores (Page Cuts) - CL - 4/29/2021   WL tranfer from DEV 5/6/2021
                    reviewsTemplate += `
                    <div class="card card--convo mb-5">
                        <div class="card--convo__title">
                            <h3>${review.creviewheading}</h3>
                        </div>

                        <div class="card--convo__start-date">
                        ${setReviewsStarRating(review.rating, 25)}
                        <div class="date ml-auto">${review.reviewdate}</div>
                        </div>

                        <div class="card--convo__comment">${review.creview}</div>

                        <div class="card--convo__user">
                            <p class="name">
                                <span class="username">${review.customername}</span>
                            </p>

                            <div class="card--convo__action">
                                <div class="caption">
                                    Was this review helpful ?
                                </div>

                                <div class="action">
                                    <button class="btn yes btnVoteReviewRecommend" data-id="${review.id}" data-value="1">Yes(${review.recommend})</button> <!-- Start - New review look similar to jiffy and top stores - 06/09/2021 --> <!-- Start - Start - New review look similar to jiffy and top stores - AP - 07/12/2021 -->
                                    <button class="btn no btnVoteReviewRecommend" data-id="${review.id}" data-value="0">No(0)</button> <!-- Start - Start - New review look similar to jiffy and top stores - AP - 07/12/2021 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    `

                    // End - New review look similar to jiffy and top stores (Page Cuts) - CL - 4/29/2021  | WL tranfer from DEV 5/6/2021
                });

                $('#reviewsContainer').append(reviewsTemplate)

                //Start - Limit review display to 10 reviews and add an AJAX "More Reviews" button that loads an extra 10 reviews, Add button only if there are more reviews. - Roi - 07/03/2020
                if (response.length < 10) {
                    $('#btnLoadMoreReviews').hide();
                }
                //End - Limit review display to 10 reviews and add an AJAX "More Reviews" button that loads an extra 10 reviews, Add button only if there are more reviews. - Roi - 07/03/2020
                // <!-- End - Live pagespeed report. please do adjustments - CL  -->
            },
        });
    }
    // End - Website optimization - AP - 11/26/2020

    // Start - New review look similar to jiffy and top stores - AP - 07/12/2021
    $(document).on('click', '.btnVoteReviewRecommend', function (e) {
        e.preventDefault();

        var self = this;

        $.ajax({
            type: 'POST',
            url: base_url_site + 'addon/do_recommend_rating',
            data: {
                ratingId: $(self).data('id'),
                affirmative: $(self).data('value'),
                styleId: $('#styleID').val() // Start - admin manage review adjustment - AP - 11/25/2021 7:02 AM
            },
            success: function (response) {
                if (!response.result) {
                    if (response.msg == 'Login Required') {
                        $('.signup-modal').addClass('signup-modal--open');
                        $('.signup-modal').addClass('signup-modal--login');
                        $('.scrolling').addClass('signup-modal--active');
                        $('#frmLogin').addClass('form__login');

                        //Start - After logging in on QA page retain on the product details page - RM - 01/27/2022
                        $('#frmLoginpopTwo').removeClass('fromPdetails');
                        $('#frmLoginpopTwo').addClass('fromReview');
                        //End - After logging in on QA page retain on the product details page - RM - 01/27/2022

                    } else {
                        showCustomModal('error', 'Something went wrong', response.msg);
                    }
                } else {
                    showCustomModal('success', 'Your vote is counted!', response.msg);
                    var count = parseInt($(self).text().replace('Yes(', '').replace(')', ''));
                    $(self).text('Yes(' + (count + 1) + ')');
                }
            }
        });
    });
    // End - New review look similar to jiffy and top stores - AP - 07/12/2021

    var bulkLoading = false;

    $('#btnGotoReview, #btnGotoReviewMobile, .btnSubReview').click(async function (e) { // Start - When you click on the star rating to go to the reviews - CL - 07062021
        // e.preventDefault();
        var bulkid = $('#bulkid')
        var reviewEl = $('.review-box');

        if (bulkid.find('.pdetails-loading') && bulkLoading === false) {
            bulkLoading = true;
            await fetchBulkOrder(scrollToReview);
        }
        if (reviewEl.length === 0 && lazyLoaded === false) {
            // await fullDetailsOfReview(); // Start - admin manage review adjustment - AP - 12/21/2021
        }

        if (bulkLoading) {
            scrollToReview();
        }


    })

    $(window).hover(function () {
        var bulkid = $('#bulkid')
        var viewportWidth = $(window).width();
        // get the children length
        var hasChildren = bulkid.children().length > 0
        // get the current position of the window
        var position = $(window).scrollTop();
        // get the bulk elemet position and subtract it with 1000px to advance fetch data after scrolling to its position;
        var bulkPosition = bulkid.position().top - 1000;
        // fetch the bulk data when reach the bulk element position and bulkLoading is false
        if (viewportWidth <= 1000) {
            bulkid.hide();
        }
        // if ( position >= bulkPosition && bulkLoading === false && viewportWidth > 1000) {
        if (bulkid.find('.pdetails-loading') && bulkLoading === false) {
            // ansd then setting bulkLoading to true so that it will not fetch again
            bulkLoading = true;
            fetchBulkOrder();
        }
    })

    function fetchBulkOrder(fn) {
        var styleIdVal = product_style_id;
        //var selectedclrname = $("#clrname").html();
        $.ajax({
            url: base_url_site + 'addon/pbulkdetails.php',
            method: "post",
            data: 'styleID=' + product_style_id,

            dataType: "json",
            success: function (msg) {
                $('#bulkid').html(msg.bulkdata);

                //Start - RUSH for cart update - Roi - 07/15/2020 8:29am
                $(".numbersOnly").keyup(function (e) {

                    if ($(this).val() == 0) {
                        $(this).val('');
                    }

                });

                $(".numbersOnly").keydown(function (e) {
                    if ((this.value.length == 0 && e.which == 48) || (this.value.length == 0 && e.which == 96)) {
                        return false;
                    }


                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||

                        (e.keyCode >= 35 && e.keyCode <= 40)) {

                        return;
                    }

                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                //End - RUSH for cart update - Roi - 07/15/2020 8:29am
                $('#bulkButtonContainer').show(); // Start - Hide and Unhide ( Bulk Order) - 1152021
                if (fn) fn();

            }
        });
    }

    function scrollToReview() {
        var reviewElement = $('.review-overall');
        if(!reviewElement) return;
        $('html, body').animate({
            scrollTop: reviewElement.offset().top - 400 //Start - bulk-order-display-image  - 07/21/2020 - 8:38am
        }, 0);

    }

    // Start - New review look similar to jiffy and top stores - CL - 06/09/2021
    $(document).on('change', '#reviewSort', function (e) {
        e.preventDefault();

        $('#reviewsContainer').empty();
        page = 1;
        reviewsLoaded = 0;
        fetchReviews();
    });
    // End - New review look similar to jiffy and top stores - CL - 06/09/2021

    $(document).on('click', '#btnLoadMoreReviews', function (e) {
        e.preventDefault();
        if (reviewsLoaded >= parseInt($('#_ratingCount11').text() || 0)) {
            $('#btnLoadMoreReviews').hide();
            return;
        }

        page++;

        fetchReviews(); // Start - Website optimization - AP - 11/26/2020
    });
    // End - paginate reviews - John - 06/15/2020 10:00 AM

    //Start - Add direct link to a color like we did on Schamp on item detail page - Roi - 5/27/2020 - 7:32AM
    $(document).on('click', '#btnCopyColorUrl', function (e) { // Start - New front end design for item detail page - John - 09/09/2020

        var colorId = $('.all-colors li a.active, .featured-colors li a.active').data('valcode');

        if (colorId === undefined)
            colorId = $('.all-colors li.current a.col, .featured-colors li.current a.col').data('valcode'); // Start - New front end design for item detail page - John - 09/09/2020 / Start -  How is the color number selected in the url link for the colors - Roi - 09/18/2020 -->

        // var pageURL = window.location.hostname + window.location.pathname;
        var pageURL = window.location.protocol + '//' + window.location.host + '/' + window.location.pathname; //window.location.href //WL - chanage to https 12/ 15/ 2021

        var url = pageURL + '?color=' + colorId;

        copyStringToClipboard(url);
        //Start - color link clipboard adjustment - Roi - 06/02/2020 9:29AM
        $(".msgclipboard").show().delay(3000).fadeOut();
        //End - color link clipboard adjustment - Roi - 06/02/2020 9:29AM
    });
    //End - Add direct link to a color like we did on Schamp on item detail page - Roi - 5/27/2020 - 7:32AM
    //Start - Hide and Unhide ( Bulk Order) - 05/27/2020 - 12:16PM
    $('.btnAddCartBulk').on('click', function () {
        $('html, body').animate({
            scrollTop: $("#bulkid").offset().top - 250 //Start - bulk-order-display-image  - 07/21/2020 - 8:38am
        }, 0);
    });
    //End - Hide and Unhide ( Bulk Order) - 05/27/2020 - 12:16PM

    $(document).on('click', '.size_chart', function () {
        $(".myText").slideToggle('599');



        // return false;
    });


    // Start - update CLS again. please review. I updated but get same results CLS 0.25 ** - CL - 11/24/2020
    var bulkLoading = false;

    $(window).scroll(function () {
        var bulkid = $('#bulkid')
        var viewportWidth = $(window).width();
        // get the children length
        var hasChildren = bulkid.children().length > 0
        // get the current position of the window
        var position = $(window).scrollTop();
        // get the bulk elemet position and subtract it with 1000px to advance fetch data after scrolling to its position;
        var bulkPosition = bulkid.position().top - 1000;
        // fetch the bulk data when reach the bulk element position and bulkLoading is false
        if (viewportWidth <= 1000) {
            bulkid.hide();
        }

        if (position >= bulkPosition && bulkLoading === false && viewportWidth > 1000) {
            // ansd then setting bulkLoading to true so that it will not fetch again
            bulkLoading = true;

            var styleIdVal = product_style_id;
            //var selectedclrname = $("#clrname").html();
            fetchBulkOrder();
        }
    })
});


function copyStringToClipboard(str) {
    var el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style = {
        position: 'absolute',
        left: '-9999px'
    };
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}

$('#toggleColorBox').on('click', function (e) {
    e.preventDefault();

    $('#allColorDiv').toggleClass('shown');
    // Start - Fit as much colors in a row - From Christian -  09/04/2020
    if ($('#allColorDiv').hasClass('shown')) {
        $(this).text('Show less colors');
    } else {
        $(this).html('+ view <br> more colors');
    }
    // End - Fit as much colors in a row - From Christian -  09/04/2020
});

/* Start - Added to Cart Modal Scripts - A ton of errors on pdetails on SL6 */

let addToCartTimeout;

function closeAddedCartModal() {
    if (addToCartTimeout) clearTimeout(addToCartTimeout);
    $("#messageBanner").remove();
    $('#added-cart-modal').css('display', 'none');
    return false;
}


function showCartPreviewDialog() {
    $.fn.ignore = function (sel) {
        return this.clone().find(sel || ">*").remove().end();
    };
    var bulkData = $("#bulkAddtoCart input.numbersOnly").toArray().filter(function (el) {
        return $(el).val();
    }).map(function (el) {
        var elColorSelected = $($(el).parent().parent().siblings()[1]).children('.pcolor').find('div');
        var colorSelected = $($(el).parent().parent().siblings()[1]).children('.pcolor').css('background-color');
        if (elColorSelected.length > 0) {
            colorSelected = [];

            elColorSelected.each(function (i, el) {
                colorSelected.push($(el).css('background-color'));
            });
        }

        var splitImage =  $(el).data('image').replace('Images/Color/', '').replace('Images/Style/', '');

        return {
            color: $(el).attr('name').split('[')[0].replace('*', ' '),
            size: $(el).attr('name').split('[')[1].split(']')[0],
            qty: $(el).val(),
            price: $(el).parent().siblings('p').ignore('span').text().trim(),
            tint: colorSelected, // $($(el).parent().parent().siblings()[1]).children('.pcolor').css('background-color'),
            image: base_url_site + 'image/fashion-wear/' + splitImage
        };
    });

    var image = '';
    var sidebarImages = $('ul.imgsidebar li img');
    if(sidebarImages.length >= 2) {
        image = $($('ul.imgsidebar li img')[1] || $('ul.imgsidebar li img')[0]).data('desktop-src');
    }
    
    var elColorSelected = $('.all-colors li a.col.active').find('div')
    var colorSelected = $('.all-colors li a.col.active').css('background-color');
    if (elColorSelected.length > 0) {
        colorSelected = [];

        elColorSelected.each(function (i, el) {
            colorSelected.push($(el).css('background-color'));
        });
    }

    var singleData = $("#SingleAddtoCart input.numbersOnly").toArray().filter(function (el) {
        return $(el).val();
    }).map(function (el) {
        return {
            color: $('#clrname').text(),
            size: $(el).siblings('label').text(),
            qty: $(el).val(),
            price: $(el).siblings('.price').find('.prid').text(),
            tint: colorSelected, //$('.select-color-box').css('background-color'),
            image: image
        };
    });

    var domElements = [];
    var result = bulkData.concat(singleData).reduce(function (acc, item) {
        if (!acc[item.color])
            acc[item.color] = [];
        acc[item.color].push(item);
        return acc;
    }, {});

    var domElements = [];
    var listTemplate = ``;

    Object.keys(result).forEach(function (color) {
        var item = result[color];
        var colorTemplate = '',
            trTemplate = '';

        var rows = item.reduce(function (row, context) {
            var columns = [];
            if (row == '') {
                // if this is the first row for this item, we must append the color
                var tintTemplate = '';
                if (Array.isArray(context.tint)) {
                    tintTemplate = '<div class="box" style="display: flex;">';
                    context.tint.forEach(function (tint, i) {
                        tintTemplate += `<span style="background-color: ${tint}" class="${i == 0 ? 'lft' : 'rght'}-color"></span>`;
                    });
                    tintTemplate += '</div>';
                } else {
                    tintTemplate = `<span class="box" style="background-color: ${context.tint};"></span>`;
                }

                colorTemplate = `
                            <div class="color">
                                ${tintTemplate}
                                ${context.color}
                            </div>
                        `;

            }

            trTemplate += `
                        <tr>
                            <td>${context.size}</td>
                            <td>${context.qty}</td>
                            <td>${context.price}</td>
                        </tr>
                    `

        }, '');

        listTemplate += `
                <div class="modal--added-cart__item">
                    <div class="modal--added-cart__item-photo">
                        <img src="${item[0].image}"
                            alt="" draggable="false">
                    </div>

                    <div class="modal--added-cart__item-color">
                        ${colorTemplate}
                    </div>

                    <div class="modal--added-cart__item-table">
                        <table>

                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                ${trTemplate}
                            </tbody>

                        </table>
                    </div>
                </div>
                `
    });

    $('#added-cart-list').html(listTemplate);
    $('#added-cart-rows').html(getProductBox().slice(0, 4));
    $('#added-cart-modal').css('display', 'flex');

    addToCartTimeout = setTimeout(function () {
        closeAddedCartModal();
    }, 10000);
}


$("#added-cart-modal").click(function (e) {
    if (e.target !== e.currentTarget) return;
    closeAddedCartModal();
});

$('#added-cart-exit, #btn-continue-shop').click(function () {
    closeAddedCartModal();
})
/* End - Added to Cart Modal Scripts - A ton of errors on pdetails on SL6 */


function getProductBox() {
    return $('.product-similar .card--primary').clone();
}

$(document).ready(function () {

    //Start - update to alert signup window - RM - 02/05/2021 - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1/5/2022

    function openOutOfStockEmailModal() {
        $('input[name=outofstocksizes]').prop('checked', false)
        $('html,body').attr('style', 'overflow:hidden;'); // Start - Pdetails out of stock modal fix - CL - 08052021
        $('#modalStockAlert').show();

        $(".pop-close").click(function () {
            $("#modalStockAlert").hide();
            $('html,body').attr('style', 'overflow:show;'); // Start - Pdetails out of stock modal fix - CL - 08052021
        });
        $('#modalColorHex').attr('style', $('#bgclr').attr('style'));
        $('#added-product-stock-rows').html(getProductBox().slice(0, 4));
    }

    $('#addtoSCartbtn').click(function () {
        var valid = 0;

        $("#SingleAddtoCart").find('input[type=number]').each(function () {
            if ($(this).val() != "") valid += 1;
        });

        $("#bulkAddtoCart").find('input[type=text]').each(function () {
            if ($(this).val() != "") valid += 1;
        });

        if (valid) {
            // Start - Add to cart deactivate and message - John - 07/08/2020 - 10:40 AM
            function Mymsg(msg, duration, color, backdrp) {
                if (!color) color = '#7092be'

                var messageBanner = document.createElement("div");
                messageBanner.setAttribute("id", "messageBanner");

                if (backdrp) {
                    var backdrop = document.createElement("div");
                    backdrop.setAttribute('style', 'position: fixed; width: 100%; height: 100vh; opacity: 0.5; background-color: lightgray; top: 0;z-index:2;');

                    messageBanner.appendChild(backdrop);
                }

                var alt = document.createElement("div");
                alt.setAttribute("style", "position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);z-index:2;background-color:" + color + "; border: medium none;border-radius: 9px;font-size: 22px;font-weight:bold;color:white;padding: 40px 50px 40px 50px ;text-align: center;text-transform: uppercase;");
                alt.innerHTML = msg;

                if (duration) {
                    setTimeout(function () {
                        $("#messageBanner").remove();
                    }, duration);
                }

                $("#messageBanner").remove();
                if (backdrp)
                    messageBanner.appendChild(backdrop);
                messageBanner.appendChild(alt);
                document.body.appendChild(messageBanner);
                $("#messageBanner").on('click', function () {
                    dismiss();
                }); // Start - Nicer added to cart popup - John - 07/23/2020
            }

            Mymsg("Adding to cart", 999999999, '#37f55e', true);
            // End - Add to cart deactivate and message - John - 07/08/2020 - 10:40 AM
            var dataString = $("#SingleAddtoCart, #bulkAddtoCart").serialize();
            $.post(base_url_site + "addon/bulkaddtocart.php", dataString, function (data) {

                if (data == 1) {
                    showCartPreviewDialog();
                    // window.location.href=base_url_site + "cart";
                    $(".AT3CListWrap").load(base_url_site + "includes/mini_cart.php");

                    setTimeout(function () {
                        $(".totel-value").load(base_url_site + "includes/header_cartdetail.php");
                    }, 800);


                    $("input:text").val("");
                    $("input[type=number]").val("");
                    $(window).scrollTop(0);


                }
            });

        } else {
            //jQuery('.loading').hide();
            $("#background-fade").delay(500).fadeIn(500);
            $(".pop-close").click(function () {
                $("#background-fade").fadeOut(500);
            });
            // alert("Error: You must fill in at least one field");
            return false;
        }
    });
    //Start - fix add to cart & checkout button - Roi - 07/21/2020
    $('#addtoCartCheckoutbtn').click(function () {
        //jQuery('.loading').show();
        var valid = 0;

        $("#SingleAddtoCart").find('input[type=number]').each(function () {
            if ($(this).val() != "") valid += 1;
        });

        $("#bulkAddtoCart").find('input[type=text]').each(function () {
            if ($(this).val() != "") valid += 1;
        });

        if (valid) {
            // Start - Add to cart deactivate and message - John - 07/08/2020 - 10:40 AM
            function Mymsg(msg, duration, color, backdrp) {
                if (!color) color = '#7092be'

                var messageBanner = document.createElement("div");
                messageBanner.setAttribute("id", "messageBanner");

                if (backdrp) {
                    var backdrop = document.createElement("div");
                    backdrop.setAttribute('style', 'position: fixed; width: 100%; height: 100vh; opacity: 0.5; background-color: lightgray; top: 0;');

                    messageBanner.appendChild(backdrop);
                }

                var alt = document.createElement("div");
                alt.setAttribute("style", "position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);background-color:" + color + "; border: medium none;border-radius: 9px;font-size: 22px;font-weight:bold;color:white;padding: 40px 50px 40px 50px ;text-align: center;text-transform: uppercase;");
                alt.innerHTML = msg;

                if (duration) {
                    setTimeout(function () {
                        $("#messageBanner").remove();
                    }, duration);
                }

                $("#messageBanner").remove();
                if (backdrp)
                    messageBanner.appendChild(backdrop);
                messageBanner.appendChild(alt);
                document.body.appendChild(messageBanner);
            }

            Mymsg("Adding to cart", 999999999, '#37f55e', true);
            // End - Add to cart deactivate and message - John - 07/08/2020 - 10:40 AM
            var dataString = $("#SingleAddtoCart, #bulkAddtoCart").serialize();
            $.post(base_url_site + "addon/bulkaddtocart.php", dataString, function (data) {

                if (data == 1) {
                    // window.location.href=base_url_site + "cart";
                    $(".AT3CListWrap").load(base_url_site + "includes/mini_cart.php");
                    $(".totel-value").load(base_url_site + "includes/header_cartdetail.php");
                    $("input:text").val("");
                    $("input[type=number]").val("");
                    $(window).scrollTop(0);
                    $.fn.ignore = function (sel) {
                        return this.clone().find(sel || ">*").remove().end();
                    };
                    var bulkData = $("#bulkAddtoCart input.numbersOnly").toArray().filter(function (el) {
                        return $(el).val();
                    }).map(function (el) {
                        return {
                            color: $(el).attr('name').split('[')[0].replace('*', ' '),
                            size: $(el).attr('name').split('[')[1].split(']')[0],
                            qty: $(el).val(),
                            price: $(el).parent().siblings('p').ignore('span').text().trim(),
                            tint: $($(el).parent().parent().siblings()[1]).children('.pcolor').css('background-color')
                        };
                    });

                    var singleData = $("#SingleAddtoCart input.numbersOnly").toArray().filter(function (el) {
                        return $(el).val();
                    }).map(function (el) {
                        return {
                            color: $('#clrname').text(),
                            size: $(el).siblings('label').text(),
                            qty: $(el).val(),
                            price: $(el).siblings('.price').find('.prid').text(),
                            tint: $('.select-color-box').css('background-color')
                        };
                    });
                    var result = bulkData.concat(singleData).reduce(function (acc, item) {
                        if (!acc[item.color])
                            acc[item.color] = [];
                        acc[item.color].push(item);
                        return acc;
                    }, {});
                    Object.keys(result, function (color) {
                        var item = result[color];
                        var rows = item.reduce(function (row, context) {
                            return row + '<tr><td>' + context.size + '</td><td>' + context.price + ' x ' + context.qty + '</td></tr>';
                        });
                        var html = '<div style="display: flex; font-size: 15px; padding: 16px;"><div style="width: 100px; margin-right: 20px;"><img src="https://robx.bulkapparel.com/styleImages/SCImages/Style-Main-480-600/6388_fm.jpg" style="width: 100%; height: auto;"></div><div style="max-width: 240px; margin-right: 15px; display: flex; flex-flow: column; justify-content: space-between;"><label style="display: block; text-align: left;">' + $('#title-1').text() + '</label><label style="display: flex; text-align: left; align-items: center; justify-content: start;">' + color + ' <span style="background: ' + item[0].tint + '; border: 3px solid #467fb1; width: 20px; height: 20px; display: inline-block; margin-left: 10px;"></span></label></div><table><tbody>' + rows + '</tbody></table></div>';

                    });
                    Mymsg('Items added to the cart', 3000);

                    window.location.href = base_url_site + "cart";

                }
                //jQuery('.loading').hide();
            });

        } else {
            //jQuery('.loading').hide();
            $("#background-fade").delay(500).fadeIn(500);
            $(".pop-close").click(function () {
                $("#background-fade").fadeOut(500);
            });
            // alert("Error: You must fill in at least one field");
            return false;
        }
    });
    //End - fix add to cart & checkout button - Roi - 07/21/2020

    $('#addtoWishList').click(function () {
        $.post(base_url_site + "addon/addtowishlist.php", $("#wishid").serialize(), function (data) {
            var data = $.parseJSON(data);
            if (data.result == "0") {
                $('.successdiv').children('label').html('');
                $('.successdiv').css('display', 'block');
                $('.successdiv').children('label').html(data.msg);
                setTimeout(function () {
                    $('.successdiv').children('label').html('');
                    $('.successdiv').css('display', 'none');
                }, 5000);
            }
            if (data.result == "1") {
                $('.successdiv').children('label').html('');
                $('.successdiv').css('display', 'block');
                $('.successdiv').children('label').html(data.msg);
                setTimeout(function () {
                    $('.successdiv').children('label').html('');
                    $('.successdiv').css('display', 'none');
                }, 5000);
            }
            if (data.result == "2") {
                window.location.href = base_url_site + "login";
            }
        });
    });

    $('#removesuccess').click(function () {
        $('.successdiv').hide();
    });

    $('#removeerror').click(function () {
        $('.errordiv').hide();
    });
    //Start - update to alert signup window - RM - 02/05/2021 - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1/5/2022

    $('#btnShowSentStockEmail').on("click", function () {
        openOutOfStockEmailModal();
        $('input[name=outofstocksizes]').prop('checked', true)
    });

    // Similar Items display on Product details page | disable this button modal WL 8/9/2021
    $(document).on('click', '.btn--notify', function () {

        $('#modalStockAlert #modalColorHex').html(''); //Start - Add Notify Me in cache also - RM - 12/23/2021

        openOutOfStockEmailModal(); // Start - Similar Items display on Product details page - CL - 8/12/2021
        var size = $(this).data('size');

        //Start - Add Notify Me in cache also - RM - 12/23/2021
        if ($(this).hasClass('pbulkCache')) {
            var colorName = $(this).data('colorname');
            $('#modalStockAlert #modalColorName span').text(colorName);

            var color1 = $(this).data('color1');
            var color2 = $(this).data('color2');

            var htmlColors = "";
            if (color2 && color2 != "") {
                htmlColors += '<div class="pcolor-lft" style="background-color: ' + color1 + ';height: 28px;"></div>';
                htmlColors += '<div class="pcolor-rght" style="background-color: ' + color2 + ';height: 28px;"></div>';
            } else {
                htmlColors += '<div class="pcolor-lft" style="background-color: ' + color1 + ';height: 28px;"></div>';
                htmlColors += '<div class="pcolor-rght" style="background-color: ' + color1 + ';height: 28px;"></div>';
            }

            $('#modalStockAlert #modalColorHex').html(htmlColors);
            $('#btnSaveEmailwithStock').addClass('pbulkCache');

            var gtin = $(this).data('gtin');
            $('#btnSaveEmailwithStock').attr("data-gtin", gtin);
            $("#btnSaveEmailwithStock").data("gtin", gtin);

            $('#modalStockAlert .outofstocksize-container').hide();
            $('#modalStockAlert .no-stock__message_bulkcache').remove();
            $('#modalStockAlert .no-stock__message').after('<p class="no-stock__message no-stock__message_bulkcache" style="font-size: 30px;padding: 0;">' + size + '</p>');

        } else {
            $('#btnSaveEmailwithStock').removeClass('pbulkCache');
            $('#btnSaveEmailwithStock').removeAttr("data-gtin");

            $(`input[data-size="${size}"]`).prop('checked', true); //this is only

            $('#modalStockAlert .outofstocksize-container').show();
            $('#modalStockAlert .no-stock__message_bulkcache').remove();
        }
        //End - Add Notify Me in cache also - RM - 12/23/2021
    })
    // Similar Items display on Product details page | disable this button modal WL 8/9/2021

})

$('#btnSaveEmailwithStock').on('click', function (event) {

    event.preventDefault();
    // Start - Notify me adjustments - CL - 07/22/2021
    var loading = $(this).find('.btn-loading');
    loading.show();
    // End - Notify me adjustments - CL - 07/22/2021
    // Start - notify me - AP - 04/29/2021
    var self = this;
    $(this).attr('disabled', true);
    // End - notify me - AP - 04/29/2021

    var searchSizes = $("input[name='outofstocksizes']:checkbox:checked").map(function () {
        return $(this).val();
    }).toArray();

    var email = $('#outofstockemail').val();

    //Start - Add Notify Me in cache also - RM - 12/23/2021
    if ($(this).hasClass('pbulkCache')) {
        var searchSizes = $(this).data('gtin');
        searchSizes = searchSizes.split(',');
    }
    //End - Add Notify Me in cache also - RM - 12/23/2021

    $.ajax({
        type: 'POST',
        url: base_url_site + 'addon/saveemailstockalerts.php',
        data: {
            email: email,
            sizes: searchSizes
        },
        async: true,
        // Start - Notify me adjustments - CL - 07/22/2021
        success: function (data) {
            var item = $.parseJSON(data);

            if (item.type == "success") {
                // Start - Stock alert updates - CL - 01/07/2020
                $('#modalStockAlert').hide();
                $('#outofstockemail').val('');
                // $('#alert-message span').text(item.message);
                // $('#alert-message').show();
                $('modalColorHex').css('background', 'transparent');
                $('modalColorName').text('')
                showCustomModal('success', 'Thank you for using our inventory request notification', item.message, '');
                setTimeout(function () {
                    closeCustomModal();
                }, 10000) // Start - Adjust the timing of disappearing  the notify me. pop up message to 10sec - CL - 922021
                // End - Stock alert updates - CL - 01/07/2020
            } else {
                showCustomModal('error', 'Thank you for using our inventory request notification', item.message, '');
            }

            $(self).attr('disabled', false); // Start - notify me - AP - 04/29/2021
            loading.hide();
            $('html,body').attr('style', 'overflow:show;'); // Start - Pdetails out of stock modal fix - CL - 08052021
        }
        // End - Notify me adjustments - CL - 07/22/2021
    });

})


// Start - FE Adjustment Product details page - CL - 02082021-851am
var expand = false;

function toggleFeatureText() {
    var element = $('.prod-desc-wrapper .readmore');
    element.text(expand ? " See Less" : "Read More"); /// Start - new product details page mobile view - CL - 12/18/2020t
    element.closest('.prod-desc-wrapper').find('.prod-desc-small, .prod-desc-big').toggleClass('prod-desc-small prod-desc-big');
    element.closest('.prod-desc-wrapper').toggleClass('see-more'); /// Start - new product details page mobile view - CL - 12/18/2020t
}
$('#btn-feature').click(function (e) {
    e.preventDefault();
    var pos = $('#product-feature-mobile').offset().top - 250;

    $('body, html').animate({
        scrollTop: pos
    }, 0);

    expand = true;
    toggleFeatureText();
})
$(document).ready(function () {
    $('.prod-desc-wrapper .readmore').on('click', function (e) {
        e.preventDefault();
        expand = !expand;
        toggleFeatureText();
    });
});
// End - FE Adjustment Product details page - CL - 02082021-851am


var similarItemloaded = false;

// Start - Similar Items adjustments - CL - 12/15/2021
$(document).ready(function () {

    function showMobileSimilarProduct() {
        $("#product-ajax-item .hover-product-container").addClass('hover-product-container--active');
        $('#product-ajax-item').addClass('product-ajax-item--active');

    }

    function showDesktopSimilarProduct() {

        $(".product-ajax-item__clone.hover-product-container").addClass('hover-product-container--active');
        $('.product-ajax-item__clone').addClass('product-ajax-item--active');
        $(this).parent().parent().parent().addClass('active--class');

    }

    function checkVisible(elm, threshold, mode) {
        threshold = threshold || 0;
        mode = mode || 'visible';

        if (!elm) return;

        var rect = elm.getBoundingClientRect();
        var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
        var above = rect.bottom - threshold < 0;
        var below = rect.top - viewHeight + threshold >= 0;

        return mode === 'above' ? above : (mode === 'below' ? below : !above && !below);
    }

    function elementOutOfView(elem) {
        var offset = 350;   //Make Bulkapparel works on IE Browser | WL 1/20/2022

        if (checkVisible(elem[0], offset, 'below')) {
            $(elem).css({
                top: `-${offset}px`,
                bottom: 'auto'
            })
        }

        if (checkVisible(elem[0], offset, 'above')) {
            $(elem).css({
                top: 'auto',
                bottom: '-15px'
            })
        }

    }

    function showOnHoverSimilarProductTest(btnEl, displayEl) {
        var group = $(btnEl).data('group');
        var gtin = $(btnEl).data('gtin');
        var styleid = $(btnEl).data('styleid');
        var loaded = $(btnEl).data('loaded');

        if (!gtin && !group) return;

        if (!loaded) {

            $(displayEl).load(base_url_site + 'includes/pdetails-hover-product.php', {
                group: group,
                gtin: gtin,
                styleid: styleid
            });

            $(btnEl).data('loaded', 1);
        }

        return $(window).width() > 1000 ? showDesktopSimilarProduct() : showMobileSimilarProduct();
    }


    function hideDesktopSimilarProduct() {
        $(".product-ajax-item__clone.hover-product-container").removeClass('hover-product-container--active');
        $('.product-ajax-item__clone').removeClass('product-ajax-item--active');
        $('active--class').removeClass('active--class');
    }

    function hideMobileSimilarProduct() {
        $("#product-ajax-item .hover-product-container").removeClass('hover-product-container--active');
        $('#product-ajax-item').removeClass('product-ajax-item--active');
        $('.product-ajax-item').removeClass('product-ajax-item--active');
    }

    function responseEvent() {
        if ($(window).width() > 1000) {
            return 'mouseover'
        }
        return 'click'
    }


    function displaySimilarProduct(elem, displayEl) {
        var btnEl = $(elem).find('.btn--notify');
        var mobileDisplayEl = $('')
        if (btnEl.length) {
            showOnHoverSimilarProductTest(btnEl, displayEl);
        }
    }


    $(document).on(responseEvent(), '.stock-missing-out .missing-item',
        $.debounce(500, function (e) {
            e.stopPropagation();
            var parentEl = $(this).closest('.variant');     //Make Bulkapparel works on IE Browser | WL 1/20/2022
            var displayEl = parentEl.find('.product-ajax-item__clone');


            if ($(window).width() > 1000) {
                elementOutOfView(displayEl)
                displaySimilarProduct(parentEl, displayEl);
            } else {
                displaySimilarProduct(parentEl, $('.product-ajax-item'));
            }

        })
    )

    $(document).on(responseEvent(), '.btn--notify', $.debounce(500, function (e) {
        var parentEl = $(this).closest('.variant');   //Make Bulkapparel works on IE Browser | WL 1/20/2022
        var displayEl = parentEl.find('.product-ajax-item__clone');

        if ($(window).width() > 1000) {
            elementOutOfView(displayEl)
            displaySimilarProduct(parentEl, displayEl)
        }
    }))

    // $(document).on(responseEvent(), '.hover-product-container--active .hover-product-container__ajax',
    // 	showSimilarProduct
    // );

    if ($(window).width() > 1000) {
        $(document).on('mouseleave', '.stock-missing-out .missing-item', hideDesktopSimilarProduct);


        $(document).on('mouseleave', '.btn--notify', hideDesktopSimilarProduct)


        $(document).on('mouseleave', '.hover-product-container--active .hover-product-container__ajax',
            hideDesktopSimilarProduct
        );
    }

    $(document).on('click', '#product-ajax-item', function (e) {
        if (e.target !== e.currentTarget) return;
        hideMobileSimilarProduct();
    });

    // Start - Please recheck similar items not working properly no close button and it's acting weird  - WK - 09/13/2021
    $(document).on('click', '.hover-product-container__button-close', function (e) {
        if (e.target !== e.currentTarget) return;
        hideMobileSimilarProduct();
    });
    // end  - Please recheck similar items not working properly no close button and it's acting weird  - WK - 09/13/2021

    var swiperProduct = new Swiper(".hover-product-slider", {
        slidesPerView: 3,
        spaceBetween: 5,
        // direction: 'horizontal',
        pagination: {
            el: ".hover-product-slider--pagination",
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            900: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
        },

    });

    $('.hover-product-container__button-close').click(function () {
        $('.product-ajax-item--active').removeClass('product-ajax-item--active');
        $(".hover-product-container--active").removeClass('hover-product-container--active');
    });


    $('#mainimg .review-img-desktop').clone().prependTo('.add-review-star-modal__product__image');
    $('#mainimg .review-img-desktop').clone().prependTo('.add-review-modal__image');
    $('.add-review-modal__image img').removeAttr('id');
    $('.add-review-modal__image .pimg').removeClass('pimg');

});

$(document).ready(function () {
    $('.btn--show').click(function () {
        $(this).parent().parent().addClass('bulkid-container--active');
    });
    $('.btn--hide').click(function () {
        $(this).parent().parent().removeClass('bulkid-container--active');
    });
});


function scrollSmoothTo(elementId) {
    var element = document.getElementById(elementId);

    if(element.scrollIntoView) {
        element.scrollIntoView({
            block: 'start',
            behavior: 'instant'
        });
    } else {
        $('html, body').animate({
            scrollTop: $(elementId).offset().top
        }, 0);
    }

}

$(document).ready(function () {
    var root = document.querySelector(':root');
    var btnInstantScroll = document.querySelector('#btnInstantScroll');
    btnInstantScroll.addEventListener('click', function () {
        var coordinates = $('#question-and-answer-section').position();
        // Change scroll behavior
        root.setAttribute("style", "scroll-behavior: auto;");
        // Timeout ensures styles are applied before scrolling
        setTimeout(function () {
            // window.scrollBy(0, 2000);
            scrollTo({
                left: coordinates.left,
                top: coordinates.top,
                behavior: 'instant'
            })

            root.removeAttribute("style");
        }, 0)
    })
});


// scroll to load ajax file
var isAjaxCalledTwo = true;
var scrollTop = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop);
//Start - After logging in on QA page retain on the product details page - RM - 01/25/2022
if (pdetailsqa && pdetailsqa != "") {
    $('#parent-section--question-answer').load(base_url_site + "includes/pdetails-question-answer-onscroll-ajax.php", { stid: product_style_id, pdetailsqa: pdetailsqa });
    isAjaxCalledTwo = false;
    setTimeout(
        function () {

                $('html,body').animate({ scrollTop: $("#question-answer-post").offset().top + 100 }, 500); 
                
        }, 1000);
} else if (fromreview && fromreview != "") { 
    $('html,body').animate({ scrollTop: $("#customer-review").offset().top + 250 }, 500); 
    // $('html,body').animate({scrollTop: $("#customer-review").offset().top + 200}, 1000); 
}
//End - After logging in on QA page retain on the product details page - RM - 01/25/2022


$(document).scroll(function (e) {

    var scrollAmountTwo = $(window).scrollTop();
    var documentHeightTwo = $(document).height();
    var scrollPercentTwo = (scrollAmountTwo / documentHeightTwo) * 100;
    var viewportWidth = $(window).width();

    // if (viewportWidth >= 1000) {
    if (scrollPercentTwo > 30) {
        if (isAjaxCalledTwo) {
            isAjaxCalledTwo = false;
            // $('#parent-section--review').load(base_url_site +"includes/pdetails-reviews-onscroll-ajax.php", {stid: <?php echo $stid ?>}); 
            // $('#parent-section--question-answer').load(base_url_site + "includes/pdetails-question-answer-onscroll-ajax.php", { stid: product_style_id, pdetailsqa: pdetailsqa }); //Start -  After logging in on QA page retain on the product details page - RM - 01/24/2022 // Start - SEO Implementation - AP - 03/02/2022

        }
    }

    // }
});

// Product details page on some size adjustment | WL 1/21/2022
$('.product-offers-box .product-logo-box').clone().prependTo('.product-main-info .product-title__header');


// Start - Review on pdetails should allow quick login - CL - 1/27/2022 
var SHOW_REVIEW_MODAL_PARAM = 'reviewmodal';
var reviewBtns = '#writeReviewBtn, #addReviewBtn';

function showLoginModal() {
    changeOrInsertQueryOnUrl(SHOW_REVIEW_MODAL_PARAM, 1)
    $('#frmLoginpopTwo').addClass('opemReviewModal');

    $('.signup-modal').addClass('signup-modal--open');
    $('.signup-modal').addClass('signup-modal--login');
    $('.scrolling').addClass('signup-modal--active');
    $('#frmLogin').addClass('form__login');
}


$(document).on('click', reviewBtns, function () {
    var isAuth = $(this).data('auth');
    if (isAuth) {
        stepReviewStarModal();
    } else {
        showLoginModal();
    }
})

$(document).ready(function () {
    var showReview = getUrlQuery(SHOW_REVIEW_MODAL_PARAM);
    var isAuth = $(reviewBtns).data('auth');

    if (showReview === '1') {
        if (!isAuth) {
            showLoginModal();
        } else {
            stepReviewStarModal();
        }
        changeOrInsertQueryOnUrl(SHOW_REVIEW_MODAL_PARAM, 0)
        removeUrlQuery(SHOW_REVIEW_MODAL_PARAM);
    }
})
// End - Review on pdetails should allow quick login - CL - 1/27/2022 

// Savings box font update | WL 3/30/22 
// $(document).ready(function () {
//     var savingsBlack = $('.saving-box ul li span').toArray().filter(function (el) {
//         return $(el).text().replace(':', '').trim().toLowerCase() === 'black'
//     });

//     if (savingsBlack.length > 0) {
//         $(savingsBlack[0]).addClass('black--active');
//     }

//     var savingsBlack = $('.saving-box ul li span').toArray().filter(function (el) {
//         return $(el).text().replace(':', '').trim().toLowerCase() === 'white'
//     });

//     if (savingsBlack.length > 0) {
//         $(savingsBlack[0]).addClass('white--active');
//     }
// });


// $(function() {
//     $(".saving-box ul li span").each(function() {
//         if ($(this).hasClass('black--active')) {
//         $(this).parents('.saving-box ul li').addClass('black-parent--active');
//         } else {
//         $(this).parents('.saving-box ul li').removeClass('black-parent--active'); 
//         }
//     });
//     $(".saving-box ul li span").each(function() {
//         if ($(this).hasClass('white--active')) {
//         $(this).parents('.saving-box ul li').addClass('white-parent--active');
//         } else {
//         $(this).parents('.saving-box ul li').removeClass('white-parent--active'); 
//         }
//     });
// });
// Savings box font update | WL 3/30/22 