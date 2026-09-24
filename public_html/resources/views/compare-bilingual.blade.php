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
                            المقارنة
                        @else
                            Compare
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Compare Content --}}
    <section class="compare-content py-5">
        <div class="container">
            {{-- Page Header --}}
            <div class="compare-header mb-4 p-4 text-center" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                <h1 class="fw-bold text-white mb-2" style="font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        مقارنة المنتجات
                    @else
                        Product Comparison
                    @endif
                </h1>
                <p class="text-white mb-0" style="opacity: 0.9;">
                    @if($data['direction'] === 'rtl')
                        قارن بين المنتجات لاختيار الأفضل
                    @else
                        Compare products to choose the best one
                    @endif
                </p>
            </div>

            {{-- Compare Grid --}}
            <div class="compare-wrapper">
                <div class="compare row g-4" id="compare-products">
                    {{-- Loading state --}}
                    <div class="col-12 text-center py-5" id="compare-loading">
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
    </section>

</div>

<template id="product-card-template">
    <div class="col-lg-6 col-xl-4">
        <div class="compare-card h-100" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); overflow: hidden; transition: all 0.3s ease;">
            {{-- Product Image --}}
            <div class="compare-image-wrapper" style="position: relative; background: var(--surface-0); padding: 2rem; text-align: center;">
                <img class="img-fluid product-card-image" style="max-height: 250px; object-fit: contain; border-radius: var(--radius-md);" src="{{ asset('assets/images/snuslogo1.png') }}" alt="Product">
                <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3 remove-compare" style="border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md);">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            {{-- Product Details --}}
            <div class="compare-details p-4">
                <h4 class="mb-3" style="color: var(--text-primary); font-weight: 600; min-height: 60px;">
                    <a href="#" class="product-card-name" style="color: var(--text-primary); text-decoration: none; transition: color 0.3s;">Product Name</a>
                </h4>

                <table class="table table-borderless mb-4">
                    <tbody>
                        <tr>
                            <td class="py-2" style="color: var(--text-secondary); font-weight: 500; width: 80px;">
                                @if($data['direction'] === 'rtl')
                                    السعر:
                                @else
                                    Price:
                                @endif
                            </td>
                            <td class="py-2 product-card-price" style="color: var(--color-primary); font-weight: 600; font-size: 1.2rem;">
                                $0.00
                            </td>
                        </tr>
                        <tr class="attribute-row" style="display: none;">
                            <td class="py-2" style="color: var(--text-secondary); font-weight: 500;" colspan="2">
                                <div class="attribute" style="font-size: 0.9rem; line-height: 1.8;"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="#" class="btn btn-primary product-card-link flex-grow-1 rounded-pill" style="background: var(--color-primary); border: none; box-shadow: var(--shadow-md);">
                        <i class="fas fa-eye me-2"></i>
                        <span class="btn-text">View Details</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .compare-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl) !important;
    }

    .product-card-name:hover {
        color: var(--color-primary) !important;
    }

    .discount-price {
        color: var(--text-secondary);
        text-decoration: line-through;
        font-size: 1rem;
        opacity: 0.7;
        margin-left: 8px;
    }

    [dir="rtl"] .discount-price {
        margin-left: 0;
        margin-right: 8px;
    }

    .remove-compare:hover {
        transform: scale(1.1);
    }

    @media (max-width: 992px) {
        .compare-card {
            margin-bottom: 1.5rem;
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
    var viewDetailText = '{{ $data["direction"] === "rtl" ? "عرض التفاصيل" : "View Details" }}';
    var priceLabel = '{{ $data["direction"] === "rtl" ? "السعر:" : "Price:" }}';
    var emptyCompareText = '{{ $data["direction"] === "rtl" ? "لا توجد منتجات للمقارنة" : "No products to compare" }}';
    var emptyCompareDesc = '{{ $data["direction"] === "rtl" ? "ابدأ بإضافة منتجات للمقارنة من صفحة المتجر" : "Start adding products from the shop page" }}';
    var errorLoadingText = '{{ $data["direction"] === "rtl" ? "حدث خطأ في تحميل المنتجات" : "Error loading products" }}';

    $(document).ready(function() {
        var url = "{{ url('') }}" + '/api/client/compare?limit=100&getCategory=1&getDetail=1&language_id=' + languageId + '&sortBy=id&sortType=DESC&topSelling=1&currency=' + localStorage.getItem("currency");
        fetchProduct(url);
    });

    function fetchProduct(url) {
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
                $('#compare-loading').show();
            },
            success: function(data) {
                $('#compare-loading').hide();

                if (data.status == 'Success' && Array.isArray(data.data)) {
                    if (data.data.length === 0) {
                        var emptyHtml = "<div class='col-12 text-center py-5'>";
                        emptyHtml += "<i class='fas fa-balance-scale' style='font-size: 64px; color: var(--color-primary); opacity: 0.3; margin-bottom: 1rem;'></i>";
                        emptyHtml += "<h4 class='fw-bold mb-2' style='color: var(--text-primary);'>" + emptyCompareText + "</h4>";
                        emptyHtml += "<p class='text-muted'>" + emptyCompareDesc + "</p>";
                        emptyHtml += "<a href='{{ url('/shop') }}' class='btn btn-primary rounded-pill px-4 mt-3' style='background: var(--color-primary); border: none;'>";
                        emptyHtml += "<i class='fas fa-shopping-bag me-2'></i>" + (languageId == 2 ? "تسوق الآن" : "Shop Now");
                        emptyHtml += "</a></div>";
                        $("#compare-products").html(emptyHtml);
                        return;
                    }

                    $("#compare-products").html('');
                    const templ = document.getElementById("product-card-template");
                    if (!templ) return;

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        const item = data.data[i] || {};
                        const product = item.products || {};
                        const details = Array.isArray(product.detail) && product.detail.length ? product.detail[0] : null;
                        const galleryDetails = product.product_gallary && Array.isArray(product.product_gallary.detail) ? product.product_gallary.detail : [];
                        const productImage = galleryDetails[1] || galleryDetails[0];

                        if (productImage && productImage.gallary_path) {
                            clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                        }
                        if (details) {
                            clone.querySelector(".product-card-image").setAttribute('alt', details.title || 'Product');
                            clone.querySelector(".product-card-name").innerHTML = details.title || 'Product';
                            clone.querySelector(".product-card-name").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                        }

                        if (data.data[i].products.product_type == 'simple') {
                            if (data.data[i].products.product_discount_price == '' || data.data[i].products.product_discount_price == null || data.data[i].products.product_discount_price == 'null') {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].products.product_price_symbol;
                            } else {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].products.product_discount_price_symbol + '<span class="discount-price">' + data.data[i].products.product_price_symbol + '</span>';
                            }
                        } else {
                            if (data.data[i].products.product_combination != null && data.data[i].products.product_combination != 'null' && data.data[i].products.product_combination != '') {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].products.product_price_symbol;

                                if (data.data[i].products.attribute != null) {
                                    var combination = '';
                                    var attribute = data.data[i].products.attribute;
                                    for (var a = 0; a < attribute.length; a++) {
                                        if (attribute[a].attributes != null) {
                                            if (attribute[a].attributes.detail != null) {
                                                combination += '<b>' + attribute[a].attributes.detail[0].name + '</b>: ';
                                            }
                                            if (attribute[a].variations != null) {
                                                for (var v = 0; v < attribute[a].variations.length; v++) {
                                                    combination += attribute[a].variations[v].product_variation.detail[0].name + ' ';
                                                }
                                            }
                                        }
                                        combination += "<br />";
                                    }
                                    clone.querySelector(".attribute").innerHTML = combination;
                                    clone.querySelector(".attribute-row").style.display = 'table-row';
                                }
                            }
                        }

                        clone.querySelector(".remove-compare").setAttribute('onclick', "removeCompare(this)");
                        clone.querySelector(".remove-compare").setAttribute('data-id', data.data[i].compare);

                        if (data.data[i].products.product_type == 'simple') {
                            clone.querySelector(".product-card-link").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i].products.product_id);
                            clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i].products.product_type);
                            clone.querySelector(".btn-text").innerHTML = addToCartText;
                            clone.querySelector(".product-card-link").querySelector('i').className = 'fas fa-shopping-cart me-2';
                        } else {
                            clone.querySelector(".product-card-link").setAttribute('href', '/product/' + data.data[i].products.product_id + '/' + data.data[i].products.product_slug);
                            clone.querySelector(".btn-text").innerHTML = viewDetailText;
                        }

                        $("#compare-products").append(clone);
                    }
                }
            },
            error: function(data) {
                $('#compare-loading').hide();
                var errorHtml = "<div class='col-12 text-center py-5'>";
                errorHtml += "<i class='fas fa-exclamation-circle' style='font-size: 64px; color: #ef4444; opacity: 0.5; margin-bottom: 1rem;'></i>";
                errorHtml += "<p class='text-muted'>" + errorLoadingText + "</p>";
                errorHtml += "</div>";
                $('#compare-products').html(errorHtml);
            },
        });
    }

    function removeCompare(input) {
        id = $(input).attr('data-id');
        var url = "{{ url('') }}" + '/api/client/compare/' + id;
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
                    toastr.success('{{ trans("response.compare-remove-success") }}');
                    var url = "{{ url('') }}" + '/api/client/compare?limit=100&getCategory=1&getDetail=1&language_id=' + languageId + '&sortBy=id&sortType=DESC&topSelling=1&currency=' + localStorage.getItem("currency");
                    fetchProduct(url);
                    getCompare();
                }
            },
            error: function(data) {},
        });
    }
</script>
@endsection
