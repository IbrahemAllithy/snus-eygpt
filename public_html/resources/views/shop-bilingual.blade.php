@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Breadcrumb --}}
    <div class="container-fluid" style="background: var(--surface-1); padding: var(--space-4) 0;">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb mb-0" style="background: transparent;">
                    <li class="breadcrumb-item">
                        <a href="./" style="color: var(--color-primary); text-decoration: none;">
                            @if($data['direction'] === 'rtl')
                                الرئيسية
                            @else
                                Home
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: var(--text-primary);">
                        @if($data['direction'] === 'rtl')
                            المتجر
                        @else
                            Shop
                        @endif
                    </li>
                </ol>
            </div>
        </nav>
    </div>

    {{-- Shop Content --}}
    <section class="shop-content py-5">
        <div class="container">
            {{-- Page Title --}}
            <div class="page-heading-title mb-5 text-center">
                <h1 class="fw-bold" style="color: var(--text-primary); font-size: clamp(2rem, 4vw, 3rem);">
                    @if($data['direction'] === 'rtl')
                        متجر المنتجات
                    @else
                        Shop Products
                    @endif
                </h1>
            </div>

            {{-- Filters & Controls Bar --}}
            <div class="top-bar mb-4 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                <div class="row align-items-center g-3">
                    {{-- Display Toggle --}}
                    <div class="col-12 col-md-auto">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            @if($data['direction'] === 'rtl')
                                العرض
                            @else
                                Display
                            @endif
                        </label>
                        <div class="buttons d-flex gap-2">
                            <a href="javascript:void(0);" id="grid_4column" class="btn btn-sm" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: var(--surface-2); border-radius: var(--radius-md); color: var(--text-primary);">
                                <i class="fas fa-th-large"></i>
                            </a>
                            <a href="javascript:void(0);" id="list_4column" class="btn btn-sm" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: var(--surface-2); border-radius: var(--radius-md); color: var(--text-primary);">
                                <i class="fas fa-list"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Category Filter --}}
                    <div class="col-12 col-md">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            @if($data['direction'] === 'rtl')
                                الفئة
                            @else
                                Category
                            @endif
                        </label>
                        <select class="form-select category-filter" name="category" style="background: var(--surface-2); border: 1px solid var(--surface-3); color: var(--text-primary); border-radius: var(--radius-md);">
                            <option value="">
                                @if($data['direction'] === 'rtl')
                                    اختر
                                @else
                                    Choose
                                @endif
                            </option>
                            @foreach ($data['category'] as $category)
                                @if (isset($_GET['category']) && $_GET['category'] == $category->id)
                                    <option selected value="{{ $category->id }}">
                                        {{ $category->detail[0]->category_name }}
                                    </option>
                                @else
                                    <option value="{{ $category->id }}">
                                        {{ $category->detail[0]->category_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Price Filter --}}
                    <div class="col-12 col-md">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            @if($data['direction'] === 'rtl')
                                السعر
                            @else
                                Price
                            @endif
                        </label>
                        <select class="form-select price-filter" name="price" style="background: var(--surface-2); border: 1px solid var(--surface-3); color: var(--text-primary); border-radius: var(--radius-md);">
                            <option value="">
                                @if($data['direction'] === 'rtl')
                                    اختر
                                @else
                                    Choose
                                @endif
                            </option>
                            @foreach ($data['price_range'] as $price_range)
                                @if (isset($_GET['price']) && $_GET['price'] == $price_range)
                                    <option selected value="{{ $price_range }}">{{ $price_range }}</option>
                                @else
                                    <option value="{{ $price_range }}">{{ $price_range }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Variation Filters --}}
                    @foreach ($data['attribute'] as $key => $attribute)
                    <div class="col-12 col-md">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            {{ $attribute->attribute_detail[0]->name }}
                        </label>
                        <input type="hidden" name="attribute[]" value="{{ $attribute->id }}" />
                        <select class="form-select variaion-filter" name="variation[]"
                                data-attribute-id="{{ $attribute->id }}"
                                data-attribute-name="{{ $attribute->attribute_detail[0]->name }}"
                                style="background: var(--surface-2); border: 1px solid var(--surface-3); color: var(--text-primary); border-radius: var(--radius-md);">
                            <option value="">
                                @if($data['direction'] === 'rtl')
                                    اختر
                                @else
                                    Choose
                                @endif
                            </option>
                            @foreach ($attribute->variation as $variation)
                                @if (isset($_GET['variation_id']) && in_array($variation->variation_detail[0]->variation_id, explode(',', $_GET['variation_id'])))
                                    <option selected value="{{ $variation->variation_detail[0]->variation_id }}"
                                            data-variation-name="{{ $variation->variation_detail[0]->name }}">
                                        {{ $variation->variation_detail[0]->name }}
                                    </option>
                                @else
                                    <option value="{{ $variation->variation_detail[0]->variation_id }}"
                                            data-variation-name="{{ $variation->variation_detail[0]->name }}">
                                        {{ $variation->variation_detail[0]->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endforeach

                    {{-- Filter Button --}}
                    <div class="col-12 col-md-auto">
                        <label class="mb-2 d-none d-md-block" style="opacity: 0;">Filter</label>
                        <button class="btn w-100" type="button" id="filter" style="background: var(--color-primary); color: white; border: none; padding: 10px 24px; border-radius: var(--radius-md); font-weight: 600;">
                            @if($data['direction'] === 'rtl')
                                تصفية
                            @else
                                Filter
                            @endif
                        </button>
                    </div>
                </div>

                {{-- Sort Options --}}
                <div class="row align-items-center g-3 mt-3 pt-3" style="border-top: 1px solid var(--surface-3);">
                    <div class="col-12 col-md-auto">
                        <span class="fw-semibold" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                ترتيب حسب:
                            @else
                                Sort By:
                            @endif
                        </span>
                    </div>

                    {{-- Sort by Price --}}
                    <div class="col-12 col-md">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            @if($data['direction'] === 'rtl')
                                السعر
                            @else
                                Price
                            @endif
                        </label>
                        <select class="form-select sortBy" style="background: var(--surface-2); border: 1px solid var(--surface-3); color: var(--text-primary); border-radius: var(--radius-md);">
                            <option value="">
                                @if($data['direction'] === 'rtl')
                                    اختر
                                @else
                                    Choose
                                @endif
                            </option>
                            <option value="low-high" data-sort-by="price" data-sort-type="asc">
                                @if($data['direction'] === 'rtl')
                                    من الأقل للأعلى
                                @else
                                    Low To High
                                @endif
                            </option>
                            <option value="high-to" data-sort-by="price" data-sort-type="desc">
                                @if($data['direction'] === 'rtl')
                                    من الأعلى للأقل
                                @else
                                    High To Low
                                @endif
                            </option>
                        </select>
                    </div>

                    {{-- Sort by Name --}}
                    <div class="col-12 col-md">
                        <label class="mb-2 fw-semibold" style="color: var(--text-primary); font-size: 14px;">
                            @if($data['direction'] === 'rtl')
                                الاسم
                            @else
                                Name
                            @endif
                        </label>
                        <select class="form-select sortBy" style="background: var(--surface-2); border: 1px solid var(--surface-3); color: var(--text-primary); border-radius: var(--radius-md);">
                            <option value="">
                                @if($data['direction'] === 'rtl')
                                    اختر
                                @else
                                    Choose
                                @endif
                            </option>
                            <option value="A-Z" data-sort-by="title" data-sort-type="asc">A-Z</option>
                            <option value="Z-A" data-sort-by="title" data-sort-type="desc">Z-A</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Products Grid --}}
            <section id="swap" class="shop-content">
                <div class="products-area">
                    @include(isset(getSetting()['card_style']) ?
                        'includes.cart.product_card_'.getSetting()['card_style'] : "includes.cart.product_card_style1")
                    <div class="row g-4 shop_page_product_card">
                        {{-- Products loaded via JavaScript --}}
                    </div>
                </div>
            </section>

            {{-- Pagination --}}
            <div class="pagination justify-content-between mt-5">
                {{-- Pagination loaded via JavaScript --}}
            </div>
        </div>
    </section>

</div>

<style>
    .variation_active {
        border: 2px solid var(--color-primary) !important;
    }

    .price-active {
        border: 2px solid var(--color-primary) !important;
    }

    .form-select:focus,
    .form-control:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
    }

    #grid_4column.active,
    #list_4column.active {
        background: var(--color-primary) !important;
        color: white !important;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        transition: all 0.3s ease;
    }
</style>

@endsection

@section('script')
<script>
    var language_id = localStorage.getItem('languageId');
    var attribute_id = [];
    var attribute = [];
    var variation_id = [];
    var variation = [];
    var sortBy = "";
    var sortType = "";
    var priceFromSidebar = "{{ isset($_GET['price']) ? $_GET['price'] : '' }}";
    var shopStyle = "{{ getSetting()['shop'] }}";

    var badgeSale = '{{ $data["direction"] === "rtl" ? "خصم" : "SALE" }}';
    var badgeFeatured = '{{ $data["direction"] === "rtl" ? "مميز" : "FEATURED" }}';
    var badgeNew = '{{ $data["direction"] === "rtl" ? "جديد" : "NEW" }}';
    var addToCartText = '{{ $data["direction"] === "rtl" ? "أضف للسلة" : "Add To Cart" }}';
    var viewDetailText = '{{ $data["direction"] === "rtl" ? "عرض التفاصيل" : "View Detail" }}';
    var showingText = '{{ $data["direction"] === "rtl" ? "عرض من" : "Showing From" }}';
    var ofText = '{{ $data["direction"] === "rtl" ? "من" : "of" }}';
    var resultsText = '{{ $data["direction"] === "rtl" ? "نتيجة" : "results" }}';
    var loadMoreText = '{{ $data["direction"] === "rtl" ? "تحميل المزيد" : "Load More" }}';
    var noMoreItemsText = '{{ $data["direction"] === "rtl" ? "لا توجد منتجات أخرى" : "No More Items" }}';

    $(document).ready(function() {
        fetchProduct(1);
        $(".variaion-filter").each(function() {
            if ($(this).val() != "") {
                attribute_id.push($(this).attr('data-attribute-id'));
                variation_id.push($(this).val());
                attribute.push($(this).attr('data-attribute-name'));
                variation.push($('option:selected', this).attr('data-variation-name'));
            }
        });
    });

    $('.sortBy').change(function() {
        sortBy = $('option:selected', this).attr('data-sort-by')
        sortType = $('option:selected', this).attr('data-sort-type')
        $(".shop_page_product_card").html('');
        fetchProduct(1);
    })

    function fetchProduct(page) {
        var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
        var category = "{{ isset($_GET['category']) ? $_GET['category'] : '' }}";
        var varations = "{{ isset($_GET['variation_id']) ? $_GET['variation_id'] : '' }}";
        var price_range = "{{ isset($_GET['price']) ? $_GET['price'] : '' }}";

        var url = "{{ url('') }}" + '/api/client/products?page=' + page + '&limit=' + limit +
            '&getDetail=1&language_id=' + language_id + '&currency=' + localStorage.getItem("currency");

        if (category != "")
            url += "&productCategories=" + category;
        if (varations != "")
            url += "&variations=" + varations;
        if (price_range != "") {
            price_range = price_range.split("-");
            url += "&price_from=" + price_range[0];
            url += "&price_to=" + price_range[1];
        }

        if (sortBy != "" && sortType != "")
            url += "&sortBy=" + sortBy + "&sortType=" + sortType;
        var searchinput = "{{ isset($_GET['search']) ? $_GET['search'] : '' }}";
        if (searchinput != "")
            url += "&searchParameter=" + searchinput;
        var appendTo = 'shop_page_product_card';
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success' && Array.isArray(data.data)) {
                    if (data.meta.last_page < page) {
                        $('.load-more-products').attr('disabled', true);
                        $('.load-more-products').html(noMoreItemsText);
                        return
                    }
                    var pagination =
                        '<label for="staticEmail" class="col-form-label">' + showingText + ' <span class="showing_record">' +
                        data.meta.to + '</span>&nbsp;' + ofText + '&nbsp;<span class="showing_total_record">' + data
                        .meta.total + '</span>&nbsp;' + resultsText + '.</label>';
                    var nextPage = parseInt(data.meta.current_page) + 1;
                    pagination += '<div class="col-12 col-sm-6">';
                    pagination += '<ol class="loader-page mt-0">';
                    pagination += '<li class="loader-page-item">';
                    pagination += '<button class="load-more-products btn btn-secondary" data-page="' +
                        nextPage + '">' + loadMoreText + '</button>';
                    pagination += '</li>';
                    pagination += '</ol>';
                    pagination += '</div>';

                    $('.pagination').html(pagination);
                    const templ = document.getElementById("product-card-template");
                    if (!templ) return;
                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        const product = data.data[i] || {};
                        const details = Array.isArray(product.detail) && product.detail.length ? product.detail[0] : null;
                        const galleryDetails = product.product_gallary && Array.isArray(product.product_gallary.detail)
                            ? product.product_gallary.detail : [];
                        const productImage = galleryDetails[1] || galleryDetails[0];
                        const categories = Array.isArray(product.category) ? product.category : [];
                        const categoryDetails = categories[0] && categories[0].category_detail && Array.isArray(categories[0].category_detail.detail)
                            ? categories[0].category_detail.detail : [];

                        clone.querySelector(".div-class").classList.add('col-12');
                        if (shopStyle.split('style')[1] == 1)
                            clone.querySelector(".div-class").classList.add('col-lg-3');
                        else
                            clone.querySelector(".div-class").classList.add('col-lg-4');
                        clone.querySelector(".div-class").classList.add('col-md-6');
                        clone.querySelector(".div-class").classList.add('griding');
                        clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i].product_type);
                        clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');

                        clone.querySelector(".wishlist-icon-2").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".wishlist-icon-2").setAttribute('data-type', data.data[i].product_type);
                        clone.querySelector(".wishlist-icon-2").setAttribute('onclick', 'addWishlist(this)');

                        clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i].product_type);
                        clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                        clone.querySelector(".quick-view-icon").setAttribute('onclick', 'quiclViewData(this)');

                        clone.querySelector(".quantity-right-plus").setAttribute('data-field', i);
                        clone.querySelector(".quantity-left-minus").setAttribute('data-field', i);
                        clone.querySelector(".qty-input").setAttribute('id', 'quantity'+i);
                        clone.querySelector(".item-quantity").classList.add('itemqty'+i);

                        if (productImage && productImage.gallary_path) {
                            clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                        }
                        if (details && details.title) {
                            clone.querySelector(".product-card-image").setAttribute('alt', details.title);
                        }
                        if (categoryDetails[0] && categoryDetails[0].name) {
                            clone.querySelector(".product-card-category").innerHTML = categoryDetails[0].name;
                        }
                        if (details) {
                            clone.querySelector(".product-card-name").innerHTML = details.title || 'Product';
                            clone.querySelector(".product-card-name").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                            var desc = typeof details.desc === 'string' ? details.desc : '';
                            clone.querySelector(".product-card-desc").innerHTML = desc.substring(0, 80);
                        }

                        if (data.data[i].product_type == 'simple') {
                            if (data.data[i].product_discount_price == '' || data.data[i].product_discount_price == null || data.data[i].product_discount_price == 'null') {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].product_price_symbol;
                            } else {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].product_discount_price_symbol + '<span>' + data.data[i].product_price_symbol + '</span>';
                            }
                        } else {
                            clone.querySelector(".product-card-price").innerHTML = data.data[i].product_variable_price_symbol;
                        }

                        var bages = '';
                        if(data.data[i].discount_percentage > 0)
                            bages +='<span class="badge badge-danger">'+data.data[i].discount_percentage+'%</span>';
                        if(data.data[i].is_featured != "0")
                            bages +='<span class="badge badge-success">' + badgeFeatured + '</span>';
                        if(data.data[i].new != "0")
                            bages +='<span class="badge badge-info">' + badgeNew + '</span>';

                        clone.querySelector(".badges").innerHTML = bages;

                        if (data.data[i].product_type == 'simple') {
                            clone.querySelector(".product-card-link").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".product-card-link").innerHTML = addToCartText;
                            clone.querySelector(".product-card-link").setAttribute('data-field', i);

                            clone.querySelector(".add-to-card-bag").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".add-to-card-bag").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-field', i);
                        } else {
                            clone.querySelector('.itemqty'+i).classList.add('d-none');
                            clone.querySelector(".add-to-card-bag").classList.add('d-none');
                            clone.querySelector(".product-card-link").classList.remove('d-g-none');
                            clone.querySelector(".product-card-link").classList.remove('listing-none');
                            clone.querySelector(".product-card-link").innerHTML = viewDetailText;
                            clone.querySelector(".product-card-link").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                        }

                        $("." + appendTo).append(clone);
                    }
                }
            },
            error: function(data) {},
        });
    }

    var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
    var shopRedirecturl = "{{ url('/shop') }}" + '?limit=' + limit;

    $('.category-filter').change(function() {
        $(this).attr('selected', true);
    })
    $('.price-filter').change(function() {
        $(this).attr('selected', true);
    })

    $('.variaion-filter').on('change', function() {
        if (attribute_id.indexOf($(this).attr('data-attribute-id')) === -1) {
            attribute_id.push($(this).attr('data-attribute-id'));
            variation_id.push($(this).val());
            attribute.push($(this).attr('data-attribute-name'));
            variation.push($('option:selected', this).attr('data-variation-name'));
        } else {
            var index = attribute_id.indexOf($(this).attr('data-attribute-id'));
            if ($(this).val() == "") {
                attribute_id.splice(index, 1);
                variation_id.splice(index, 1);
                attribute.splice(index, 1);
                variation.splice(index, 1);
            } else {
                attribute_id[index] = $(this).attr('data-attribute-id');
                variation_id[index] = $(this).val();
                attribute[index] = $(this).attr('data-attribute-name');
                variation[index] = $('option:selected', this).attr('data-variation-name');
            }
        }
    })

    $('.price-range-list').on('click', function() {
        var price_range = $(this).attr('data-price-range');
        $('.price-range-list').each(function() {
            $('.price-range-list').removeClass("price-active");
        })
        $('.price-range-list' + '-' + price_range).addClass("price-active");
        priceFromSidebar = price_range;
    });

    $('.variation_list_item').on('click', function() {
        var variation_name = $(this).attr('data-variation-name');
        var attribute_name = $(this).attr('data-attribute-name').split(' ').join('_');

        $('.attribute_' + attribute_name + '_div').each(function() {
            $('.attribute_' + attribute_name + '_div').removeClass("variation_active");
        })

        $('.' + variation_name + '-' + attribute_name).addClass("variation_active");

        if (attribute_id.indexOf($(this).attr('data-attribute-id')) === -1) {
            attribute_id.push($(this).attr('data-attribute-id'));
            attribute.push($(this).attr('data-attribute-name'));
            variation_id.push($(this).attr('data-variation-id'));
            variation.push($(this).attr('data-variation-name'));
        } else {
            var index = attribute_id.indexOf($(this).attr('data-attribute-id'));
            if ($(this).attr('data-variation-id') == "") {
                attribute_id.splice(index, 1);
                variation_id.splice(index, 1);
                attribute.splice(index, 1);
                variation.splice(index, 1);
            } else {
                attribute_id[index] = $(this).attr('data-attribute-id');
                variation_id[index] = $(this).attr('data-variation-id');
                attribute[index] = $(this).attr('data-attribute-name');
                variation[index] = $(this).attr('data-variation-name');
            }
        }
    })

    $('#filter').click(function(e) {
        e.preventDefault();
        filter();
    })

    $('.filter-from-sidebar').click(function() {
        filter();
    })

    function filter() {
        var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
        var searchinput = "{{ isset($_GET['search']) ? $_GET['search'] : '' }}";

        if ($('.category-filter').val() != "" && $('.category-filter').val() != undefined) {
            shopRedirecturl += "&category=" + $('.category-filter').val();
        }
        if ($('.price-filter').val() != "" && $('.price-filter').val() != undefined) {
            shopRedirecturl += "&price=" + $('.price-filter').val();
        } else if (priceFromSidebar != "") {
            shopRedirecturl += "&price=" + priceFromSidebar;
        }

        if (searchinput != "")
            shopRedirecturl += "&searchParameter=" + searchinput;
        if (variation_id.length > 0)
            shopRedirecturl += "&attribute=" + attribute;
        if (variation_id.length > 0)
            shopRedirecturl += "&variation=" + variation;
        if (variation_id.length > 0)
            shopRedirecturl += "&attribute_id=" + attribute_id;
        if (variation_id.length > 0)
            shopRedirecturl += "&variation_id=" + variation_id;
        window.location.href = shopRedirecturl;
    }

    $(document).on('click', '.load-more-products', function() {
        var pageToLoad = $(this).attr('data-page');
        fetchProduct(pageToLoad);
    })

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