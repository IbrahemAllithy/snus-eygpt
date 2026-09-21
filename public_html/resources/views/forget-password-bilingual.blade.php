@extends('layouts.master')
@section('content')
<style>
/* Forget Password Page Modern Styles */
.forget-password-modern {
    padding: var(--space-12) 0;
    background: var(--surface-0);
    min-height: 70vh;
    display: flex;
    align-items: center;
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

.forget-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.forget-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-10);
    box-shadow: var(--shadow-lg);
    border: 2px solid var(--surface-2);
}

.forget-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-6);
    border-radius: 50%;
    background: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
}

.forget-icon i {
    font-size: 2rem;
    color: var(--surface-0);
}

.forget-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-3) 0;
    text-align: center;
    line-height: 1.3;
}

.forget-description {
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0 0 var(--space-8) 0;
    text-align: center;
}

.form-group-modern {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
    margin-bottom: var(--space-6);
}

.form-label-modern {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
}

.form-input-modern {
    padding: var(--space-4) var(--space-4);
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
    background: var(--surface-1);
}

.form-error {
    font-size: 0.875rem;
    color: var(--color-error);
    display: none;
}

.btn-submit-modern {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    padding: var(--space-4) var(--space-8);
    font-size: 1rem;
    font-weight: 700;
    color: var(--surface-0);
    background: var(--color-primary);
    border: 2px solid var(--color-primary);
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.btn-submit-modern:hover {
    background: var(--color-primary-dark);
    border-color: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.forget-links {
    margin-top: var(--space-6);
    padding-top: var(--space-6);
    border-top: 2px solid var(--surface-2);
    text-align: center;
}

.forget-links a {
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}

.forget-links a:hover {
    color: var(--color-primary-dark);
    text-decoration: underline;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .forget-password-modern {
        padding: var(--space-8) 0;
    }

    .forget-card {
        padding: var(--space-8);
    }

    .forget-icon {
        width: 70px;
        height: 70px;
    }

    .forget-icon i {
        font-size: 1.75rem;
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
                    نسيت كلمة المرور
                @else
                    Forgot Password
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                نسيت كلمة المرور
            @else
                Forgot Password
            @endif
        </h1>
    </div>
</div>

<!-- Forget Password Content -->
<section class="forget-password-modern">
    <div class="forget-container">
        <div class="forget-card">
            <div class="forget-icon">
                <i class="fas fa-key"></i>
            </div>

            <h2 class="forget-title">
                @if($data['direction'] === 'rtl')
                    استعادة كلمة المرور
                @else
                    Reset Your Password
                @endif
            </h2>

            <p class="forget-description">
                @if($data['direction'] === 'rtl')
                    أدخل بريدك الإلكتروني المسجل وسنرسل لك رابط لإعادة تعيين كلمة المرور
                @else
                    Enter your registered email address and we'll send you a link to reset your password
                @endif
            </p>

            <form id="forgetForm">
                <div class="form-group-modern">
                    <label class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            البريد الإلكتروني
                        @else
                            Email Address
                        @endif
                    </label>
                    <input
                        type="email"
                        class="form-input-modern"
                        id="forget_email"
                        placeholder="@if($data['direction'] === 'rtl') أدخل بريدك الإلكتروني @else Enter your email address @endif"
                        required>
                    <span class="form-error email"></span>
                </div>

                <button type="submit" class="btn-submit-modern" id="forget_password">
                    <i class="fas fa-paper-plane"></i>
                    <span>
                        @if($data['direction'] === 'rtl')
                            إرسال رابط الاستعادة
                        @else
                            Send Reset Link
                        @endif
                    </span>
                </button>
            </form>

            <div class="forget-links">
                <a href="{{ url('/login') }}">
                    @if($data['direction'] === 'rtl')
                        ← العودة لتسجيل الدخول
                    @else
                        ← Back to Login
                    @endif
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $('#forgetForm').submit(function(e){
        e.preventDefault();
        $('#forget_password').click();
    });

    $('#forget_password').click(function(){
        // Clear previous errors
        $('.form-error').css('display', 'none').html('');

        email = $('#forget_email').val();
        if(email){
            forgetPassword(email);
        }
    });

    function forgetPassword(email) {
        var url = "{{ url('') }}" + '/api/client/forget_password';

        $.ajax({
            type: 'post',
            url: url,
            data: {email: email},
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#forget_password').prop('disabled', true);
            },
            success: function(data) {
                $('#forget_password').prop('disabled', false);
                if (data.status == 'Success') {
                    toastr.success(data.message);
                    $('#forget_email').val('');
                } else if (data.status == 'Error') {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
            error: function(data) {
                $('#forget_password').prop('disabled', false);
                if(data.status == 422){
                    $.each(data.responseJSON.errors, function(index, value){
                        $("#forgetForm").find("." + index).html(value).css('display', 'block');
                    });
                } else {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
        });
    }
</script>
@endsection
