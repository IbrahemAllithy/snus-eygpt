@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--bg-page, #f8f9fa);">

    {{-- Hero Section with Modern Gradient --}}
    <section class="hero-modern py-5" style="background: linear-gradient(135deg, var(--color-primary, #ae69f5) 0%, var(--color-secondary, #f49d2a) 100%); min-height: 400px;" data-aos="fade-in">
        <div class="container">
            <div class="row align-items-center" style="min-height: 400px;">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h1 class="display-3 fw-bold mb-4" data-aos="fade-up" data-aos-delay="100" style="text-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                        🎨 Modern Frontend Demo
                    </h1>
                    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200" style="font-size: 1.3rem; opacity: 0.95;">
                        Experience the new Vite-powered, Bootstrap 5, Alpine.js enhanced design system
                    </p>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <a href="#features" class="btn btn-light btn-lg px-5 py-3 rounded-pill" style="box-shadow: 0 8px 20px rgba(0,0,0,0.2); font-weight: 600;">
                            <i class="fas fa-rocket me-2"></i> Explore Features
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-5" style="background: var(--bg-page, #f8f9fa);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-body, #1a3353); font-size: 2.5rem;">
                    ⚡ Modern Tech Stack
                </h2>
                <p class="text-muted" style="font-size: 1.1rem;">Built with cutting-edge technologies for optimal performance</p>
            </div>

            <div class="row g-4">
                {{-- Feature Card 1 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-bolt" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Vite Build System</h4>
                            <p class="text-muted mb-0">Lightning-fast HMR and optimized production builds in just 1 second</p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 2 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-bootstrap" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Bootstrap 5.3</h4>
                            <p class="text-muted mb-0">Modern components with improved grid system and utility classes</p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 3 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-mountain" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Alpine.js</h4>
                            <p class="text-muted mb-0">Lightweight reactivity for interactive components without bloat</p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 4 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-palette" style="font-size: 28px; color: white;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">CSS Variables</h4>
                            <p class="text-muted mb-0">Dynamic theming system replacing 25 separate color files with 1</p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 5 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-magic" style="font-size: 28px; color: #666;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">AOS Animations</h4>
                            <p class="text-muted mb-0">Smooth scroll animations that activate as elements enter viewport</p>
                        </div>
                    </div>
                </div>

                {{-- Feature Card 6 --}}
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 h-100 hover-lift" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white);">
                        <div class="card-body p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; border-radius: 12px; background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-moon" style="font-size: 28px; color: #666;"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Dark Mode</h4>
                            <p class="text-muted mb-0">Toggle between light and dark themes with persistent preference</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Cards Demo --}}
    <section class="py-5" style="background: var(--bg-body, white);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-body, #1a3353); font-size: 2.5rem;">
                    🛍️ Modern Product Cards
                </h2>
                <p class="text-muted" style="font-size: 1.1rem;">Hover effects, glassmorphism, and smooth transitions</p>
            </div>

            <div class="row g-4">
                @for($i = 1; $i <= 3; $i++)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="product-card-modern card border-0 h-100" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease; background: var(--bg-panel, white); overflow: hidden;">
                        <div class="position-relative" style="overflow: hidden;">
                            <img src="https://via.placeholder.com/400x300/{{ ['ae69f5', 'f49d2a', '667eea'][$i-1] }}/ffffff?text=Product+{{ $i }}"
                                 class="card-img-top"
                                 alt="Product {{ $i }}"
                                 style="transition: transform 0.5s ease;">
                            <div class="position-absolute top-0 end-0 p-3">
                                <span class="badge" style="background: rgba(255,255,255,0.9); color: #ae69f5; font-weight: 600; padding: 8px 16px; border-radius: 20px; backdrop-filter: blur(10px);">
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
                            <p class="text-muted small mb-2">Category {{ $i }}</p>
                            <h5 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Modern Product {{ $i }}</h5>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="fs-4 fw-bold" style="color: var(--color-primary, #ae69f5);">$99.99</span>
                                    <span class="text-muted text-decoration-line-through ms-2">$129.99</span>
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
    <section class="py-5" style="background: var(--bg-page, #f8f9fa);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-body, #1a3353); font-size: 2.5rem;">
                    🎨 UI Components
                </h2>
                <p class="text-muted" style="font-size: 1.1rem;">Modern buttons, badges, and interactive elements</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card border-0 p-4" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); background: var(--bg-panel, white);">
                        <h4 class="fw-bold mb-4" style="color: var(--text-body, #1a3353);">Modern Buttons</h4>
                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn btn-primary rounded-pill px-4 py-2" style="background: var(--color-primary, #ae69f5); border: none; box-shadow: 0 4px 12px rgba(174,105,245,0.3);">
                                <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                            </button>
                            <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="border-color: var(--color-primary, #ae69f5); color: var(--color-primary, #ae69f5);">
                                <i class="fas fa-heart me-2"></i> Wishlist
                            </button>
                            <button class="btn btn-secondary rounded-pill px-4 py-2" style="background: var(--color-secondary, #f49d2a); border: none;">
                                <i class="fas fa-eye me-2"></i> Quick View
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card border-0 p-4" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); background: var(--bg-panel, white);">
                        <h4 class="fw-bold mb-4" style="color: var(--text-body, #1a3353);">Status Badges</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 14px;">New Arrival</span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); font-size: 14px;">Hot Deal</span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); font-size: 14px;">Limited Stock</span>
                            <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); font-size: 14px;">Free Shipping</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Theme Switcher Demo --}}
    <section class="py-5" style="background: var(--bg-body, white);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold mb-3" style="color: var(--text-body, #1a3353); font-size: 2.5rem;">
                    🌓 Theme System
                </h2>
                <p class="text-muted" style="font-size: 1.1rem;">Try the dark mode toggle button in the bottom-right corner!</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <div class="card border-0 p-5 text-center" style="border-radius: var(--radius-lg, 12px); box-shadow: 0 8px 24px rgba(0,0,0,0.12); background: var(--bg-panel, white);">
                        <div class="mb-4">
                            <i class="fas fa-palette" style="font-size: 64px; color: var(--color-primary, #ae69f5);"></i>
                        </div>
                        <h3 class="fw-bold mb-3" style="color: var(--text-body, #1a3353);">Dynamic Color Themes</h3>
                        <p class="text-muted mb-4">CSS Variables power the entire theme system. One file replaces 25 separate color stylesheets!</p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #ae69f5; border: 3px solid white; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" title="Purple Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #f49d2a; border: 3px solid white; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" title="Orange Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #ff0000; border: 3px solid white; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" title="Red Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #00a859; border: 3px solid white; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" title="Green Theme"></button>
                            <button class="btn rounded-circle" style="width: 50px; height: 50px; background: #2196F3; border: 3px solid white; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" title="Blue Theme"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Performance Stats --}}
    <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="display-4 fw-bold mb-2">70%</div>
                    <div class="text-white-50">Faster Builds</div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="display-4 fw-bold mb-2">25→1</div>
                    <div class="text-white-50">Color Files Reduced</div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="display-4 fw-bold mb-2">2.24KB</div>
                    <div class="text-white-50">Gzipped CSS</div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="display-4 fw-bold mb-2">1.01s</div>
                    <div class="text-white-50">Build Time</div>
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
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
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
