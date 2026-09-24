@extends('layouts.master')
@section('content')

<style>
/* Modern Cart Page Styles */
.cart-modern {
    padding: var(--space-10) 0;
    min-height: 60vh;
}

.breadcrumb-modern {
    background: transparent;
    padding: var(--space-6) 0;
    margin: 0;
}

.breadcrumb-modern .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-modern .breadcrumb-item {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.breadcrumb-modern .breadcrumb-item a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-modern .breadcrumb-item a:hover {
    color: var(--color-primary);
}

.breadcrumb-modern .breadcrumb-item.active {
    color: var(--text-primary);
}

.page-title-modern {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-8);
    letter-spacing: -0.02em;
}

.cart-table-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    margin-bottom: var(--space-6);
}

.cart-item-modern {
    display: grid;
    grid-template-columns: 100px 1fr auto auto auto;
    gap: var(--space-4);
    padding: var(--space-5);
    border-bottom: 1px solid var(--surface-2);
    align-items: center;
}

.cart-item-modern:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 100px;
    height: 100px;
    border-radius: var(--radius-md);
    object-fit: cover;
}

.cart-item-details {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.cart-item-category {
    font-size: 0.75rem;
    color: var(--text-tertiary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.cart-item-name {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.cart-item-attributes {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.cart-item-remove {
    background: transparent;
    border: none;
    color: var(--color-error);
    cursor: pointer;
    padding: var(--space-2);
    border-radius: var(--radius-md);
    transition: all 0.2s;
}

.cart-item-remove:hover {
    background: var(--color-error-light);
    transform: scale(1.1);
}

.cart-item-price {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-primary);
}

.quantity-control-modern {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    background: var(--surface-2);
    border-radius: var(--radius-full);
    padding: var(--space-1);
}

.quantity-control-modern input {
    width: 60px;
    text-align: center;
    border: none;
    background: transparent;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 1rem;
}

.quantity-control-modern button {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    border: none;
    background: var(--surface-3);
    color: var(--text-primary);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.quantity-control-modern button:hover {
    background: var(--color-primary);
    color: white;
    transform: scale(1.1);
}

.cart-item-total {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--text-primary);
}

.cart-actions-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: var(--space-8);
}

.coupon-input-modern {
    display: flex;
    gap: var(--space-2);
    flex: 1;
    max-width: 400px;
}

.coupon-input-modern input {
    flex: 1;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    background: var(--surface-1);
    color: var(--text-primary);
    font-size: 0.9375rem;
}

.coupon-input-modern input:focus {
    outline: none;
    border-color: var(--color-primary);
}

.coupon-input-modern button {
    padding: var(--space-3) var(--space-6);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.coupon-input-modern button:hover {
    background: var(--color-primary-dark);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.cart-update-actions {
    display: flex;
    gap: var(--space-3);
}

.btn-modern {
    padding: var(--space-3) var(--space-6);
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 0.9375rem;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-block;
}

.btn-modern-primary {
    background: var(--color-primary);
    color: white;
    border: 2px solid var(--color-primary);
}

.btn-modern-primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.btn-modern-outline {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--surface-3);
}

.btn-modern-outline:hover {
    background: var(--surface-2);
    border-color: var(--text-primary);
}

.cart-summary-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
    position: sticky;
    top: 100px;
}

.summary-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
    letter-spacing: -0.01em;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-4) 0;
    border-bottom: 1px solid var(--surface-2);
}

.summary-row:last-child {
    border-bottom: none;
}

.summary-label {
    font-size: 1rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.summary-value {
    font-size: 1rem;
    color: var(--text-primary);
    font-weight: 700;
}

.summary-total {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-primary);
}

.checkout-button-modern {
    width: 100%;
    padding: var(--space-4);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1.125rem;
    font-weight: 700;
    cursor: pointer;
    margin-top: var(--space-6);
    transition: all 0.2s;
}

.checkout-button-modern:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.empty-cart-modern {
    text-align: center;
    padding: var(--space-16) var(--space-4);
}

.empty-cart-icon {
    font-size: 4rem;
    color: var(--text-tertiary);
    margin-bottom: var(--space-4);
}

.empty-cart-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-2);
}

.empty-cart-text {
    font-size: 1rem;
    color: var(--text-secondary);
    margin-bottom: var(--space-6);
}

/* RTL Support */
[dir="rtl"] .cart-item-modern {
    direction: rtl;
}

[dir="rtl"] .cart-actions-modern {
    flex-direction: row-reverse;
}

[dir="rtl"] .cart-update-actions {
    flex-direction: row-reverse;
}

/* Responsive */
@media (max-width: 992px) {
    .cart-item-modern {
        grid-template-columns: 80px 1fr;
        gap: var(--space-3);
    }

    .cart-item-price,
    .cart-item-total {
        grid-column: 1 / -1;
        text-align: start;
    }

    .quantity-control-modern {
        grid-column: 1 / -1;
    }

    .cart-summary-modern {
        position: static;
        margin-top: var(--space-6);
    }

    .cart-actions-modern {
        flex-direction: column;
    }

    .coupon-input-modern {
        max-width: 100%;
    }

    .cart-update-actions {
        width: 100%;
        flex-direction: column;
    }

    .btn-modern {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .cart-item-modern {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .cart-item-image {
        margin: 0 auto;
    }

    .cart-item-details {
        align-items: center;
    }

    .quantity-control-modern {
        justify-content: center;
    }
}
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-modern">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        @if($data['direction'] === 'rtl')
                            الرئيسية
                        @else
                            Home
                        @endif
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if($data['direction'] === 'rtl')
                        سلة التسوق
                    @else
                        Shopping Cart
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Cart Content -->
<section class="cart-modern">
    <div class="container">
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                سلة التسوق
            @else
                Shopping Cart
            @endif
        </h1>

        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Cart Items Table -->
                <div class="cart-table-modern" id="cartItem-product-show">
                    <!-- Cart items will be dynamically inserted here -->
                </div>

                <!-- Cart Actions -->
                <div class="cart-actions-modern">
                    <div class="coupon-input-modern">
                        <input
                            type="text"
                            id="coupon_code"
                            class="form-control"
                            placeholder="@if($data['direction'] === 'rtl')كود الخصم@else{{ trans('lables.cart-page-apply') }}@endif"
                        >
                        <button type="button" onclick="couponCartItem()">
                            @if($data['direction'] === 'rtl')
                                تطبيق
                            @else
                                Apply
                            @endif
                        </button>
                    </div>

                    <div class="cart-update-actions">
                        <a href="{{ url('/shop') }}" class="btn-modern btn-modern-outline">
                            @if($data['direction'] === 'rtl')
                                متابعة التسوق
                            @else
                                {{ trans('lables.cart-page-continue-shopping') }}
                            @endif
                        </a>
                        <button type="button" class="btn-modern btn-modern-primary" onclick="updateCartItem()">
                            @if($data['direction'] === 'rtl')
                                تحديث السلة
                            @else
                                {{ trans('lables.cart-page-update-cart') }}
                            @endif
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <!-- Cart Summary -->
                <div class="cart-summary-modern" id="cartItem-grandtotal-product-show">
                    <!-- Summary will be dynamically inserted here -->
                </div>

                <a href="{{ url('/checkout') }}">
                    <button class="checkout-button-modern">
                        @if($data['direction'] === 'rtl')
                            إتمام الطلب
                        @else
                            {{ trans('lables.cart-page-proceed-to-checkout') }}
                        @endif
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Cart Item Template -->
<template id="cartItem-Template">
    <div class="cart-item-modern cartItem-row">
        <img class="cart-item-image cartItem-image" src="" alt="Product">

        <div class="cart-item-details">
            <span class="cart-item-category cartItem-category-name"></span>
            <h4 class="cart-item-name cartItem-name"></h4>
            <div class="cart-item-attributes item-attributes"></div>
            <button type="button" class="cart-item-remove cartItem-remove">
                <i class="fas fa-times"></i>
                @if($data['direction'] === 'rtl')
                    حذف
                @else
                    Remove
                @endif
            </button>
        </div>

        <div class="cart-item-price cartItem-price"></div>

        <div class="quantity-control-modern">
            <button type="button" class="quantity-left-minus cartItem-qty-2" data-type="minus">
                <i class="fas fa-minus"></i>
            </button>
            <input type="text" class="cartItem-qty" value="1" readonly>
            <button type="button" class="quantity-right-plus cartItem-qty-1" data-type="plus">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <div class="cart-item-total cartItem-total"></div>
    </div>
</template>

<!-- Cart Summary Template -->
<template id="cartItem-grandtotal-template">
    <h3 class="summary-title">
        @if($data['direction'] === 'rtl')
            ملخص الطلب
        @else
            {{ trans('lables.cart-page-order-summary') }}
        @endif
    </h3>

    <div class="summary-row">
        <span class="summary-label">
            @if($data['direction'] === 'rtl')
                المجموع الفرعي
            @else
                {{ trans('lables.cart-page-subtotal') }}
            @endif
        </span>
        <span class="summary-value caritem-subtotal"></span>
    </div>

    <div class="summary-row">
        <span class="summary-label">
            @if($data['direction'] === 'rtl')
                الخصم
            @else
                {{ trans('lables.cart-page-discount') }}
            @endif
        </span>
        <span class="summary-value caritem-discount-coupon"></span>
    </div>

    <div class="summary-row">
        <span class="summary-label">
            @if($data['direction'] === 'rtl')
                الإجمالي
            @else
                {{ trans('lables.cart-page-total') }}
            @endif
        </span>
        <span class="summary-total caritem-grandtotal"></span>
    </div>
</template>

<input type="hidden" id="totalItems" value="0" />

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
            menuCart(cartSession)
        }
    });

    function couponCartItem() {
        coupon_code = $.trim($("#coupon_code").val());
        if (coupon_code == '') {
            toastr.error('{{ trans("coupon-code-required") }}');
            price = $(".caritem-subtotal").attr('price-symbol');
            $(".caritem-discount-coupon").html('');
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

                        }


                    localStorage.setItem("couponCart", coupon_code);
                    toastr.success("{{ trans('lables.cart-coupon-applied') }}");
                } else {
                    price = $(".caritem-subtotal").attr('price-symbol');
                    $(".caritem-discount-coupon").html('');
                    $(".caritem-grandtotal").html(price);
                    localStorage.setItem("couponCart", '');
                    toastr.error('{{ trans("invalid-coupon") }}');
                }
            },
            error: function(data) {
                price = $(".caritem-subtotal").attr('price-symbol');
                $(".caritem-discount-coupon").html('');
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
        var $row = $(this).closest('.cartItem-row');
        var $input = $row.find('.cartItem-qty');
        var quantity = parseInt($input.val());
        $input.val(quantity + 1);
    })

    $(document).on('click', '.quantity-left-minus', function() {
        var $row = $(this).closest('.cartItem-row');
        var $input = $row.find('.cartItem-qty');
        var quantity = parseInt($input.val());
        if (quantity > 1) {
            $input.val(quantity - 1);
        }
    })
</script>
@endsection