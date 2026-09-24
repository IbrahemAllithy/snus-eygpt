@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Hero Section with Modern Gradient --}}
    <section class="hero-modern py-5" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); min-height: 400px;" data-aos="fade-in">
        <div class="container">
            <div class="row align-items-center" style="min-height: 400px;">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h1 class="display-3 fw-bold mb-4" data-aos="fade-up" data-aos-delay="100" style="text-shadow: 0 4px 12px rgba(0,0,0,0.2); font-size: clamp(2rem, 5vw, 3.5rem);">
                        @if($data['direction'] === 'rtl')
                            🎨 عرض تجريبي للتصميم الحديث
                        @else
                            🎨 Modern Frontend Demo
                        @endif
                    </h1>
                    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200" style="font-size: clamp(1rem, 2vw, 1.3rem); opacity: 0.95;">
                        @if($data['direction'] === 'rtl')
                            تجربة نظام التصميم الجديد مع Bootstrap 5 ونظام الألوان المتقدم
                        @else
                            Experience the new Bootstrap 5 enhanced design system
                        @endif
                    </p>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <a href="#features" class="btn btn-light btn-lg px-5 py-3 rounded-pill" style="box-shadow: var(--shadow-lg); font-weight: 600;">
                            <i class="fas fa-rocket me-2"></i>
                            @if($data['direction'] === 'rtl')
                                استكشف المميزات
                            @else
                                Explore Features
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-5" style="background: var(--surface-0);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        ⚡ التقنيات الحديثة
                    @else
                        ⚡ Modern Tech Stack
                    @endif
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.1rem;">
                    @if($data['direction'] === 'rtl')
                        مبني بأحدث التقنيات لأفضل أداء
                    @else
                        Built with cutting-edge technologies for optimal performance
                    @endif
                </p>
            </div>

            <div class="row g-4">
                {{-- Feature Card 1 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-bolt" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    نظام بناء سريع
                                @else
                                    Fast Build System
                                @endif
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    بناء محسّن وسريع للإنتاج في ثانية واحدة فقط
                                @else
                                    Lightning-fast optimized production builds in just 1 second
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 2 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-bootstrap" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">Bootstrap 5.3</h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    مكونات حديثة مع نظام شبكة محسّن وفئات أدوات متقدمة
                                @else
                                    Modern components with improved grid system and utility classes
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 3 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-palette" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    متغيرات CSS
                                @else
                                    CSS Variables
                                @endif
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    نظام تخصيص ديناميكي يستبدل 25 ملف ألوان منفصل بملف واحد
                                @else
                                    Dynamic theming system replacing 25 separate color files with 1
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 4 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-mobile-alt" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    تصميم متجاوب
                                @else
                                    Responsive Design
                                @endif
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    يعمل بشكل مثالي على جميع الأجهزة من الهواتف إلى أجهزة سطح المكتب
                                @else
                                    Works perfectly on all devices from phones to desktops
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 5 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-magic" style="font-size: 28px; color: #666;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    رسوم متحركة سلسة
                                @else
                                    Smooth Animations
                                @endif
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    رسوم متحركة سلسة تنشط عند ظهور العناصر في الشاشة
                                @else
                                    Smooth scroll animations that activate as elements enter viewport
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 6 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-globe" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    دعم RTL
                                @else
                                    RTL Support
                                @endif
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 0;">
                                @if($data['direction'] === 'rtl')
                                    دعم كامل للغة العربية مع تخطيط من اليمين لليسار
                                @else
                                    Full Arabic language support with right-to-left layout
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Cards Demo --}}
    <section class="py-5" style="background: var(--surface-1);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        🛍️ بطاقات المنتجات الحديثة
                    @else
                        🛍️ Modern Product Cards
                    @endif
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.1rem;">
                    @if($data['direction'] === 'rtl')
                        تأثيرات التمرير والانتقالات السلسة
                    @else
                        Hover effects and smooth transitions
                    @endif
                </p>
            </div>

            <div class="row g-4">
                @for($i = 1; $i <= 3; $i++)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="product-card-modern card border-0 h-100" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease; background: var(--surface-1); overflow: hidden;">
                        <div class="position-relative" style="overflow: hidden;">
                            <img src="https://via.placeholder.com/400x300/C19A49/ffffff?text={{ $data['direction'] === 'rtl' ? 'منتج' : 'Product' }}+{{ $i }}"
                                 class="card-img-top"
                                 alt="{{ $data['direction'] === 'rtl' ? 'منتج' : 'Product' }} {{ $i }}"
                                 style="transition: transform 0.5s ease;">
                            <div class="position-absolute top-0 {{ $data['direction'] === 'rtl' ? 'start' : 'end' }}-0 p-3">
                                <span class="badge" style="background: rgba(193, 154, 73, 0.9); color: white; font-weight: 600; padding: 8px 16px; border-radius: 999px; backdrop-filter: blur(10px);">
                                    -{{ 20 + ($i * 5) }}%
                                </span>
                            </div>
                            <div class="product-overlay position-absolute w-100 h-100 top-0 start-0 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.4); opacity: 0; transition: opacity 0.3s ease;">
                                <button class="btn btn-light action-btn mx-2" style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="btn btn-light action-btn mx-2" style="width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <p class="small mb-2" style="color: var(--text-secondary);">
                                @if($data['direction'] === 'rtl')
                                    التصنيف {{ $i }}
                                @else
                                    Category {{ $i }}
                                @endif
                            </p>
                            <h5 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    منتج حديث {{ $i }}
                                @else
                                    Modern Product {{ $i }}
                                @endif
                            </h5>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="fs-4 fw-bold" style="color: var(--color-primary);">$99.99</span>
                                    <span class="text-decoration-line-through ms-2" style="color: var(--text-secondary);">$129.99</span>
                                </div>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Buttons & Components Demo --}}
    <section class="py-5" style="background: var(--surface-0);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        🎨 مكونات الواجهة
                    @else
                        🎨 UI Components
                    @endif
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.1rem;">
                    @if($data['direction'] === 'rtl')
                        أزرار حديثة وشارات وعناصر تفاعلية
                    @else
                        Modern buttons, badges, and interactive elements
                    @endif
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card border-0 p-4" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); background: var(--surface-1);">
                        <h4 class="fw-bold mb-4" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                أزرار حديثة
                            @else
                                Modern Buttons
                            @endif
                        </h4>
                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn btn-primary rounded-pill px-4 py-2" style="background: var(--color-primary); border: none; box-shadow: var(--shadow-md);">
                                <i class="fas fa-shopping-cart me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    أضف للسلة
                                @else
                                    Add to Cart
                                @endif
                            </button>
                            <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="border-color: var(--color-primary); color: var(--color-primary); border-width: 2px;">
                                <i class="fas fa-heart me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    المفضلة
                                @else
                                    Wishlist
                                @endif
                            </button>
                            <button class="btn btn-secondary rounded-pill px-4 py-2" style="background: var(--surface-3); color: var(--text-primary); border: none;">
                                <i class="fas fa-eye me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    عرض سريع
                                @else
                                    Quick View
                                @endif
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card border-0 p-4" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); background: var(--surface-1);">
                        <h4 class="fw-bold mb-4" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                شارات الحالة
                            @else
                                Status Badges
                            @endif
                        </h4>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 14px;">
                                @if($data['direction'] === 'rtl')
                                    وصول جديد
                                @else
                                    New Arrival
                                @endif
                            </span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); font-size: 14px;">
                                @if($data['direction'] === 'rtl')
                                    عرض ساخن
                                @else
                                    Hot Deal
                                @endif
                            </span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); font-size: 14px;">
                                @if($data['direction'] === 'rtl')
                                    كمية محدودة
                                @else
                                    Limited Stock
                                @endif
                            </span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); font-size: 14px;">
                                @if($data['direction'] === 'rtl')
                                    شحن مجاني
                                @else
                                    Free Shipping
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Theme Switcher Demo --}}
    <section class="py-5" style="background: var(--surface-1);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        🌓 نظام السمات
                    @else
                        🌓 Theme System
                    @endif
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.1rem;">
                    @if($data['direction'] === 'rtl')
                        نظام ألوان ديناميكي بالكامل
                    @else
                        Fully dynamic color system
                    @endif
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <div class="card border-0 p-5 text-center" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-xl); background: var(--surface-1);">
                        <div class="mb-4">
                            <i class="fas fa-palette" style="font-size: 64px; color: var(--color-primary);"></i>
                        </div>
                        <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                سمات الألوان الديناميكية
                            @else
                                Dynamic Color Themes
                            @endif
                        </h3>
                        <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                            @if($data['direction'] === 'rtl')
                                متغيرات CSS تشغل نظام السمات بالكامل. ملف واحد يستبدل 25 ملف ألوان منفصل!
                            @else
                                CSS Variables power the entire theme system. One file replaces 25 separate color stylesheets!
                            @endif
                        </p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: var(--color-primary); border: 3px solid white; box-shadow: var(--shadow-md);" title="Primary Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #f49d2a; border: 3px solid white; box-shadow: var(--shadow-md);" title="Orange Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #ff0000; border: 3px solid white; box-shadow: var(--shadow-md);" title="Red Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #00a859; border: 3px solid white; box-shadow: var(--shadow-md);" title="Green Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #2196F3; border: 3px solid white; box-shadow: var(--shadow-md);" title="Blue Theme"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Performance Stats --}}
    <section class="py-5" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="display-4 fw-bold mb-2">70%</div>
                    <div style="opacity: 0.9;">
                        @if($data['direction'] === 'rtl')
                            بناء أسرع
                        @else
                            Faster Builds
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="display-4 fw-bold mb-2">25→1</div>
                    <div style="opacity: 0.9;">
                        @if($data['direction'] === 'rtl')
                            تقليل ملفات الألوان
                        @else
                            Color Files Reduced
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="display-4 fw-bold mb-2">2.24KB</div>
                    <div style="opacity: 0.9;">
                        @if($data['direction'] === 'rtl')
                            CSS مضغوط
                        @else
                            Gzipped CSS
                        @endif
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="display-4 fw-bold mb-2">1.01s</div>
                    <div style="opacity: 0.9;">
                        @if($data['direction'] === 'rtl')
                            وقت البناء
                        @else
                            Build Time
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl) !important;
    }
    .product-card-modern:hover img {
        transform: scale(1.1);
    }
    .product-card-modern:hover .product-overlay {
        opacity: 1 !important;
    }
    .action-btn:hover {
        transform: scale(1.1) !important;
    }
</style>
@endsection
