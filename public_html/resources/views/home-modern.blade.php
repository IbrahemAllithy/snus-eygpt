@extends('layouts.master-modern')
@section('content')

@php
    $isArabic = ($data['direction'] ?? 'rtl') === 'rtl';
    $sliderBanners = site_content('home.hero_slider', []);
    $mosaic = site_content('home.mosaic', []);
    $mosaicLarge = $mosaic['large'] ?? null;
    $mosaicSmall = $mosaic['items'] ?? [];
    $shopCta = site_content('home.shop_cta', 'تسوق الآن');
    $brandImages = collect(site_content('home.brand_images', []))->keyBy('slug');
    $productSlots = app(\App\Services\Web\SiteContentService::class)->productSlots();
@endphp

{{-- Hero slider: same carousel role as snusegypt.com --}}
<section class="home-hero-slider" aria-label="{{ $isArabic ? 'عروض البراندات' : 'Brand offers' }}">
    <div class="container-modern">
        <div class="hero-banner-slider">
            @foreach ($sliderBanners as $index => $banner)
                <div class="hero-banner-slide-wrap">
                    <a href="{{ site_link($banner) }}" class="hero-banner-slide" aria-label="{{ ($isArabic ? 'تسوق منتجات' : 'Shop') }} {{ $banner['title'] ?? '' }}">
                        <img
                            src="{{ site_image($banner['image'] ?? '') }}"
                            alt="{{ $banner['title'] ?? '' }}"
                            @if ($index === 0) fetchpriority="high" @else loading="lazy" @endif
                            decoding="async">
                        <span class="hero-banner-slide__cta">{{ $shopCta }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Banner mosaic: one large banner and four smaller banners, same layout as snusegypt.com --}}
<section class="home-banner-mosaic" aria-label="{{ $isArabic ? 'بانرات البراندات' : 'Brand banners' }}">
    <div class="container-modern">
        <div class="banner-mosaic">
            @if ($mosaicLarge)
            <a href="{{ site_link($mosaicLarge) }}" class="banner-mosaic__item banner-mosaic__item--large" aria-label="{{ ($isArabic ? 'تسوق منتجات' : 'Shop') }} {{ $mosaicLarge['title'] ?? '' }}">
                <img src="{{ site_image($mosaicLarge['image'] ?? '') }}" alt="{{ $mosaicLarge['title'] ?? '' }}" decoding="async">
                <span class="banner-mosaic__cta">{{ $shopCta }}</span>
            </a>
            @endif
            <div class="banner-mosaic__grid">
                @foreach ($mosaicSmall as $banner)
                    <a href="{{ site_link($banner) }}" class="banner-mosaic__item" aria-label="{{ ($isArabic ? 'تسوق منتجات' : 'Shop') }} {{ $banner['title'] ?? '' }}">
                        <img src="{{ site_image($banner['image'] ?? '') }}" alt="{{ $banner['title'] ?? '' }}" loading="lazy" decoding="async">
                        <span class="banner-mosaic__cta">{{ $shopCta }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="section-modern" style="padding: 80px 0; background: var(--bg-page);">
    <div class="container-modern">
        <div class="row g-4">
            @foreach (site_content('home.features', []) as $index => $feature)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; height: 100%;" class="hover-lift">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, {{ site_color($feature['color_from'] ?? '', '#C19A49') }} 0%, {{ site_color($feature['color_to'] ?? '', '#9d7a35') }} 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="{{ site_icon($feature['icon'] ?? '') }}" style="font-size: 32px; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">{{ $feature['title'] ?? '' }}</h4>
                    <p style="color: var(--text-secondary); margin: 0;">{{ $feature['text'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Categories Section --}}
<section id="categories" class="section-modern" style="padding: 80px 0; background: var(--bg-body);">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">{{ site_content('home.brands_title', 'تسوق حسب البراند') }}</h2>
            <p class="section-modern__subtitle">{{ site_content('home.brands_subtitle', 'اكتشف مجموعتنا المتنوعة من أفضل العلامات التجارية') }}</p>
        </div>

        <div class="category-slider-show slick-slider" data-item="4" data-itemmobile="2">
            @foreach ($data['brands'] as $brand)
                @php
                    $brandImage = optional($brand->gallary)->name;
                    $brandImage = $brandImage && $brandImage !== 'placeholder' ? $brandImage : null;
                    $mappedBrand = $brandImages->get($brand->brand_slug);
                    $mappedBrandImage = is_array($mappedBrand) ? ($mappedBrand['image'] ?? null) : null;
                    $brandImageUrl = $mappedBrandImage
                        ? site_image($mappedBrandImage)
                        : ($brandImage ? asset('gallary/'.$brandImage) : asset('assets/images/snuslogo1.png'));
                @endphp
                <div style="padding: 16px;">
                    <a href="{{ route('brand.show', $brand->brand_slug) }}" style="display: block; text-decoration: none;">
                        <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease;" class="hover-lift">
                            <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--bg-page); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; overflow: hidden;">
                                <img
                                    src="{{ $brandImageUrl }}"
                                    alt="{{ $brand->name }}"
                                    decoding="async"
                                    style="width: 100%; height: 100%; object-fit: cover;"
                                    onerror="this.onerror=null;this.src='{{ asset('assets/images/snuslogo1.png') }}';">
                            </div>
                            <h5 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin: 0;">{{ $brand->name }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- New Arrivals Section --}}
<section class="section-modern section-modern--alt" style="padding: 80px 0;">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">{{ site_content('home.new_title', 'وصل حديثًا') }}</h2>
            <p class="section-modern__subtitle">{{ site_content('home.new_subtitle', 'أحدث المنتجات المضافة إلى متجرنا') }}</p>
        </div>

        <div class="new-arrival grid-modern grid-modern--4">
            {{-- Products will be loaded dynamically via JavaScript --}}
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="section-modern" style="padding: 80px 0; background: var(--bg-body);">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">{{ site_content('home.featured_title', 'المنتجات المميزة') }}</h2>
            <p class="section-modern__subtitle">{{ site_content('home.featured_subtitle', 'أفضل المنتجات الأكثر مبيعًا') }}</p>
        </div>

        <div class="tab_top_sales slick-slider" data-item="4" data-itemmobile="2">
            {{-- Featured products will be loaded dynamically --}}
        </div>
    </div>
</section>

{{-- Reserved product spaces: filled from the dashboard, empty ones stay ready for new products --}}
<section class="section-modern section-modern--alt" style="padding: 80px 0;">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">{{ site_content('home.slots_title', 'مساحات للمنتجات الجديدة') }}</h2>
            <p class="section-modern__subtitle">{{ site_content('home.slots_subtitle', 'اختَر منتجًا من لوحة التحكم لملء المساحة بصورته وسعره، أو اتركها فارغة لمنتج لاحق') }}</p>
        </div>

        <div class="grid-modern grid-modern--4">
            @foreach ($productSlots as $slot)
                @if (! empty($slot['empty']))
                    <article class="product-slot product-slot--empty" aria-label="{{ $isArabic ? 'مساحة لمنتج جديد' : 'Space for a new product' }}">
                        <div class="product-slot__media">
                            <i class="fas fa-image" aria-hidden="true"></i>
                            <span>{{ $isArabic ? 'مساحة للصورة' : 'Image space' }}</span>
                        </div>
                        <div class="product-slot__body">
                            <strong>{{ $isArabic ? 'مساحة لمنتج جديد' : 'Space for a new product' }}</strong>
                            <p>{{ $isArabic ? 'أضف المنتج من لوحة التحكم' : 'Add the product from the dashboard' }}</p>
                        </div>
                    </article>
                @else
                    <a class="product-slot" href="{{ $slot['url'] }}">
                        <div class="product-slot__media">
                            <img src="{{ site_image($slot['image'] ?? '') }}" alt="{{ $slot['title'] }}" loading="lazy" decoding="async"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/snuslogo1.png') }}';">
                        </div>
                        <div class="product-slot__body">
                            <strong>{{ $slot['title'] }}</strong>
                            @if (! empty($slot['price']))
                                <span>{{ $slot['price'] }}</span>
                            @endif
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section style="background: linear-gradient(135deg, var(--color-secondary) 0%, #0f2238 100%); padding: 80px 0; position: relative; overflow: hidden;">
    <div class="hero-pattern" style="position: absolute; inset: 0; opacity: 0.05; background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="container-modern" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0" data-aos="fade-right">
                <h2 style="font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; color: white; margin-bottom: 16px;">
                    {{ site_content('home.newsletter_title', 'اشترك في نشرتنا البريدية') }}
                </h2>
                <p style="font-size: 1.125rem; color: rgba(255,255,255,0.9); margin: 0;">
                    {{ site_content('home.newsletter_text', 'احصل على أحدث العروض والخصومات مباشرة في بريدك الإلكتروني') }}
                </p>
            </div>
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                <form style="display: flex; gap: 12px;">
                    <input type="email" id="news_email" placeholder="{{ site_content('home.newsletter_placeholder', 'بريدك الإلكتروني') }}" style="flex: 1; padding: 16px 20px; border-radius: var(--radius-full); border: none; font-size: 1rem; outline: none;">
                    <button type="button" id="newsletter" class="btn-modern btn-modern--primary" style="white-space: nowrap; padding: 16px 32px;">
                        <i class="fas fa-paper-plane"></i> {{ site_content('home.newsletter_button', 'اشترك') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Product Card Template --}}
<template id="product-card-template">
    <div class="product-card-modern">
        <div class="product-card-modern__image-wrapper">
            <a href="#" class="product-card-image-link" aria-label="{{ $isArabic ? 'عرض تفاصيل المنتج' : 'View product details' }}">
                <img class="product-card-modern__image product-card-image" src="{{ asset('assets/images/snuslogo1.png') }}" alt="" loading="lazy" decoding="async"
                    onerror="this.onerror=null;this.src='{{ asset('assets/images/snuslogo1.png') }}';">
            </a>
            <div class="product-card-modern__badges badges"></div>
            <div class="product-card-modern__overlay"></div>
            <div class="product-card-modern__actions">
                <button class="product-card-modern__action-btn wishlist-icon" title="{{ $isArabic ? 'أضف للمفضلة' : 'Add to wishlist' }}">
                    <i class="far fa-heart"></i>
                </button>
                <button class="product-card-modern__action-btn quick-view-icon" data-toggle="modal" data-target="#quickViewModal" title="{{ $isArabic ? 'عرض سريع' : 'Quick view' }}">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="product-card-modern__action-btn compare-icon" title="{{ $isArabic ? 'قارن' : 'Compare' }}">
                    <i class="fas fa-random"></i>
                </button>
            </div>
        </div>
        <div class="product-card-modern__content">
            <div class="product-card-modern__category product-card-category"></div>
            <a href="#" class="product-card-modern__title product-card-name"></a>
            <div class="product-card-modern__rating display-rating"></div>
            <div class="product-card-modern__footer">
                <div class="product-card-modern__price-wrapper">
                    <div class="product-card-modern__price product-card-price"></div>
                </div>
                <button class="product-card-modern__add-btn product-card-link add-to-card-bag">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </div>

            <!-- Hidden elements for compatibility -->
            <div style="display: none;">
                <span class="wishlist-icon-2"></span>
                <span class="display-rating1"></span>
                <span class="product-card-desc"></span>
                <div class="item-quantity">
                    <input type="number" class="qty-input" value="1" min="1">
                    <button class="quantity-right-plus"></button>
                    <button class="quantity-left-minus"></button>
                </div>
            </div>
        </div>
    </div>
</template>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Load featured products
        var url = "{{ url('') }}" + '/api/client/products?limit=10&getCategory=1&getDetail=1&language_id=' + languageId + '&isFeatured=1&currency=' + localStorage.getItem("currency");
        fetchProduct(url, 'tab_top_sales');

        // Load new arrivals
        var url = "{{ url('') }}" + '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId + '&sortBy=id&sortType=DESC&currency=' + localStorage.getItem("currency");
        fetchProduct(url, 'new-arrival');

        // Initialize brands slider
        getSliderSettings("category-slider-show");
        initHeroBannerSlider();

        // Initialize cart
        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }
        menuCart(cartSession);
    });

    function initHeroBannerSlider() {
        var slider = jQuery('.hero-banner-slider');
        if (!slider.length || typeof slider.slick !== 'function' || slider.hasClass('slick-initialized')) {
            return;
        }

        var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        slider.slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: !reduceMotion,
            autoplaySpeed: 4500,
            speed: reduceMotion ? 0 : 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: false,
            pauseOnHover: true,
            rtl: {{ $isArabic ? 'true' : 'false' }}
        });
    }

    function reservedSlotCard() {
        return '<article class="product-card-modern product-card-modern--reserved">' +
            '<div class="product-card-modern__image-wrapper"><div class="reserved-slot"><i class="fas fa-image" aria-hidden="true"></i><span>{{ $isArabic ? 'مساحة للصورة' : 'Image space' }}</span></div></div>' +
            '<div class="product-card-modern__content"><div class="product-card-modern__category">{{ $isArabic ? 'لوحة التحكم' : 'Dashboard' }}</div><div class="product-card-modern__title">{{ $isArabic ? 'مساحة لمنتج جديد' : 'Space for a new product' }}</div></div>' +
            '</article>';
    }

    function appendReservedSlots(appendTo) {
        var slots = '';
        for (var n = 0; n < 4; n++) slots += reservedSlotCard();
        $('.' + appendTo).append(slots);
    }

    function fetchProduct(url, appendTo) {
        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                // Show skeleton loading
                if (appendTo === 'new-arrival') {
                    $('.' + appendTo).html('<div class="skeleton" style="height: 400px;"></div>'.repeat(4));
                }
            },
            success: function(data) {
                if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                    const templ = document.getElementById("product-card-template");
                    if (!templ) return;

                    $('.' + appendTo).html('');

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        const productUrl = '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug;

                        // Set product ID and actions
                        clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');
                        clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i].product_type);

                        clone.querySelector(".wishlist-icon-2").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".wishlist-icon-2").setAttribute('onclick', 'addWishlist(this)');

                        clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i].product_type);
                        clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');

                        clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i].product_id);
                        clone.querySelector(".quick-view-icon").setAttribute('data-type', data.data[i].product_type);
                        clone.querySelector(".quick-view-icon").setAttribute('onclick', 'quiclViewData(this)');

                        // Quantity controls
                        clone.querySelector(".quantity-right-plus").setAttribute('data-field', i);
                        clone.querySelector(".quantity-left-minus").setAttribute('data-field', i);
                        clone.querySelector(".qty-input").setAttribute('id', 'quantity' + i);
                        clone.querySelector(".item-quantity").classList.add('itemqty' + i);

                        // Badges
                        var badges = '';
                        if (data.data[i].discount_percentage > 0)
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--sale">-' + data.data[i].discount_percentage + '%</span>';
                        if (data.data[i].is_featured != "0")
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--featured">مميز</span>';
                        if (data.data[i].new != "0")
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--new">جديد</span>';

                        clone.querySelector(".badges").innerHTML = badges;

                        // Rating
                        var rating = '';
                        var ratingValue = parseInt(data.data[i].product_rating) || 0;
                        for (var r = 1; r <= 5; r++) {
                            if (r <= 5 - ratingValue) {
                                rating += '<i class="fas fa-star" style="color: #fbbf24;"></i>';
                            } else {
                                rating += '<i class="far fa-star" style="color: #d1d5db;"></i>';
                            }
                        }
                        clone.querySelector(".display-rating").innerHTML = rating;
                        clone.querySelector(".display-rating1").innerHTML = rating;

                        // Product image
                        if (data.data[i].product_gallary && data.data[i].product_gallary.detail) {
                            var productImage = data.data[i].product_gallary.detail[1] || data.data[i].product_gallary.detail[0];
                            if (productImage && productImage.gallary_path) {
                                clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                            }
                        }

                        // Product details
                        if (data.data[i].detail && data.data[i].detail[0]) {
                            clone.querySelector(".product-card-image").setAttribute('alt', data.data[i].detail[0].title);
                            clone.querySelector(".product-card-name").innerHTML = data.data[i].detail[0].title;
                            clone.querySelector(".product-card-name").setAttribute('href', productUrl);
                            clone.querySelector(".product-card-image-link").setAttribute('href', productUrl);
                            clone.querySelector(".product-card-image-link").setAttribute('aria-label', 'عرض ' + data.data[i].detail[0].title);
                            clone.querySelector(".product-card-desc").innerHTML = (data.data[i].detail[0].desc || '').substring(0, 50);
                        }

                        // Category
                        if (data.data[i].category && data.data[i].category[0] && data.data[i].category[0].category_detail && data.data[i].category[0].category_detail.detail && data.data[i].category[0].category_detail.detail[0]) {
                            clone.querySelector(".product-card-category").innerHTML = data.data[i].category[0].category_detail.detail[0].name;
                        }

                        // Price
                        if (data.data[i].product_type == 'simple') {
                            if (data.data[i].product_discount_price && data.data[i].product_discount_price != null && data.data[i].product_discount_price != '') {
                                clone.querySelector(".product-card-price").innerHTML = '<span class="sale-price">' + data.data[i].product_discount_price_symbol + '</span><span class="price-old">' + data.data[i].product_price_symbol + '</span>';
                            } else {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].product_price_symbol;
                            }
                        } else {
                            clone.querySelector(".product-card-price").innerHTML = data.data[i].product_variable_price_symbol;
                        }

                        // Add to cart button
                        if (data.data[i].product_type == 'simple') {
                            clone.querySelector(".product-card-link").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".product-card-link").setAttribute('data-field', i);
                            clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i].product_type);

                            clone.querySelector(".add-to-card-bag").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".add-to-card-bag").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-field', i);
                        } else {
                            clone.querySelector('.itemqty' + i).style.display = 'none';
                            clone.querySelector(".add-to-card-bag").style.display = 'none';
                            clone.querySelector(".product-card-link").innerHTML = '<i class="fas fa-eye"></i>';
                            clone.querySelector(".product-card-link").setAttribute('href', productUrl);
                            clone.querySelector(".product-card-link").removeAttribute('onclick');
                        }

                        $("." + appendTo).append(clone);
                    }
                } else {
                    $('.' + appendTo).html('');
                }

                if (appendTo === 'new-arrival') {
                    appendReservedSlots(appendTo);
                } else {
                    getSliderSettings(appendTo);
                }
            },
            error: function(data) {
                console.error('Error loading products:', data);
                if (appendTo === 'new-arrival') {
                    $('.' + appendTo).html('');
                    appendReservedSlots(appendTo);
                }
            },
        });
    }

    // Quantity controls
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
