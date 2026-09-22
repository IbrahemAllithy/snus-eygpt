@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Wishlist Content --}}
    <section class="wishlist-content py-5">
        <div class="container">
            <div class="row g-4">
                {{-- Sidebar Menu --}}
                <div class="col-12 col-lg-3">
                    <div class="account-sidebar p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div class="heading mb-4">
                            <h2 class="fw-bold" style="color: var(--text-primary); font-size: 1.5rem;">
                                @if($data['direction'] === 'rtl')
                                    حسابي
                                @else
                                    My Account
                                @endif
                            </h2>
                            <hr style="border-color: var(--surface-3); margin-top: 1rem;">
                        </div>
                        @include('includes.side-menu')
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-12 col-lg-9">
                    {{-- Wishlist Header --}}
                    <div class="wishlist-header mb-4 p-4" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <div>
                                <h2 class="fw-bold text-white mb-2" style="font-size: clamp(1.5rem, 3vw, 2rem);">
                                    @if($data['direction'] === 'rtl')
                                        قائمة الأمنيات
                                    @else
                                        Wishlist
                                    @endif
                                </h2>
                                <p class="text-white mb-0" style="opacity: 0.9;">
                                    @if($data['direction'] === 'rtl')
                                        منتجاتك المفضلة المحفوظة
                                    @else
                                        Your saved favorite products
                                    @endif
                                </p>
                            </div>
                            <div class="wishlist-count p-3 px-4" style="background: rgba(255,255,255,0.2); border-radius: var(--radius-md); backdrop-filter: blur(10px);">
                                <div class="text-white" style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 4px;">
                                    @if($data['direction'] === 'rtl')
                                        العناصر
                                    @else
                                        Items
                                    @endif
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-bold text-white" style="font-size: 1.8rem;" id="wishlist-count">0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Wishlist Products --}}
                    <div class="wishlist-wrapper p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div id="wishlist-show">
                            {{-- Loading state --}}
                            <div class="text-center py-5" id="wishlist-loading">
                                <div class="spinner-border" style="color: var(--color-primary); width: 3rem; height: 3rem;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-3 text-muted">
                                    @if($data['direction'] === 'rtl')
                                        جاري تحميل المنتجات...
                                    @else
                                        Loading products...
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<template id="wishlist-product-template">
    <div class="wishlist-product-card mb-4 p-4" style="background: var(--surface-0); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); transition: all 0.3s ease;">
        <div class="row g-3 align-items-center">
            {{-- Product Image --}}
            <div class="col-12 col-md-3">
                <div class="wishlist-image-wrapper" style="border-radius: var(--radius-md); overflow: hidden; aspect-ratio: 1; background: var(--surface-2);">
                    <img class="img-fluid w-100 h-100 wishlist-product-img" style="object-fit: cover;" src="{{ asset('assets/images/snuslogo1.png') }}" alt="Wishlist product">
                </div>
            </div>

            {{-- Product Details --}}
            <div class="col-12 col-md-6">
                <h4 class="mb-2">
                    <a href="" class="wishlist-product-name" style="color: var(--text-primary); text-decoration: none; font-weight: 600; transition: color 0.3s;">Product Name</a>
                </h4>
                <p class="wishlist-product-desc text-muted mb-3" style="font-size: 0.95rem;">Product description</p>
                <div class="wishlist-product-price mb-3" style="color: var(--color-primary); font-size: 1.3rem; font-weight: 600;">Price</div>

                {{-- Quantity Controls --}}
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="quantity-controls d-flex align-items-center" style="border: 2px solid var(--surface-3); border-radius: var(--radius-md); overflow: hidden;">
                        <button type="button" class="btn quantity-left-minus cartItem-qty-2" data-type="minus" style="border: none; background: transparent; color: var(--text-primary); padding: 8px 16px;">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="text" value="1" class="form-control cartItem-qty text-center" style="border: none; width: 60px; background: transparent; color: var(--text-primary);" readonly>
                        <button type="button" class="btn quantity-right-plus cartItem-qty-1" data-type="plus" style="border: none; background: transparent; color: var(--text-primary); padding: 8px 16px;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <button class="btn btn-primary wishlist-product-btn rounded-pill px-4" style="background: var(--color-primary); border: none; box-shadow: var(--shadow-md);">
                        <i class="fas fa-shopping-cart me-2"></i>
                        <span class="btn-text">Add to Cart</span>
                    </button>
                </div>
            </div>

            {{-- Actions --}}
            <div class="col-12 col-md-3 text-md-end">
                <button class="btn btn-outline-danger rounded-pill wishlist-remove" style="border-color: #ef4444; color: #ef4444;">
                    <i class="fas fa-trash-alt me-2"></i>
                    <span class="remove-text">Remove</span>
                </button>
            </div>
        </div>
    </div>
</template>

<style>
    .wishlist-product-card:hover {
        box-shadow: var(--shadow-md) !important;
        transform: translateY(-2px);
    }

    .wishlist-product-name:hover {
        color: var(--color-primary) !important;
    }

    .quantity-controls button:hover {
        background: var(--surface-2) !important;
    }

    .wishlist-count {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .wishlist-image-wrapper {
            max-width: 200px;
            margin: 0 auto;
        }

        .col-md-3.text-md-end {
            text-align: center !important;
        }

        .wishlist-remove {
            width: 100%;
        }
    }
</style>

@endsection

@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{ url('/') }}";
    }

    languageId = localStorage.getItem("languageId");
    if (languageId == null || languageId == 'null') {
        localStorage.setItem("languageId", '1');
        $(".language-default-name").html('English');
        localStorage.setItem("languageName", 'English');
        languageId = 1;
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    var addToCartText = '{{ $data["direction"] === "rtl" ? "أضف للسلة" : "Add to Cart" }}';
    var viewDetailText = '{{ $data["direction"] === "rtl" ? "عرض التفاصيل" : "View Detail" }}';
    var removeText = '{{ $data["direction"] === "rtl" ? "حذف" : "Remove" }}';
    var emptyWishlistText = '{{ $data["direction"] === "rtl" ? "قائمة الأمنيات فارغة" : "Your wishlist is empty" }}';
    var emptyWishlistDesc = '{{ $data["direction"] === "rtl" ? "ابدأ بإضافة منتجاتك المفضلة!" : "Start adding your favorite products!" }}';
    var errorLoadingText = '{{ $data["direction"] === "rtl" ? "حدث خطأ في تحميل المنتجات" : "Error loading products" }}';

    $(document).ready(function() {
        wishListShow();
    });

    function wishListShow() {
        var url = "{{ url('') }}" +
                '/api/client/wishlist?limit=100&getCategory=1&getDetail=1&language_id=' + languageId +
                '&sortBy=id&sortType=DESC&topSelling=1&currency='+localStorage.getItem("currency");
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#wishlist-loading').show();
            },
            success: function(data) {
                $('#wishlist-loading').hide();

                if (data.status == 'Success' && Array.isArray(data.data)) {
                    if (data.data.length === 0) {
                        var emptyHtml = "<div class='text-center py-5'>";
                        emptyHtml += "<i class='fas fa-heart' style='font-size: 64px; color: var(--color-primary); opacity: 0.3; margin-bottom: 1rem;'></i>";
                        emptyHtml += "<h4 class='fw-bold mb-2' style='color: var(--text-primary);'>" + emptyWishlistText + "</h4>";
                        emptyHtml += "<p class='text-muted'>" + emptyWishlistDesc + "</p>";
                        emptyHtml += "<a href='{{ url('/shop') }}' class='btn btn-primary rounded-pill px-4 mt-3' style='background: var(--color-primary); border: none;'>";
                        emptyHtml += "<i class='fas fa-shopping-bag me-2'></i>" + (languageId == 2 ? "تسوق الآن" : "Shop Now");
                        emptyHtml += "</a></div>";
                        $("#wishlist-show").html(emptyHtml);
                        $('#wishlist-count').text('0');
                        return;
                    }

                    $("#wishlist-show").html('');
                    $('#wishlist-count').text(data.data.length);

                    const templ = document.getElementById("wishlist-product-template");
                    if (!templ) return;

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        const item = data.data[i] || {};
                        const product = item.products || {};
                        const details = Array.isArray(product.detail) && product.detail.length ? product.detail[0] : null;
                        const galleryDetails = product.product_gallary && Array.isArray(product.product_gallary.detail)
                            ? product.product_gallary.detail : [];
                        const productImage = galleryDetails[2] || galleryDetails[1] || galleryDetails[0];

                        if (productImage && productImage.gallary_path) {
                            clone.querySelector(".wishlist-product-img").setAttribute('src', productImage.gallary_path);
                        }
                        if (details) {
                            clone.querySelector(".wishlist-product-img").setAttribute('alt', details.title || 'Wishlist product');
                            clone.querySelector(".wishlist-product-name").innerHTML = details.title || 'Product';
                            clone.querySelector(".wishlist-product-name").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].products.product_slug);
                            clone.querySelector(".wishlist-product-desc").innerHTML = details.desc || '';
                        }

                        if (data.data[i].products.product_type == 'simple') {
                            if (data.data[i].products.product_discount_price == '' || data.data[i].products.product_discount_price == null || data.data[i].products.product_discount_price == 'null') {
                                clone.querySelector(".wishlist-product-price").innerHTML = data.data[i].products.product_price_symbol;
                            } else {
                                clone.querySelector(".wishlist-product-price").innerHTML = '<span style="text-decoration: line-through; opacity: 0.6; font-size: 1rem; margin-right: 8px;">' + data.data[i].products.product_price_symbol + '</span>' + data.data[i].products.product_discount_price_symbol;
                            }
                        } else {
                            if (data.data[i].products.product_combination != null && data.data[i].products.product_combination != 'null' && data.data[i].products.product_combination != '') {
                                clone.querySelector(".wishlist-product-price").innerHTML = data.data[i].products.product_combination[0].product_price_symbol;
                            }
                        }

                        if (data.data[i].products.product_type == 'simple') {
                            clone.querySelector(".wishlist-product-btn").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-id', data.data[i].products.product_id);
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-type', data.data[i].products.product_type);
                            clone.querySelector(".btn-text").innerHTML = addToCartText;
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-field', i);
                        } else {
                            clone.querySelector(".wishlist-product-btn").setAttribute('href', '/product/' + data.data[i].products.product_id + '/' + data.data[i].products.product_slug);
                            clone.querySelector(".wishlist-product-btn").setAttribute('onclick', '');
                            clone.querySelector(".btn-text").innerHTML = viewDetailText;
                            clone.querySelector(".wishlist-product-btn").querySelector('i').className = 'fas fa-eye me-2';
                        }

                        clone.querySelector(".cartItem-qty").setAttribute('id', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-1").setAttribute('value', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-2").setAttribute('value', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-1").setAttribute('data-field', i);
                        clone.querySelector(".cartItem-qty-2").setAttribute('data-field', i);
                        clone.querySelector(".wishlist-remove").setAttribute('onclick', "removeWishlist(this)");
                        clone.querySelector(".wishlist-remove").setAttribute('data-id', data.data[i].wishlist);
                        clone.querySelector(".remove-text").innerHTML = removeText;

                        $("#wishlist-show").append(clone);
                    }
                }
            },
            error: function(data) {
                $('#wishlist-loading').hide();
                var errorHtml = "<div class='text-center py-5'>";
                errorHtml += "<i class='fas fa-exclamation-circle' style='font-size: 64px; color: #ef4444; opacity: 0.5; margin-bottom: 1rem;'></i>";
                errorHtml += "<p class='text-muted'>" + errorLoadingText + "</p>";
                errorHtml += "</div>";
                $('#wishlist-show').html(errorHtml);
            },
        });
    }

    function removeWishlist(input){
        id = $(input).attr('data-id');
        var url = "{{ url('') }}" + '/api/client/wishlist/'+id;
        $.ajax({
            type: 'delete',
            url: url,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    toastr.success('{{ trans("lables.wishlist-remove") }}');
                    wishListShow();
                    getWishlist();
                }
            },
            error: function(data) {},
        });
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
