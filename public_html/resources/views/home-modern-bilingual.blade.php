@extends('layouts.master')

@section('title')
{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Home' }}
@endsection

@section('css')
<style>
    /* Hero Section Modern */
    .hero-section-modern {
        position: relative;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: var(--space-16) var(--space-4);
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        overflow: hidden;
    }

    .hero-section-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.4;
    }

    .hero-section-modern__content {
        position: relative;
        z-index: 1;
        max-width: 800px;
    }

    .hero-section-modern h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: var(--surface-0);
        margin: 0 0 var(--space-6) 0;
        line-height: 1.2;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-section-modern h1 span {
        color: var(--surface-0);
        border-bottom: 4px solid var(--surface-0);
        padding-bottom: var(--space-1);
    }

    .hero-section-modern p {
        font-size: clamp(1.125rem, 2vw, 1.375rem);
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 var(--space-8) 0;
        line-height: 1.6;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: var(--space-2);
        padding: var(--space-5) var(--space-10);
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--color-primary);
        background: var(--surface-0);
        border: 3px solid var(--surface-0);
        border-radius: 999px;
        text-decoration: none;
        transition: all 0.3s;
        box-shadow: var(--shadow-xl);
    }

    .btn-hero:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        color: var(--color-primary);
    }

    /* Features Section */
    .features-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--space-6);
        margin: var(--space-12) 0;
    }

    .feature-card-modern {
        background: var(--surface-1);
        border-radius: var(--radius-lg);
        padding: var(--space-8);
        text-align: center;
        border: 2px solid var(--surface-2);
        transition: all 0.3s;
    }

    .feature-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
        border-color: var(--color-primary-light);
    }

    .feature-card-modern__icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--space-4);
    }

    .feature-card-modern__icon i {
        font-size: 1.75rem;
        color: var(--surface-0);
    }

    .feature-card-modern h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 var(--space-2) 0;
    }

    .feature-card-modern p {
        font-size: 0.9375rem;
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
    }

    /* Section Header */
    .section-header-modern {
        text-align: center;
        margin-bottom: var(--space-10);
    }

    .section-header-modern h2 {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 var(--space-3) 0;
    }

    .section-header-modern p {
        font-size: 1.125rem;
        color: var(--text-secondary);
        margin: 0;
    }

    /* Product Grid */
    .products-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: var(--space-6);
        margin-bottom: var(--space-12);
    }

    /* Newsletter CTA */
    .newsletter-cta {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        border-radius: var(--radius-xl);
        padding: var(--space-12);
        text-align: center;
        margin: var(--space-16) 0;
        position: relative;
        overflow: hidden;
    }

    .newsletter-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .newsletter-cta__content {
        position: relative;
        z-index: 1;
        max-width: 600px;
        margin: 0 auto;
    }

    .newsletter-cta h3 {
        font-size: clamp(1.75rem, 3vw, 2.25rem);
        font-weight: 800;
        color: var(--surface-0);
        margin: 0 0 var(--space-3) 0;
    }

    .newsletter-cta p {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 var(--space-6) 0;
    }

    .newsletter-form {
        display: flex;
        gap: var(--space-3);
        max-width: 500px;
        margin: 0 auto;
    }

    .newsletter-form input {
        flex: 1;
        padding: var(--space-4) var(--space-5);
        font-size: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.15);
        color: var(--surface-0);
        backdrop-filter: blur(10px);
    }

    .newsletter-form input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .newsletter-form input:focus {
        outline: none;
        border-color: var(--surface-0);
        background: rgba(255, 255, 255, 0.25);
    }

    .newsletter-form button {
        padding: var(--space-4) var(--space-8);
        font-size: 1rem;
        font-weight: 700;
        color: var(--color-primary);
        background: var(--surface-0);
        border: 2px solid var(--surface-0);
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.3s;
        white-space: nowrap;
    }

    .newsletter-form button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* RTL Support */
    [dir="rtl"] .hero-section-modern h1,
    [dir="rtl"] .hero-section-modern p {
        text-align: center;
    }

    [dir="rtl"] .newsletter-form {
        flex-direction: row;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section-modern {
            min-height: 400px;
            padding: var(--space-12) var(--space-4);
        }

        .features-grid-modern {
            grid-template-columns: 1fr;
            gap: var(--space-4);
        }

        .products-grid-modern {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: var(--space-4);
        }

        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-form button {
            width: 100%;
        }
    }

    .hover-lift:hover {
        transform: translateY(-5px);
    }
</style>
@endsection

@section('content')
{{-- Hero Section Modern --}}
<section class="hero-section-modern">
    <div class="hero-section-modern__content">
        <h1>
            @if($data['direction'] === 'rtl')
                اكتشف أفضل منتجات <span>السنس</span> في مصر
            @else
                Discover the Best <span>Snus</span> Products in Egypt
            @endif
        </h1>
        <p>
            @if($data['direction'] === 'rtl')
                منتجات أصلية بأفضل الأسعار مع شحن سريع وآمن
            @else
                Authentic Products at Best Prices with Fast & Secure Shipping
            @endif
        </p>
        <a href="/shop" class="btn-hero">
            <i class="fas fa-shopping-bag"></i>
            <span>
                @if($data['direction'] === 'rtl')
                    تسوق الآن
                @else
                    Shop Now
                @endif
            </span>
        </a>
    </div>
</section>

{{-- Features Section --}}
<section class="section-modern">
    <div class="container">
        <div class="features-grid-modern">
            <div class="feature-card-modern">
                <div class="feature-card-modern__icon">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <h4>
                    @if($data['direction'] === 'rtl')
                        شحن سريع
                    @else
                        Fast Shipping
                    @endif
                </h4>
                <p>
                    @if($data['direction'] === 'rtl')
                        توصيل سريع لجميع أنحاء مصر
                    @else
                        Quick delivery all over Egypt
                    @endif
                </p>
            </div>

            <div class="feature-card-modern">
                <div class="feature-card-modern__icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h4>
                    @if($data['direction'] === 'rtl')
                        منتجات أصلية
                    @else
                        Authentic Products
                    @endif
                </h4>
                <p>
                    @if($data['direction'] === 'rtl')
                        ضمان الجودة والأصالة 100%
                    @else
                        100% Quality and Authenticity Guaranteed
                    @endif
                </p>
            </div>

            <div class="feature-card-modern">
                <div class="feature-card-modern__icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>
                    @if($data['direction'] === 'rtl')
                        دعم 24/7
                    @else
                        24/7 Support
                    @endif
                </h4>
                <p>
                    @if($data['direction'] === 'rtl')
                        فريق دعم متواجد دائماً لخدمتك
                    @else
                        Support team always available for you
                    @endif
                </p>
            </div>

            <div class="feature-card-modern">
                <div class="feature-card-modern__icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h4>
                    @if($data['direction'] === 'rtl')
                        دفع آمن
                    @else
                        Secure Payment
                    @endif
                </h4>
                <p>
                    @if($data['direction'] === 'rtl')
                        معاملات آمنة ومشفرة
                    @else
                        Safe and encrypted transactions
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Categories Section --}}
<section class="section-modern" style="background: var(--surface-1); padding: var(--space-16) 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    تصفح حسب الفئة
                @else
                    Browse by Category
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    اكتشف مجموعة واسعة من المنتجات
                @else
                    Discover a wide range of products
                @endif
            </p>
        </div>
        <div class="category-slider-show"></div>
    </div>
</section>

{{-- New Arrivals Section --}}
<section class="section-modern">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    وصل حديثاً
                @else
                    New Arrivals
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    أحدث المنتجات المضافة
                @else
                    Latest products added to our store
                @endif
            </p>
        </div>
        <div class="products-grid-modern new-arrival"></div>
    </div>
</section>

{{-- Featured Products Section --}}
<section class="section-modern" style="background: var(--surface-1); padding: var(--space-16) 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    منتجات مميزة
                @else
                    Featured Products
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    منتجات مختارة بعناية من أجلك
                @else
                    Carefully selected products for you
                @endif
            </p>
        </div>
        <div class="tab_top_sales"></div>
    </div>
</section>

{{-- Newsletter CTA --}}
<section class="section-modern">
    <div class="container">
        <div class="newsletter-cta">
            <div class="newsletter-cta__content">
                <h3>
                    @if($data['direction'] === 'rtl')
                        اشترك في نشرتنا الإخبارية
                    @else
                        Subscribe to Our Newsletter
                    @endif
                </h3>
                <p>
                    @if($data['direction'] === 'rtl')
                        احصل على أحدث العروض والمنتجات الجديدة
                    @else
                        Get latest offers and new products
                    @endif
                </p>
                <form class="newsletter-form" onsubmit="return false;">
                    <input
                        type="email"
                        placeholder="@if($data['direction'] === 'rtl')أدخل بريدك الإلكتروني@else Enter your email @endif"
                        required>
                    <button type="submit">
                        @if($data['direction'] === 'rtl')
                            اشترك
                        @else
                            Subscribe
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Product Card Template --}}
<template id="product-card-template">
    <div class="product-card-modern">
        <div class="product-card-modern__badges badges"></div>

        <div class="product-card-modern__image">
            <img class="product-card-image" src="" alt="">
            <div class="product-card-modern__actions">
                <button class="product-card-modern__action wishlist-icon" title="@if($data['direction'] === 'rtl')إضافة للمفضلة@else Add to Wishlist @endif">
                    <i class="far fa-heart"></i>
                </button>
                <button class="product-card-modern__action compare-icon" title="@if($data['direction'] === 'rtl')إضافة للمقارنة@else Add to Compare @endif">
                    <i class="fas fa-exchange-alt"></i>
                </button>
                <button class="product-card-modern__action quick-view-icon" title="@if($data['direction'] === 'rtl')عرض سريع@else Quick View @endif">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="product-card-modern__content">
            <div class="product-card-modern__category product-card-category"></div>
            <a href="#" class="product-card-modern__title product-card-name"></a>
            <p class="product-card-modern__desc product-card-desc"></p>

            <div class="product-card-modern__rating display-rating"></div>

            <div class="product-card-modern__footer">
                <div class="product-card-modern__price product-card-price"></div>
                <div class="product-card-modern__cart">
                    <div class="quantity-controls item-quantity" style="display: flex; align-items: center; gap: var(--space-2);">
                        <button class="quantity-left-minus" style="width: 32px; height: 32px; border-radius: 50%; background: var(--surface-2); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-minus" style="font-size: 0.75rem; color: var(--text-primary);"></i>
                        </button>
                        <input type="number" class="qty-input" value="1" min="1" style="width: 50px; text-align: center; border: 2px solid var(--surface-2); border-radius: var(--radius-md); padding: var(--space-2); font-weight: 600;">
                        <button class="quantity-right-plus" style="width: 32px; height: 32px; border-radius: 50%; background: var(--surface-2); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-plus" style="font-size: 0.75rem; color: var(--text-primary);"></i>
                        </button>
                    </div>
                    <button class="btn-modern btn-modern--primary btn-modern--sm add-to-card-bag" style="border-radius: 999px; padding: var(--space-3) var(--space-5);">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card-modern__hover">
            <div class="product-card-modern__hover-content">
                <h5 class="product-card-name" style="font-size: 1.125rem; font-weight: 700; color: var(--surface-0); margin: 0 0 var(--space-2) 0;"></h5>
                <div class="display-rating1" style="margin-bottom: var(--space-3);"></div>
                <div class="product-card-price" style="font-size: 1.5rem; font-weight: 800; color: var(--surface-0); margin-bottom: var(--space-4);"></div>
                <div style="display: flex; gap: var(--space-2); justify-content: center;">
                    <button class="wishlist-icon-2" style="width: 44px; height: 44px; border-radius: 50%; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                        <i class="far fa-heart" style="color: var(--surface-0); font-size: 1.125rem;"></i>
                    </button>
                    <a href="#" class="product-card-link" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: var(--space-2); padding: var(--space-3) var(--space-6); background: var(--surface-0); color: var(--color-primary); border: none; border-radius: 999px; font-weight: 700; text-decoration: none; cursor: pointer; transition: all 0.3s;">
                        <i class="fas fa-shopping-cart"></i>
                        <span>@if($data['direction'] === 'rtl')أضف للسلة@else Add to Cart @endif</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

{{-- Category Slider Template --}}
<template id="category-slider-template">
    <div style="padding: 16px;">
        <a href="#" class="category-slider-url" style="display: block; text-decoration: none;">
            <div style="background: var(--surface-0); border-radius: var(--radius-xl); padding: 32px; text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border: 2px solid var(--surface-2);" class="hover-lift">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--surface-1); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; overflow: hidden; border: 3px solid var(--color-primary-light);">
                    <img class="category-slider-image" src="" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h5 class="category-slider-title" style="font-size: 1.125rem; font-weight: 700; color: var(--text-primary); margin: 0;"></h5>
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
                        var badgeSale = '@if($data["direction"] === "rtl")خصم@else SALE @endif';
                        var badgeFeatured = '@if($data["direction"] === "rtl")مميز@else FEATURED @endif';
                        var badgeNew = '@if($data["direction"] === "rtl")جديد@else NEW @endif';

                        if (data.data[i].discount_percentage > 0)
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--sale">-' + data.data[i].discount_percentage + '%</span>';
                        if (data.data[i].is_featured != "0")
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--featured">' + badgeFeatured + '</span>';
                        if (data.data[i].new != "0")
                            badges += '<span class="product-card-modern__badge product-card-modern__badge--new">' + badgeNew + '</span>';

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
                            clone.querySelectorAll(".product-card-name").forEach(function(el) {
                                el.innerHTML = data.data[i].detail[0].title;
                                if (el.tagName === 'A') {
                                    el.setAttribute('href', '/product/' + data.data[i].product_id + '/' + data.data[i].product_slug);
                                }
                            });
                            clone.querySelector(".product-card-desc").innerHTML = (data.data[i].detail[0].desc || '').substring(0, 50);
                        }

                        // Category
                        if (data.data[i].category && data.data[i].category[0] && data.data[i].category[0].category_detail && data.data[i].category[0].category_detail.detail && data.data[i].category[0].category_detail.detail[0]) {
                            clone.querySelector(".product-card-category").innerHTML = data.data[i].category[0].category_detail.detail[0].name;
                        }

                        // Price
                        if (data.data[i].product_type == 'simple') {
                            if (data.data[i].product_discount_price && data.data[i].product_discount_price != null && data.data[i].product_discount_price != '') {
                                clone.querySelectorAll(".product-card-price").forEach(function(el) {
                                    el.innerHTML = data.data[i].product_discount_price_symbol + ' <span style="text-decoration: line-through; font-size: 0.875rem; color: var(--text-muted);">' + data.data[i].product_price_symbol + '</span>';
                                });
                            } else {
                                clone.querySelectorAll(".product-card-price").forEach(function(el) {
                                    el.innerHTML = data.data[i].product_price_symbol;
                                });
                            }
                        } else {
                            clone.querySelectorAll(".product-card-price").forEach(function(el) {
                                el.innerHTML = data.data[i].product_variable_price_symbol;
                            });
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
                            clone.querySelector(".product-card-link").innerHTML = '<i class="fas fa-eye"></i><span>@if($data["direction"] === "rtl")عرض@else View @endif</span>';
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
    });

    $(document).on('click', '.quantity-left-minus', function() {
        var row_id = $(this).attr('data-field');
        var quantity = $('#quantity' + row_id).val();
        if (quantity > 1)
            $('#quantity' + row_id).val(parseInt(quantity) - 1);
    });
</script>

@endsection