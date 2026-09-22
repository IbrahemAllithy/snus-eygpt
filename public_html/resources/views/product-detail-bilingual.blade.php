@extends('layouts.master')
@section('content')
    <style>
        .variation_active {
            border: 2px solid var(--color-primary);
            background: var(--color-primary-glow);
        }

        .price-active {
            border: 2px solid var(--color-primary);
            background: var(--color-primary-glow);
        }

        /* Product Detail Modern Styles */
        .product-detail-modern {
            padding: var(--space-10) 0;
        }

        .product-detail-breadcrumb {
            background: var(--bg-elevated);
            padding: var(--space-4) 0;
            margin-bottom: var(--space-8);
        }

        .breadcrumb-modern {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: var(--text-sm);
        }

        .breadcrumb-modern li {
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .breadcrumb-modern a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color var(--transition-base);
        }

        .breadcrumb-modern a:hover {
            color: var(--color-primary);
        }

        .breadcrumb-modern .active {
            color: var(--text-primary);
            font-weight: 600;
        }

        .breadcrumb-separator {
            color: var(--text-muted);
        }

        /* Product Image Gallery */
        .product-gallery-modern {
            position: sticky;
            top: var(--space-6);
        }

        .product-main-image {
            background: var(--bg-page);
            border-radius: var(--radius-xl);
            overflow: hidden;
            aspect-ratio: 1;
            margin-bottom: var(--space-4);
        }

        .product-main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-thumbnails {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: var(--space-3);
        }

        .product-thumbnail {
            background: var(--bg-page);
            border-radius: var(--radius-lg);
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all var(--transition-base);
        }

        .product-thumbnail:hover,
        .product-thumbnail.active {
            border-color: var(--color-primary);
        }

        .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Product Info */
        .product-info-modern {
            display: flex;
            flex-direction: column;
            gap: var(--space-6);
        }

        .product-badges-modern {
            display: flex;
            gap: var(--space-2);
            flex-wrap: wrap;
        }

        .product-title-modern {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.2;
            margin: 0;
        }

        .product-price-modern {
            display: flex;
            align-items: baseline;
            gap: var(--space-3);
        }

        .product-price-current {
            font-size: clamp(1.75rem, 5vw, 2.5rem);
            font-weight: 800;
            color: var(--color-primary);
        }

        .product-price-old {
            font-size: var(--text-xl);
            color: var(--text-tertiary);
            text-decoration: line-through;
        }

        .product-rating-modern {
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .product-stars-large {
            display: flex;
            gap: var(--space-1);
            color: var(--color-warning);
            font-size: var(--text-lg);
        }

        .product-review-count {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            transition: color var(--transition-base);
        }

        .product-review-count:hover {
            color: var(--color-primary);
        }

        .product-meta-modern {
            display: flex;
            flex-direction: column;
            gap: var(--space-2);
            padding: var(--space-4);
            background: var(--bg-page);
            border-radius: var(--radius-lg);
        }

        .product-meta-item {
            display: flex;
            gap: var(--space-2);
            font-size: var(--text-sm);
        }

        .product-meta-label {
            font-weight: 600;
            color: var(--text-secondary);
        }

        .product-meta-value {
            color: var(--text-primary);
        }

        /* Product Options */
        .product-options-modern {
            display: flex;
            flex-direction: column;
            gap: var(--space-5);
        }

        .product-option-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }

        .product-option-label {
            font-size: var(--text-sm);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-primary);
        }

        .product-variations {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-2);
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .product-variations li {
            padding: var(--space-2) var(--space-4);
            background: var(--bg-elevated);
            border: 2px solid rgba(0, 0, 0, 0.08);
            border-radius: var(--radius-full);
            cursor: pointer;
            transition: all var(--transition-base);
            font-size: var(--text-sm);
            font-weight: 600;
        }

        .product-variations li:hover {
            border-color: var(--color-primary);
            background: var(--color-primary-glow);
        }

        .product-variations li.active {
            border-color: var(--color-primary);
            background: var(--color-primary-glow);
            color: var(--color-primary);
        }

        /* Quantity & Add to Cart */
        .product-actions-modern {
            display: flex;
            gap: var(--space-4);
            align-items: stretch;
        }

        .quantity-selector-modern {
            display: flex;
            align-items: center;
            background: var(--bg-elevated);
            border: 2px solid rgba(0, 0, 0, 0.08);
            border-radius: var(--radius-full);
            overflow: hidden;
        }

        .quantity-btn {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: var(--text-primary);
            cursor: pointer;
            transition: all var(--transition-base);
        }

        .quantity-btn:hover {
            background: var(--color-primary);
            color: white;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: none;
            background: transparent;
            font-size: var(--text-base);
            font-weight: 700;
            color: var(--text-primary);
        }

        .add-to-cart-modern {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            padding: var(--space-3) var(--space-6);
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            color: white;
            border: none;
            border-radius: var(--radius-full);
            font-size: var(--text-base);
            font-weight: 700;
            cursor: pointer;
            transition: all var(--transition-base);
            box-shadow: 0 4px 12px rgba(193, 154, 73, 0.3);
        }

        .add-to-cart-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(193, 154, 73, 0.4);
        }

        /* Sub Actions */
        .product-sub-actions {
            display: flex;
            gap: var(--space-4);
            flex-wrap: wrap;
        }

        .product-action-link {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            font-weight: 600;
            transition: color var(--transition-base);
        }

        .product-action-link:hover {
            color: var(--color-primary);
        }

        .product-action-link i {
            font-size: 1.1em;
        }

        /* Product Tabs */
        .product-tabs-modern {
            margin-top: var(--space-8);
        }

        .nav-tabs-modern {
            display: flex;
            gap: var(--space-2);
            border-bottom: 2px solid rgba(0, 0, 0, 0.06);
            padding: 0;
            margin: 0 0 var(--space-6) 0;
            list-style: none;
        }

        .nav-tabs-modern .nav-link {
            padding: var(--space-3) var(--space-5);
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-base);
            margin-bottom: -2px;
        }

        .nav-tabs-modern .nav-link:hover {
            color: var(--color-primary);
        }

        .nav-tabs-modern .nav-link.active {
            color: var(--color-primary);
            border-bottom-color: var(--color-primary);
        }

        .tab-content-modern {
            padding: var(--space-6);
            background: var(--bg-elevated);
            border-radius: var(--radius-xl);
        }

        .product-description-content {
            color: var(--text-primary);
            line-height: 1.8;
        }

        /* Reviews Section */
        .reviews-section {
            display: flex;
            flex-direction: column;
            gap: var(--space-6);
        }

        .review-item-modern {
            padding: var(--space-5);
            background: var(--bg-page);
            border-radius: var(--radius-lg);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: var(--space-3);
        }

        .review-author {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--space-1);
        }

        .review-date {
            font-size: var(--text-sm);
            color: var(--text-tertiary);
        }

        .review-content {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Rating Stars */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: var(--space-2);
        }

        .rating-stars ul > li.star {
            display: inline-block;
            cursor: pointer;
        }

        .rating-stars ul > li.star > i.fa {
            font-size: 1.5em;
            color: #ccc;
            transition: color var(--transition-base);
        }

        .rating-stars ul > li.star.hover > i.fa {
            color: var(--color-warning);
        }

        .rating-stars ul > li.star.selected > i.fa {
            color: var(--color-warning);
        }

        /* RTL Support */
        [dir="rtl"] .breadcrumb-modern {
            flex-direction: row-reverse;
        }

        [dir="rtl"] .product-price-modern,
        [dir="rtl"] .product-rating-modern,
        [dir="rtl"] .product-sub-actions {
            flex-direction: row-reverse;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .product-gallery-modern {
                position: relative;
                top: auto;
                margin-bottom: var(--space-8);
            }
        }

        @media (max-width: 768px) {
            .product-actions-modern {
                flex-direction: column;
            }

            .nav-tabs-modern {
                overflow-x: auto;
                flex-wrap: nowrap;
            }
        }
    </style>

    <!-- Breadcrumb -->
    <div class="product-detail-breadcrumb">
        <div class="container">
            <ol class="breadcrumb-modern">
                <li>
                    <a href="{{ url('/') }}">
                        @if($data['direction'] === 'rtl')
                            الرئيسية
                        @else
                            Home
                        @endif
                    </a>
                    <span class="breadcrumb-separator">/</span>
                </li>
                <li class="active">
                    @if($data['direction'] === 'rtl')
                        تفاصيل المنتج
                    @else
                        Product Details
                    @endif
                </li>
            </ol>
        </div>
    </div>

    <!-- Product Detail Section -->
    <section class="product-detail-modern">
        <div class="container">
            <div class="page-heading-title" style="margin-bottom: var(--space-8);">
                <h2>
                    @if($data['direction'] === 'rtl')
                        تفاصيل المنتج
                    @else
                        Product Details
                    @endif
                </h2>
            </div>
        </div>

        <section class="product-page"></section>

        @include('includes.productdetail.related-product-section')
    </section>

    <input type="hidden" id="product_id" value="{{ $product }}" />

@endsection

@section('script')
    <script>
        var attribute_id = [];
        var attribute = [];
        var variation_id = [];
        var variation = [];
        $(document).ready(function() {
            fetchProduct();
            fetchRelatedProduct();
        });

        languageId = localStorage.getItem("languageId");
        if (languageId == null || languageId == 'null') {
            localStorage.setItem("languageId", '1');
            $(".language-default-name").html('English');
            localStorage.setItem("languageName", 'English');
            languageId = 1;
        }

        customerToken = $.trim(localStorage.getItem("customerToken"));

        function fetchProduct() {
            var url = "{{ url('') }}" + '/api/client/products/' + "{{ $product }}" +
                '?getCategory=1&getDetail=1&language_id=' + languageId + '&currency=' + localStorage.getItem("currency");
            var appendTo = 'product-page';
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
                    if (data.status == 'Success' && data.data) {
                        $('#meta-description').attr('content', data.data.seo_desc);
                        $('#meta-title').attr('content', data.data.product_slug);
                        $('#meta-keyword').attr('content', data.data.seo_meta_tag);
                        const templ = document.getElementById("product-detail-section");
                        if (!templ) return;

                        const clone = templ.content.cloneNode(true);
                        const details = Array.isArray(data.data.detail) && data.data.detail.length ? data.data.detail[0] : null;
                        const galleryDetails = Array.isArray(data.data.product_gallary_detail) ? data.data.product_gallary_detail : [];
                        const fallbackImage = '{{ asset('assets/images/snuslogo1.png') }}';

                        clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data.product_id);
                        clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');
                        clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data.product_type);
                        clone.querySelector(".compare-icon").setAttribute('data-id', data.data.product_id);
                        clone.querySelector(".compare-icon").setAttribute('data-type', data.data.product_type);
                        clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                        clone.querySelector(".product-detail-section-product-id").innerHTML = data.data.product_id;

                        clone.querySelector(".add-to-cart").setAttribute('onclick', 'addToCart(this)');
                        clone.querySelector(".add-to-cart").setAttribute('data-id', data.data.product_id);
                        clone.querySelector(".add-to-cart").setAttribute('data-type', data.data.product_type);

                        var image_list_link = "";
                        var image_list = "";
                        if (data.data.product_video_url != null && data.data.product_video_url != 'null' && data.data.product_video_url != "") {
                            image_list_link += '<a href="test" class="slider-for__item ex1 fancybox-button" data-fancybox-group="fancybox-button" title="' + (details ? details.title : 'Product') + '">' + data.data.product_video_url + '</a>';
                            image_list += '<div class="slider-nav__item"><img class="product-detail-section-image" style="width: 130px;height: 121px;" src="/images/viedo_thumbnail.png" alt="Zoom Image"/></div>';
                        }

                        if (galleryDetails.length) {
                            for (var g = 0; g < galleryDetails.length; g++) {
                                image_list_link += '<a class="slider-for__item ex1 fancybox-button" href="/gallary/large' + galleryDetails[g].gallary_name + '" data-fancybox-group="fancybox-button" title="' + (details ? details.title : 'Product') + '"><img class="product-detail-section-image" src="/gallary/large' + galleryDetails[g].gallary_name + '" alt="Zoom Image" /></a>';
                                image_list += '<div class="slider-nav__item"><img class="product-detail-section-image" src="/gallary/thumbnail' + galleryDetails[g].gallary_name + '" alt="Zoom Image"/></div>';
                            }

                            if (data.data.product_combination) {
                                for (loop = 0; loop < data.data.product_combination.length; loop++) {
                                    if (data.data.product_combination[loop].gallary != null) {
                                        image_list_link += '<a class="slider-for__item ex1 fancybox-button" href="/gallary/large' + data.data.product_combination[loop].gallary.gallary_name + '" data-fancybox-group="fancybox-button" title="' + data.data.detail[0].title + '"><img class="product-detail-section-image" src="/gallary/large' + data.data.product_combination[loop].gallary.gallary_name + '" alt="Zoom Image" /></a>';
                                        image_list += '<div class="slider-nav__item"><img class="product-detail-section-image" src="/gallary/thumbnail' + data.data.product_combination[loop].gallary.gallary_name + '" alt="Zoom Image" id="image-' + data.data.product_combination[loop].product_combination_id + '"/></div>';
                                    }
                                }
                            }
                        }

                        if (!image_list_link) {
                            image_list_link = '<div class="slider-for__item"><img class="product-detail-section-image" src="' + fallbackImage + '" alt="' + (details ? details.title : 'Product') + '"></div>';
                            image_list = '<div class="slider-nav__item"><img class="product-detail-section-image" src="' + fallbackImage + '" alt="Product preview"></div>';
                        }

                        clone.querySelector(".slider-for").innerHTML = image_list_link;
                        clone.querySelector(".slider-nav").innerHTML = image_list;

                        if (Array.isArray(data.data.category) && data.data.category[0]) {
                            if (data.data.category[0].category_detail != null) {
                                if (Array.isArray(data.data.category[0].category_detail.detail) && data.data.category[0].category_detail.detail[0]) {
                                    clone.querySelector(".product-detail-section-cateogory-link").setAttribute('href', "/shop?limit=12&category="+data.data.category[0].category_detail.detail[0].category_id);
                                    clone.querySelector(".product-detail-section-cateogory-link").innerHTML = data.data.category[0].category_detail.detail[0].name;
                                }
                            }
                        }

                        var bages = '';
                        if(data.data.discount_percentage > 0)
                            bages +='<span class="product-badge product-badge-sale">-'+data.data.discount_percentage+'%</span>';
                        if(data.data.detail[0].is_featured != "0")
                            bages +='<span class="product-badge product-badge-featured">Featured</span>';
                        if(data.data.detail[0].new != "0")
                            bages +='<span class="product-badge product-badge-new">New</span>';

                        clone.querySelector(".product-tags").innerHTML = bages;

                        if (details) {
                            clone.querySelector(".pro-title").innerHTML = details.title || 'Product';
                            clone.querySelector(".description").innerHTML = details.desc || '';
                        }

                        if (data.data.product_type == 'simple') {
                            if (data.data.product_discount_price == '' || data.data.product_discount_price == null || data.data.product_discount_price == 'null') {
                                clone.querySelector(".product-card-price").innerHTML = data.data.product_price_symbol;
                            } else {
                                clone.querySelector(".product-card-price").innerHTML = data.data.product_discount_price_symbol + '<span>' + data.data.product_price_symbol + '</span>';
                            }
                        } else {
                            if (data.data.product_combination != null) {
                                clone.querySelector(".product-card-price").innerHTML = data.data.product_combination[0].product_price_symbol;
                            }
                            if (data.data.attribute != null) {
                                var combination = '';
                                var attribute = data.data.attribute
                                for (var a = 0; a < attribute.length; a++) {
                                    if (attribute[a].attributes != null) {
                                        if (attribute[a].attributes.detail != null) {
                                            combination += '<div class="product-option-group">';
                                            combination += '<div class="product-option-label">' + attribute[a].attributes.detail[0].name + '</div>';
                                        }
                                        combination += '<ul class="product-variations">';
                                        if (attribute[a].variations != null) {
                                            for (var v = 0; v < attribute[a].variations.length; v++) {
                                                combination += '<li class="variation_list_item attribute_' + attribute[a].attributes.detail[0].name.split(' ').join('_') + '_div  ' + attribute[a].variations[v].product_variation.detail[0].name + '-' + attribute[a].attributes.detail[0].name.split(' ').join('_') + '" data-attribute-id="' + attribute[a].attributes.attribute_id + '" data-attribute-name="' + attribute[a].attributes.detail[0].name + '" data-variation-id="' + attribute[a].variations[v].product_variation.id + '" data-variation-name="' + attribute[a].variations[v].product_variation.detail[0].name + '">' + attribute[a].variations[v].product_variation.detail[0].name + '</li>';
                                            }
                                        }
                                        combination += '</ul></div>';
                                    }
                                    clone.querySelector(".pro-options").innerHTML = combination;
                                }
                            }
                        }

                        if (data.data.reviews !== null) {
                            clone.querySelector(".review-count").innerHTML = data.data.reviews.length + " Reviews";
                            rating = '';
                            sum = 0;
                            for (review = 0; review < data.data.reviews.length; review++) {
                                sum = +sum + +data.data.reviews[review].rating;
                            }
                            cur_rating = (sum / data.data.reviews.length);
                            cur_rating = Math.round(cur_rating);
                            if (cur_rating == 1) {
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            } else if (cur_rating == 2) {
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            } else if (cur_rating == 3) {
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            } else if (cur_rating == 4) {
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            } else if (cur_rating == 5) {
                                rating = '<label class="full fa active" for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            } else {
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa " for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            clone.querySelector(".display-rating").innerHTML = rating;
                        }

                        $(".product-page").append(clone);
                        getProductReview();
                        slideInital();
                    }
                },
                error: function(data) {},
            });
        }

        $(document).on('click', '.variation_list_item', function() {
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

            var url = "{{ url('') }}" + '/api/client/products/{{ $product }}?getCategory=1&getDetail=1&language_id=' + languageId + '&currency=' + localStorage.getItem("currency");
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
                    if (data.status == 'Success') {
                        for (i = 0; i < data.data.product_combination.length; i++) {
                            p = 0;
                            product_combination_id = price = gallary = '';
                            variation_array = new Array();
                            for (k = 0; k < data.data.product_combination[i].combination.length; k++) {
                                variation_array[p] = data.data.product_combination[i].combination[k].variation_id;
                                ++p;
                            }
                            if (areEqual(variation_array,variation_id)) {
                                product_combination_id = data.data.product_combination[i].product_combination_id;
                                $("#product_combination_id").val(product_combination_id);
                                price = data.data.product_combination[i].product_price_symbol;
                                $(".product-card-price").html(price);

                                if (data.data.product_combination[i].gallary != null) {
                                    gallary = data.data.product_combination[i].gallary.gallary_name;
                                    $("#image-" + data.data.product_combination[i].product_combination_id).trigger('click');
                                }
                                return;
                            }
                        }
                    }
                },
                error: function(data) {},
            });
        })

        function fetchRelatedProduct() {
            var url = "{{ url('') }}" + '/api/client/products?limit=10&getDetail=1&language_id=' + languageId + '&currency=' + localStorage.getItem("currency");
            var appendTo = 'related';
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
                        const templ = document.getElementById("product-card-template");
                        if (!templ) return;
                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            const product = data.data[i] || {};
                            const details = Array.isArray(product.detail) && product.detail.length ? product.detail[0] : null;
                            const galleryDetails = product.product_gallary && Array.isArray(product.product_gallary.detail) ? product.product_gallary.detail : [];
                            const productImage = galleryDetails[1] || galleryDetails[0];

                            clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');
                            clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                            clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".quick-view-icon").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".quick-view-icon").setAttribute('onclick', 'quiclViewData(this)');

                            if (productImage && productImage.gallary_path) {
                                clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                            }
                            if (details) {
                                clone.querySelector(".product-card-image").setAttribute('alt', details.title || 'Product');
                            }
                            if (Array.isArray(product.category) && product.category[0]) {
                                if (product.category[0].category_detail != null) {
                                    if (Array.isArray(product.category[0].category_detail.detail) && product.category[0].category_detail.detail[0]) {
                                        clone.querySelector(".product-card-category").innerHTML = data.data[i].category[0].category_detail.detail[0].name;
                                    }
                                }
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
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i].product_price_symbol + '<span>' + data.data[i].product_discount_price_symbol + '</span>';
                                }
                            } else {
                                if (Array.isArray(product.product_combination) && product.product_combination[0]) {
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i].product_combination[0].product_price_symbol;
                                }
                            }

                            clone.querySelector(".product-card-link").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                            $("." + appendTo).append(clone);
                        }
                        getSliderSettings(appendTo);
                    }
                },
                error: function(data) {},
            });
        }

        function productReview() {
            rating = $('#selected_rating').val();
            comment = $("#comment").val();
            title = $("#title").val();
            if (rating == '') {
                toastr.error('Please select rating');
                return;
            }

            var url = "{{ url('') }}" + '/api/client/review?product_id={{ $product }}&comment=' + comment + '&rating=' + rating + '&title=' + title;
            $.ajax({
                type: 'post',
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
                        toastr.success('Rating saved successfully');
                        $("#comment").val('');
                        $("#title").val('');
                        getProductReview();
                    }
                },
                error: function(data) {
                    if (data.status == 422) {
                        jQuery.each(data.responseJSON.errors, function(index, item) {
                            $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                            $("#" + index).parent().find('.invalid-feedback').html(item);
                        });
                    } else if (data.status == 417) {
                        toastr.error('Review not placed');
                    } else if (data.status == 401) {
                        toastr.error('Please login first');
                    }
                },
            });
        }

        function getProductReview() {
            var url = "{{ url('') }}" + '/api/client/review?product_id={{ $product }}';
            $.ajax({
                type: 'get',
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
                        const temp2 = document.getElementById("review-rating-template");
                        $("#review-rating-show").html('');
                        for (review = 0; review < data.data.length; review++) {
                            const clone1 = temp2.content.cloneNode(true);
                            clone1.querySelector(".review-comment").innerHTML = data.data[review].comment;
                            clone1.querySelector(".review-date").innerHTML = data.data[review].date;
                            clone1.querySelector(".review-title").innerHTML = data.data[review].title;
                            if (data.data[review].rating == '5') {
                                clone1.querySelector(".review-rating5").setAttribute('checked', true);
                            } else if (data.data[review].rating == '4') {
                                clone1.querySelector(".review-rating4").setAttribute('checked', true);
                            } else if (data.data[review].rating == '3') {
                                clone1.querySelector(".review-rating3").setAttribute('checked', true);
                            } else if (data.data[review].rating == '2') {
                                clone1.querySelector(".review-rating2").setAttribute('checked', true);
                            } else if (data.data[review].rating == '1') {
                                clone1.querySelector(".review-rating1").setAttribute('checked', true);
                            }
                            $("#review-rating-show").append(clone1);
                        }
                    }
                },
                error: function(data) {},
            });
        }

        function slideInital() {
            jQuery('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                infinite: false,
                draggable: false,
                fade: true,
                asNavFor: '.slider-nav',
                reinit: true
            });
            jQuery('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                centerMode: true,
                centerPadding: '60px',
                dots: false,
                arrows: true,
                focusOnSelect: true,
                reinit: true
            });

            jQuery('.slider-for-vertical').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                infinite: false,
                draggable: false,
                fade: true,
                asNavFor: '.slider-nav-vertical'
            });
            jQuery('.slider-nav-vertical').slick({
                dots: false,
                arrows: true,
                vertical: true,
                asNavFor: '.slider-for-vertical',
                slidesToShow: 3,
                slidesToScroll: 1,
                verticalSwiping: true,
                focusOnSelect: true
            });

            jQuery(function() {
                jQuery('.ex1').zoom();
            });
        }

        $(document).on('click', '#stars li', function() {
            var onStar = parseInt($(this).data('value'), 10);
            $('#selected_rating').val(onStar);
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
        })

        function areEqual(arr1, arr2) {
            let n = arr1.length;
            let m = arr2.length;
            if (n != m) return false;
            arr1.sort();
            arr2.sort();
            for (let i = 0; i < n; i++)
                if (arr1[i] != arr2[i])
                    return false;
            return true;
        }
    </script>

    {{-- Product Detail Template --}}
    <template id="product-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="product-gallery-modern">
                        <div class="product-main-image">
                            <div class="slider-for"></div>
                        </div>
                        <div class="product-thumbnails">
                            <div class="slider-nav"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="product-info-modern">
                        <div class="product-badges-modern product-tags"></div>

                        <h1 class="product-title-modern pro-title"></h1>

                        <div class="product-price-modern product-card-price"></div>

                        <div class="product-rating-modern">
                            <div class="product-stars-large">
                                <fieldset class="disabled-ratings overall-rating display-rating"></fieldset>
                            </div>
                            <a href="#review" class="product-review-count review-count"></a>
                        </div>

                        <div class="product-meta-modern">
                            <div class="product-meta-item">
                                <span class="product-meta-label">
                                    @if($data['direction'] === 'rtl')
                                        رقم المنتج:
                                    @else
                                        Product ID:
                                    @endif
                                </span>
                                <span class="product-meta-value product-detail-section-product-id"></span>
                            </div>
                            <div class="product-meta-item">
                                <span class="product-meta-label">
                                    @if($data['direction'] === 'rtl')
                                        التصنيف:
                                    @else
                                        Category:
                                    @endif
                                </span>
                                <a href="javascript:void(0)" class="product-meta-value product-detail-section-cateogory-link"></a>
                            </div>
                            <input type="hidden" id="product_combination_id" />
                        </div>

                        <div class="product-options-modern pro-options"></div>

                        <div class="product-actions-modern">
                            <div class="quantity-selector-modern">
                                <button type="button" class="quantity-btn quantity-minus" data-type="minus">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" id="quantity-input" name="quantity" class="quantity-input" value="1">
                                <button type="button" class="quantity-btn quantity-plus" data-type="plus">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <button type="button" class="add-to-cart-modern add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                @if($data['direction'] === 'rtl')
                                    أضف للسلة
                                @else
                                    Add to Cart
                                @endif
                            </button>
                        </div>

                        <div class="product-sub-actions">
                            <a href="javascript:void(0)" class="product-action-link wishlist-icon">
                                <i class="fas fa-heart"></i>
                                @if($data['direction'] === 'rtl')
                                    أضف للمفضلة
                                @else
                                    Add to Wishlist
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="product-action-link compare-icon">
                                <i class="fas fa-align-right"></i>
                                @if($data['direction'] === 'rtl')
                                    أضف للمقارنة
                                @else
                                    Add to Compare
                                @endif
                            </a>
                        </div>

                        <div class="product-tabs-modern">
                            <ul class="nav-tabs-modern" role="tablist">
                                <a class="nav-link active" href="#description" data-toggle="pill" role="tab">
                                    @if($data['direction'] === 'rtl')
                                        الوصف
                                    @else
                                        Description
                                    @endif
                                </a>
                                <a class="nav-link" href="#review" data-toggle="pill" role="tab">
                                    @if($data['direction'] === 'rtl')
                                        التقييمات
                                    @else
                                        Reviews
                                    @endif
                                </a>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="description">
                                    <div class="tab-content-modern">
                                        <div class="product-description-content description"></div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="review">
                                    <div class="tab-content-modern">
                                        <div class="reviews-section">
                                            <div id="review-rating-show"></div>

                                            <div class="card-modern">
                                                <div class="card-modern-header">
                                                    <h3>
                                                        @if($data['direction'] === 'rtl')
                                                            أضف تقييمك
                                                        @else
                                                            Add Your Review
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="card-modern-body">
                                                    <div class="rating-stars">
                                                        <ul id="stars">
                                                            <li class="star" data-value="1"><i class="fa fa-star fa-fw"></i></li>
                                                            <li class="star" data-value="2"><i class="fa fa-star fa-fw"></i></li>
                                                            <li class="star" data-value="3"><i class="fa fa-star fa-fw"></i></li>
                                                            <li class="star" data-value="4"><i class="fa fa-star fa-fw"></i></li>
                                                            <li class="star" data-value="5"><i class="fa fa-star fa-fw"></i></li>
                                                        </ul>
                                                    </div>
                                                    <input type="hidden" id="selected_rating" value="">

                                                    <div class="form-group" style="margin-top: var(--space-4);">
                                                        <label>
                                                            @if($data['direction'] === 'rtl')
                                                                العنوان
                                                            @else
                                                                Title
                                                            @endif
                                                        </label>
                                                        <input type="text" id="title" class="input-modern" placeholder="@if($data['direction'] === 'rtl') عنوان التقييم @else Review title @endif">
                                                    </div>

                                                    <div class="form-group" style="margin-top: var(--space-4);">
                                                        <label>
                                                            @if($data['direction'] === 'rtl')
                                                                التعليق
                                                            @else
                                                                Comment
                                                            @endif
                                                        </label>
                                                        <textarea id="comment" class="input-modern" rows="4" placeholder="@if($data['direction'] === 'rtl') اكتب تعليقك هنا @else Write your comment here @endif"></textarea>
                                                    </div>

                                                    <button type="button" class="btn-modern btn-modern-primary" onclick="productReview()" style="margin-top: var(--space-4);">
                                                        @if($data['direction'] === 'rtl')
                                                            إرسال التقييم
                                                        @else
                                                            Submit Review
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    {{-- Review Template --}}
    <template id="review-rating-template">
        <div class="review-item-modern">
            <div class="review-header">
                <div>
                    <div class="review-author review-title"></div>
                    <div class="review-date"></div>
                </div>
                <div class="product-stars-large">
                    <fieldset class="disabled-ratings">
                        <input type="radio" id="star5" class="review-rating5" name="rating" value="5" disabled />
                        <label class="full" for="star5"></label>
                        <input type="radio" id="star4" class="review-rating4" name="rating" value="4" disabled />
                        <label class="full" for="star4"></label>
                        <input type="radio" id="star3" class="review-rating3" name="rating" value="3" disabled />
                        <label class="full" for="star3"></label>
                        <input type="radio" id="star2" class="review-rating2" name="rating" value="2" disabled />
                        <label class="full" for="star2"></label>
                        <input type="radio" id="star1" class="review-rating1" name="rating" value="1" disabled />
                        <label class="full" for="star1"></label>
                    </fieldset>
                </div>
            </div>
            <div class="review-content review-comment"></div>
        </div>
    </template>

@endsection
