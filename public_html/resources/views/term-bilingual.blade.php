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
                            الشروط والأحكام
                        @else
                            Terms & Conditions
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
                <div class="mb-4">
                    <div class="mx-auto" style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-file-contract" style="font-size: 45px; color: white;"></i>
                    </div>
                </div>
                <h1 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(2rem, 4vw, 3rem);">
                    @if($data['direction'] === 'rtl')
                        الشروط والأحكام
                    @else
                        Terms & Conditions
                    @endif
                </h1>
                <p style="color: var(--text-secondary); font-size: clamp(1rem, 2vw, 1.25rem); max-width: 800px; margin: 0 auto;">
                    @if($data['direction'] === 'rtl')
                        يرجى قراءة هذه الشروط والأحكام بعناية قبل استخدام خدماتنا
                    @else
                        Please read these terms and conditions carefully before using our services
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Terms Content --}}
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="p-4 p-md-5" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">

                        {{-- Section 1 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    1. القبول بالشروط
                                @else
                                    1. Acceptance of Terms
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    باستخدامك لهذا الموقع، فإنك توافق على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافق على أي جزء من هذه الشروط، يجب عليك عدم استخدام موقعنا.
                                @else
                                    By using this website, you agree to be bound by these Terms and Conditions. If you do not agree to any part of these terms, you must not use our website.
                                @endif
                            </p>
                        </div>

                        {{-- Section 2 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    2. استخدام الموقع
                                @else
                                    2. Use of Website
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem; margin-bottom: 1rem;">
                                @if($data['direction'] === 'rtl')
                                    يُسمح لك باستخدام موقعنا للأغراض الشخصية والتجارية المشروعة فقط. يجب عليك عدم:
                                @else
                                    You are permitted to use our website for lawful personal and commercial purposes only. You must not:
                                @endif
                            </p>
                            <ul style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                <li>
                                    @if($data['direction'] === 'rtl')
                                        استخدام الموقع بأي طريقة تنتهك القوانين المحلية أو الدولية
                                    @else
                                        Use the website in any way that violates local or international laws
                                    @endif
                                </li>
                                <li>
                                    @if($data['direction'] === 'rtl')
                                        نشر أو نقل أي محتوى ضار أو مسيء
                                    @else
                                        Post or transmit any harmful or offensive content
                                    @endif
                                </li>
                                <li>
                                    @if($data['direction'] === 'rtl')
                                        محاولة الوصول غير المصرح به إلى أي جزء من الموقع
                                    @else
                                        Attempt unauthorized access to any part of the website
                                    @endif
                                </li>
                            </ul>
                        </div>

                        {{-- Section 3 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    3. المنتجات والخدمات
                                @else
                                    3. Products and Services
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    نحن نبذل قصارى جهدنا لضمان دقة أوصاف المنتجات والأسعار على موقعنا. ومع ذلك، نحتفظ بالحق في تصحيح أي أخطاء أو حذف أو تحديث المعلومات في أي وقت دون إشعار مسبق.
                                @else
                                    We strive to ensure the accuracy of product descriptions and prices on our website. However, we reserve the right to correct any errors, omissions, or update information at any time without prior notice.
                                @endif
                            </p>
                        </div>

                        {{-- Section 4 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    4. الطلبات والدفع
                                @else
                                    4. Orders and Payment
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    عند تقديم طلب، فإنك توافق على تقديم معلومات دقيقة وكاملة. نحتفظ بالحق في رفض أي طلب لأي سبب. يجب أن يتم الدفع بالكامل قبل شحن المنتجات.
                                @else
                                    When placing an order, you agree to provide accurate and complete information. We reserve the right to refuse any order for any reason. Payment must be made in full before products are shipped.
                                @endif
                            </p>
                        </div>

                        {{-- Section 5 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    5. الشحن والتسليم
                                @else
                                    5. Shipping and Delivery
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    نسعى لمعالجة جميع الطلبات في الوقت المناسب. ومع ذلك، لا نتحمل المسؤولية عن التأخيرات الناجمة عن ظروف خارجة عن إرادتنا، مثل مشاكل الشحن أو الجمارك.
                                @else
                                    We strive to process all orders in a timely manner. However, we are not responsible for delays caused by circumstances beyond our control, such as shipping or customs issues.
                                @endif
                            </p>
                        </div>

                        {{-- Section 6 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    6. الإرجاع والاسترداد
                                @else
                                    6. Returns and Refunds
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    نحن نقبل الإرجاع خلال 14 يومًا من استلام المنتج، بشرط أن يكون في حالته الأصلية. يرجى الاطلاع على سياسة الإرجاع الخاصة بنا لمزيد من التفاصيل.
                                @else
                                    We accept returns within 14 days of product receipt, provided it is in its original condition. Please refer to our return policy for more details.
                                @endif
                            </p>
                        </div>

                        {{-- Section 7 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    7. الملكية الفكرية
                                @else
                                    7. Intellectual Property
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    جميع المحتويات على هذا الموقع، بما في ذلك النصوص والصور والشعارات، محمية بموجب حقوق الطبع والنشر وقوانين الملكية الفكرية. لا يجوز استخدامها دون إذن كتابي منا.
                                @else
                                    All content on this website, including text, images, and logos, is protected by copyright and intellectual property laws. It may not be used without our written permission.
                                @endif
                            </p>
                        </div>

                        {{-- Section 8 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    8. إخلاء المسؤولية
                                @else
                                    8. Disclaimer
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    يتم توفير هذا الموقع "كما هو" دون أي ضمانات من أي نوع. لا نضمن أن الموقع سيكون خاليًا من الأخطاء أو متاحًا دون انقطاع.
                                @else
                                    This website is provided "as is" without any warranties of any kind. We do not guarantee that the website will be error-free or available without interruption.
                                @endif
                            </p>
                        </div>

                        {{-- Section 9 --}}
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    9. تحديد المسؤولية
                                @else
                                    9. Limitation of Liability
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    لن نكون مسؤولين عن أي أضرار مباشرة أو غير مباشرة أو عرضية أو تبعية ناتجة عن استخدام أو عدم القدرة على استخدام موقعنا أو منتجاتنا.
                                @else
                                    We will not be liable for any direct, indirect, incidental, or consequential damages arising from the use or inability to use our website or products.
                                @endif
                            </p>
                        </div>

                        {{-- Section 10 --}}
                        <div class="mb-4">
                            <h3 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    10. التغييرات على الشروط
                                @else
                                    10. Changes to Terms
                                @endif
                            </h3>
                            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                                @if($data['direction'] === 'rtl')
                                    نحتفظ بالحق في تعديل هذه الشروط والأحكام في أي وقت. ستدخل التغييرات حيز التنفيذ فور نشرها على الموقع. يُنصح بمراجعة هذه الصفحة بانتظام.
                                @else
                                    We reserve the right to modify these Terms and Conditions at any time. Changes will take effect immediately upon posting on the website. We recommend reviewing this page regularly.
                                @endif
                            </p>
                        </div>

                        {{-- Contact Info --}}
                        <div class="p-4 mt-5" style="background: rgba(193, 154, 73, 0.1); border-radius: var(--radius-md); border-left: 4px solid var(--color-primary);">
                            <p class="mb-2" style="color: var(--text-primary); font-weight: 600;">
                                @if($data['direction'] === 'rtl')
                                    هل لديك أسئلة حول الشروط والأحكام؟
                                @else
                                    Questions about our Terms & Conditions?
                                @endif
                            </p>
                            <p style="color: var(--text-secondary); margin: 0;">
                                @if($data['direction'] === 'rtl')
                                    يرجى الاتصال بنا على: Support@ecommerce.com
                                @else
                                    Please contact us at: Support@ecommerce.com
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

    [dir="rtl"] ul {
        padding-right: 2rem;
        padding-left: 0;
    }
</style>
@endsection

@section('script')
@endsection
