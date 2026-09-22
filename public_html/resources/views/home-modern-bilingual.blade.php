@extends('layouts.master')

@section('title')
{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Home' }}
@endsection

@section('css')
<style>
    :root {
        --pharaoh-gold: #C19A49;
        --pharaoh-gold-light: #D4AF63;
        --pharaoh-gold-dark: #9B7A38;
        --desert-sand: #E9D5B8;
        --nile-blue: #2B5F7C;
        --papyrus: #F5EFE0;
        --hieroglyph-dark: #1A1A1A;
        --cairo-night: #0F1419;
        --pyramid-stone: #8B7355;
        --space-3: 0.75rem;
        --space-4: 1rem;
        --space-5: 1.25rem;
        --space-6: 1.5rem;
        --space-8: 2rem;
        --space-10: 2.5rem;
        --space-12: 3rem;
        --space-16: 4rem;
        --radius-xl: 1rem;
    }

    /* Carousel fixes */
    .carousel-inner {
        overflow: visible !important;
    }

    .carousel-item {
        width: 100% !important;
    }

    /* Product Grid - Velo 3-column Layout */
    .products-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
        padding: 0 1rem;
    }

    @media (min-width: 1200px) {
        .products-grid-modern {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Product Card - Velo Style */
    .product-card-modern {
        background: #FFFFFF;
        border-radius: var(--radius-xl);
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        display: flex;
        flex-direction: column;
    }

    .product-card-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(193, 154, 73, 0.15);
    }

    .product-card-modern__image {
        width: 100%;
        height: 320px;
        background: #F8F9FA;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-card-modern__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card-modern:hover .product-card-modern__image img {
        transform: scale(1.05);
    }

    .product-card-modern__content {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card-modern__title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--hieroglyph-dark);
        margin: 0 0 1rem 0;
        line-height: 1.3;
    }

    .product-card-modern__price {
        font-size: 1.75rem;
        font-weight: 900;
        color: var(--pharaoh-gold);
        margin: auto 0 1rem 0;
    }

    .product-card-modern__cart {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        background: var(--pharaoh-gold);
        color: #FFFFFF;
        border-radius: 999px;
        border: none;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.3s ease;
        justify-content: center;
    }

    .product-card-modern__cart:hover {
        background: var(--pharaoh-gold-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(193, 154, 73, 0.3);
    }

    /* Features Grid */
    .features-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .feature-card-modern {
        background: #FFFFFF;
        padding: 2rem;
        border-radius: var(--radius-xl);
        text-align: center;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .feature-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .feature-card-modern i {
        font-size: 3rem;
        color: var(--pharaoh-gold);
        margin-bottom: 1.5rem;
    }

    .feature-card-modern h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--hieroglyph-dark);
        margin: 0 0 1rem 0;
        text-transform: uppercase;
    }

    .feature-card-modern p {
        font-size: 1rem;
        color: #666;
        margin: 0;
        line-height: 1.7;
    }

    /* Section Headers */
    .section-header-modern {
        text-align: center;
        margin: 4rem 0 3rem 0;
    }

    .section-header-modern h2 {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 900;
        color: var(--hieroglyph-dark);
        margin: 0 0 1rem 0;
        text-transform: uppercase;
        letter-spacing: -0.01em;
    }

    .section-header-modern p {
        font-size: 1.125rem;
        color: #666;
        margin: 0;
        line-height: 1.6;
    }

    /* Product Tabs */
    .product-tabs {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin: 3rem 0 2rem 0;
        flex-wrap: wrap;
    }

    .product-tab {
        padding: 1rem 2rem;
        background: #FFFFFF;
        color: var(--hieroglyph-dark);
        border: 2px solid #E0E0E0;
        border-radius: 999px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .product-tab:hover {
        border-color: var(--pharaoh-gold);
        color: var(--pharaoh-gold);
        transform: translateY(-2px);
    }

    .product-tab.active {
        background: var(--pharaoh-gold);
        color: #FFFFFF;
        border-color: var(--pharaoh-gold);
        box-shadow: 0 8px 20px rgba(193, 154, 73, 0.3);
    }

    /* Newsletter */
    .newsletter-cta {
        background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%);
        padding: 4rem 2rem;
        text-align: center;
        margin: 4rem 0 0 0;
    }

    .newsletter-cta h3 {
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        font-weight: 900;
        color: #FFFFFF;
        margin: 0 0 1rem 0;
        text-transform: uppercase;
    }

    .newsletter-cta p {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 2rem 0;
    }

    .newsletter-form {
        display: flex;
        gap: 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    .newsletter-form input {
        flex: 1;
        padding: 1rem 1.5rem;
        font-size: 1rem;
        border: none;
        border-radius: 999px;
        background: #FFFFFF;
    }

    .newsletter-form button {
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 700;
        color: var(--pharaoh-gold);
        background: #FFFFFF;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .newsletter-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .products-grid-modern {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-form button {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
{{-- Top Promotional Banner --}}
<section style="background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%); padding: 1rem 0; text-align: center;">
    <div class="container">
        <p style="color: #FFFFFF; font-weight: 700; margin: 0; font-size: 1rem; text-transform: uppercase; letter-spacing: 0.05em;">
            @if($data['direction'] === 'rtl')
                احصل على خصم يصل إلى 10% على طلبك الأول
            @else
                Get UPTO 10% OFF On Your 1st Order
            @endif
        </p>
    </div>
</section>

{{-- Hero Carousel --}}
<section style="background: #F8F8F8; padding: 0; width: 100%;">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <div style="background: linear-gradient(135deg, rgba(193, 154, 73, 0.1) 0%, rgba(43, 95, 124, 0.1) 100%); padding: 4rem 0; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 1.5rem 0; text-transform: uppercase; line-height: 1.1;">
                                    @if($data['direction'] === 'rtl')
                                        <span style="color: var(--pharaoh-gold); display: block; margin-bottom: 0.5rem;">السنس المصري</span>
                                        اكتشف مجموعتنا الجديدة
                                    @else
                                        <span style="color: var(--pharaoh-gold); display: block; margin-bottom: 0.5rem;">Snus Egypt</span>
                                        Discover Our New Collection
                                    @endif
                                </h2>
                                <p style="font-size: 1.125rem; color: #666; margin: 0 0 2rem 0; line-height: 1.7;">
                                    @if($data['direction'] === 'rtl')
                                        منتجات أصلية بجودة عالمية - تراث الفراعنة
                                    @else
                                        Authentic products with world quality - Legacy of Pharaohs
                                    @endif
                                </p>
                                <a href="/shop" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: var(--pharaoh-gold); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3);">
                                    @if($data['direction'] === 'rtl')
                                        تسوق الآن
                                    @else
                                        Shop Now
                                    @endif
                                    <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('images/hero-product-1.png') }}" alt="Snus Egypt Product" style="max-width: 100%; height: auto; max-height: 350px; object-fit: contain; filter: drop-shadow(0 20px 40px rgba(193, 154, 73, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%23C19A49\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23C19A49\' font-size=\'24\' font-weight=\'bold\'%3ESnus Egypt%3C/text%3E%3C/svg%3E'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-item">
                <div style="background: linear-gradient(135deg, rgba(43, 95, 124, 0.1) 0%, rgba(193, 154, 73, 0.1) 100%); padding: 4rem 0; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 1.5rem 0; text-transform: uppercase; line-height: 1.1;">
                                    @if($data['direction'] === 'rtl')
                                        <span style="color: var(--nile-blue); display: block; margin-bottom: 0.5rem;">عروض حصرية</span>
                                        خصومات تصل إلى 25%
                                    @else
                                        <span style="color: var(--nile-blue); display: block; margin-bottom: 0.5rem;">Exclusive Offers</span>
                                        Up To 25% OFF
                                    @endif
                                </h2>
                                <p style="font-size: 1.125rem; color: #666; margin: 0 0 2rem 0; line-height: 1.7;">
                                    @if($data['direction'] === 'rtl')
                                        على منتجات مختارة لفترة محدودة
                                    @else
                                        On selected products for limited time
                                    @endif
                                </p>
                                <a href="/shop" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: var(--nile-blue); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(43, 95, 124, 0.3);">
                                    @if($data['direction'] === 'rtl')
                                        تسوق العروض
                                    @else
                                        Shop Deals
                                    @endif
                                    <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('images/hero-product-2.png') }}" alt="Special Offer" style="max-width: 100%; height: auto; max-height: 350px; object-fit: contain; filter: drop-shadow(0 20px 40px rgba(43, 95, 124, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%232B5F7C\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%232B5F7C\' font-size=\'24\' font-weight=\'bold\'%3ESALE%3C/text%3E%3C/svg%3E'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="carousel-item">
                <div style="background: linear-gradient(135deg, rgba(193, 154, 73, 0.1) 0%, rgba(43, 95, 124, 0.1) 100%); padding: 4rem 0; min-height: 500px; display: flex; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 1.5rem 0; text-transform: uppercase; line-height: 1.1;">
                                    @if($data['direction'] === 'rtl')
                                        <span style="color: var(--pharaoh-gold); display: block; margin-bottom: 0.5rem;">منتجات جديدة</span>
                                        وصل حديثاً
                                    @else
                                        <span style="color: var(--pharaoh-gold); display: block; margin-bottom: 0.5rem;">New Products</span>
                                        Just Arrived
                                    @endif
                                </h2>
                                <p style="font-size: 1.125rem; color: #666; margin: 0 0 2rem 0; line-height: 1.7;">
                                    @if($data['direction'] === 'rtl')
                                        أحدث إصداراتنا من المنتجات الأصلية
                                    @else
                                        Our latest releases of authentic products
                                    @endif
                                </p>
                                <a href="/shop" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: var(--pharaoh-gold); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3);">
                                    @if($data['direction'] === 'rtl')
                                        اكتشف الآن
                                    @else
                                        Discover Now
                                    @endif
                                    <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('images/hero-product-3.png') }}" alt="New Arrival" style="max-width: 100%; height: auto; max-height: 350px; object-fit: contain; filter: drop-shadow(0 20px 40px rgba(193, 154, 73, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%23C19A49\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23C19A49\' font-size=\'24\' font-weight=\'bold\'%3ENEW%3C/text%3E%3C/svg%3E'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

{{-- Category Bar --}}
<section style="background: #FFFFFF; border-bottom: 2px solid #F0F0F0; padding: 2rem 0;">
    <div class="container">
        <div style="display: flex; align-items: center; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
            <a href="/category/cuba" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">CUBA</a>
            <a href="/category/pablo" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">PABLO</a>
            <a href="/category/swag" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">SWAG</a>
            <a href="/category/killa" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">KILLA</a>
            <a href="/category/velo" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--pharaoh-gold); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">VELO</a>
            <a href="/category/zyn" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">ZYN</a>
            <a href="/category/fox" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">FOX</a>
            <a href="/category/iceberg" style="padding: 0.75rem 1.5rem; font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">ICEBERG</a>
        </div>
    </div>
</section>

<style>
    section a[href^="/category/"]:hover {
        background: var(--pharaoh-gold);
        color: #FFFFFF !important;
        transform: translateY(-2px);
    }
</style>

{{-- Features Section --}}
<section style="background: #FFFFFF; padding: 4rem 0;">
    <div class="container">
        <div class="features-grid-modern">
            <div class="feature-card-modern">
                <i class="fas fa-shipping-fast"></i>
                <h3>
                    @if($data['direction'] === 'rtl')
                        شحن سريع
                    @else
                        Fast Shipping
                    @endif
                </h3>
                <p>
                    @if($data['direction'] === 'rtl')
                        توصيل سريع لجميع الطلبات
                    @else
                        Quick delivery for all orders
                    @endif
                </p>
            </div>
            <div class="feature-card-modern">
                <i class="fas fa-certificate"></i>
                <h3>
                    @if($data['direction'] === 'rtl')
                        منتجات أصلية
                    @else
                        Authentic Products
                    @endif
                </h3>
                <p>
                    @if($data['direction'] === 'rtl')
                        100% أصلية ومضمونة
                    @else
                        100% genuine and guaranteed
                    @endif
                </p>
            </div>
            <div class="feature-card-modern">
                <i class="fas fa-headset"></i>
                <h3>
                    @if($data['direction'] === 'rtl')
                        دعم 24/7
                    @else
                        24/7 Support
                    @endif
                </h3>
                <p>
                    @if($data['direction'] === 'rtl')
                        خدمة عملاء متاحة دائماً
                    @else
                        Customer service always available
                    @endif
                </p>
            </div>
            <div class="feature-card-modern">
                <i class="fas fa-lock"></i>
                <h3>
                    @if($data['direction'] === 'rtl')
                        دفع آمن
                    @else
                        Secure Payment
                    @endif
                </h3>
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
<section style="background: #F8F8F8; padding: 4rem 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    تسوق حسب الفئة
                @else
                    Shop By Category
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    اكتشف مجموعتنا المتنوعة من المنتجات
                @else
                    Discover our diverse collection of products
                @endif
            </p>
        </div>

        <div class="categories-slider-modern">
            <!-- Categories will be loaded by JavaScript -->
        </div>
    </div>
</section>

{{-- New Arrivals --}}
<section style="background: #FFFFFF; padding: 4rem 0;">
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
                    أحدث المنتجات في المتجر
                @else
                    Latest products in store
                @endif
            </p>
        </div>

        <div class="products-grid-modern new-arrivals-products">
            <!-- Products will be loaded by JavaScript -->
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section style="background: #F8F8F8; padding: 4rem 0;">
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
                    أفضل اختياراتنا لك
                @else
                    Our best picks for you
                @endif
            </p>
        </div>

        <div class="products-grid-modern featured-products">
            <!-- Products will be loaded by JavaScript -->
        </div>
    </div>
</section>

{{-- Top Selling with Tabs --}}
<section style="background: #FFFFFF; padding: 4rem 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    الأكثر مبيعاً هذا الأسبوع
                @else
                    Top Selling of the Week
                @endif
            </h2>
        </div>

        <div class="product-tabs">
            <button class="product-tab active" data-tab="featured">
                @if($data['direction'] === 'rtl')
                    مميز
                @else
                    Featured
                @endif
            </button>
            <button class="product-tab" data-tab="special">
                @if($data['direction'] === 'rtl')
                    خاص
                @else
                    Special
                @endif
            </button>
            <button class="product-tab" data-tab="liked">
                @if($data['direction'] === 'rtl')
                    الأكثر إعجاباً
                @else
                    Most Liked
                @endif
            </button>
        </div>

        <div class="products-grid-modern top-selling-products">
            <!-- Products will be loaded by JavaScript -->
        </div>
    </div>
</section>

{{-- Newsletter CTA --}}
<section class="newsletter-cta">
    <div class="container" style="max-width: 800px;">
        <h3>
            @if($data['direction'] === 'rtl')
                اشترك في نشرتنا البريدية
            @else
                Subscribe To Our Newsletter
            @endif
        </h3>
        <p>
            @if($data['direction'] === 'rtl')
                احصل على آخر العروض والمنتجات الجديدة
            @else
                Get latest offers and new products
            @endif
        </p>
        <form class="newsletter-form">
            <input type="email" placeholder="@if($data['direction'] === 'rtl')أدخل بريدك الإلكتروني@else Enter your email @endif" required>
            <button type="submit">
                @if($data['direction'] === 'rtl')
                    اشترك
                @else
                    Subscribe
                @endif
            </button>
        </form>
    </div>
</section>

@endsection

@section('js')
<script>
// Product Tab Functionality
document.querySelectorAll('.product-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.product-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        const tabType = this.dataset.tab;
        // Load products based on tab type
        loadTabProducts(tabType);
    });
});

function loadTabProducts(type) {
    // Implementation for loading products based on tab
    console.log('Loading products for tab:', type);
}

// Load initial products on page load
document.addEventListener('DOMContentLoaded', function() {
    // Load New Arrivals
    // Load Featured Products
    // Load Top Selling Products
    console.log('Page loaded, ready to fetch products');
});
</script>
@endsection
