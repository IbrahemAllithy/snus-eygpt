@extends('layouts.master')
@section('content')
<style>
/* About Us Page Modern Styles */
.about-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
}

.page-header-modern {
    background: var(--surface-1);
    padding: var(--space-8) 0;
    margin-bottom: var(--space-10);
    border-bottom: 1px solid var(--surface-2);
}

.page-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.breadcrumb-modern {
    display: flex;
    gap: var(--space-2);
    flex-wrap: wrap;
    margin-bottom: var(--space-3);
    font-size: 0.875rem;
}

.breadcrumb-modern a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-modern a:hover {
    color: var(--color-primary);
}

.breadcrumb-modern span {
    color: var(--text-tertiary);
}

.page-title-modern {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    line-height: 1.3;
}

.about-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

/* About Section */
.about-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-8);
    align-items: center;
    margin-bottom: var(--space-12);
}

.about-image-wrapper {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.about-image {
    width: 100%;
    height: auto;
    display: block;
}

.about-content {
    padding: var(--space-6);
}

.about-text {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
}

.about-info-grid {
    display: grid;
    gap: var(--space-5);
}

.about-info-item {
    background: var(--surface-1);
    border-radius: var(--radius-md);
    padding: var(--space-5);
    border: 2px solid var(--surface-2);
    transition: all 0.2s;
}

.about-info-item:hover {
    border-color: var(--color-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.about-info-title {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--color-primary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0 0 var(--space-2) 0;
}

.about-info-content {
    font-size: 1rem;
    color: var(--text-primary);
    margin: 0;
    line-height: 1.6;
}

/* Team Intro Section */
.team-intro-section {
    background: var(--surface-1);
    padding: var(--space-10) var(--space-4);
    margin-bottom: var(--space-10);
    border-radius: var(--radius-lg);
}

.team-intro-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.team-intro-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
}

.team-intro-text {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin: 0;
}

/* Leadership Section */
.leadership-section {
    margin-bottom: var(--space-12);
}

.section-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-8) 0;
    text-align: center;
}

.leadership-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-6);
}

.leader-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    display: flex;
    gap: var(--space-4);
    border: 2px solid var(--surface-2);
    transition: all 0.2s;
}

.leader-card:hover {
    border-color: var(--color-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.leader-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
    border: 3px solid var(--surface-2);
}

.leader-info {
    flex: 1;
    min-width: 0;
}

.leader-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-1) 0;
}

.leader-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-primary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0 0 var(--space-3) 0;
}

.leader-description {
    font-size: 0.9375rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0;
}

/* Team Grid Section */
.team-grid-section {
    margin-bottom: var(--space-10);
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-6);
}

.team-member-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 2px solid var(--surface-2);
    transition: all 0.3s;
}

.team-member-card:hover {
    border-color: var(--color-primary);
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.team-member-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 100%;
    background: var(--surface-0);
    overflow: hidden;
}

.team-member-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.team-member-card:hover .team-member-image {
    transform: scale(1.05);
}

.team-member-content {
    padding: var(--space-5);
}

.team-member-role {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-2) 0;
}

.team-member-description {
    font-size: 0.875rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

[dir="rtl"] .leader-card {
    direction: rtl;
}

/* Responsive */
@media (max-width: 992px) {
    .about-section {
        grid-template-columns: 1fr;
    }

    .leadership-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .about-modern {
        padding: var(--space-8) 0;
    }

    .team-grid {
        grid-template-columns: 1fr;
    }

    .leader-card {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .leader-avatar {
        width: 120px;
        height: 120px;
    }
}
</style>

<!-- Page Header -->
<div class="page-header-modern">
    <div class="page-header-content">
        <nav class="breadcrumb-modern">
            <a href="{{ url('/') }}">
                @if($data['direction'] === 'rtl')
                    الرئيسية
                @else
                    Home
                @endif
            </a>
            <span>›</span>
            <span>
                @if($data['direction'] === 'rtl')
                    من نحن
                @else
                    About Us
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                من نحن
            @else
                About Us
            @endif
        </h1>
    </div>
</div>

<!-- About Content -->
<section class="about-modern">
    <div class="about-container">
        <!-- About Section -->
        <div class="about-section">
            <div class="about-image-wrapper">
                <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Snus Egypt" class="about-image">
            </div>
            <div class="about-content">
                <p class="about-text">
                    @if($data['direction'] === 'rtl')
                        نحن في سنس إيجيبت نفخر بتقديم أجود أنواع السنس السويدي الأصلي. نحرص على توفير منتجات عالية الجودة مع خدمة عملاء ممتازة وشحن سريع لجميع أنحاء مصر.
                    @else
                        At Snus Egypt, we pride ourselves on providing the finest authentic Swedish snus. We are committed to offering high-quality products with excellent customer service and fast shipping throughout Egypt.
                    @endif
                </p>

                <div class="about-info-grid">
                    <div class="about-info-item">
                        <h5 class="about-info-title">
                            @if($data['direction'] === 'rtl')
                                العنوان
                            @else
                                ADDRESS
                            @endif
                        </h5>
                        <p class="about-info-content">
                            @if(isset(getSetting()['address']))
                                {{ getSetting()['address'] }}
                            @else
                                @if($data['direction'] === 'rtl')
                                    القاهرة، مصر
                                @else
                                    Cairo, Egypt
                                @endif
                            @endif
                        </p>
                    </div>

                    <div class="about-info-item">
                        <h5 class="about-info-title">
                            @if($data['direction'] === 'rtl')
                                الهاتف
                            @else
                                PHONE
                            @endif
                        </h5>
                        <p class="about-info-content">
                            @if(isset(getSetting()['phone']))
                                {{ getSetting()['phone'] }}
                            @endif
                        </p>
                    </div>

                    <div class="about-info-item">
                        <h5 class="about-info-title">
                            @if($data['direction'] === 'rtl')
                                البريد الإلكتروني
                            @else
                                EMAIL
                            @endif
                        </h5>
                        <p class="about-info-content">
                            @if(isset(getSetting()['email']))
                                {{ getSetting()['email'] }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Intro -->
        <div class="team-intro-section">
            <div class="team-intro-content">
                <h2 class="team-intro-title">
                    @if($data['direction'] === 'rtl')
                        فريقنا
                    @else
                        Our Team
                    @endif
                </h2>
                <p class="team-intro-text">
                    @if($data['direction'] === 'rtl')
                        نحن مجموعة من المحترفين المتحمسين الذين يعملون بجد لتقديم أفضل تجربة تسوق لعملائنا. فريقنا ملتزم بالجودة والتميز في كل ما نقوم به.
                    @else
                        We are a group of passionate professionals working hard to deliver the best shopping experience for our customers. Our team is committed to quality and excellence in everything we do.
                    @endif
                </p>
            </div>
        </div>

        <!-- Leadership Section -->
        <div class="leadership-section">
            <h2 class="section-title">
                @if($data['direction'] === 'rtl')
                    قيادتنا
                @else
                    Our Leadership
                @endif
            </h2>
            <div class="leadership-grid">
                <div class="leader-card">
                    <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="CEO" class="leader-avatar">
                    <div class="leader-info">
                        <h4 class="leader-name">
                            @if($data['direction'] === 'rtl')
                                أحمد محمد
                            @else
                                Ahmed Mohamed
                            @endif
                        </h4>
                        <p class="leader-title">
                            @if($data['direction'] === 'rtl')
                                المدير التنفيذي
                            @else
                                Chief Executive Officer
                            @endif
                        </p>
                        <p class="leader-description">
                            @if($data['direction'] === 'rtl')
                                يتمتع بخبرة واسعة في مجال التجارة الإلكترونية والتجزئة، ويقود فريقنا نحو التميز والابتكار المستمر في خدمة عملائنا.
                            @else
                                With extensive experience in e-commerce and retail, leading our team towards excellence and continuous innovation in serving our customers.
                            @endif
                        </p>
                    </div>
                </div>

                <div class="leader-card">
                    <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Operations Manager" class="leader-avatar">
                    <div class="leader-info">
                        <h4 class="leader-name">
                            @if($data['direction'] === 'rtl')
                                سارة أحمد
                            @else
                                Sara Ahmed
                            @endif
                        </h4>
                        <p class="leader-title">
                            @if($data['direction'] === 'rtl')
                                مدير العمليات
                            @else
                                Operations Manager
                            @endif
                        </p>
                        <p class="leader-description">
                            @if($data['direction'] === 'rtl')
                                مسؤولة عن ضمان سير العمليات بكفاءة وتقديم خدمة عملاء متميزة مع الحفاظ على أعلى معايير الجودة.
                            @else
                                Responsible for ensuring efficient operations and delivering exceptional customer service while maintaining the highest quality standards.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Grid -->
        <div class="team-grid-section">
            <h2 class="section-title">
                @if($data['direction'] === 'rtl')
                    تعرف على فريقنا
                @else
                    Meet Our Team
                @endif
            </h2>
            <div class="team-grid">
                <div class="team-member-card">
                    <div class="team-member-image-wrapper">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="team-member-image">
                    </div>
                    <div class="team-member-content">
                        <h5 class="team-member-role">
                            @if($data['direction'] === 'rtl')
                                مطور واجهات أمامية
                            @else
                                Frontend Developer
                            @endif
                        </h5>
                        <p class="team-member-description">
                            @if($data['direction'] === 'rtl')
                                متخصص في تطوير واجهات المستخدم الحديثة وتجربة المستخدم المتميزة.
                            @else
                                Specialized in developing modern user interfaces and exceptional user experiences.
                            @endif
                        </p>
                    </div>
                </div>

                <div class="team-member-card">
                    <div class="team-member-image-wrapper">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="team-member-image">
                    </div>
                    <div class="team-member-content">
                        <h5 class="team-member-role">
                            @if($data['direction'] === 'rtl')
                                مطور خلفي
                            @else
                                Backend Developer
                            @endif
                        </h5>
                        <p class="team-member-description">
                            @if($data['direction'] === 'rtl')
                                خبير في بناء الأنظمة الخلفية القوية والآمنة.
                            @else
                                Expert in building robust and secure backend systems.
                            @endif
                        </p>
                    </div>
                </div>

                <div class="team-member-card">
                    <div class="team-member-image-wrapper">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="team-member-image">
                    </div>
                    <div class="team-member-content">
                        <h5 class="team-member-role">
                            @if($data['direction'] === 'rtl')
                                مدير التسويق
                            @else
                                Marketing Manager
                            @endif
                        </h5>
                        <p class="team-member-description">
                            @if($data['direction'] === 'rtl')
                                مسؤول عن استراتيجيات التسويق الرقمي ونمو العلامة التجارية.
                            @else
                                Responsible for digital marketing strategies and brand growth.
                            @endif
                        </p>
                    </div>
                </div>

                <div class="team-member-card">
                    <div class="team-member-image-wrapper">
                        <img src="{{ asset('assets/images/snuslogo1.png') }}" alt="Team Member" class="team-member-image">
                    </div>
                    <div class="team-member-content">
                        <h5 class="team-member-role">
                            @if($data['direction'] === 'rtl')
                                خدمة العملاء
                            @else
                                Customer Service
                            @endif
                        </h5>
                        <p class="team-member-description">
                            @if($data['direction'] === 'rtl')
                                ملتزم بتقديم أفضل تجربة دعم لعملائنا الكرام.
                            @else
                                Committed to providing the best support experience for our valued customers.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
@endsection
