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
                            اتصل بنا
                        @else
                            Contact Us
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
                        اتصل بنا
                    @else
                        Contact Us
                    @endif
                </h1>
                <p style="color: var(--text-secondary); font-size: clamp(1rem, 2vw, 1.25rem); max-width: 800px; margin: 0 auto;">
                    @if($data['direction'] === 'rtl')
                        نحن هنا للإجابة على استفساراتك ومساعدتك في أي وقت
                    @else
                        We're here to answer your questions and help you anytime
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Content --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                {{-- Contact Form --}}
                <div class="col-12 col-lg-7">
                    <div class="p-4 p-md-5" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                        <h3 class="fw-bold mb-4" style="color: var(--text-primary);">
                            @if($data['direction'] === 'rtl')
                                أرسل لنا رسالة
                            @else
                                Send Us a Message
                            @endif
                        </h3>

                        <form id="contactForm">
                            {{-- Name --}}
                            <div class="mb-4">
                                <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        الاسم
                                    @else
                                        Name
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="name_input"
                                       placeholder="@if($data['direction'] === 'rtl') أدخل اسمك @else Enter your name @endif"
                                       style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                <small class="name errors d-none text-danger mt-1"></small>
                            </div>

                            {{-- Email --}}
                            <div class="mb-4">
                                <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        البريد الإلكتروني
                                    @else
                                        Email
                                    @endif
                                </label>
                                <input type="email" class="form-control" id="email_input"
                                       placeholder="@if($data['direction'] === 'rtl') أدخل بريدك الإلكتروني @else Enter your email @endif"
                                       style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                <small class="email errors d-none text-danger mt-1"></small>
                            </div>

                            {{-- Subject --}}
                            <div class="mb-4">
                                <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        الموضوع
                                    @else
                                        Subject
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="subject_input"
                                       placeholder="@if($data['direction'] === 'rtl') موضوع الرسالة @else Message subject @endif"
                                       style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                <small class="subject errors d-none text-danger mt-1"></small>
                            </div>

                            {{-- Message --}}
                            <div class="mb-4">
                                <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        الرسالة
                                    @else
                                        Message
                                    @endif
                                </label>
                                <textarea class="form-control" id="message_input" rows="5"
                                          placeholder="@if($data['direction'] === 'rtl') اكتب رسالتك هنا @else Write your message here @endif"
                                          style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;"></textarea>
                                <small class="message errors d-none text-danger mt-1"></small>
                            </div>

                            {{-- Submit Button --}}
                            <button type="button" id="send_message" class="btn w-100 py-3" style="background: var(--color-primary); color: white; border: none; border-radius: 999px; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease; box-shadow: var(--shadow-md);">
                                <i class="fas fa-paper-plane me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    إرسال الرسالة
                                @else
                                    Send Message
                                @endif
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Contact Info --}}
                <div class="col-12 col-lg-5">
                    <div class="h-100 d-flex flex-column gap-4">
                        {{-- Address --}}
                        <div class="p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                            <div class="d-flex gap-3 align-items-start">
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-map-marker-alt" style="font-size: 24px; color: white;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            العنوان
                                        @else
                                            Address
                                        @endif
                                    </h5>
                                    <p style="color: var(--text-secondary); margin: 0; line-height: 1.6;">
                                        1800 Abbot Kinney Blvd.<br>
                                        Unit D &amp; E Venice
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                            <div class="d-flex gap-3 align-items-start">
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-phone" style="font-size: 24px; color: white;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            الهاتف
                                        @else
                                            Phone
                                        @endif
                                    </h5>
                                    <p style="color: var(--text-secondary); margin: 0; line-height: 1.8;">
                                        Mobile: +88 – 1990<br>
                                        Hotline: 1800 – 1102
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                            <div class="d-flex gap-3 align-items-start">
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-envelope" style="font-size: 24px; color: white;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            البريد الإلكتروني
                                        @else
                                            Email
                                        @endif
                                    </h5>
                                    <p style="color: var(--text-secondary); margin: 0;">
                                        Support@ecommerce.com
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Working Hours --}}
                        <div class="p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                            <div class="d-flex gap-3 align-items-start">
                                <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-clock" style="font-size: 24px; color: white;"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            ساعات العمل
                                        @else
                                            Working Hours
                                        @endif
                                    </h5>
                                    <p style="color: var(--text-secondary); margin: 0; line-height: 1.8;">
                                        @if($data['direction'] === 'rtl')
                                            السبت - الخميس: 9:00 ص - 10:00 م<br>
                                            الجمعة: مغلق
                                        @else
                                            Saturday - Thursday: 9:00 AM - 10:00 PM<br>
                                            Friday: Closed
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    .form-control:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
    }

    #send_message:hover {
        background: var(--color-primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    [dir="rtl"] .form-control {
        text-align: right;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: var(--text-secondary);
    }

    [dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
        content: "\\";
    }
</style>
@endsection

@section('script')
<script>
    $('#send_message').click(function() {
        // Clear previous errors
        $('.errors').addClass('d-none').html('');

        const name = $('#name_input').val();
        const email = $('#email_input').val();
        const subject = $('#subject_input').val();
        const message = $('#message_input').val();

        sendContactMessage(name, email, subject, message);
    });

    function sendContactMessage(name, email, subject, message) {
        const url = "{{ url('') }}" + '/api/client/contact';

        $.ajax({
            type: 'post',
            url: url,
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#send_message').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>@if($data["direction"] === "rtl") جاري الإرسال... @else Sending... @endif');
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#name_input').val('');
                    $('#email_input').val('');
                    $('#subject_input').val('');
                    $('#message_input').val('');
                    toastr.success(data.message);
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    $.each(data.responseJSON.errors, function(index, value) {
                        $("#contactForm").find("." + index).html(value);
                        $("#contactForm").find("." + index).removeClass('d-none');
                    });
                } else {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            complete: function() {
                $('#send_message').prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i>@if($data["direction"] === "rtl") إرسال الرسالة @else Send Message @endif');
            }
        });
    }
</script>
@endsection
