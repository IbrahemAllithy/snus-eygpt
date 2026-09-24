@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Breadcrumb --}}
    <div class="container-fluid" style="background: var(--surface-1); padding: 1rem 0; box-shadow: var(--shadow-sm);">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0" style="background: transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" style="color: var(--color-primary); text-decoration: none;">
                            @if($data['direction'] === 'rtl')
                                الرئيسية
                            @else
                                Home
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: var(--text-secondary);">
                        @if($data['direction'] === 'rtl')
                            من نحن
                        @else
                            About Us
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Page Header --}}
    <section class="py-5" style="background: linear-gradient(135deg, var(--surface-1) 0%, var(--surface-0) 100%);">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(2rem, 4vw, 3rem);">
                    @if($data['direction'] === 'rtl')
                        من نحن
                    @else
                        About Us
                    @endif
                </h1>
                <p style="color: var(--text-secondary); font-size: clamp(1rem, 2vw, 1.25rem); max-width: 800px; margin: 0 auto;">
                    @if($data['direction'] === 'rtl')
                        تعرف على قصتنا ورؤيتنا في تقديم أفضل منتجات السنوس الأصلية
                    @else
                        Learn about our story and vision in delivering the finest authentic snus products
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- About Content --}}
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-12 col-md-6">
                    <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl);">
                        <img class="img-fluid" src="{{ asset('assets/images/snuslogo1.png') }}" alt="Snus Egypt" style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div>
                        <h2 class="fw-bold mb-4" style="color: var(--text-primary); font-size: clamp(1.75rem, 3vw, 2.5rem);">
                            @if($data['direction'] === 'rtl')
                                قصتنا
                            @else
                                Our Story
                            @endif
                        </h2>
                        <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.1rem; margin-bottom: 1.5rem;">
                            @if($data['direction'] === 'rtl')
                                نحن متخصصون في توفير أجود أنواع السنوس الأصلية المستوردة مباشرة من المصادر الموثوقة. نلتزم بتقديم منتجات عالية الجودة تلبي توقعات عملائنا وتوفر لهم تجربة استثنائية.
                            @else
                                We specialize in providing the finest authentic snus products imported directly from trusted sources. We are committed to delivering high-quality products that meet our customers' expectations and provide them with an exceptional experience.
                            @endif
                        </p>
                        <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.1rem;">
                            @if($data['direction'] === 'rtl')
                                مع سنوات من الخبرة في هذا المجال، نفخر بكوننا الوجهة الأولى لعشاق السنوس في مصر والمنطقة العربية.
                            @else
                                With years of experience in this field, we pride ourselves on being the premier destination for snus enthusiasts in Egypt and the Arab region.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Info Section --}}
    <section class="py-5" style="background: var(--surface-1);">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="text-center p-4" style="background: var(--surface-0); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); height: 100%;">
                        <div class="mb-3">
                            <div class="mx-auto" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt" style="font-size: 30px; color: white;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                العنوان
                            @else
                                ADDRESS
                            @endif
                        </h5>
                        <p style="color: var(--text-secondary);">
                            1800 Abbot Kinney Blvd. Unit D &amp; E Venice
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-center p-4" style="background: var(--surface-0); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); height: 100%;">
                        <div class="mb-3">
                            <div class="mx-auto" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-phone" style="font-size: 30px; color: white;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                الهاتف
                            @else
                                PHONE
                            @endif
                        </h5>
                        <p style="color: var(--text-secondary); margin-bottom: 0.5rem;">
                            Mobile: +88 – 1990
                        </p>
                        <p style="color: var(--text-secondary);">
                            Hotline: 1800 – 1102
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-center p-4" style="background: var(--surface-0); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); height: 100%;">
                        <div class="mb-3">
                            <div class="mx-auto" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope" style="font-size: 30px; color: white;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                البريد الإلكتروني
                            @else
                                EMAIL
                            @endif
                        </h5>
                        <p style="color: var(--text-secondary);">
                            Support@ecommerce.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(1.75rem, 3vw, 2.5rem);">
                    @if($data['direction'] === 'rtl')
                        فريقنا
                    @else
                        Our Team
                    @endif
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 700px; margin: 0 auto;">
                    @if($data['direction'] === 'rtl')
                        فريق محترف متخصص في تقديم أفضل خدمة لعملائنا
                    @else
                        A professional team dedicated to providing the best service to our customers
                    @endif
                </p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="d-flex gap-3 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="rounded-circle" style="width:80px; height:80px; object-fit: cover; flex-shrink: 0;">
                        <div>
                            <h5 class="fw-bold mb-1" style="color: var(--text-primary);">John Doe</h5>
                            <p class="mb-2" style="color: var(--color-primary); font-size: 0.9rem;">
                                @if($data['direction'] === 'rtl')
                                    مدير المبيعات
                                @else
                                    Sales Executive
                                @endif
                            </p>
                            <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                @if($data['direction'] === 'rtl')
                                    متخصص في توفير أفضل تجربة تسوق للعملاء وتقديم الاستشارات حول المنتجات
                                @else
                                    Specialized in providing the best shopping experience and product consultation for customers
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex gap-3 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="rounded-circle" style="width:80px; height:80px; object-fit: cover; flex-shrink: 0;">
                        <div>
                            <h5 class="fw-bold mb-1" style="color: var(--text-primary);">Jane Smith</h5>
                            <p class="mb-2" style="color: var(--color-primary); font-size: 0.9rem;">
                                @if($data['direction'] === 'rtl')
                                    مدير خدمة العملاء
                                @else
                                    Customer Service Manager
                                @endif
                            </p>
                            <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                @if($data['direction'] === 'rtl')
                                    متخصصة في حل المشكلات وتقديم أفضل دعم فني للعملاء على مدار الساعة
                                @else
                                    Specialized in problem-solving and providing the best technical support to customers around the clock
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    .breadcrumb-item + .breadcrumb-item::before {
        color: var(--text-secondary);
    }

    [dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
        content: "\\";
    }
</style>
@endsection

@section('script')
@endsection
