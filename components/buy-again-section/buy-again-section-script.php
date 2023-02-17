<script>
    $(function() {
        const swiper = new Swiper('.buy-again-section-swiper', {
            // Optional parameters

           
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.buy-again-section-swiper__next',
                prevEl: '.buy-again-section-swiper__prev',
            },

            breakpoints: {
                1500: {
                    slidesPerView: 8.5,
                    slidesPerGroup: 4,
                },
                
                1264: {
                    slidesPerView: 7
                    ,slidesPerGroup: 3,
                },
                
                1000: {
                    slidesPerView: 6
                    ,slidesPerGroup: 3,
                },
                
                768: {
                    slidesPerView: 5
                    ,slidesPerGroup: 2,
                },
                
                0: {
                    slidesPerView: 3.5
                    ,slidesPerGroup: 2,
                }

            }
        });

        function showProductVariant(id) {
            $('#selectVariantModal').modal('show')
        }


        $(document).on('click', '.card--product-buy-again .add-to-cart', function() {
            var styleId = $(this).data('id');
            
            showProductVariant(styleId);
        })
    })
</script>