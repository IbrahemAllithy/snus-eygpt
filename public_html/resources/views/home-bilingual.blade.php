@extends('layouts.master')
@section('content')

{{-- Hero Section - Bilingual --}}
<section class="hero-section-bilingual" data-aos="fade-in">
    <div class="hero-pattern-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center min-vh-70">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="hero-content">
                    @if($data['direction'] === 'rtl')
                        <h1 class="hero-title">اكتشف أفضل منتجات <span class="text-gradient">السنس</span> في مصر</h1>
                        <p class="hero-description">منتجات أصلية 100%، أسعار منافسة، وتوصيل سريع لجميع المحافظات</p>
                        <div class="hero-features">
                            <div class="hero-feature-item">
                                <svg class="hero-feature-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>شحن مجاني للطلبات فوق 500 جنيه</span>
                            </div>
                            <div class="hero-feature-item">
                                <svg class="hero-feature-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>ضمان استرجاع المال خلال 14 يوم</span>
                            </div>
                        </div>
                        <div class="hero-actions">
                            <a href="/shop" class="btn-modern btn-modern-primary btn-modern-lg">
                                <span>تسوق الآن</span>
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <a href="#featured" class="btn-modern btn-modern-secondary btn-modern-lg">
                                <span>المنتجات المميزة</span>
                            </a>
                        </div>
                    @else
                        <h1 class="hero-title">Discover the Best <span class="text-gradient">Snus Products</span> in Egypt</h1>
                        <p class="hero-description">100% Original Products, Competitive Prices, and Fast Delivery to All Governorates</p>
                        <div class="hero-features">
                            <div class="hero-feature-item">
                                <svg class="hero-feature-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Free shipping on orders over 500 EGP</span>
                            </div>
                            <div class="hero-feature-item">
                                <svg class="hero-feature-icon" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>14-day money back guarantee</span>
                            </div>
                        </div>
                        <div class="hero-actions">
                            <a href="/shop" class="btn-modern btn-modern-primary btn-modern-lg">
                                <span>Shop Now</span>
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <a href="#featured" class="btn-modern btn-modern-secondary btn-modern-lg">
                                <span>Featured Products</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="hero-image-modern">
                    <div class="hero-glow-effect"></div>
                    <img src="{{ asset('assets/images/hero-snus.png') }}"
                         alt="{{ $data['direction'] === 'rtl' ? 'منتجات السنس' : 'Snus Products' }}"
                         class="hero-main-image"
                         loading="eager">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Trust Badges Section --}}
<section class="trust-badges-section" data-aos="fade-up">
    <div class="container">
        <div class="trust-badges-grid">
            <div class="trust-badge" data-aos="zoom-in" data-aos-delay="100">
                <div class="trust-badge-icon trust-badge-icon-success">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="trust-badge-content">
                    <h4>{{ $data['direction'] === 'rtl' ? 'شحن سريع' : 'Fast Shipping' }}</h4>
                    <p>{{ $data['direction'] === 'rtl' ? 'توصيل في 48 ساعة' : 'Delivery in 48 hours' }}</p>
                </div>
            </div>

            <div class="trust-badge" data-aos="zoom-in" data-aos-delay="200">
                <div class="trust-badge-icon trust-badge-icon-primary">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="trust-badge-content">
                    <h4>{{ $data['direction'] === 'rtl' ? 'منتجات أصلية' : '100% Original' }}</h4>
                    <p>{{ $data['direction'] === 'rtl' ? 'مضمونة 100%' : 'Guaranteed authentic' }}</p>
                </div>
            </div>

            <div class="trust-badge" data-aos="zoom-in" data-aos-delay="300">
                <div class="trust-badge-icon trust-badge-icon-info">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="trust-badge-content">
                    <h4>{{ $data['direction'] === 'rtl' ? 'دعم 24/7' : '24/7 Support' }}</h4>
                    <p>{{ $data['direction'] === 'rtl' ? 'نحن هنا للمساعدة' : 'We are here to help' }}</p>
                </div>
            </div>

            <div class="trust-badge" data-aos="zoom-in" data-aos-delay="400">
                <div class="trust-badge-icon trust-badge-icon-warning">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <div class="trust-badge-content">
                    <h4>{{ $data['direction'] === 'rtl' ? 'دفع آمن' : 'Secure Payment' }}</h4>
                    <p>{{ $data['direction'] === 'rtl' ? 'معاملات مشفرة' : 'Encrypted transactions' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Include existing sections --}}
@include(isset(getSetting()['slider_style']) ? 'includes.sliders.slider-'.getSetting()['slider_style'] : 'includes.sliders.slider-style1')

@php($homeTemplates = homePageBuilderJson())
@if (count($homeTemplates))
    @foreach ($homeTemplates as $template)
        @if (!empty($template['template_postfix']) && empty($template['skip']) && !empty($template['display']))
            @include('sections.home-'.$template['template_postfix'].'-section')
        @endif
    @endforeach
@else
    @include('sections.home-category-section')
    @include('sections.home-new-arrival-section')
    @include('sections.home-tabs-section')
    @include('sections.home-week-sale-section')
    @include('sections.home-services-section')
@endif

<style>
/* Hero Section Styles */
.hero-section-bilingual {
    position: relative;
    padding: var(--space-20) 0 var(--space-16);
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    overflow: hidden;
}

.hero-pattern-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
        radial-gradient(circle at 20% 50%, rgba(193, 154, 73, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(26, 51, 83, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.min-vh-70 {
    min-height: 70vh;
}

.hero-content {
    max-width: 600px;
}

.hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--space-6);
    color: var(--text-primary);
}

.text-gradient {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-description {
    font-size: var(--text-lg);
    color: var(--text-secondary);
    margin-bottom: var(--space-8);
    line-height: 1.7;
}

.hero-features {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    margin-bottom: var(--space-8);
}

.hero-feature-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.hero-feature-icon {
    color: var(--color-success);
    flex-shrink: 0;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
}

.btn-modern {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-6);
    font-size: var(--text-base);
    font-weight: 600;
    border-radius: var(--radius-full);
    text-decoration: none;
    transition: all var(--transition-base);
    border: 2px solid transparent;
}

.btn-modern-lg {
    padding: var(--space-4) var(--space-8);
    font-size: var(--text-lg);
}

.btn-modern-primary {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: var(--text-on-primary);
    box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3);
}

.btn-modern-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(193, 154, 73, 0.4);
    color: var(--text-on-primary);
}

.btn-modern-secondary {
    background: var(--bg-elevated);
    color: var(--text-primary);
    border-color: rgba(0, 0, 0, 0.1);
}

.btn-modern-secondary:hover {
    background: var(--bg-hover);
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.hero-image-modern {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-glow-effect {
    position: absolute;
    width: 80%;
    height: 80%;
    background: radial-gradient(circle, rgba(193, 154, 73, 0.15) 0%, transparent 70%);
    filter: blur(60px);
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 0.6; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

.hero-main-image {
    position: relative;
    max-width: 100%;
    height: auto;
    filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.15));
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Trust Badges Section */
.trust-badges-section {
    padding: var(--space-12) 0;
    background: var(--bg-elevated);
}

.trust-badges-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-6);
}

.trust-badge {
    display: flex;
    align-items: flex-start;
    gap: var(--space-4);
    padding: var(--space-6);
    background: var(--bg-page);
    border-radius: var(--radius-xl);
    transition: all var(--transition-base);
}

.trust-badge:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.trust-badge-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: var(--radius-lg);
    flex-shrink: 0;
}

.trust-badge-icon-success {
    background: var(--color-success-light);
    color: var(--color-success);
}

.trust-badge-icon-primary {
    background: var(--color-primary-glow);
    color: var(--color-primary);
}

.trust-badge-icon-info {
    background: var(--color-info-light);
    color: var(--color-info);
}

.trust-badge-icon-warning {
    background: var(--color-warning-light);
    color: var(--color-warning);
}

.trust-badge-content h4 {
    font-size: var(--text-base);
    font-weight: 700;
    margin-bottom: var(--space-1);
    color: var(--text-primary);
}

.trust-badge-content p {
    font-size: var(--text-sm);
    color: var(--text-secondary);
    margin: 0;
}

/* Responsive */
@media (max-width: 992px) {
    .hero-section-bilingual {
        padding: var(--space-16) 0 var(--space-12);
    }

    .hero-content {
        text-align: center;
        max-width: 100%;
    }

    .hero-actions {
        justify-content: center;
    }

    .trust-badges-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--space-4);
    }
}

@media (max-width: 576px) {
    .hero-actions {
        flex-direction: column;
        width: 100%;
    }

    .btn-modern {
        width: 100%;
    }

    .trust-badges-grid {
        grid-template-columns: 1fr;
    }
}

/* RTL Support */
[dir="rtl"] .hero-actions {
    flex-direction: row-reverse;
}

[dir="rtl"] .btn-modern svg {
    transform: scaleX(-1);
}
</style>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        var url = "{{ url('') }}" +
            '/api/client/products?limit=10&getCategory=1&getDetail=1&language_id=' + languageId +
            '&isFeatured=1&currency=' + localStorage.getItem("currency");
        appendTo = 'tab_top_sales';
        fetchProduct(url, appendTo);

        var url = "{{ url('') }}" + '/api/client/products?limit=10&getDetail=1&language_id=' +
            languageId + '&currency=' + localStorage.getItem("currency");
        appendTo = 'tab_special_products';
        fetchProduct(url, appendTo);

        var url = "{{ url('') }}" + '/api/client/products?limit=10&getDetail=1&language_id=' +
            languageId + '&currency=' + localStorage.getItem("currency");
        appendTo = 'tab_most_liked';
        fetchProduct(url, appendTo);

        var url = "{{ url('') }}" +
            '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId +
            '&sortBy=id&sortType=DESC&currency=' + localStorage.getItem("currency");
        appendTo = 'new-arrival';
        fetchProduct(url, appendTo);

        var url = "{{ url('') }}" +
            '/api/client/products?limit=6&getCategory=1&getDetail=1&language_id=' + languageId +
            '&sortBy=id&sortType=DESC&currency=' + localStorage.getItem("currency");
        appendTo = 'weekly-sale';
        fetchProduct(url, appendTo);

        blogNews();
        sliderMedia();
        categorySlider();
        bannerMedia();
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
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                    const templ = document.getElementById("product-card-template");
                    if (!templ) return;

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);

                        clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i]
                            .product_id);
                        clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');

                        clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i]
                            .product_type);

                        clone.querySelector(".wishlist-icon-2").setAttribute('data-id', data.data[i]
                            .product_id);
                        clone.querySelector(".wishlist-icon-2").setAttribute('onclick', 'addWishlist(this)');

                        clone.querySelector(".wishlist-icon-2").setAttribute('data-type', data.data[i]
                            .product_type);

                        clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i]
                            .product_id);
                        clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i]
                            .product_type);
                        clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                        clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i]
                            .product_id);
                        clone.querySelector(".quick-view-icon").setAttribute('data-type', data.data[i]
                            .product_type);
                        clone.querySelector(".quick-view-icon").setAttribute('onclick',
                            'quiclViewData(this)');


                        clone.querySelector(".quantity-right-plus").setAttribute('data-field', i);
                        clone.querySelector(".quantity-left-minus").setAttribute('data-field', i);
                        clone.querySelector(".qty-input").setAttribute('id', 'quantity'+i);
                        clone.querySelector(".item-quantity").classList.add('itemqty'+i);

                        var bages = '';
                        if(data.data[i].discount_percentage > 0)
                            bages +='<span class="badge badge-danger">'+data.data[i].discount_percentage+'%</span>';
                        if(data.data[i].is_featured != "0")
                            bages +='<span class="badge badge-success">Featured</span>';
                        if(data.data[i].new != "0")
                            bages +='<span class="badge badge-info ">New</span>';

                        clone.querySelector(".badges").innerHTML = bages;

                        rating = '';
                        if(data.data[i].product_rating == 1){
                            rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                        }
                        else if(data.data[i].product_rating == 2){
                            rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                        }
                        else if(data.data[i].product_rating == 3){
                            rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                        }
                        else if(data.data[i].product_rating == 4){
                            rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                        }
                        else if(data.data[i].product_rating == 5){
                            rating = '<label class="full fa active" for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                        }
                        else{
                            rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa " for="star_5" title="Awesome - 5 stars"></label>'
                        }

                        clone.querySelector(".display-rating").innerHTML = rating;
                        clone.querySelector(".display-rating1").innerHTML = rating;

                        if (data.data[i].product_gallary != null && data.data[i].product_gallary !=
                            'null' && data.data[i].product_gallary != '') {
                            if (data.data[i].product_gallary.detail != null && data.data[i].product_gallary
                                .detail != 'null' && data.data[i].product_gallary.detail != '') {
                                var productImage = data.data[i].product_gallary.detail[1] || data.data[i].product_gallary.detail[0];
                                if (productImage && productImage.gallary_path) {
                                    clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                                }
                            }
                        }
                        if (data.data[i].detail != null && data.data[i].detail != 'null' && data.data[i]
                            .detail != '') {
                            clone.querySelector(".product-card-image").setAttribute('alt', data.data[i]
                                .detail[0].title);
                        }
                        if (data.data[i].category != null && data.data[i].category != 'null' && data.data[i]
                            .category != '') {
                            if (data.data[i].category[0].category_detail != null && data.data[i].category[0]
                                .category_detail != 'null' && data.data[i].category[0].category_detail != ''
                            ) {
                                if (data.data[i].category[0].category_detail.detail != null && data.data[i]
                                    .category[0].category_detail.detail != 'null' && data.data[i].category[
                                        0].category_detail.detail != '') {
                                    clone.querySelector(".product-card-category").innerHTML = data.data[i]
                                        .category[0].category_detail.detail[0].name;
                                }
                            }
                        }
                        if (data.data[i].detail != null && data.data[i].detail != 'null' && data.data[i]
                            .detail != '') {
                            clone.querySelector(".product-card-name").innerHTML = data.data[i].detail[0]
                                .title;
                            clone.querySelector(".product-card-name").setAttribute('href', '/product/' +
                                data
                                .data[i].product_id + '/' + data
                                .data[i].product_slug);
                            var desc = data.data[i].detail[0].desc;
                            clone.querySelector(".product-card-desc").innerHTML = desc.substring(0, 50);
                        }

                        if (data.data[i].product_type == 'simple') {
                            if (data.data[i].product_discount_price == '' || data.data[i]
                                .product_discount_price == null || data.data[i].product_discount_price ==
                                'null') {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i]
                                    .product_price_symbol;
                            } else {
                                clone.querySelector(".product-card-price").innerHTML =
                                data.data[i]
                                    .product_discount_price_symbol + '<span>' +data.data[i].product_price_symbol + '</span>';
                            }
                        } else {
                            clone.querySelector(".product-card-price").innerHTML = data.data[i].product_variable_price_symbol;
                        }

                        if (data.data[i].product_type == 'simple') {
                            clone.querySelector(".product-card-link").setAttribute('onclick',
                                "addToCart(this)");
                            clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".product-card-link").setAttribute('data-field', i);
                            clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".product-card-link").innerHTML = 'Add To Cart';

                            clone.querySelector(".add-to-card-bag").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".add-to-card-bag").setAttribute('data-id', data.data[i].product_id);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-type', data.data[i].product_type);
                            clone.querySelector(".add-to-card-bag").setAttribute('data-field', i);

                        } else {
                            clone.querySelector('.itemqty'+i).classList.add('d-none');
                            clone.querySelector(".add-to-card-bag").classList.add('d-none');
                            clone.querySelector(".product-card-link").classList.remove('d-g-none');
                            clone.querySelector(".product-card-link").classList.remove('listing-none');
                            clone.querySelector(".product-card-link").innerHTML = 'View Detail';
                            clone.querySelector(".product-card-link").setAttribute('href', '/product/' +
                                data
                                .data[i].product_id + '/' + data
                                .data[i].product_slug);
                        }

                        $("." + appendTo).append(clone);

                        if (appendTo == 'new-arrival' || appendTo == 'weekly-sale') {
                            $(".div-class").addClass('col-12 col-sm-6 col-lg-3');
                        }
                    }

                    if (appendTo != 'new-arrival' && appendTo != 'weekly-sale')
                        getSliderSettings(appendTo);
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
