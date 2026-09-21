@extends('layouts.master')
@section('content')
<style>
/* Contact Us Page Modern Styles */
.contact-modern {
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

.contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: var(--space-8);
    align-items: start;
}

/* Contact Info Card */
.contact-info-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
    position: sticky;
    top: var(--space-6);
}

.contact-info-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-6) 0;
}

.contact-info-list {
    display: grid;
    gap: var(--space-5);
}

.contact-info-item {
    display: flex;
    gap: var(--space-4);
    padding: var(--space-4);
    background: var(--surface-0);
    border-radius: var(--radius-md);
    transition: all 0.2s;
}

.contact-info-item:hover {
    transform: translateX(4px);
    box-shadow: var(--shadow-sm);
}

[dir="rtl"] .contact-info-item:hover {
    transform: translateX(-4px);
}

.contact-info-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--color-primary);
    color: var(--surface-0);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.contact-info-content {
    flex: 1;
    min-width: 0;
}

.contact-info-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-tertiary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0 0 var(--space-1) 0;
}

.contact-info-value {
    font-size: 1rem;
    color: var(--text-primary);
    margin: 0;
    line-height: 1.5;
    word-break: break-word;
}

.contact-info-value a {
    color: var(--text-primary);
    text-decoration: none;
    transition: color 0.2s;
}

.contact-info-value a:hover {
    color: var(--color-primary);
}

/* Contact Form Card */
.contact-form-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-md);
    border: 2px solid var(--surface-2);
}

.contact-form-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-6) 0;
}

.form-group-modern {
    margin-bottom: var(--space-5);
}

.form-label-modern {
    display: block;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-2);
}

.form-input-modern {
    width: 100%;
    padding: var(--space-4);
    font-size: 1rem;
    color: var(--text-primary);
    background: var(--surface-0);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    transition: all 0.2s;
}

.form-input-modern:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
}

.form-input-modern::placeholder {
    color: var(--text-tertiary);
}

.form-textarea-modern {
    min-height: 150px;
    resize: vertical;
}

.form-error {
    display: none;
    font-size: 0.875rem;
    color: var(--color-error);
    margin-top: var(--space-2);
}

.form-error:not(.d-none) {
    display: block;
}

.btn-submit-modern {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-4) var(--space-8);
    font-size: 1rem;
    font-weight: 700;
    color: var(--surface-0);
    background: var(--color-primary);
    border: none;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.btn-submit-modern:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-submit-modern:active {
    transform: translateY(0);
}

.btn-submit-modern i {
    font-size: 1.125rem;
}

/* Success Message */
.success-message {
    display: none;
    padding: var(--space-4);
    background: var(--color-success-light);
    border: 2px solid var(--color-success);
    border-radius: var(--radius-md);
    color: var(--color-success);
    margin-bottom: var(--space-5);
}

.success-message.show {
    display: block;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

[dir="rtl"] .contact-info-item {
    direction: rtl;
}

/* Responsive */
@media (max-width: 992px) {
    .contact-container {
        grid-template-columns: 1fr;
    }

    .contact-info-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .contact-modern {
        padding: var(--space-8) 0;
    }

    .contact-info-card,
    .contact-form-card {
        padding: var(--space-6);
    }

    .contact-info-item {
        flex-direction: column;
        text-align: center;
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
                    اتصل بنا
                @else
                    Contact Us
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                اتصل بنا
            @else
                Contact Us
            @endif
        </h1>
    </div>
</div>

<!-- Contact Content -->
<section class="contact-modern">
    <div class="contact-container">
        <!-- Contact Info -->
        <aside class="contact-info-card">
            <h2 class="contact-info-title">
                @if($data['direction'] === 'rtl')
                    معلومات التواصل
                @else
                    Contact Information
                @endif
            </h2>
            <div class="contact-info-list">
                @if(isset(getSetting()['phone']) || isset(getSetting()['phone_number']))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-info-content">
                        <p class="contact-info-label">
                            @if($data['direction'] === 'rtl')
                                الهاتف
                            @else
                                Phone
                            @endif
                        </p>
                        <p class="contact-info-value">
                            {{ isset(getSetting()['phone']) ? getSetting()['phone'] : getSetting()['phone_number'] }}
                        </p>
                    </div>
                </div>
                @endif

                @if(isset(getSetting()['email']))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info-content">
                        <p class="contact-info-label">
                            @if($data['direction'] === 'rtl')
                                البريد الإلكتروني
                            @else
                                Email
                            @endif
                        </p>
                        <p class="contact-info-value">
                            <a href="mailto:{{ getSetting()['email'] }}">{{ getSetting()['email'] }}</a>
                        </p>
                    </div>
                </div>
                @endif

                @if(isset(getSetting()['address']))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info-content">
                        <p class="contact-info-label">
                            @if($data['direction'] === 'rtl')
                                العنوان
                            @else
                                Address
                            @endif
                        </p>
                        <p class="contact-info-value">
                            {{ getSetting()['address'] }}
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </aside>

        <!-- Contact Form -->
        <div class="contact-form-card">
            <h2 class="contact-form-title">
                @if($data['direction'] === 'rtl')
                    أرسل لنا رسالة
                @else
                    Send Us a Message
                @endif
            </h2>

            <div class="success-message" id="successMessage">
                @if($data['direction'] === 'rtl')
                    تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.
                @else
                    Your message has been sent successfully! We will contact you soon.
                @endif
            </div>

            <form id="contactusForm">
                <div class="form-group-modern">
                    <label for="first_name" class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            الاسم الأول
                        @else
                            First Name
                        @endif
                    </label>
                    <input
                        type="text"
                        class="form-input-modern"
                        id="first_name"
                        placeholder="@if($data['direction'] === 'rtl') أدخل اسمك الأول @else Enter your first name @endif"
                    >
                    <small class="first_name errors form-error d-none"></small>
                </div>

                <div class="form-group-modern">
                    <label for="last_name" class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            الاسم الأخير
                        @else
                            Last Name
                        @endif
                    </label>
                    <input
                        type="text"
                        class="form-input-modern"
                        id="last_name"
                        placeholder="@if($data['direction'] === 'rtl') أدخل اسمك الأخير @else Enter your last name @endif"
                    >
                    <small class="last_name errors form-error d-none"></small>
                </div>

                <div class="form-group-modern">
                    <label for="email" class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            البريد الإلكتروني
                        @else
                            Email
                        @endif
                    </label>
                    <input
                        type="email"
                        class="form-input-modern"
                        id="email"
                        placeholder="@if($data['direction'] === 'rtl') أدخل بريدك الإلكتروني @else Enter your email @endif"
                    >
                    <small class="email errors form-error d-none"></small>
                </div>

                <div class="form-group-modern">
                    <label for="phone" class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            رقم الهاتف
                        @else
                            Phone Number
                        @endif
                    </label>
                    <input
                        type="tel"
                        class="form-input-modern"
                        id="phone"
                        placeholder="@if($data['direction'] === 'rtl') أدخل رقم هاتفك @else Enter your phone number @endif"
                    >
                    <small class="phone errors form-error d-none"></small>
                </div>

                <div class="form-group-modern">
                    <label for="message" class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            الرسالة
                        @else
                            Message
                        @endif
                    </label>
                    <textarea
                        class="form-input-modern form-textarea-modern"
                        id="message"
                        placeholder="@if($data['direction'] === 'rtl') اكتب رسالتك هنا @else Write your message here @endif"
                        rows="5"
                    ></textarea>
                    <small class="message errors form-error d-none"></small>
                </div>

                <button type="submit" class="btn-submit-modern">
                    @if($data['direction'] === 'rtl')
                        إرسال الرسالة
                    @else
                        Send Message
                    @endif
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
const isRTL = "{{ $data['direction'] }}" === 'rtl';

$("#contactusForm").submit(function(e){
    e.preventDefault();

    // Hide all errors
    $('.errors').addClass('d-none');
    $('#successMessage').removeClass('show');

    const first_name = $.trim($("#first_name").val());
    const last_name = $.trim($("#last_name").val());
    const email = $.trim($("#email").val());
    const phone = $.trim($("#phone").val());
    const message = $.trim($("#message").val());

    $.ajax({
        type: 'post',
        url: "{{ url('') }}" + '/api/client/contact-us',
        data: {
            first_name: first_name,
            last_name: last_name,
            email: email,
            phone: phone,
            message: message
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
            clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        },
        success: function(data) {
            if (data.status == 'Success') {
                // Show success message
                $('#successMessage').addClass('show');

                // Clear form
                $("#first_name").val('');
                $("#last_name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#message").val('');

                // Scroll to success message
                $('html, body').animate({
                    scrollTop: $('#successMessage').offset().top - 100
                }, 500);

                // Show toastr notification
                if (typeof toastr !== 'undefined') {
                    toastr.success(isRTL ? 'تم إرسال رسالتك بنجاح!' : 'Your message has been sent successfully!');
                }
            } else {
                if (typeof toastr !== 'undefined') {
                    toastr.error(isRTL ? 'حدث خطأ ما' : 'Something went wrong');
                }
            }
        },
        error: function(data) {
            if (data.status == 422) {
                // Display validation errors
                jQuery.each(data.responseJSON.errors, function(index, item) {
                    $("#contactusForm").find("." + index).html(item);
                    $("#contactusForm").find("." + index).removeClass('d-none');
                });
            } else {
                if (typeof toastr !== 'undefined') {
                    toastr.error(isRTL ? 'حدث خطأ ما' : 'Something went wrong');
                }
            }
        }
    });
});
</script>
@endsection
