@extends('layouts.master-modern')
@section('content')

{{-- Hero Section Modern --}}
<section class="hero-section-modern" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); padding: 100px 0; position: relative; overflow: hidden;">
    <div class="hero-pattern" style="position: absolute; inset: 0; opacity: 0.1; background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="container-modern" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 hero-copy-modern" data-aos="fade-right">
                <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: white; margin-bottom: 24px; line-height: 1.2;">
                    اكتشف أفضل منتجات <span style="color: rgba(255,255,255,0.9);">السنس</span> في مصر
                </h1>
                <p style="font-size: clamp(1rem, 2vw, 1.25rem); color: rgba(255,255,255,0.95); margin-bottom: 32px; line-height: 1.8;">
                    منتجات أصلية، أسعار منافسة، وتوصيل سريع لجميع المحافظات
                </p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="/shop" class="btn-modern btn-modern--primary" style="background: linear-gradient(135deg, #C19A49 0%, #9d7a35 100%); color: #FFFFFF; box-shadow: 0 10px 30px rgba(193, 154, 73, 0.4); border: none;">
                        <i class="fas fa-shopping-bag"></i> تسوق الآن
                    </a>
                    <a href="#categories" class="btn-modern btn-modern--outline" style="border-color: white; color: white;">
                        <i class="fas fa-th-large"></i> التصنيفات
                    </a>
                </div>
            </div>
            <div class="col-lg-6 hero-image-modern" data-aos="fade-left" data-aos-delay="200">
                <div style="position: relative;">
                    <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; filter: blur(40px);"></div>
                    <img src="{{ asset('gallary/202609061300snusegy_ai_generated_design.png') }}" alt="منتجات سنس من متجر سنس إيجيبت" fetchpriority="high" decoding="async"
                        onerror="this.onerror=null;this.src='{{ asset('assets/images/snuslogo1.png') }}';" style="width: 100%; height: auto; border-radius: 24px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); position: relative; z-index: 2;">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="section-modern" style="padding: 80px 0; background: var(--bg-page);">
    <div class="container-modern">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; height: 100%;" class="hover-lift">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #10b981 0%, #059669 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fas fa-shipping-fast" style="font-size: 32px; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">شحن سريع</h4>
                    <p style="color: var(--text-secondary); margin: 0;">توصيل لجميع المحافظات في أقل من 48 ساعة</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; height: 100%;" class="hover-lift">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fas fa-shield-alt" style="font-size: 32px; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">منتجات أصلية</h4>
                    <p style="color: var(--text-secondary); margin: 0;">جميع المنتجات أصلية 100% ومضمونة</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; height: 100%;" class="hover-lift">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fas fa-headset" style="font-size: 32px; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">دعم 24/7</h4>
                    <p style="color: var(--text-secondary); margin: 0;">خدمة عملاء متاحة على مدار الساعة</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; height: 100%;" class="hover-lift">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fas fa-wallet" style="font-size: 32px; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary);">دفع آمن</h4>
                    <p style="color: var(--text-secondary); margin: 0;">طرق دفع متعددة وآمنة تمامًا</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Categories Section --}}
<section id="categories" class="section-modern" style="padding: 80px 0; background: var(--bg-body);">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">تسوق حسب التصنيف</h2>
            <p class="section-modern__subtitle">اكتشف مجموعتنا المتنوعة من أفضل العلامات التجارية</p>
        </div>

        <div class="category-slider-show slick-slider" data-item="4" data-itemmobile="2">
            {{-- Categories will be loaded dynamically via JavaScript --}}
        </div>
    </div>
</section>

{{-- New Arrivals Section --}}
<section class="section-modern section-modern--alt" style="padding: 80px 0;">
    <div class="container-modern">
        <div class="section-modern__header" data-aos="fade-up">
            <h2 class="section-modern__title">وصل حديثًا</h2>
            <p class="section-modern__subtitle">أحدث المنتجات المضافة إلى متجرنا</p>
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
            <h2 class="section-modern__title">المنتجات المميزة</h2>
            <p class="section-modern__subtitle">أفضل المنتجات الأكثر مبيعًا</p>
        </div>

        <div class="tab_top_sales slick-slider" data-item="4" data-itemmobile="2">
            {{-- Featured products will be loaded dynamically --}}
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
                    اشترك في نشرتنا البريدية
                </h2>
                <p style="font-size: 1.125rem; color: rgba(255,255,255,0.9); margin: 0;">
                    احصل على أحدث العروض والخصومات مباشرة في بريدك الإلكتروني
                </p>
            </div>
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                <form style="display: flex; gap: 12px;">
                    <input type="email" id="news_email" placeholder="بريدك الإلكتروني" style="flex: 1; padding: 16px 20px; border-radius: var(--radius-full); border: none; font-size: 1rem; outline: none;">
                    <button type="button" id="newsletter" class="btn-modern btn-modern--primary" style="white-space: nowrap; padding: 16px 32px;">
                        <i class="fas fa-paper-plane"></i> اشترك
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
            <img class="product-card-modern__image product-card-image" src="{{ asset('assets/images/snuslogo1.png') }}" alt="" loading="lazy" decoding="async"
                onerror="this.onerror=null;this.src='{{ asset('assets/images/snuslogo1.png') }}';">
            <div class="product-card-modern__badges badges"></div>
            <div class="product-card-modern__overlay"></div>
            <div class="product-card-modern__actions">
                <button class="product-card-modern__action-btn wishlist-icon" title="أضف للمفضلة">
                    <i class="far fa-heart"></i>
                </button>
                <button class="product-card-modern__action-btn quick-view-icon" data-toggle="modal" data-target="#quick-view-modal" title="عرض سريع">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="product-card-modern__action-btn compare-icon" title="قارن">
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

{{-- Category Slider Template --}}
<template id="category-slider-template">
    <div style="padding: 16px;">
        <a href="#" class="category-slider-url" style="display: block; text-decoration: none;">
            <div style="background: var(--bg-panel); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease;" class="hover-lift">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--bg-page); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; overflow: hidden;">
                    <img class="category-slider-image" src="" alt="" loading="lazy" decoding="async" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h5 class="category-slider-title" style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin: 0;"></h5>
            </div>
        </a>
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

        // Load categories
        categorySlider();

        // Initialize cart
        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }
        menuCart(cartSession);
    });

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
                            clone.querySelector(".product-card-name").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                            clone.querySelector(".product-card-desc").innerHTML = (data.data[i].detail[0].desc || '').substring(0, 50);
                        }

                        // Category
                        if (data.data[i].category && data.data[i].category[0] && data.data[i].category[0].category_detail && data.data[i].category[0].category_detail.detail && data.data[i].category[0].category_detail.detail[0]) {
                            clone.querySelector(".product-card-category").innerHTML = data.data[i].category[0].category_detail.detail[0].name;
                        }

                        // Price
                        if (data.data[i].product_type == 'simple') {
                            if (data.data[i].product_discount_price && data.data[i].product_discount_price != null && data.data[i].product_discount_price != '') {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].product_discount_price_symbol + ' <span style="text-decoration: line-through; font-size: 0.875rem; color: var(--text-muted);">' + data.data[i].product_price_symbol + '</span>';
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
                            clone.querySelector(".product-card-link").setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                            clone.querySelector(".product-card-link").removeAttribute('onclick');
                        }

                        $("." + appendTo).append(clone);
                    }

                    // Initialize slick slider if needed
                    if (appendTo != 'new-arrival') {
                        getSliderSettings(appendTo);
                    }
                }
            },
            error: function(data) {
                console.error('Error loading products:', data);
            },
        });
    }

    function categorySlider() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/category?getDetail=1&page=1&limit=10&getGallary=1&language_id=' + languageId + '&sortBy=category_name&sortType=DESC',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                    $(".category-slider-show").html('');
                    const templ = document.getElementById("category-slider-template");
                    if (!templ) return;

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        clone.querySelector(".category-slider-url").setAttribute('href', '/shop?category=' + data.data[i].id);
                        clone.querySelector(".category-slider-image").setAttribute('src', data.data[i].icon && data.data[i].icon != 'placeholder' ? '/gallary/' + data.data[i].icon : '{{ asset('assets/images/snuslogo1.png') }}');
                        clone.querySelector(".category-slider-title").innerHTML = data.data[i].name;
                        $(".category-slider-show").append(clone);
                    }
                    getSliderSettings("category-slider-show");
                }
            },
            error: function(data) {},
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
