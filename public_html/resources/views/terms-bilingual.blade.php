@extends('layouts.master')
@section('content')
<style>
/* Terms Page Modern Styles */
.terms-modern {
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

.terms-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.terms-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
}

.terms-intro {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin: 0 0 var(--space-8) 0;
    padding-bottom: var(--space-6);
    border-bottom: 2px solid var(--surface-2);
}

.terms-section {
    margin-bottom: var(--space-8);
}

.terms-section:last-child {
    margin-bottom: 0;
}

.terms-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.terms-section-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--color-primary);
    color: var(--surface-0);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    font-weight: 700;
    flex-shrink: 0;
}

.terms-section-content {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--text-primary);
}

.terms-section-content p {
    margin: 0 0 var(--space-4) 0;
}

.terms-section-content p:last-child {
    margin-bottom: 0;
}

.terms-section-content ul,
.terms-section-content ol {
    margin: var(--space-4) 0;
    padding-left: var(--space-6);
}

[dir="rtl"] .terms-section-content ul,
[dir="rtl"] .terms-section-content ol {
    padding-left: 0;
    padding-right: var(--space-6);
}

.terms-section-content li {
    margin-bottom: var(--space-2);
}

.terms-section-content strong {
    color: var(--color-primary);
    font-weight: 700;
}

.terms-update {
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

[dir="rtl"] .terms-section-title {
    direction: rtl;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .terms-modern {
        padding: var(--space-8) 0;
    }

    .terms-card {
        padding: var(--space-6);
    }

    .terms-section-title {
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
                    الشروط والأحكام
                @else
                    Terms & Conditions
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                الشروط والأحكام
            @else
                Terms & Conditions
            @endif
        </h1>
    </div>
</div>

<!-- Terms Content -->
<section class="terms-modern">
    <div class="terms-container">
        <article class="terms-card">
            <p class="terms-intro">
                @if($data['direction'] === 'rtl')
                    مرحباً بك في سنس إيجيبت. باستخدامك لموقعنا وخدماتنا، فإنك توافق على الالتزام بالشروط والأحكام التالية. يرجى قراءتها بعناية قبل استخدام خدماتنا.
                @else
                    Welcome to Snus Egypt. By using our website and services, you agree to comply with the following terms and conditions. Please read them carefully before using our services.
                @endif
            </p>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">1</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            قبول الشروط
                        @else
                            Acceptance of Terms
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            باستخدام موقع سنس إيجيبت، فإنك توافق على الالتزام بهذه الشروط والأحكام وجميع القوانين واللوائح المعمول بها. إذا كنت لا توافق على أي من هذه الشروط، يُمنع استخدام هذا الموقع.
                        @else
                            By using the Snus Egypt website, you agree to be bound by these terms and conditions and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using this site.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">2</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            المنتجات والخدمات
                        @else
                            Products and Services
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            جميع المنتجات المعروضة على موقعنا هي منتجات سنس سويدية أصلية. نحتفظ بالحق في تعديل أو إيقاف أي منتج في أي وقت دون إشعار مسبق.
                        @else
                            All products displayed on our website are authentic Swedish snus products. We reserve the right to modify or discontinue any product at any time without prior notice.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">3</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            الطلبات والأسعار
                        @else
                            Orders and Pricing
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            جميع الأسعار معروضة بالجنيه المصري وتشمل الضرائب المطبقة. نحتفظ بالحق في تغيير الأسعار في أي وقت. الأسعار المعمول بها هي تلك الموجودة وقت تأكيد الطلب.
                        @else
                            All prices are displayed in Egyptian Pounds and include applicable taxes. We reserve the right to change prices at any time. The applicable prices are those in effect at the time of order confirmation.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">4</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            الشحن والتسليم
                        @else
                            Shipping and Delivery
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نقوم بالشحن إلى جميع أنحاء مصر. مدة التسليم تعتمد على موقعك وتوافر المنتج. سنبذل قصارى جهدنا لتسليم طلبك في الوقت المحدد، ولكننا لا نتحمل المسؤولية عن التأخير الناتج عن ظروف خارجة عن إرادتنا.
                        @else
                            We ship throughout Egypt. Delivery time depends on your location and product availability. We will do our best to deliver your order on time, but we are not responsible for delays caused by circumstances beyond our control.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">5</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            سياسة الإرجاع والاستبدال
                        @else
                            Return and Exchange Policy
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            نقبل الإرجاع والاستبدال خلال 14 يوماً من تاريخ الاستلام، بشرط أن يكون المنتج في حالته الأصلية ولم يتم فتحه. يرجى الاطلاع على صفحة سياسة الإرجاع للمزيد من التفاصيل.
                        @else
                            We accept returns and exchanges within 14 days of receipt, provided the product is in its original condition and unopened. Please see our Return Policy page for more details.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">6</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            الملكية الفكرية
                        @else
                            Intellectual Property
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            جميع المحتويات الموجودة على هذا الموقع، بما في ذلك النصوص والصور والشعارات، محمية بموجب حقوق النشر والعلامات التجارية. لا يجوز استخدام أي محتوى دون إذن كتابي مسبق.
                        @else
                            All content on this website, including text, images, and logos, is protected by copyright and trademarks. No content may be used without prior written permission.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">7</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            قيود المسؤولية
                        @else
                            Limitation of Liability
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لن نكون مسؤولين عن أي أضرار مباشرة أو غير مباشرة أو عرضية أو تبعية تنشأ عن استخدام أو عدم القدرة على استخدام موقعنا أو منتجاتنا.
                        @else
                            We will not be liable for any direct, indirect, incidental, or consequential damages arising from the use or inability to use our website or products.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-section">
                <h2 class="terms-section-title">
                    <span class="terms-section-number">8</span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            القانون الواجب التطبيق
                        @else
                            Governing Law
                        @endif
                    </span>
                </h2>
                <div class="terms-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            تخضع هذه الشروط والأحكام وتُفسر وفقاً لقوانين جمهورية مصر العربية. أي نزاعات تنشأ عن هذه الشروط ستخضع للاختصاص القضائي الحصري للمحاكم المصرية.
                        @else
                            These terms and conditions are governed by and construed in accordance with the laws of the Arab Republic of Egypt. Any disputes arising from these terms will be subject to the exclusive jurisdiction of Egyptian courts.
                        @endif
                    </p>
                </div>
            </div>

            <div class="terms-update">
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
