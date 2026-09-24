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
    }

    /* Hero Section - Velo-inspired with Egyptian Identity */
    .hero-section-modern {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
        overflow: hidden;
        padding: 0;
    }

    .hero-section-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--nile-blue) 100%);
        opacity: 0.05;
    }

    .hero-section-modern__content {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        width: 100%;
        padding: var(--space-4);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-12);
        align-items: center;
    }

    @media (max-width: 968px) {
        .hero-section-modern__content {
            grid-template-columns: 1fr;
            text-align: center;
        }
    }

    .hero-section-modern__text {
        padding: var(--space-8);
    }

    .hero-section-modern h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 900;
        color: var(--hieroglyph-dark);
        margin: 0 0 var(--space-6) 0;
        line-height: 1.1;
        letter-spacing: -0.02em;
        text-transform: uppercase;
    }

    .hero-section-modern h1 span {
        color: var(--pharaoh-gold);
        display: block;
    }

    .hero-section-modern p {
        font-size: clamp(1.125rem, 2vw, 1.5rem);
        color: #666;
        margin: 0 0 var(--space-10) 0;
        line-height: 1.8;
        font-weight: 400;
    }

    .hero-section-modern__image {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: var(--space-8);
    }

    .hero-section-modern__image img {
        max-width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: contain;
        filter: drop-shadow(0 20px 60px rgba(193, 154, 73, 0.2));
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--space-3);
        padding: var(--space-5) var(--space-10);
        font-size: 1.125rem;
        font-weight: 700;
        background: var(--pharaoh-gold);
        color: #FFFFFF;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3);
    }

    .btn-hero:hover {
        background: var(--pharaoh-gold-dark);
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(193, 154, 73, 0.4);
        color: #FFFFFF;
    }

    /* Section Styling */
    .section-modern {
        padding: var(--space-16) 0;
    }

    .section-header-modern {
        text-align: center;
        margin-bottom: var(--space-12);
    }

    .section-header-modern h2 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 900;
        color: var(--hieroglyph-dark);
        margin: 0 0 var(--space-4) 0;
        text-transform: uppercase;
        letter-spacing: -0.01em;
    }

    .section-header-modern p {
        font-size: 1.25rem;
        color: #666;
        margin: 0;
        font-weight: 400;
    }

    /* Features Section - Clean White Background */
    .features-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: var(--space-8);
        padding: var(--space-4);
    }

    .feature-card-modern {
        background: #FFFFFF;
        border-radius: var(--radius-lg);
        padding: var(--space-10);
        text-align: center;
        border: none;
        transition: all 0.4s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .feature-card-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(193, 154, 73, 0.15);
    }

    .feature-card-modern__icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--pharaoh-gold);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--space-6);
        box-shadow: 0 8px 24px rgba(193, 154, 73, 0.25);
    }

    .feature-card-modern__icon i {
        font-size: 2rem;
        color: #FFFFFF;
    }

    .feature-card-modern h4 {
        font-size: 1.375rem;
        font-weight: 700;
        color: var(--hieroglyph-dark);
        margin: 0 0 var(--space-3) 0;
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }

    .feature-card-modern p {
        font-size: 1rem;
        color: #666;
        margin: 0;
        line-height: 1.7;
    }

    /* Section Header - Velo Style */
    .section-header-modern {
        text-align: center;
        margin-bottom: var(--space-12);
        padding: var(--space-4);
    }

    .section-header-modern h2 {
        font-size: clamp(2.25rem, 5vw, 3.5rem);
        font-weight: 900;
        color: var(--hieroglyph-dark);
        margin: 0 0 var(--space-4) 0;
        text-transform: uppercase;
        letter-spacing: -0.01em;
    }

    .section-header-modern p {
        font-size: 1.25rem;
        color: #666;
        margin: 0;
        line-height: 1.6;
    }

    /* Product Grid - Velo 3-column Layout */
    .products-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: var(--space-10);
        margin-bottom: var(--space-16);
        padding: var(--space-4);
    }

    @media (min-width: 1200px) {
        .products-grid-modern {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Product Card - Velo Style with Egyptian Touch */
    .product-card-modern {
        position: relative;
        background: #FFFFFF;
        border-radius: var(--radius-xl);
        overflow: visible;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    }

    .product-card-modern:hover {
        transform: translateY(-12px);
        box-shadow: 0 24px 48px rgba(193, 154, 73, 0.15);
    }

    .product-card-modern__badges {
        position: absolute;
        top: var(--space-5);
        left: var(--space-5);
        z-index: 10;
        display: flex;
        flex-direction: column;
        gap: var(--space-2);
    }

    [dir="rtl"] .product-card-modern__badges {
        left: auto;
        right: var(--space-5);
    }

    .product-card-modern__badge {
        display: inline-block;
        padding: var(--space-2) var(--space-5);
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .product-card-modern__badge--new {
        background: var(--pharaoh-gold);
        color: #FFFFFF;
    }

    .product-card-modern__badge--sale {
        background: #E74C3C;
        color: #FFFFFF;
    }

    .product-card-modern__badge--hot {
        background: #E67E22;
        color: #FFFFFF;
    }

    .product-card-modern__image {
        position: relative;
        width: 100%;
        height: 350px;
        background: #F8F9FA;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
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

    .product-card-modern__actions {
        position: absolute;
        top: 50%;
        right: var(--space-5);
        transform: translateY(-50%) translateX(80px);
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    [dir="rtl"] .product-card-modern__actions {
        right: auto;
        left: var(--space-5);
        transform: translateY(-50%) translateX(-80px);
    }

    .product-card-modern:hover .product-card-modern__actions {
        transform: translateY(-50%) translateX(0);
        opacity: 1;
    }

    [dir="rtl"] .product-card-modern:hover .product-card-modern__actions {
        transform: translateY(-50%) translateX(0);
    }

    .product-card-modern__action {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #FFFFFF;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .product-card-modern__action:hover {
        background: var(--pharaoh-gold);
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(193, 154, 73, 0.3);
    }

    .product-card-modern__action i {
        font-size: 1.125rem;
        color: var(--hieroglyph-dark);
        transition: color 0.3s;
    }

    .product-card-modern__action:hover i {
        color: #FFFFFF;
    }

    .product-card-modern__content {
        padding: var(--space-8);
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: var(--space-3);
    }

    .product-card-modern__category {
        font-size: 0.8125rem;
        font-weight: 700;
        color: var(--pharaoh-gold);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .product-card-modern__title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--hieroglyph-dark);
        text-decoration: none;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s;
    }

    .product-card-modern__title:hover {
        color: var(--pharaoh-gold);
    }

    .product-card-modern__desc {
        font-size: 0.9375rem;
        color: #666;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card-modern__rating {
        display: flex;
        align-items: center;
        gap: var(--space-2);
    }

    .product-card-modern__rating i {
        font-size: 0.9375rem;
        color: var(--pharaoh-gold);
    }

    .product-card-modern__rating span {
        font-size: 0.875rem;
        color: #666;
        font-weight: 500;
    }

    .product-card-modern__footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: var(--space-4);
        padding-top: var(--space-6);
        margin-top: auto;
    }

    .product-card-modern__price {
        font-size: 1.75rem;
        font-weight: 900;
        color: var(--hieroglyph-dark);
        line-height: 1;
    }

    .product-card-modern__price del {
        font-size: 1.125rem;
        font-weight: 500;
        color: #999;
        margin-left: var(--space-2);
    }

    [dir="rtl"] .product-card-modern__price del {
        margin-left: 0;
        margin-right: var(--space-2);
    }

    .product-card-modern__price-subscription {
        font-size: 0.875rem;
        color: #666;
        margin-top: var(--space-1);
        font-weight: 500;
    }

    .product-card-modern__cart {
        display: flex;
        align-items: center;
        gap: var(--space-3);
    }

    .product-card-modern__hover {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: var(--space-6);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
    }

    .product-card-modern:hover .product-card-modern__hover {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .product-card-modern__hover-content {
        text-align: center;
        width: 100%;
    }

    /* Button Styles - Velo Inspired */
    .btn-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--space-2);
        padding: var(--space-4) var(--space-8);
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .btn-modern--primary {
        background: var(--pharaoh-gold);
        color: #FFFFFF;
    }

    .btn-modern--primary:hover {
        background: var(--pharaoh-gold-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(193, 154, 73, 0.3);
        color: #FFFFFF;
    }

    .btn-modern--secondary {
        background: #FFFFFF;
        color: var(--hieroglyph-dark);
        border: 2px solid var(--pharaoh-gold);
    }

    .btn-modern--secondary:hover {
        background: var(--pharaoh-gold);
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    .btn-modern--sm {
        padding: var(--space-3) var(--space-6);
        font-size: 0.875rem;
    }

    .btn-modern--icon {
        width: 44px;
        height: 44px;
        padding: 0;
        border-radius: 50%;
    }

    /* Newsletter CTA - Egyptian Style */
    .newsletter-cta {
        background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--nile-blue) 100%);
        border-radius: var(--radius-xl);
        padding: var(--space-16) var(--space-8);
        text-align: center;
        margin: var(--space-20) 0;
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
        background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h80v80H0V0zm40 10L10 40l30 30 30-30-30-30z' fill='%23ffffff' fill-opacity='0.03'/%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .newsletter-cta__content {
        position: relative;
        z-index: 1;
        max-width: 700px;
        margin: 0 auto;
    }

    .newsletter-cta h3 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 900;
        color: #FFFFFF;
        margin: 0 0 var(--space-4) 0;
        text-transform: uppercase;
        letter-spacing: -0.01em;
    }

    .newsletter-cta p {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.95);
        margin: 0 0 var(--space-6) 0;
    }

    .newsletter-form {
        display: flex;
        gap: var(--space-3);
        max-width: 550px;
        margin: 0 auto;
    }

    .newsletter-form input {
        flex: 1;
        padding: var(--space-5) var(--space-6);
        font-size: 1.0625rem;
        border: none;
        border-radius: 999px;
        background: #FFFFFF;
        color: var(--hieroglyph-dark);
    }

    .newsletter-form input::placeholder {
        color: #999;
    }

    .newsletter-form input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    }

    .newsletter-form button {
        padding: var(--space-5) var(--space-10);
        font-size: 1.0625rem;
        font-weight: 700;
        color: var(--pharaoh-gold);
        background: #FFFFFF;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .newsletter-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
        background: var(--papyrus);
    }

    /* RTL Support */
    [dir="rtl"] .hero-section-modern__content {
        direction: rtl;
    }

    [dir="rtl"] .newsletter-form {
        flex-direction: row;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .products-grid-modern {
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-8);
        }
    }

    @media (max-width: 768px) {
        .hero-section-modern {
            min-height: 70vh;
        }

        .hero-section-modern__content {
            grid-template-columns: 1fr;
            gap: var(--space-8);
        }

        .features-grid-modern {
            grid-template-columns: 1fr;
            gap: var(--space-6);
        }

        .products-grid-modern {
            grid-template-columns: 1fr;
            gap: var(--space-6);
        }

        .product-card-modern__image {
            height: 300px;
        }

        .product-card-modern__content {
            padding: var(--space-6);
        }

        .product-card-modern__title {
            font-size: 1.125rem;
        }

        .product-card-modern__price {
            font-size: 1.5rem;
        }

        .product-card-modern__footer {
            flex-direction: column;
            align-items: stretch;
            gap: var(--space-4);
        }

        .product-card-modern__cart {
            width: 100%;
            justify-content: space-between;
        }

        .newsletter-cta {
            padding: var(--space-12) var(--space-6);
        }

        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-form button {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .product-card-modern__image {
            height: 280px;
        }
    }

    .hover-lift:hover {
        transform: translateY(-5px);
    }
</style>
@endsection

@section('content')
{{-- Top Promotional Banner --}}
<section style="background: linear-gradient(135deg, var(--pharaoh-gold) 0%, var(--pharaoh-gold-dark) 100%); padding: var(--space-4) 0; text-align: center;">
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

{{-- Hero Slider/Banner Section --}}
<section style="background: #F8F8F8; padding: 0; width: 100%; overflow: hidden;">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="position: relative; min-height: 500px; background: linear-gradient(135deg, rgba(193, 154, 73, 0.1) 0%, rgba(43, 95, 124, 0.1) 100%); padding: 3rem 0;">
                    <div class="container" style="max-width: 1200px;">
                        <div class="row align-items-center">
                            <div class="col-md-6" style="padding: 2rem;">
                                <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 1.5rem 0; text-transform: uppercase; line-height: 1.1;">
                                    @if($data['direction'] === 'rtl')
                                        <span style="color: var(--pharaoh-gold); display: block;">السنس المصري</span>
                                        اكتشف مجموعتنا الجديدة
                                    @else
                                        <span style="color: var(--pharaoh-gold); display: block;">Snus Egypt</span>
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
                                <a href="/shop" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: var(--pharaoh-gold); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3); transition: all 0.3s;">
                                    @if($data['direction'] === 'rtl')
                                        تسوق الآن
                                    @else
                                        Shop Now
                                    @endif
                                    <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                            </a>
                        </div>
                        <div style="position: relative; padding: var(--space-8); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/hero-product-1.png') }}" alt="Featured Product" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain; filter: drop-shadow(0 20px 60px rgba(193, 154, 73, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%23C19A49\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23C19A49\' font-size=\'24\' font-weight=\'bold\'%3EPRODUCT%3C/text%3E%3C/svg%3E'">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="position: relative; min-height: 500px; background: linear-gradient(135deg, rgba(43, 95, 124, 0.1) 0%, rgba(193, 154, 73, 0.1) 100%); display: flex; align-items: center;">
                <div class="container">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-12); align-items: center;">
                        <div style="padding: var(--space-8);">
                            <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 var(--space-6) 0; text-transform: uppercase; line-height: 1.1;">
                                @if($data['direction'] === 'rtl')
                                    <span style="color: var(--nile-blue); display: block;">عروض خاصة</span>
                                    توفير يصل إلى 25%
                                @else
                                    <span style="color: var(--nile-blue); display: block;">Special Offers</span>
                                    Save Up To 25%
                                @endif
                            </h2>
                            <p style="font-size: 1.25rem; color: #666; margin: 0 0 var(--space-8) 0; line-height: 1.7;">
                                @if($data['direction'] === 'rtl')
                                    على مجموعة مختارة من المنتجات المميزة
                                @else
                                    On selected premium products
                                @endif
                            </p>
                            <a href="/shop" style="display: inline-flex; align-items: center; gap: var(--space-3); padding: var(--space-5) var(--space-10); background: var(--nile-blue); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(43, 95, 124, 0.3); transition: all 0.3s;">
                                @if($data['direction'] === 'rtl')
                                    تسوق الآن
                                @else
                                    Shop Now
                                @endif
                                <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                            </a>
                        </div>
                        <div style="position: relative; padding: var(--space-8); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/hero-product-2.png') }}" alt="Special Offer" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain; filter: drop-shadow(0 20px 60px rgba(43, 95, 124, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%232B5F7C\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%232B5F7C\' font-size=\'24\' font-weight=\'bold\'%3ESALE%3C/text%3E%3C/svg%3E'">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="position: relative; min-height: 500px; background: linear-gradient(135deg, rgba(193, 154, 73, 0.15) 0%, rgba(233, 213, 184, 0.15) 100%); display: flex; align-items: center;">
                <div class="container">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-12); align-items: center;">
                        <div style="padding: var(--space-8);">
                            <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; color: var(--hieroglyph-dark); margin: 0 0 var(--space-6) 0; text-transform: uppercase; line-height: 1.1;">
                                @if($data['direction'] === 'rtl')
                                    <span style="color: var(--pharaoh-gold); display: block;">منتجات جديدة</span>
                                    وصل حديثاً
                                @else
                                    <span style="color: var(--pharaoh-gold); display: block;">New Products</span>
                                    Just Arrived
                                @endif
                            </h2>
                            <p style="font-size: 1.25rem; color: #666; margin: 0 0 var(--space-8) 0; line-height: 1.7;">
                                @if($data['direction'] === 'rtl')
                                    أحدث إصداراتنا من المنتجات الأصلية
                                @else
                                    Our latest releases of authentic products
                                @endif
                            </p>
                            <a href="/shop" style="display: inline-flex; align-items: center; gap: var(--space-3); padding: var(--space-5) var(--space-10); background: var(--pharaoh-gold); color: #FFFFFF; border-radius: 999px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 10px 30px rgba(193, 154, 73, 0.3); transition: all 0.3s;">
                                @if($data['direction'] === 'rtl')
                                    اكتشف الآن
                                @else
                                    Discover Now
                                @endif
                                <i class="fas fa-arrow-@if($data['direction'] === 'rtl')left@else right @endif"></i>
                            </a>
                        </div>
                        <div style="position: relative; padding: var(--space-8); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/hero-product-3.png') }}" alt="New Arrival" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain; filter: drop-shadow(0 20px 60px rgba(193, 154, 73, 0.2));" onerror="this.src='data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'200\' cy=\'200\' r=\'150\' fill=\'%23C19A49\' opacity=\'0.2\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23C19A49\' font-size=\'24\' font-weight=\'bold\'%3ENEW%3C/text%3E%3C/svg%3E'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="width: 60px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="width: 60px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

{{-- Category Bar --}}
<section style="background: #FFFFFF; border-bottom: 2px solid #F0F0F0; padding: var(--space-8) 0;">
    <div class="container">
        <div style="display: flex; align-items: center; justify-content: center; gap: var(--space-6); flex-wrap: wrap;">
            <a href="/category/cuba" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">CUBA</a>
            <a href="/category/pablo" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">PABLO</a>
            <a href="/category/swag" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">SWAG</a>
            <a href="/category/killa" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">KILLA</a>
            <a href="/category/velo" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--pharaoh-gold); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">VELO</a>
            <a href="/category/zyn" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">ZYN</a>
            <a href="/category/fox" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">FOX</a>
            <a href="/category/iceberg" style="padding: var(--space-3) var(--space-6); font-weight: 700; color: var(--hieroglyph-dark); text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; transition: all 0.3s; font-size: 0.95rem;">ICEBERG</a>
        </div>
    </div>
</section>

<style>
    @media (max-width: 768px) {
        .carousel-item > .container > div {
            grid-template-columns: 1fr !important;
            text-align: center;
        }
        .carousel-item img {
            max-height: 300px !important;
        }
    }

    section a[href^="/category/"]:hover {
        background: var(--pharaoh-gold);
        color: #FFFFFF !important;
        transform: translateY(-2px);
    }
</style>

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
<section class="section-modern" style="background: #F8F9FA; padding: var(--space-16) 0;">
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
                    اكتشف مجموعة واسعة من المنتجات المصرية الأصيلة
                @else
                    Discover a wide range of authentic Egyptian products
                @endif
            </p>
        </div>
        <div class="category-slider-show"></div>
    </div>
</section>

{{-- New Arrivals Section --}}
<section class="section-modern" style="padding: var(--space-16) 0;">
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
                    أحدث المنتجات المضافة إلى مجموعتنا
                @else
                    Latest products added to our collection
                @endif
            </p>
        </div>
        <div class="products-grid-modern new-arrival"></div>
    </div>
</section>

{{-- Featured Products Section --}}
<section class="section-modern" style="background: #F8F9FA; padding: var(--space-16) 0;">
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
                    منتجات مختارة بعناية خصيصاً لك
                @else
                    Carefully selected products specially for you
                @endif
            </p>
        </div>
        <div class="products-grid-modern tab_top_sales"></div>
    </div>
</section>

{{-- Top Selling Section --}}
<section class="section-modern" style="padding: var(--space-16) 0;">
    <div class="container">
        <div class="section-header-modern">
            <h2>
                @if($data['direction'] === 'rtl')
                    الأكثر مبيعاً هذا الأسبوع
                @else
                    Top Selling of the Week
                @endif
            </h2>
            <p>
                @if($data['direction'] === 'rtl')
                    المنتجات الأكثر شعبية لدى عملائنا
                @else
                    Most popular products among our customers
                @endif
            </p>
        </div>

        {{-- Product Tabs --}}
        <div style="display: flex; justify-content: center; gap: var(--space-4); margin-bottom: var(--space-12); flex-wrap: wrap;">
            <button class="product-tab active" data-tab="featured" style="padding: var(--space-4) var(--space-8); background: var(--pharaoh-gold); color: #FFFFFF; border: none; border-radius: 999px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">
                @if($data['direction'] === 'rtl')
                    مميز
                @else
                    Featured
                @endif
            </button>
            <button class="product-tab" data-tab="special" style="padding: var(--space-4) var(--space-8); background: #FFFFFF; color: var(--hieroglyph-dark); border: 2px solid #E0E0E0; border-radius: 999px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">
                @if($data['direction'] === 'rtl')
                    عروض خاصة
                @else
                    Special
                @endif
            </button>
            <button class="product-tab" data-tab="liked" style="padding: var(--space-4) var(--space-8); background: #FFFFFF; color: var(--hieroglyph-dark); border: 2px solid #E0E0E0; border-radius: 999px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">
                @if($data['direction'] === 'rtl')
                    الأكثر إعجاباً
                @else
                    Most Liked
                @endif
            </button>
        </div>

        <div class="products-grid-modern top-selling-products"></div>
    </div>
</section>

<style>
    .product-tab:hover {
        transform: translateY(-2px);
    }

    .product-tab.active {
        background: var(--pharaoh-gold) !important;
        color: #FFFFFF !important;
        border-color: var(--pharaoh-gold) !important;
        box-shadow: 0 8px 24px rgba(193, 154, 73, 0.3);
    }
</style>

<script>
// Tab functionality for Top Selling section
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.product-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');

            // Get the tab type
            const tabType = this.getAttribute('data-tab');
            const languageId = localStorage.getItem('languageId') || 1;
            const currency = localStorage.getItem('currency') || 'EGP';

            // Load products based on tab
            let url = "{{ url('') }}" + '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId + '&currency=' + currency;

            if (tabType === 'featured') {
                url += '&isFeatured=1';
            } else if (tabType === 'special') {
                url += '&isSpecial=1';
            } else if (tabType === 'liked') {
                url += '&sortBy=rating&sortType=DESC';
            }

            fetchProduct(url, 'top-selling-products');
        });
    });
});

{{-- Newsletter CTA --}}
<section class="section-modern" style="padding: var(--space-16) 0;">
    <div class="container">
        <div class="newsletter-cta">
            <div class="newsletter-cta__content">
                <h3>
                    @if($data['direction'] === 'rtl')
                        انضم إلى عائلة السنس المصري
                    @else
                        Join the Snus Egypt Family
                    @endif
                </h3>
                <p>
                    @if($data['direction'] === 'rtl')
                        احصل على عروض حصرية ومنتجات جديدة مباشرة إلى بريدك
                    @else
                        Get exclusive offers and new products directly to your inbox
                    @endif
                </p>
                <form class="newsletter-form" onsubmit="return false;">
                    <input
                        type="email"
                        placeholder="@if($data['direction'] === 'rtl')أدخل بريدك الإلكتروني@else Enter your email @endif"
                        required>
                    <button type="submit">
                        @if($data['direction'] === 'rtl')
                            اشترك الآن
                        @else
                            Subscribe Now
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
                <div>
                    <div class="product-card-modern__price product-card-price"></div>
                    <div class="product-card-modern__price-subscription" style="display: none;">
                        @if($data['direction'] === 'rtl')
                            اشترك من
                        @else
                            Subscribe from
                        @endif
                        <span class="subscription-price"></span>
                    </div>
                </div>
                <div class="product-card-modern__cart">
                    <button class="btn-modern btn-modern--primary btn-modern--sm add-to-card-bag" style="border-radius: 999px;">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
            </div>
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

        // Load top selling products (default: featured)
        var url = "{{ url('') }}" + '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId + '&isFeatured=1&currency=' + localStorage.getItem("currency");
        fetchProduct(url, 'top-selling-products');

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