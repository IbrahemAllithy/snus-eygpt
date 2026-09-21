@extends('layouts.master')
@section('content')
<style>
/* Privacy Policy Page Modern Styles */
.privacy-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
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

.privacy-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.privacy-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
}

.privacy-intro {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin: 0 0 var(--space-8) 0;
    padding-bottom: var(--space-6);
    border-bottom: 2px solid var(--surface-2);
}

.privacy-section {
    margin-bottom: var(--space-8);
}

.privacy-section:last-child {
    margin-bottom: 0;
}

.privacy-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.privacy-section-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--color-primary);
    color: var(--surface-0);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.privacy-section-content {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--text-primary);
}

.privacy-section-content p {
    margin: 0 0 var(--space-4) 0;
}

.privacy-section-content p:last-child {
    margin-bottom: 0;
}

.privacy-section-content ul,
.privacy-section-content ol {
    margin: var(--space-4) 0;
    padding-left: var(--space-6);
}

[dir="rtl"] .privacy-section-content ul,
[dir="rtl"] .privacy-section-content ol {
    padding-left: 0;
    padding-right: var(--space-6);
}

.privacy-section-content li {
    margin-bottom: var(--space-2);
}

.privacy-section-content strong {
    color: var(--color-primary);
    font-weight: 700;
}

.privacy-update {
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 2px solid var(--surface-2);
    font-size: 0.9375rem;
    color: var(--text-tertiary);
    text-align: center;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

[dir="rtl"] .privacy-section-title {
    direction: rtl;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .privacy-modern {
        padding: var(--space-8) 0;
    }

    .privacy-card {
        padding: var(--space-6);
    }

    .privacy-section-title {
        font-size: 1.25rem;
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
                    سياسة الخصوصية
                @else
                    Privacy Policy
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                سياسة الخصوصية
            @else
                Privacy Policy
            @endif
        </h1>
    </div>
</div>

<!-- Privacy Content -->
<section class="privacy-modern">
    <div class="privacy-container">
        <article class="privacy-card">
            <p class="privacy-intro">
                @if($data['direction'] === 'rtl')
                    في سنس إيجيبت، نحن ملتزمون بحماية خصوصيتك. توضح هذه السياسة كيفية جمع واستخدام وحماية معلوماتك الشخصية عند استخدام موقعنا وخدماتنا.
                @else
                    At Snus Egypt, we are committed to protecting your privacy. This policy explains how we collect, use, and protect your personal information when you use our website and services.
                @endif
            </p>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-database"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            المعلومات التي نجمعها
                        @else
                            Information We Collect
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نقوم بجمع المعلومات التالية عند استخدامك لموقعنا:
                        @else
                            We collect the following information when you use our website:
                        @endif
                    </p>
                    <ul>
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>معلومات الحساب:</strong> الاسم، البريد الإلكتروني، رقم الهاتف، وكلمة المرور
                            @else
                                <strong>Account Information:</strong> Name, email, phone number, and password
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>معلومات الطلب:</strong> عنوان التسليم، تفاصيل الدفع، وتاريخ الطلبات
                            @else
                                <strong>Order Information:</strong> Delivery address, payment details, and order history
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>معلومات التصفح:</strong> عنوان IP، نوع المتصفح، وصفحات الموقع المزارة
                            @else
                                <strong>Browsing Information:</strong> IP address, browser type, and pages visited
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            كيف نستخدم معلوماتك
                        @else
                            How We Use Your Information
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نستخدم المعلومات التي نجمعها للأغراض التالية:
                        @else
                            We use the information we collect for the following purposes:
                        @endif
                    </p>
                    <ul>
                        <li>
                            @if($data['direction'] === 'rtl')
                                معالجة طلباتك وتسليم المنتجات
                            @else
                                Process your orders and deliver products
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                التواصل معك بخصوص طلباتك وخدماتنا
                            @else
                                Communicate with you about your orders and our services
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                تحسين تجربة التسوق وخدمة العملاء
                            @else
                                Improve shopping experience and customer service
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                إرسال العروض والتحديثات (بموافقتك)
                            @else
                                Send offers and updates (with your consent)
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-shield-alt"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            حماية معلوماتك
                        @else
                            Protecting Your Information
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نتخذ تدابير أمنية صارمة لحماية معلوماتك الشخصية من الوصول غير المصرح به أو الاستخدام أو الكشف. نستخدم التشفير وبروتوكولات الأمان المتقدمة لضمان سلامة بياناتك.
                        @else
                            We take strict security measures to protect your personal information from unauthorized access, use, or disclosure. We use encryption and advanced security protocols to ensure the integrity of your data.
                        @endif
                    </p>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-cookie-bite"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            ملفات تعريف الارتباط
                        @else
                            Cookies
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نستخدم ملفات تعريف الارتباط (Cookies) لتحسين تجربتك على موقعنا. ملفات تعريف الارتباط هي ملفات نصية صغيرة يتم تخزينها على جهازك لتذكر تفضيلاتك وتحسين تجربة التصفح.
                        @else
                            We use cookies to improve your experience on our website. Cookies are small text files stored on your device to remember your preferences and enhance browsing experience.
                        @endif
                    </p>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-share-alt"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            مشاركة المعلومات
                        @else
                            Information Sharing
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لا نبيع أو نؤجر معلوماتك الشخصية لأطراف ثالثة. قد نشارك معلوماتك مع مزودي خدمات موثوقين لمعالجة الطلبات والشحن والدفع فقط، وهم ملزمون بحماية خصوصيتك.
                        @else
                            We do not sell or rent your personal information to third parties. We may share your information with trusted service providers for order processing, shipping, and payment only, and they are bound to protect your privacy.
                        @endif
                    </p>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-user-check"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            حقوقك
                        @else
                            Your Rights
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لديك الحق في الوصول إلى معلوماتك الشخصية، وتصحيحها، أو حذفها في أي وقت. يمكنك أيضاً إلغاء الاشتراك في رسائلنا التسويقية. للقيام بذلك، يرجى الاتصال بنا عبر صفحة الاتصال.
                        @else
                            You have the right to access, correct, or delete your personal information at any time. You can also unsubscribe from our marketing communications. To do so, please contact us via our contact page.
                        @endif
                    </p>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-child"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            خصوصية الأطفال
                        @else
                            Children's Privacy
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            خدماتنا غير موجهة للأطفال دون سن 18 عاماً. لا نجمع معلومات شخصية من الأطفال عن عمد. إذا اكتشفنا أننا جمعنا معلومات من طفل، سنقوم بحذفها فوراً.
                        @else
                            Our services are not directed to children under 18 years of age. We do not knowingly collect personal information from children. If we discover that we have collected information from a child, we will delete it immediately.
                        @endif
                    </p>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="privacy-section-title">
                    <span class="privacy-section-icon">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            اتصل بنا
                        @else
                            Contact Us
                        @endif
                    </span>
                </h2>
                <div class="privacy-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            إذا كان لديك أي أسئلة حول سياسة الخصوصية هذه، يرجى الاتصال بنا عبر:
                        @else
                            If you have any questions about this privacy policy, please contact us via:
                        @endif
                    </p>
                    <ul>
                        @if(isset(getSetting()['email']))
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>البريد الإلكتروني:</strong> {{ getSetting()['email'] }}
                            @else
                                <strong>Email:</strong> {{ getSetting()['email'] }}
                            @endif
                        </li>
                        @endif
                        @if(isset(getSetting()['phone']))
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>الهاتف:</strong> {{ getSetting()['phone'] }}
                            @else
                                <strong>Phone:</strong> {{ getSetting()['phone'] }}
                            @endif
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="privacy-update">
                @if($data['direction'] === 'rtl')
                    آخر تحديث: {{ date('Y/m/d') }}
                @else
                    Last updated: {{ date('d/m/Y') }}
                @endif
            </div>
        </article>
    </div>
</section>

@endsection
@section('script')
@endsection
