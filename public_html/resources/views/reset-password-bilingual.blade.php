@extends('layouts.master')
@section('content')
<style>
/* Reset Password Page Modern Styles */
.reset-password-modern {
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

.reset-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.reset-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-10);
    box-shadow: var(--shadow-lg);
    border: 2px solid var(--surface-2);
}

.reset-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-6);
    border-radius: 50%;
    background: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
}

.reset-icon i {
    font-size: 2rem;
    color: var(--surface-0);
}

.reset-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-3) 0;
    text-align: center;
    line-height: 1.3;
}

.reset-description {
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

.btn-submit-modern:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.password-requirements {
    margin-top: var(--space-6);
    padding: var(--space-4);
    background: var(--surface-0);
    border-radius: var(--radius-md);
    border: 1px solid var(--surface-2);
}

.password-requirements h4 {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0 0 var(--space-2) 0;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.password-requirements ul {
    margin: 0;
    padding: 0 0 0 var(--space-5);
    font-size: 0.875rem;
    color: var(--text-secondary);
    line-height: 1.8;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

[dir="rtl"] .password-requirements ul {
    padding: 0 var(--space-5) 0 0;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .reset-password-modern {
        padding: var(--space-8) 0;
    }

    .reset-card {
        padding: var(--space-8);
    }

    .reset-icon {
        width: 70px;
        height: 70px;
    }

    .reset-icon i {
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
                    إعادة تعيين كلمة المرور
                @else
                    Reset Password
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                إعادة تعيين كلمة المرور
            @else
                Reset Password
            @endif
        </h1>
    </div>
</div>

<!-- Reset Password Content -->
<section class="reset-password-modern">
    <div class="reset-container">
        <div class="reset-card">
            <div class="reset-icon">
                <i class="fas fa-lock"></i>
            </div>

            <h2 class="reset-title">
                @if($data['direction'] === 'rtl')
                    تعيين كلمة مرور جديدة
                @else
                    Set New Password
                @endif
            </h2>

            <p class="reset-description">
                @if($data['direction'] === 'rtl')
                    أدخل كلمة المرور الجديدة الخاصة بك أدناه
                @else
                    Enter your new password below
                @endif
            </p>

            <form id="resetForm">
                <div class="form-group-modern">
                    <label class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            كلمة المرور الجديدة
                        @else
                            New Password
                        @endif
                    </label>
                    <input
                        type="password"
                        class="form-input-modern"
                        id="reset_password_input"
                        placeholder="@if($data['direction'] === 'rtl') أدخل كلمة المرور الجديدة @else Enter new password @endif"
                        required>
                    <span class="form-error password"></span>
                </div>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        @if($data['direction'] === 'rtl')
                            تأكيد كلمة المرور
                        @else
                            Confirm Password
                        @endif
                    </label>
                    <input
                        type="password"
                        class="form-input-modern"
                        id="reset_confirm_password_input"
                        placeholder="@if($data['direction'] === 'rtl') أعد إدخال كلمة المرور @else Re-enter password @endif"
                        required>
                    <span class="form-error confirm_password"></span>
                </div>

                <button type="submit" class="btn-submit-modern" id="reset_password">
                    <i class="fas fa-check-circle"></i>
                    <span>
                        @if($data['direction'] === 'rtl')
                            تعيين كلمة المرور
                        @else
                            Set Password
                        @endif
                    </span>
                </button>
            </form>

            <div class="password-requirements">
                <h4>
                    @if($data['direction'] === 'rtl')
                        متطلبات كلمة المرور:
                    @else
                        Password Requirements:
                    @endif
                </h4>
                <ul>
                    <li>
                        @if($data['direction'] === 'rtl')
                            على الأقل 8 أحرف
                        @else
                            At least 8 characters
                        @endif
                    </li>
                    <li>
                        @if($data['direction'] === 'rtl')
                            يجب أن تتطابق كلمتا المرور
                        @else
                            Passwords must match
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    var forget_id = "{{ isset($_GET['token']) ? $_GET['token'] : '' }}";

    $('#resetForm').submit(function(e){
        e.preventDefault();
        $('#reset_password').click();
    });

    $('#reset_password').click(function(){
        // Clear previous errors
        $('.form-error').css('display', 'none').html('');

        password = $('#reset_password_input').val();
        confirm_password = $('#reset_confirm_password_input').val();

        if(password && confirm_password){
            resetPassword(password, confirm_password);
        }
    });

    function resetPassword(password, confirm_password) {
        var url = "{{ url('') }}" + '/api/client/reset_password';

        $.ajax({
            type: 'post',
            url: url,
            data: {
                password: password,
                confirm_password: confirm_password,
                forget_id: forget_id
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#reset_password').prop('disabled', true);
            },
            success: function(data) {
                $('#reset_password').prop('disabled', false);
                if (data.status == 'Success') {
                    $('#reset_password_input').val('');
                    $('#reset_confirm_password_input').val('');
                    toastr.success(data.message);

                    // Redirect to login after 2 seconds
                    setTimeout(function() {
                        window.location.href = "{{ url('/login') }}";
                    }, 2000);
                } else if (data.status == 'Error') {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
            error: function(data) {
                $('#reset_password').prop('disabled', false);
                if(data.status == 422){
                    $.each(data.responseJSON.errors, function(index, value){
                        $("#resetForm").find("." + index).html(value).css('display', 'block');

                        if(index == "forget_id"){
                            toastr.error("@if($data['direction'] === 'rtl') انتهت صلاحية الرابط @else Token has expired @endif");
                        }
                    });
                } else {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
        });
    }
</script>
@endsection
