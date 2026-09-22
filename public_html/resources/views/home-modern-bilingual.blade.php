@extends('layouts.master')

@section('title')
{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Home' }}
@endsection

@section('css')
<style>
    :root {
        --pharaoh-gold: #D4A574;
        --pharaoh-gold-light: #E8C499;
        --pharaoh-gold-dark: #B8884F;
        --pharaoh-gold-darker: #8B6635;
        --desert-sand: #F4E4D1;
        --nile-blue: #1E5A7D;
        --nile-blue-light: #3B7BA8;
        --nile-blue-dark: #0D3854;
        --papyrus: #FBF7F0;
        --hieroglyph-dark: #0F0F0F;
        --cairo-night: #050505;
        --pyramid-stone: #9D8570;
        --hover-gold: #FFD700;
        --hover-blue: #4A9FD8;
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

    body {
        background: #FAFAFA;
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
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        border: 2px solid #E8E8E8;
    }

    .product-card-modern:hover {
        transform: translateY(-12px);
        box-shadow: 0 24px 48px rgba(0, 0, 0, 0.15);
        border-color: var(--hover-gold);
    }

    .product-card-modern__image {
        width: 100%;
        height: 320px;
        background: #F5F5F5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .product-card-modern__image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent 0%, rgba(255, 215, 0, 0.15) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .product-card-modern:hover .product-card-modern__image::before {
        opacity: 1;
    }

    .product-card-modern__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card-modern:hover .product-card-modern__image img {
        transform: scale(1.08);
    }

    .product-card-modern__content {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #FFFFFF;
    }

    .product-card-modern__title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1A1A1A;
        margin: 0 0 1rem 0;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .product-card-modern:hover .product-card-modern__title {
        color: var(--pharaoh-gold-darker);
    }

    .product-card-modern__price {
        font-size: 1.85rem;
        font-weight: 900;
        color: var(--pharaoh-gold);
        margin: auto 0 1.25rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .product-card-modern__cart {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.1rem 1.75rem;
        background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%);
        color: #FFFFFF;
        border-radius: 999px;
        border: none;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        justify-content: center;
        box-shadow: 0 4px 15px rgba(212, 165, 116, 0.3);
    }

    .product-card-modern__cart:hover {
        background: linear-gradient(135deg, var(--pharaoh-gold-darker) 0%, #1A1A1A 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.3);
    }

    .product-card-modern__cart:active {
        transform: translateY(-1px);
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
        padding: 2.5rem;
        border-radius: var(--radius-xl);
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #E8E8E8;
        position: relative;
        overflow: hidden;
    }

    .feature-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }

    .feature-card-modern:hover::before {
        opacity: 0.08;
    }

    .feature-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 48px rgba(0, 0, 0, 0.15);
        border-color: var(--hover-gold);
    }

    .feature-card-modern i {
        font-size: 3.5rem;
        color: var(--pharaoh-gold);
        margin-bottom: 1.5rem;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
    }

    .feature-card-modern:hover i {
        color: var(--pharaoh-gold-darker);
        transform: scale(1.15) rotateY(360deg);
    }

    .feature-card-modern h3 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1A1A1A;
        margin: 0 0 1rem 0;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        position: relative;
        z-index: 1;
    }

    .feature-card-modern p {
        font-size: 1rem;
        color: #555;
        margin: 0;
        line-height: 1.8;
        position: relative;
        z-index: 1;
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
        padding: 1.1rem 2.5rem;
        background: #FFFFFF;
        color: #1A1A1A;
        border: 2px solid #DDD;
        border-radius: 999px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 0.95rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .product-tab:hover {
        border-color: var(--hover-gold);
        color: var(--pharaoh-gold-darker);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 215, 0, 0.25);
        background: #FFFDF7;
    }

    .product-tab.active {
        background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%);
        color: #FFFFFF;
        border-color: var(--pharaoh-gold);
        box-shadow: 0 8px 24px rgba(212, 165, 116, 0.4);
        transform: translateY(-2px);
    }

    .product-tab.active:hover {
        background: linear-gradient(135deg, var(--pharaoh-gold-darker) 0%, #1A1A1A 100%);
        transform: translateY(-5px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
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

    /* Brand Cards Hover */
    .brand-card {
        background: #FFFFFF;
        padding: 2rem;
        border-radius: var(--radius-xl);
        text-align: center;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #E8E8E8;
        cursor: pointer;
    }

    .brand-card:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        border-color: var(--hover-gold);
        background: #FFFDF7;
    }

    .brand-card h4 {
        font-size: 1.5rem;
        font-weight: 900;
        color: #1A1A1A;
        margin: 0;
        letter-spacing: 0.1em;
        transition: color 0.3s ease;
    }

    .brand-card:hover h4 {
        color: var(--pharaoh-gold-darker);
    }

    /* Why Choose Us Cards */
    .why-card {
        background: #FFFFFF;
        padding: 2.5rem;
        border-radius: var(--radius-xl);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .why-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 48px rgba(0, 0, 0, 0.15);
        border-left-width: 6px;
    }

    .why-card-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        transition: all 0.4s ease;
    }

    .why-card:hover .why-card-icon {
        transform: rotateY(360deg) scale(1.1);
    }

    /* Testimonial Cards */
    .testimonial-card {
        background: #FFFFFF;
        padding: 2.5rem;
        border-radius: var(--radius-xl);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #E8E8E8;
        cursor: pointer;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 48px rgba(0, 0, 0, 0.15);
        border-color: var(--hover-gold);
        background: #FFFDF7;
    }

    /* Hero Buttons */
    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.2rem 2.75rem;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
    }

    .hero-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.15);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .hero-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .hero-btn:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .hero-btn i {
        transition: transform 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .hero-btn:hover i {
        transform: translateX(5px);
    }

    .hero-btn span,
    .hero-btn:not(:has(span)) {
        position: relative;
        z-index: 1;
    }

    /* Carousel Controls Enhancement */
    .carousel-control-prev,
    .carousel-control-next {
        width: 60px;
        height: 60px;
        background: rgba(212, 165, 116, 0.9);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .carousel:hover .carousel-control-prev,
    .carousel:hover .carousel-control-next {
        opacity: 1;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: var(--pharaoh-gold);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--pharaoh-gold);
        opacity: 0.5;
        transition: all 0.3s ease;
    }

    .carousel-indicators button.active {
        opacity: 1;
        width: 40px;
        border-radius: 6px;
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
                                <a href="/shop" class="hero-btn" style="background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%); color: #FFFFFF; box-shadow: 0 10px 30px rgba(212, 165, 116, 0.4);">
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
                                <a href="/shop" class="hero-btn" style="background: linear-gradient(135deg, var(--nile-blue) 0%, var(--nile-blue-light) 100%); color: #FFFFFF; box-shadow: 0 10px 30px rgba(30, 90, 125, 0.4);">
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

{{-- Brands Section --}}
<section style="background: #FFFFFF; padding: 4rem 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    العلامات التجارية الموثوقة
                @else
                    Trusted Brands
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    نوفر أفضل العلامات التجارية العالمية
                @else
                    We offer the best international brands
                @endif
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 2rem; align-items: center; margin-top: 3rem;">
            @foreach(['VELO', 'ZYN', 'ICEBERG', 'KILLA', 'PABLO', 'CUBA', 'FOX', 'SWAG'] as $brand)
            <div class="brand-card">
                <h4 style="font-size: 1.5rem; font-weight: 900; color: var(--hieroglyph-dark); margin: 0; letter-spacing: 0.1em;">{{ $brand }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Why Choose Us Section --}}
<section style="background: linear-gradient(135deg, var(--papyrus) 0%, #FFFFFF 100%); padding: 5rem 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    لماذا نحن الخيار الأفضل؟
                @else
                    Why Choose Us?
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    نقدم تجربة تسوق استثنائية بأعلى معايير الجودة
                @else
                    We provide exceptional shopping experience with highest quality standards
                @endif
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
            <div class="why-card" style="border-left-color: var(--pharaoh-gold);">
                <div class="why-card-icon" style="background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%);">
                    <i class="fas fa-shield-alt" style="font-size: 1.75rem; color: #FFFFFF;"></i>
                </div>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0 0 1rem 0;">
                    @if($data['direction'] === 'rtl')
                        منتجات أصلية 100%
                    @else
                        100% Authentic Products
                    @endif
                </h3>
                <p style="color: #666; line-height: 1.8; margin: 0;">
                    @if($data['direction'] === 'rtl')
                        جميع منتجاتنا أصلية ومضمونة من الموردين الرسميين
                    @else
                        All our products are authentic and guaranteed from official suppliers
                    @endif
                </p>
            </div>

            <div class="why-card" style="border-left-color: var(--nile-blue);">
                <div class="why-card-icon" style="background: linear-gradient(135deg, var(--nile-blue) 0%, var(--nile-blue-light) 100%);">
                    <i class="fas fa-shipping-fast" style="font-size: 1.75rem; color: #FFFFFF;"></i>
                </div>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0 0 1rem 0;">
                    @if($data['direction'] === 'rtl')
                        شحن سريع وآمن
                    @else
                        Fast & Secure Shipping
                    @endif
                </h3>
                <p style="color: #666; line-height: 1.8; margin: 0;">
                    @if($data['direction'] === 'rtl')
                        توصيل سريع لجميع أنحاء مصر مع ضمان سلامة المنتج
                    @else
                        Fast delivery across Egypt with product safety guarantee
                    @endif
                </p>
            </div>

            <div class="why-card" style="border-left-color: var(--pyramid-stone);">
                <div class="why-card-icon" style="background: linear-gradient(135deg, var(--pyramid-stone) 0%, var(--hieroglyph-dark) 100%);">
                    <i class="fas fa-headset" style="font-size: 1.75rem; color: #FFFFFF;"></i>
                </div>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0 0 1rem 0;">
                    @if($data['direction'] === 'rtl')
                        دعم فني 24/7
                    @else
                        24/7 Customer Support
                    @endif
                </h3>
                <p style="color: #666; line-height: 1.8; margin: 0;">
                    @if($data['direction'] === 'rtl')
                        فريق الدعم جاهز للرد على استفساراتك في أي وقت
                    @else
                        Support team ready to answer your inquiries anytime
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section style="background: #FFFFFF; padding: 5rem 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    ماذا يقول عملاؤنا
                @else
                    What Our Customers Say
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    آراء حقيقية من عملائنا المميزين
                @else
                    Real reviews from our valued customers
                @endif
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="testimonial-card">
                <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem;">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star" style="color: var(--pharaoh-gold); font-size: 1.25rem;"></i>
                    @endfor
                </div>
                <p style="font-size: 1.1rem; color: #555; line-height: 1.8; margin: 0 0 1.5rem 0; font-style: italic;">
                    @if($data['direction'] === 'rtl')
                        "أفضل متجر سنس في مصر، منتجات أصلية وتوصيل سريع. ممتاز جداً!"
                    @else
                        "Best snus store in Egypt, authentic products and fast delivery. Excellent!"
                    @endif
                </p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #FFFFFF; font-weight: 800; font-size: 1.25rem;">أ</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0;">
                            @if($data['direction'] === 'rtl')
                                أحمد محمد
                            @else
                                Ahmed Mohamed
                            @endif
                        </h4>
                        <p style="font-size: 0.9rem; color: #999; margin: 0;">
                            @if($data['direction'] === 'rtl')
                                القاهرة
                            @else
                                Cairo
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem;">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star" style="color: var(--pharaoh-gold); font-size: 1.25rem;"></i>
                    @endfor
                </div>
                <p style="font-size: 1.1rem; color: #555; line-height: 1.8; margin: 0 0 1.5rem 0; font-style: italic;">
                    @if($data['direction'] === 'rtl')
                        "خدمة عملاء ممتازة وأسعار تنافسية. أنصح بالتعامل معهم."
                    @else
                        "Excellent customer service and competitive prices. Highly recommended."
                    @endif
                </p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--nile-blue) 0%, var(--nile-blue-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #FFFFFF; font-weight: 800; font-size: 1.25rem;">م</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0;">
                            @if($data['direction'] === 'rtl')
                                محمود علي
                            @else
                                Mahmoud Ali
                            @endif
                        </h4>
                        <p style="font-size: 0.9rem; color: #999; margin: 0;">
                            @if($data['direction'] === 'rtl')
                                الإسكندرية
                            @else
                                Alexandria
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem;">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star" style="color: var(--pharaoh-gold); font-size: 1.25rem;"></i>
                    @endfor
                </div>
                <p style="font-size: 1.1rem; color: #555; line-height: 1.8; margin: 0 0 1.5rem 0; font-style: italic;">
                    @if($data['direction'] === 'rtl')
                        "تشكيلة رائعة من المنتجات، وتوصيل احترافي. شكراً سنس مصر!"
                    @else
                        "Great selection of products, professional delivery. Thanks Snus Egypt!"
                    @endif
                </p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--pyramid-stone) 0%, var(--hieroglyph-dark) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #FFFFFF; font-weight: 800; font-size: 1.25rem;">ع</span>
                    </div>
                    <div>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--hieroglyph-dark); margin: 0;">
                            @if($data['direction'] === 'rtl')
                                عمر حسن
                            @else
                                Omar Hassan
                            @endif
                        </h4>
                        <p style="font-size: 0.9rem; color: #999; margin: 0;">
                            @if($data['direction'] === 'rtl')
                                الجيزة
                            @else
                                Giza
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
