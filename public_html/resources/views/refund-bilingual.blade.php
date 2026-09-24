@extends('layouts.master')
@section('content')
<style>
/* Refund Policy Page Modern Styles */
.refund-modern {
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

.refund-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.refund-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
}

.refund-intro {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin: 0 0 var(--space-8) 0;
    padding-bottom: var(--space-6);
    border-bottom: 2px solid var(--surface-2);
}

.refund-section {
    margin-bottom: var(--space-8);
}

.refund-section:last-child {
    margin-bottom: 0;
}

.refund-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.refund-section-icon {
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

.refund-section-content {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--text-primary);
}

.refund-section-content p {
    margin: 0 0 var(--space-4) 0;
}

.refund-section-content p:last-child {
    margin-bottom: 0;
}

.refund-section-content ul,
.refund-section-content ol {
    margin: var(--space-4) 0;
    padding-left: var(--space-6);
}

[dir="rtl"] .refund-section-content ul,
[dir="rtl"] .refund-section-content ol {
    padding-left: 0;
    padding-right: var(--space-6);
}

.refund-section-content li {
    margin-bottom: var(--space-2);
}

.refund-section-content strong {
    color: var(--color-primary);
    font-weight: 700;
}

.refund-highlight {
    background: var(--surface-0);
    border-left: 4px solid var(--color-primary);
    padding: var(--space-4);
    border-radius: var(--radius-md);
    margin: var(--space-4) 0;
}

[dir="rtl"] .refund-highlight {
    border-left: none;
    border-right: 4px solid var(--color-primary);
}

.refund-update {
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

[dir="rtl"] .refund-section-title {
    direction: rtl;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .refund-modern {
        padding: var(--space-8) 0;
    }

    .refund-card {
        padding: var(--space-6);
    }

    .refund-section-title {
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
                    سياسة الإرجاع والاسترداد
                @else
                    Refund Policy
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                سياسة الإرجاع والاسترداد
            @else
                Refund Policy
            @endif
        </h1>
    </div>
</div>

<!-- Refund Content -->
<section class="refund-modern">
    <div class="refund-container">
        <article class="refund-card">
            <p class="refund-intro">
                @if($data['direction'] === 'rtl')
                    نحن في سنس إيجيبت نسعى لرضاك التام. إذا لم تكن راضياً عن مشترياتك، يمكنك إرجاع المنتجات واسترداد أموالك وفقاً للشروط المذكورة أدناه.
                @else
                    At Snus Egypt, we strive for your complete satisfaction. If you are not satisfied with your purchase, you can return products and get a refund according to the terms mentioned below.
                @endif
            </p>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-undo-alt"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            فترة الإرجاع
                        @else
                            Return Period
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            يمكنك إرجاع المنتجات خلال <strong>14 يوماً</strong> من تاريخ الاستلام. يجب أن تكون المنتجات في حالتها الأصلية، غير مفتوحة، وغير مستخدمة.
                        @else
                            You can return products within <strong>14 days</strong> from the date of receipt. Products must be in their original condition, unopened, and unused.
                        @endif
                    </p>
                    <div class="refund-highlight">
                        @if($data['direction'] === 'rtl')
                            <strong>ملاحظة:</strong> لا يمكن إرجاع المنتجات المفتوحة أو المستخدمة لأسباب صحية وفقاً لقوانين حماية المستهلك.
                        @else
                            <strong>Note:</strong> Opened or used products cannot be returned for health reasons in accordance with consumer protection laws.
                        @endif
                    </div>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            شروط الإرجاع
                        @else
                            Return Conditions
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لقبول طلب الإرجاع، يجب أن تتوفر الشروط التالية:
                        @else
                            To accept a return request, the following conditions must be met:
                        @endif
                    </p>
                    <ul>
                        <li>
                            @if($data['direction'] === 'rtl')
                                المنتج في عبوته الأصلية مع جميع الملصقات والأختام
                            @else
                                Product in its original packaging with all labels and seals
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                المنتج لم يتم فتحه أو استخدامه
                            @else
                                Product has not been opened or used
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                إيصال الشراء أو رقم الطلب
                            @else
                                Purchase receipt or order number
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                الإرجاع خلال 14 يوماً من تاريخ الاستلام
                            @else
                                Return within 14 days of receipt date
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            كيفية طلب الإرجاع
                        @else
                            How to Request a Return
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لطلب إرجاع منتج، يرجى اتباع الخطوات التالية:
                        @else
                            To request a product return, please follow these steps:
                        @endif
                    </p>
                    <ol>
                        <li>
                            @if($data['direction'] === 'rtl')
                                الاتصال بخدمة العملاء عبر الهاتف أو البريد الإلكتروني
                            @else
                                Contact customer service via phone or email
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                تقديم رقم الطلب وسبب الإرجاع
                            @else
                                Provide order number and reason for return
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                انتظار الموافقة على طلب الإرجاع
                            @else
                                Wait for approval of return request
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                إعادة المنتج إلى العنوان المحدد
                            @else
                                Return product to specified address
                            @endif
                        </li>
                    </ol>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            استرداد الأموال
                        @else
                            Refund Process
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            بعد استلام المنتج المرتجع والتحقق من حالته، سيتم معالجة استرداد الأموال خلال <strong>7-10 أيام عمل</strong>. سيتم رد المبلغ إلى نفس طريقة الدفع المستخدمة عند الشراء.
                        @else
                            After receiving the returned product and verifying its condition, the refund will be processed within <strong>7-10 business days</strong>. The amount will be refunded to the same payment method used during purchase.
                        @endif
                    </p>
                    <div class="refund-highlight">
                        @if($data['direction'] === 'rtl')
                            <strong>هام:</strong> تكاليف الشحن الأصلية غير قابلة للاسترداد ما لم يكن الإرجاع بسبب خطأ منا أو عيب في المنتج.
                        @else
                            <strong>Important:</strong> Original shipping costs are non-refundable unless the return is due to our error or a product defect.
                        @endif
                    </div>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-truck"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            تكاليف الشحن
                        @else
                            Shipping Costs
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            تتحمل تكاليف شحن الإرجاع وفقاً للحالة التالية:
                        @else
                            Return shipping costs are borne according to the following:
                        @endif
                    </p>
                    <ul>
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>خطأ منا أو منتج معيب:</strong> نتحمل نحن تكاليف الشحن بالكامل
                            @else
                                <strong>Our error or defective product:</strong> We bear all shipping costs
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                <strong>تغيير رأيك:</strong> يتحمل العميل تكاليف شحن الإرجاع
                            @else
                                <strong>Change of mind:</strong> Customer bears return shipping costs
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
                        <i class="fas fa-times-circle"></i>
                    </span>
                    <span>
                        @if($data['direction'] === 'rtl')
                            المنتجات غير القابلة للإرجاع
                        @else
                            Non-Returnable Products
                        @endif
                    </span>
                </h2>
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لا يمكن إرجاع المنتجات التالية:
                        @else
                            The following products cannot be returned:
                        @endif
                    </p>
                    <ul>
                        <li>
                            @if($data['direction'] === 'rtl')
                                المنتجات المفتوحة أو المستخدمة
                            @else
                                Opened or used products
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                المنتجات التي مضى عليها أكثر من 14 يوماً
                            @else
                                Products older than 14 days
                            @endif
                        </li>
                        <li>
                            @if($data['direction'] === 'rtl')
                                المنتجات المخفضة في العروض الخاصة (ما لم يُذكر خلاف ذلك)
                            @else
                                Discounted products in special offers (unless stated otherwise)
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="refund-section">
                <h2 class="refund-section-title">
                    <span class="refund-section-icon">
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
                <div class="refund-section-content">
                    <p>
                        @if($data['direction'] === 'rtl')
                            لأي استفسارات حول سياسة الإرجاع والاسترداد، يرجى الاتصال بنا:
                        @else
                            For any inquiries about our refund policy, please contact us:
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

            <div class="refund-update">
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
