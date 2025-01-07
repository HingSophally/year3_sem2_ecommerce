@extends('user.layout_user')
@section('main_content')
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <thead>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2">Name</th>
                                        <th class="column-3">Size and color</th>
                                        <th class="column-price">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-price">discount</th>
                                        <th class="column-5">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody class="table_body">
                                    <!-- Rows will be dynamically added here by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" id="coupon_code" placeholder="Coupon Code">

                                <div id="apply_coupon"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>

                            </div>
                            <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer float-right"
                                id="remove_coupon" style="float: right; display: none;">
                                Remove Coupon
                            </div>


                            <div id="coupon_description" class="m-tb-5" style="color: green;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2 sub_total_price_cart" name="cart_total">

                                </span>
                            </div>
                            <!-- Discount -->
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Discount:
                                </span>
                            </div>
                            <div class="size-209">
                                <span class="mtext-110 cl2 discount_total" name="">
                                    0
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or contact us
                                    if you need any help.
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Calculate Shipping
                                    </span>

                                    {{-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="time">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> --}}

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                            placeholder="State / Country" value="cambodia" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city"
                                            placeholder="City" value="Phnom Penh" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
                                            placeholder="Street Address" value="street 271" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                            placeholder="Phone Number" value="01855555" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode"
                                            placeholder="Postcode / Zip" value="12000000" required>
                                    </div>


                                    {{--                                    <div class="flex-w"> --}}
                                    {{--                                        <div --}}
                                    {{--                                            class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer"> --}}
                                    {{--                                            Update Totals --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}

                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2 total_price_cart">
                                    $0.00
                                </span>
                            </div>
                        </div>

                        <a href="#" id="paypal-button-container" class="">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@section('new_js')
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script> <!-- Replace YOUR_CLIENT_ID with your actual client ID -->

    <script>
        let appliedDiscount = 0; // Global variable to store coupon discount
        let minPurchaseAmount = 0;
        let isCouponApplied = false; // Store minimum purchase amount for coupon
        function ucfirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
        // Function to fetch shopping cart and populate table
        function fetchShoppingCartToTable() {
            $.ajax({
                url: "http://127.0.0.1:8000/show_shopping_cart",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.table_body').empty();
                    let total_cart = 0;

                    if (data.cart) {
                        data.cart.forEach(function(item) {
                            const itemSubtotal = ((item.base_price + item.color_additional_price + item
                                .size_additional_price) * item.quanity) * (1 - item.discount / 100);
                            total_cart += itemSubtotal;

                            let tableItemHtml = `
            <tr class="table_row" data-product-id="${item.product_id}" data-productcolor-id="${item.productcolor_id}" data-productsize-id="${item.productsize_id}">
                <td class="column-1">
                    <div class="how-itemcart1">
                        <img src="storage/images/${item.product_image}" alt="IMG">
                    </div>
                </td>
                <td class="column-2">${ucfirst(item.product_name)}</td>
                <td class="column-price">${ucfirst(item.color_name)}, ${ucfirst(item.size_name)}</td>
                <td class="column-3">$ ${(item.base_price + item.color_additional_price + item.size_additional_price)}</td>
                <td class="column-4">
                    <input type="number" class="quantity-input" value="${item.quanity}" min="1" max="100" data-base-price="${item.base_price}" data-color-price="${item.color_additional_price}" data-size-price="${item.size_additional_price}" data-discount="${item.discount}" />
                </td>
                <td class="column-price" style="color:green; text-align: center">${item.discount} %</td>
                <td class="column-5 item-subtotal">$${itemSubtotal.toFixed(2)}</td>
            </tr>
        `;
                            $('.table_body').append(tableItemHtml);
                        });

                        updateTotals(total_cart);
                    } else {
                        console.error("Response data does not contain 'cart' property");
                    }

                    // Event listener for updating subtotal on quantity change
                    $(document).on('input', '.quantity-input', function() {
                        const quantity = parseInt($(this).val());
                        const basePrice = parseFloat($(this).data('base-price'));
                        const colorPrice = parseFloat($(this).data('color-price'));
                        const sizePrice = parseFloat($(this).data('size-price'));
                        const discount = parseFloat($(this).data('discount'));

                        const itemSubtotal = ((basePrice + colorPrice + sizePrice) * quantity) * (1 -
                            discount / 100);
                        $(this).closest('tr').find('.item-subtotal').text(
                            `$${itemSubtotal.toFixed(2)}`);

                        let totalCart = 0;
                        $('.item-subtotal').each(function() {
                            totalCart += parseFloat($(this).text().replace('$', ''));
                        });

                        // Update the totals with recalculated values
                        updateTotals(totalCart);
                    });

                    // Apply Coupon Logic
                    $('#apply_coupon').click(function() {
                        var couponCode = $('#coupon_code').val();
                        var cartTotal = parseFloat($('.sub_total_price_cart').text().replace('$', '')
                            .trim());

                        if ($('#coupon_code').prop('disabled')) {
                            toastr.info('You have already applied this coupon.',
                                'Coupon Already Applied!');
                            return;
                        }

                        $.ajax({
                            url: '/apply_coupon',
                            method: 'POST',
                            data: {
                                coupon_code: couponCode,
                                cart_total: cartTotal,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    let discount_total = 0;

                                    if (response.discount < 1) {
                                        discount_total = cartTotal * response.discount;
                                    } else {
                                        discount_total = parseFloat(response.discount);
                                    }

                                    minPurchaseAmount = parseFloat(response.min_purchase);
                                    isCouponApplied = true;
                                    swal({
                                        title: 'Coupon Applied!',
                                        text: 'You got a discount of $' +
                                            discount_total.toFixed(2),
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6'
                                    });

                                    $('#coupon_code').prop('disabled', true);
                                    $('#apply_coupon').prop('disabled', true);
                                    $('#remove_coupon').show(); // Show the remove button


                                    appliedDiscount = response.discount;
                                    $('#coupon_description').text(response
                                        .description); // Display coupon description

                                    // Store coupon_id in local storage
                                    localStorage.setItem('appliedCouponId', response
                                        .coupon_id);

                                    updateTotals(cartTotal);
                                } else {
                                    toastr.error(response.message, 'Oops!');
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error(
                                    'Something went wrong! Please try again later.',
                                    'Error');
                            }
                        });
                    });

                    // Remove Coupon Logic
                    $('#remove_coupon').click(function() {
                        appliedDiscount = 0;
                        isCouponApplied = false;
                        $('#coupon_code').prop('disabled', false);
                        $('#coupon_code').val('');
                        $('#apply_coupon').prop('disabled', false);
                        $('#remove_coupon').hide(); // Hide the remove button
                        $('#coupon_description').text(''); // Clear the coupon description

                        toastr.warning('The coupon has been removed.', 'Coupon Removed');

                        // Recalculate totals without the discount
                        let totalCart = 0;
                        $('.item-subtotal').each(function() {
                            totalCart += parseFloat($(this).text().replace('$', ''));
                        });
                        updateTotals(totalCart);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("There was a problem with the AJAX request:", error);
                }
            });
        }

        // Helper function to update all totals
        function updateTotals(subtotal) {
            $('.mtext-110.cl2.subtotal_price_cart').text(`$${subtotal.toFixed(2)}`);
            $('.sub_total_price_cart').text(`$${subtotal.toFixed(2)}`);

            let discount_total = 0;

            // Check if the appliedDiscount is a percentage or fixed amount
            if (appliedDiscount > 0) {
                // If appliedDiscount is a decimal, it's a percentage (e.g., 0.5 for 50%)
                if (appliedDiscount < 1) {
                    discount_total = subtotal * appliedDiscount; // Percentage discount
                } else {
                    discount_total = parseFloat(appliedDiscount); // Fixed amount discount
                }
            }

            // Check if the cart subtotal is below the min_purchase
            if (isCouponApplied && subtotal < minPurchaseAmount) {
                // Remove the coupon since the subtotal doesn't meet the min purchase requirement
                appliedDiscount = 0;
                discount_total = 0;

                // Reset the coupon input and button

                $('#coupon_code').val('');
                $('#coupon_code').prop('disabled', false);
                $('#apply_coupon').prop('disabled', false);
                $('#remove_coupon').hide(); // Hide the remove button
                $('#coupon_description').text(''); // Clear the coupon description

                // Alert the user
                toastr.info('Your cart total is below the required minimum for the coupon. The coupon has been removed.',
                    'Coupon Removed');

                // Reset the flag
                isCouponApplied = false;

                // Update totals again to reflect no discount
                updateTotals(subtotal);
            }

            // Calculate the final total after applying the discount
            const finalTotal = subtotal - discount_total;

            // Update the final total display
            $('.total_price_cart').text(`$${finalTotal.toFixed(2)}`);
            $('.discount_total').text(`$${discount_total.toFixed(2)}`);
        }

        // // PayPal Button Integration
        // paypal.Buttons({
        //     createOrder: function(data, actions) {
        //         return actions.order.create({
        //             purchase_units: [{
        //                 amount: {
        //                     value: parseFloat($('.total_price_cart').text().replace('$',
        //                         '')) // Use the total amount from your cart
        //                 }
        //             }]
        //         });
        //     },
        //     onApprove: function(data, actions) {
        //         return actions.order.capture().then(function(details) {
        //             // Payment successful
        //             alert('Transaction completed by ' + details.payer.name.given_name);
        //             // Redirect to a success page or update the order status in your database
        //             window.location.href =
        //             "{{ route('payment.success') }}"; // Define this route in your web.php
        //         });
        //     },
        //     onCancel: function(data) {
        //         // Payment cancelled
        //         alert('Payment was cancelled.');
        //         // Handle the cancellation, maybe redirect to a specific page
        //     },
        //     onError: function(err) {
        //         // Payment error
        //         console.error('An error occurred during the transaction', err);
        //         alert('An error occurred during the transaction. Please try again.');
        //     }
        // }).render('#paypal-button-container'); // Render the PayPal button into the container
        paypal.Buttons({
            createOrder: function(data, actions) {
                if (!validateShippingInfo()) {
                    return actions.reject(); // Prevent the order from being created
                }

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: parseFloat($('.total_price_cart').text().replace('$', ''))
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Collect cart items data
                    let cartItems = [];
                    $('.table_row').each(function() {
                        let row = $(this);
                        let quantityInput = row.find('.quantity-input');

                        cartItems.push({
                            product_id: row.data('product-id'),
                            productcolor_id: row.data('productcolor-id'),
                            productsize_id: row.data('productsize-id'),
                            quantity: parseInt(quantityInput.val()),
                            base_price: parseFloat(quantityInput.data('base-price')),
                            color_additional_price: parseFloat(quantityInput.data(
                                'color-price')),
                            size_additional_price: parseFloat(quantityInput.data(
                                'size-price')),
                            discount: parseFloat(quantityInput.data('discount'))
                        });
                    });

                    // Send order data to backend
                    const orderData = {
                        shipping_address: $('input[name="state"]').val() + ', ' +
                            $('input[name="city"]').val() + ', ' +
                            $('input[name="address"]').val() + ', ' +
                            $('input[name="postcode"]').val() + ', ' +
                            $('input[name="phone"]').val(),



                        total_price: parseFloat($('.total_price_cart').text().replace('$', '')),
                        discount_amount: parseFloat($('.discount_total').text().replace('$', '')),
                        coupon_id: localStorage.getItem('appliedCouponId'),
                        cart_items: cartItems,
                        paypal_order_id: data.orderID,
                        paypal_payer_id: details.payer.payer_id
                    };

                    $.ajax({
                        url: '/process-paypal-order',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: orderData,
                        success: function(response) {
                            console.log(orderData);
                            if (response.success) {
                            
                                swal({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Order processed successfully!'
                                }).then(() => {
                                    // Delay redirect by 3 seconds after sweet alert is closed
                                    setTimeout(() => {
                                        window.location.href =
                                            '/payment-success';
                                    }, 1000);
                                });
                            } else {
                                alert('Error processing order. Please contact support.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Error processing order. Please try again.');
                        }
                    });
                });
            }
        }).render('#paypal-button-container');

        $(document).ready(function() {
            fetchShoppingCartToTable();
        });

        function validateShippingInfo() {
            const state = $('input[name="state"]').val().trim();
            const city = $('input[name="city"]').val().trim();
            const address = $('input[name="address"]').val().trim();
            const postcode = $('input[name="postcode"]').val().trim();

            if (state.length <= 2 || city.length <= 2 || address.length <= 2 || postcode.length <= 2) {
                toastr.error('Please fill out all shipping fields with more than 2 characters.',
                    'Shipping Information Required');
                return false;
            }
            return true;
        }
    </script>
@endsection
@endsection
