<!--===============================================================================================-->
<script src="user/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/bootstrap/js/popper.js"></script>
<script src="user/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/select2/select2.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency=USD"></script>

<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="user/vendor/daterangepicker/moment.min.js"></script>
<script src="user/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/slick/slick.min.js"></script>
<script src="user/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="user/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="user/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="user/vendor/sweetalert/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    // $('.js-addcart-detail').each(function () {
    //     var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    //     $(this).on('click', function () {
    //         swal(nameProduct, "is added to cart !", "success");
    //     });
    // });
</script>
<!--===============================================================================================-->
<script src="user/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="user/js/main.js"></script>
<script>
    function deleteAllProduct() {
        $.ajax({
            url: "http://127.0.0.1:8000/deleteAllProduct",
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data.response === 'success') {
                    // Show success message using SweetAlert
                    swal("Success", "Your cart has been cleared.", "success");

                    // Optionally, you can refresh the cart display or redirect
                    fetchShoppingCart(); // Refresh the cart
                } else {
                    swal("Error", "Failed to clear the cart.", "error");
                }
            },
            error: function(xhr, status, error) {
                console.error("There was a problem with the AJAX request:", error);
            }
        });

    }

    function fetchShoppingCart() {
        $.ajax({
            url: "http://127.0.0.1:8000/show_shopping_cart",
            method: "GET",
            dataType: "json",
            success: function(data) {
                console.log("Shopping Cart Data:", data);
                console.log(data.cart.length);
                // Set the data-notify attribute to the number of products
                $('#shopingCartIcon').attr('data-notify', data.cart.length);

                // Clear the existing cart items
                $('#myCart').empty();
                let totalPrice = 0;
                // Loop through each item in the cart and append to #myCart
                data.cart.forEach(function(item) {
                    let itemTotal = item.quanity * (item.color_additional_price + item
                        .size_additional_price + item.base_price);
                    totalPrice += itemTotal;
                    let cartItemHtml = `
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <div class="header-cart-item-img">
                                        <img src="storage/images/${item.product_image}" alt="IMG">
                                    </div>
                                    <div class="header-cart-item-txt p-t-8 mt">
                                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            ${item.product_name.charAt(0).toUpperCase() + item.product_name.slice(1)
                    }

                                        </a>
                                        <span class="header-cart-item-info">
                                            ${item.quanity} x $${item.base_price + item.color_additional_price + item.size_additional_price}
                                            |   ${item.color_name} /  ${item.size_name}
                                        </span>

                                    </div>
                                </li>
                            `;
                    // Append the generated HTML to #myCart
                    $('#myCart').append(cartItemHtml);
                });
                console.log("total price is " + totalPrice);
                // Update total cart display (fixed selector)
                $('#total_price_cart').html(`
                        <div class="header-cart-total w-full p-tb-40">
                            Total: $${totalPrice.toFixed(2)}
                        </div>
                    `);
            },
            error: function(xhr, status, error) {
                console.error("There was a problem with the AJAX request:", error);
            }
        });
    }

    $(document).ready(function() {
        fetchShoppingCart();

        // Show modal and fetch product details
        $('.js-show-modal1').on('click', function(e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            const apiUrl = 'http://127.0.0.1:8000/product/' + productId;

            // Fetch product details from the API
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function(data) {
                    // Populate the modal with product data
                    $('#product-name').text(data.name.charAt(0).toUpperCase() + data.name
                        .slice(1));
                    $('#discount-base').text(data.discount);

                    if (data.discount > 0) {
                        $('#product-discount').text(
                            `$${(data.base_price - (data.base_price * (data.discount / 100))).toFixed(2)}`
                        );
                        $('#product-price').addClass('text-decoration-line-through');
                    } else {
                        // Reset discount display if there is no discount
                        $('#product-discount').text('');
                        $('#product-price').removeClass('text-decoration-line-through');
                    }

                    $('#product-price')
                        .data('base-price', data.base_price)
                        .text(`$${data.base_price.toFixed(2)}`);
                    $('#product-description').text(data.description ||
                        "No description available");
                    $('#add-to-cart-button').data('product-id', productId);

                    // Clear images and destroy Slick if initialized
                    const imagesContainer = $('#product-images');
                    if (imagesContainer.hasClass('slick-initialized')) {
                        imagesContainer.slick('unslick');
                    }
                    imagesContainer.empty();

                    // Append new images and initialize Slick slider
                    data.images.forEach(function(image) {
                        imagesContainer.append(`
                        <div class="item-slick3" data-thumb="${image}">
                            <div class="wrap-pic-w pos-relative">
                                <img src="${image}" alt="IMG-PRODUCT">
                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${image}">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>
                    `);
                    });

                    // Initialize Slick slider
                    imagesContainer.slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                        infinite: true,
                        autoplay: false,
                        autoplaySpeed: 6000,
                        arrows: true,
                        appendArrows: $('.wrap-slick3-arrows'),
                        prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                        nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                        dots: true,
                        appendDots: $('.wrap-slick3-dots'),
                        dotsClass: 'slick3-dots',
                        customPaging: function(slick, index) {
                            var portrait = $(slick.$slides[index]).data(
                                'thumb');
                            return '<img src="' + portrait +
                                '"/><div class="slick3-dot-overlay"></div>';
                        }
                    });

                    function ucfirst(str) {
                        return str.charAt(0).toUpperCase() + str.slice(1);
                    }
                    // Populate color and size options
                    const uniqueColors = new Set();
                    const uniqueSizes = new Set();

                    $('#color-select').empty().append(
                        '<option value="">Choose a color</option>');
                    $('#size-select').empty().append(
                        '<option value="">Choose a size</option>');

                    data.color.forEach(function(color) {
                        if (!uniqueColors.has(color.color)) {
                            uniqueColors.add(color.color);
                            $('#color-select').append(
                                `<option value="${color.color}" data-addition-price="${color.addition_price}" data-productcolor-id="${color.productcolor_id}">${ucfirst(color.color)}</option>`
                            );
                        }

                        color.size.forEach(function(size) {
                            if (!uniqueSizes.has(size.size)) {
                                uniqueSizes.add(size.size);
                                $('#size-select').append(
                                    `<option value="${size.size}" data-addition-price="${size.addition_price}" data-productsize-id="${size.productsize_id}">${ucfirst(size.size)}</option>`
                                );
                            }
                        });
                    });

                    $('#product-modal').show();
                },
                error: function() {
                    swal("Error", "Product not found", "error");
                }
            });
        });

        // Close modal on overlay click
        $('.js-hide-modal1').on('click', function() {
            $('#product-modal').hide();
        });

        // Increase/decrease quantity
        $('.btn-num-product-up').off('click').on('click', function() {
            let input = $(this).siblings('.num-product');
            input.val(parseInt(input.val()) + 1);
        });

        $('.btn-num-product-down').off('click').on('click', function() {
            let input = $(this).siblings('.num-product');
            let value = parseInt(input.val());
            if (value > 1) {
                input.val(value - 1);
            }
        });

        // Update quantity when input changes
        $('.num-product').on('change', function() {
            if ($(this).val() < 1) {
                $(this).val(1);
            }
        });

        // Calculate and update price based on color and size selection
        function calculatePrice() {
            const basePrice = parseFloat($('#product-price').data('base-price'));
            const colorPrice = parseFloat($('#color-select').find(':selected').data('addition-price')) || 0;
            const sizePrice = parseFloat($('#size-select').find(':selected').data('addition-price')) || 0;
            const discountBasePrice = parseFloat($('#discount-base').text()) || 0;
            const totalPrice = basePrice + colorPrice + sizePrice;

            $('#product-price').text(`$${totalPrice.toFixed(2)}`);

            if (discountBasePrice > 0) {
                const totalPriceDiscount = (1 - discountBasePrice / 100) * totalPrice;
                $('#product-discount').text(`$${totalPriceDiscount.toFixed(2)}`);
            } else {
                // Hide or clear discount if there's no discount
                $('#product-discount').text('');
            }
        }

        // Trigger price calculation when color or size is changed
        $('#color-select, #size-select').on('change', calculatePrice);

        // Add to cart button click handler
        $('.js-addcart-detail, #add-to-cart-button').on('click', function(e) {
            e.preventDefault();

            // Get selected values
            const colorSelected = $('#color-select').val();
            const sizeSelected = $('#size-select').val();

            // Check if both color and size are selected
            if (!colorSelected || !sizeSelected) {
                const missingSelections = [];
                if (!colorSelected) missingSelections.push("color");
                if (!sizeSelected) missingSelections.push("size");

                swal({
                    title: "Required Selections",
                    text: `Please select a ${missingSelections.join(" and ")}`,
                    icon: "warning",
                    button: "OK",
                });
                return false;
            }

            // If both selections are made
            @if (Auth::user())
                const productId = $(this).data('product-id');
                const productColorId = $('#color-select').find(':selected').data('productcolor-id');
                const productSizeId = $('#size-select').find(':selected').data('productsize-id');
                const quantity = $('.num-product').val();

                addToCart(productId, productColorId, productSizeId, quantity)
                    .then(response => {
                        $('.num-product').val(1);
                        swal(response.message, "", "success");
                    })
                    .catch(error => {
                        handleError(error);
                    });
            @else
                window.location = "/login";
            @endif
        });

        // Add to cart function
        function addToCart(productId, productColorId, productSizeId, quantity) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/shoping_cart',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        product_color_id: productColorId,
                        product_size_id: productSizeId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchShoppingCart();
                        resolve(response);
                    },
                    error: function(xhr) {
                        reject(xhr);
                    }
                });
            });
        }

        // Error handler function
        function handleError(xhr) {
            console.log(xhr);
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessage = '';
                for (let key in errors) {
                    errorMessage += errors[key].join(', ') + '\n';
                }
                swal("Error", errorMessage, "error");
            } else {
                swal("Error", "An error occurred while adding the product to the cart.", "error");
            }
        }
    });
</script>
