@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Breadcrumb --}}
    <section class="breadcrumb-section py-3" style="background: var(--surface-1);">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background: transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" style="color: var(--text-secondary); text-decoration: none;">
                            <i class="fas fa-home me-1"></i>
                            @if($data['direction'] === 'rtl')
                                الرئيسية
                            @else
                                Home
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active" style="color: var(--text-primary);" aria-current="page">
                        @if($data['direction'] === 'rtl')
                            سلة التسوق
                        @else
                            Shopping Cart
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Cart Content --}}
    <section class="cart-content py-5">
        <div class="container">
            {{-- Page Header --}}
            <div class="cart-header mb-4 p-4 text-center" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                <h1 class="fw-bold text-white mb-2" style="font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        سلة التسوق
                    @else
                        Shopping Cart
                    @endif
                </h1>
                <p class="text-white mb-0" style="opacity: 0.9;">
                    @if($data['direction'] === 'rtl')
                        راجع منتجاتك وأكمل الطلب
                    @else
                        Review your items and complete checkout
                    @endif
                </p>
            </div>

            <div class="row g-4">
                {{-- Cart Items --}}
                <div class="col-12 col-lg-8">
                    <div class="cart-items-wrapper p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div id="cartItem-product-show">
                            {{-- Loading state --}}
                            <div class="text-center py-5" id="cart-loading">
                                <div class="spinner-border" style="color: var(--color-primary); width: 3rem; height: 3rem;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-3 text-muted">
                                    @if($data['direction'] === 'rtl')
                                        جاري تحميل السلة...
                                    @else
                                        Loading cart...
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Coupon and Actions --}}
                    <div class="cart-actions mt-4 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-bold mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        كود الخصم
                                    @else
                                        Coupon Code
                                    @endif
                                </label>
                                <div class="input-group">
                                    <input type="text" id="coupon_code" class="form-control" style="border: 2px solid var(--surface-3); background: var(--surface-0);" placeholder="@if($data['direction'] === 'rtl') أدخل كود الخصم @else Enter coupon code @endif">
                                    <button class="btn btn-primary" type="button" onclick="couponCartItem()" style="background: var(--color-primary); border: none;">
                                        <i class="fas fa-tag me-2"></i>
                                        @if($data['direction'] === 'rtl')
                                            تطبيق
                                        @else
                                            Apply
                                        @endif
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-end gap-2">
                                <a href="{{ url('/shop') }}" class="btn btn-outline-primary flex-grow-1 rounded-pill" style="border: 2px solid var(--color-primary); color: var(--color-primary);">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        متابعة التسوق
                                    @else
                                        Continue Shopping
                                    @endif
                                </a>
                                <button type="button" class="btn btn-secondary rounded-pill" onclick="updateCartItem()" style="background: var(--surface-3); color: var(--text-primary); border: none;">
                                    <i class="fas fa-sync-alt me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        تحديث السلة
                                    @else
                                        Update Cart
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="col-12 col-lg-4">
                    <div class="order-summary p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); position: sticky; top: 20px;">
                        <h3 class="fw-bold mb-4" style="color: var(--text-primary); font-size: 1.3rem;">
                            @if($data['direction'] === 'rtl')
                                ملخص الطلب
                            @else
                                Order Summary
                            @endif
                        </h3>
                        <div id="cartItem-grandtotal-product-show">
                            <div class="text-center py-3">
                                <div class="spinner-border spinner-border-sm" style="color: var(--color-primary);" role="status"></div>
                            </div>
                        </div>
                        <a href="{{ url('/checkout') }}" class="btn btn-primary w-100 rounded-pill mt-3 py-3" style="background: var(--color-primary); border: none; box-shadow: var(--shadow-md);">
                            <i class="fas fa-lock me-2"></i>
                            @if($data['direction'] === 'rtl')
                                إتمام الطلب
                            @else
                                Proceed to Checkout
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<input type="hidden" id="totalItems" value="0" />

<template id="cartItem-Template">
    <div class="cart-item mb-3 p-3 cartItem-row" style="background: var(--surface-0); border-radius: var(--radius-md); border: 1px solid var(--surface-3);">
        <div class="row g-3 align-items-center">
            <div class="col-3 col-md-2">
                <img class="img-fluid cartItem-image" style="border-radius: var(--radius-md); object-fit: cover; aspect-ratio: 1;" src="" alt="Product">
            </div>
            <div class="col-9 col-md-4">
                <div class="item-detail">
                    <span class="cartItem-category-name d-block text-muted mb-1" style="font-size: 0.85rem;"></span>
                    <h5 class="cartItem-name fw-bold mb-2" style="color: var(--text-primary); font-size: 1rem;"></h5>
                    <div class="item-attributes text-muted" style="font-size: 0.85rem;"></div>
                </div>
            </div>
            <div class="col-4 col-md-2 text-center">
                <div class="item-price cartItem-price fw-bold" style="color: var(--color-primary); font-size: 1.1rem;"></div>
            </div>
            <div class="col-4 col-md-2">
                <div class="quantity-controls d-flex align-items-center justify-content-center gap-2">
                    <button type="button" class="btn btn-sm quantity-left-minus cartItem-qty-2" style="width: 32px; height: 32px; border-radius: 50%; background: var(--surface-2); border: none; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-minus" style="font-size: 0.75rem; color: var(--text-primary);"></i>
                    </button>
                    <input type="text" class="form-control text-center cartItem-qty" style="width: 60px; border: 2px solid var(--surface-3); background: var(--surface-0);" readonly>
                    <button type="button" class="btn btn-sm quantity-right-plus cartItem-qty-1" style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-primary); border: none; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-plus" style="font-size: 0.75rem; color: white;"></i>
                    </button>
                </div>
            </div>
            <div class="col-3 col-md-1 text-center">
                <div class="item-total cartItem-total fw-bold" style="color: var(--text-primary); font-size: 1.1rem;"></div>
            </div>
            <div class="col-1 col-md-1 text-end">
                <button type="button" class="btn btn-sm cartItem-remove" style="color: #ef4444; background: transparent; border: none;">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<template id="cartItem-grandtotal-template">
    <div class="summary-details">
        <div class="summary-row d-flex justify-content-between align-items-center mb-3 pb-3" style="border-bottom: 1px solid var(--surface-3);">
            <span style="color: var(--text-secondary);">
                @if($data['direction'] === 'rtl')
                    المجموع الفرعي
                @else
                    Subtotal
                @endif
            </span>
            <span class="caritem-subtotal fw-bold" style="color: var(--text-primary); font-size: 1.1rem;"></span>
        </div>
        <div class="summary-row d-flex justify-content-between align-items-center mb-3 pb-3 discount-row" style="border-bottom: 1px solid var(--surface-3); display: none !important;">
            <span style="color: var(--text-secondary);">
                @if($data['direction'] === 'rtl')
                    الخصم
                @else
                    Discount
                @endif
            </span>
            <span class="caritem-discount-coupon fw-bold" style="color: #10b981; font-size: 1.1rem;"></span>
        </div>
        <div class="summary-row d-flex justify-content-between align-items-center pt-3" style="border-top: 2px solid var(--surface-3);">
            <span class="fw-bold" style="color: var(--text-primary); font-size: 1.2rem;">
                @if($data['direction'] === 'rtl')
                    الإجمالي
                @else
                    Total
                @endif
            </span>
            <span class="caritem-grandtotal fw-bold" style="color: var(--color-primary); font-size: 1.5rem;"></span>
        </div>
    </div>
</template>

<style>
    .cart-item:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--color-primary) !important;
    }

    .quantity-controls button:hover {
        transform: scale(1.1);
    }

    .cartItem-remove:hover {
        color: #dc2626 !important;
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .cart-item {
            font-size: 0.9rem;
        }

        .order-summary {
            position: static !important;
        }
    }
</style>

@endsection

@section('script')
<script>
    languageId = $.trim(localStorage.getItem("languageId"));
    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));

    $(document).ready(function() {
        if (loggedIn == '1') {
            cartItem('');
            menuCart('');
        } else {
            cartItem(cartSession);
            menuCart(cartSession);
        }
    });

    function couponCartItem() {
        coupon_code = $.trim($("#coupon_code").val());
        if (coupon_code == '') {
            toastr.error('{{ trans("coupon-code-required") }}');
            price = $(".caritem-subtotal").attr('price-symbol');
            $(".caritem-discount-coupon").html('');
            $(".discount-row").hide();
            localStorage.setItem("couponCart", '');
            $(".caritem-grandtotal").html(price);
            return;
        }

        if($.trim($("#totalItems").val()) == '0'){
            toastr.error('{{ trans("cart-is-empty") }}');
            return;
        }

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/coupon?currency='+localStorage.getItem("currency"),
            data: {
                coupon_code: coupon_code,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer ' + customerToken,
            },
            beforeSend: function() {},
            success: function(data) {
                $("#coupon_code").val(coupon_code);
                if (data.status == 'Success') {
                    if (data.data.type == 'fixed') {
                        subtotal = $(".caritem-subtotal").attr('price');
                        discount = data.data.amount * data.data.currency.exchange_rate;
                        subtotal = subtotal - discount;
                    } else {
                        subtotal = $(".caritem-subtotal").attr('price');
                        discount = (subtotal / 100) * data.data.amount;
                        subtotal = subtotal - discount;
                    }
                        if(data.data.currency != '' && data.data.currency != 'null' && data.data.currency != null){

                            if(data.data.currency.symbol_position == 'left'){
                                $(".caritem-discount-coupon").html(data.data.currency.code +''+ discount.toFixed(2));
                                $(".caritem-grandtotal").html(data.data.currency.code +''+ subtotal.toFixed(2));
                            } else {
                                $(".caritem-discount-coupon").html(discount.toFixed(2) +''+ data.data.currency.code);
                                $(".caritem-grandtotal").html(subtotal.toFixed(2) +''+ data.data.currency.code);
                            }

                            $(".caritem-discount-coupon").attr('price', discount);
                            $(".discount-row").show();
                        }


                    localStorage.setItem("couponCart", coupon_code);
                    toastr.success("{{ trans('lables.cart-coupon-applied') }}");
                } else {
                    price = $(".caritem-subtotal").attr('price-symbol');
                    $(".caritem-discount-coupon").html('');
                    $(".discount-row").hide();
                    $(".caritem-grandtotal").html(price);
                    localStorage.setItem("couponCart", '');
                    toastr.error('{{ trans("invalid-coupon") }}');
                }
            },
            error: function(data) {
                price = $(".caritem-subtotal").attr('price-symbol');
                $(".caritem-discount-coupon").html('');
                $(".discount-row").hide();
                $(".caritem-grandtotal").html(price);
                localStorage.setItem("couponCart", '');
                if (data.status == 401) {
                    toastr.error('{{ trans('response.please_login_first') }}')
                }
            },
        });
    }

    function updateCartItem() {
        len = $(".cartItem-row").length;
        for (i = 0; i < len; i++) {
            product_id = $(".cartItem-row").eq(i).attr('product_id');
            qty = $(".cartItem-row").eq(i).find('.cartItem-qty').val();

            product_type = $(".cartItem-row").eq(i).attr('product_type');
            product_combination_id = '';
            if (product_type == 'variable') {
                if ($.trim($(".cartItem-row").eq(i).attr('product_combination_id')) == '' || $.trim($(".cartItem-row")
                        .eq(i).attr('product_combination_id')) == 'null') {
                    toastr.error('{{ trans("combination-missing") }}');
                    return;
                }
                product_combination_id = $(".cartItem-row").eq(i).attr('product_combination_id');
            }

            addToCartFun(product_id, product_combination_id, cartSession, qty);
        }

        cartItem(cartSession);
        couponCart = $.trim(localStorage.getItem("couponCart"));
        if (couponCart != 'null' && couponCart != '') {
            $("#coupon_code").val(couponCart);
            couponCartItem();
        }
    }

    $(document).on('click', '.quantity-right-plus', function() {
        var row_id = $(this).attr('data-field');
        var quantity = $('#quantity' + row_id).val();
        $('#quantity' + row_id).val(parseInt(quantity) + 1);
    })

    $(document).on('click', '.quantity-left-minus', function() {
        var row_id = $(this).attr('data-field');
        var quantity = $('#quantity' + row_id).val();
        if (quantity > 1)
            $('#quantity' + row_id).val(parseInt(quantity) - 1);
    })
</script>
@endsection
