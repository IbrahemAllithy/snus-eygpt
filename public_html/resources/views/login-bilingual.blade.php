@extends('layouts.master')
@section('content')

<style>
/* Modern Login/Register Styles */
.breadcrumb-modern {
    background: var(--surface-0);
    padding: var(--space-4) 0;
    border-bottom: 1px solid var(--surface-2);
}

.breadcrumb-modern .breadcrumb {
    background: transparent;
    margin: 0;
    padding: 0;
}

.breadcrumb-modern .breadcrumb-item {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.breadcrumb-modern .breadcrumb-item a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-modern .breadcrumb-item a:hover {
    color: var(--color-primary);
}

.breadcrumb-modern .breadcrumb-item.active {
    color: var(--text-primary);
    font-weight: 600;
}

.login-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
}

.auth-card-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    box-shadow: var(--shadow-lg);
}

.auth-title {
    font-size: clamp(1.5rem, 4vw, 2rem);
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
    letter-spacing: -0.02em;
}

.auth-subtitle {
    font-size: 1rem;
    color: var(--text-secondary);
    margin-bottom: var(--space-6);
}

.form-group-modern {
    margin-bottom: var(--space-5);
}

.form-label-modern {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-2);
    display: block;
}

.form-input-modern {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    background: var(--surface-0);
    color: var(--text-primary);
    font-size: 0.9375rem;
    transition: all 0.2s;
}

.form-input-modern:focus {
    outline: none;
    border-color: var(--color-primary);
    background: var(--surface-1);
}

.form-input-modern.is-invalid {
    border-color: var(--color-error);
}

.errors {
    color: var(--color-error);
    font-size: 0.8125rem;
    margin-top: var(--space-1);
    display: block;
}

.errors.d-none {
    display: none !important;
}

.btn-modern-primary {
    width: 100%;
    padding: var(--space-4);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    margin-bottom: var(--space-3);
}

.btn-modern-primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-modern-secondary {
    width: 100%;
    padding: var(--space-4);
    background: var(--surface-2);
    color: var(--text-primary);
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    margin-bottom: var(--space-3);
}

.btn-modern-secondary:hover {
    background: var(--surface-3);
    transform: translateY(-2px);
}

.btn-link-modern {
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9375rem;
    transition: color 0.2s;
}

.btn-link-modern:hover {
    color: var(--color-primary-dark);
    text-decoration: underline;
}

.social-login-divider {
    display: flex;
    align-items: center;
    margin: var(--space-6) 0;
    gap: var(--space-4);
}

.social-login-divider::before,
.social-login-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--surface-3);
}

.social-login-divider span {
    color: var(--text-secondary);
    font-size: 0.875rem;
    font-weight: 600;
}

.social-buttons {
    display: flex;
    gap: var(--space-3);
    margin-bottom: var(--space-6);
}

.btn-social {
    flex: 1;
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    font-size: 0.9375rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    border: none;
}

.btn-google {
    background: #ffffff;
    color: #333;
    border: 2px solid var(--surface-3);
}

.btn-google:hover {
    background: #f8f8f8;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-facebook {
    background: #1877f2;
    color: white;
}

.btn-facebook:hover {
    background: #0d6efd;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.phone-login-section {
    margin-top: var(--space-6);
    padding-top: var(--space-6);
    border-top: 1px solid var(--surface-2);
}

.phone-note {
    font-size: 0.8125rem;
    color: var(--text-secondary);
    margin-top: var(--space-1);
}

/* RTL Support */
[dir="rtl"] .social-buttons {
    flex-direction: row-reverse;
}

/* Responsive */
@media (max-width: 768px) {
    .auth-card-modern {
        padding: var(--space-6);
    }

    .social-buttons {
        flex-direction: column;
    }
}
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-modern">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        @if($data['direction'] === 'rtl')
                            الرئيسية
                        @else
                            {{ trans('lables.bread-crumb-home') }}
                        @endif
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if($data['direction'] === 'rtl')
                        تسجيل الدخول
                    @else
                        {{ trans('lables.bread-login') }}
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Login/Register Content -->
<section class="login-modern">
    <div class="container">
        <div class="row">
            @if(getSetting()['authenticate_with_email_password'] == '1')
            <!-- Login Form -->
            <div class="col-12 col-md-6 mb-6">
                <div class="auth-card-modern">
                    <h2 class="auth-title">
                        @if($data['direction'] === 'rtl')
                            تسجيل الدخول
                        @else
                            {{ trans('lables.login-login') }}
                        @endif
                    </h2>

                    <form id="loginForm">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    البريد الإلكتروني
                                @else
                                    {{ trans('lables.login-email') }}
                                @endif
                            </label>
                            <input
                                type="text"
                                class="form-input-modern"
                                id="loginEmail"
                                placeholder="@if($data['direction'] === 'rtl')أدخل بريدك الإلكتروني@else{{ trans('lables.login-email') }}@endif"
                            >
                            <small class="email errors d-none"></small>
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    كلمة المرور
                                @else
                                    {{ trans('lables.login-password') }}
                                @endif
                            </label>
                            <input
                                type="password"
                                class="form-input-modern"
                                id="loginPassword"
                                placeholder="@if($data['direction'] === 'rtl')أدخل كلمة المرور@else{{ trans('lables.login-password') }}@endif"
                            >
                            <small class="password errors d-none"></small>
                        </div>

                        <button type="button" class="btn-modern-primary" id="loginAccount">
                            @if($data['direction'] === 'rtl')
                                تسجيل الدخول
                            @else
                                {{ trans('lables.login-login') }}
                            @endif
                        </button>

                        <a href="{{ url('/forget-password') }}" class="btn-link-modern">
                            @if($data['direction'] === 'rtl')
                                نسيت كلمة المرور؟
                            @else
                                {{ trans('lables.login-forget-password') }}
                            @endif
                        </a>
                    </form>
                </div>
            </div>

            <!-- Register Form -->
            <div class="col-12 col-md-6 mb-6">
                <div class="auth-card-modern">
                    <h2 class="auth-title">
                        @if($data['direction'] === 'rtl')
                            إنشاء حساب جديد
                        @else
                            {{ trans('lables.login-create-account') }}
                        @endif
                    </h2>

                    <form id="registerForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        @if($data['direction'] === 'rtl')
                                            الاسم الأول
                                        @else
                                            {{ trans('lables.login-first-name') }}
                                        @endif
                                    </label>
                                    <input
                                        type="text"
                                        class="form-input-modern"
                                        id="registerFirstName"
                                        placeholder="@if($data['direction'] === 'rtl')الاسم الأول@else{{ trans('lables.login-first-name') }}@endif"
                                    >
                                    <small class="first_name errors d-none"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        @if($data['direction'] === 'rtl')
                                            اسم العائلة
                                        @else
                                            {{ trans('lables.login-last-name') }}
                                        @endif
                                    </label>
                                    <input
                                        type="text"
                                        class="form-input-modern"
                                        id="registerLastName"
                                        placeholder="@if($data['direction'] === 'rtl')اسم العائلة@else{{ trans('lables.login-last-name') }}@endif"
                                    >
                                    <small class="last_name errors d-none"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    البريد الإلكتروني
                                @else
                                    {{ trans('lables.login-email') }}
                                @endif
                            </label>
                            <input
                                type="text"
                                class="form-input-modern"
                                id="registerEmail"
                                placeholder="@if($data['direction'] === 'rtl')بريدك الإلكتروني@else{{ trans('lables.login-email') }}@endif"
                            >
                            <small class="email errors d-none"></small>
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    كلمة المرور
                                @else
                                    {{ trans('lables.login-password') }}
                                @endif
                            </label>
                            <input
                                type="password"
                                class="form-input-modern"
                                id="registerPassword"
                                placeholder="@if($data['direction'] === 'rtl')كلمة المرور@else{{ trans('lables.login-password') }}@endif"
                            >
                            <small class="password errors d-none"></small>
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    تأكيد كلمة المرور
                                @else
                                    {{ trans('lables.login-confirm-password') }}
                                @endif
                            </label>
                            <input
                                type="password"
                                class="form-input-modern"
                                id="registerConfirmPassword"
                                placeholder="@if($data['direction'] === 'rtl')تأكيد كلمة المرور@else{{ trans('lables.login-confirm-password') }}@endif"
                            >
                            <small class="confirm_password errors d-none"></small>
                        </div>

                        <button type="button" class="btn-modern-secondary" id="createAccount">
                            @if($data['direction'] === 'rtl')
                                إنشاء حساب
                            @else
                                {{ trans('lables.login-create-account') }}
                            @endif
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>

        <!-- Social Login -->
        @if(getSetting()['authenticate_with_google'] == 1 || getSetting()['authenticate_with_facebook'] == 1)
        <div class="row">
            <div class="col-12">
                <div class="social-login-divider">
                    <span>
                        @if($data['direction'] === 'rtl')
                            أو سجل الدخول بواسطة
                        @else
                            Or sign in with
                        @endif
                    </span>
                </div>

                <div class="social-buttons">
                    @if(getSetting()['authenticate_with_google'] == 1)
                    <a href="{{url('/api/client/customer_login/google')}}" class="btn-social btn-google google-click">
                        <i class="fab fa-google"></i>
                        Google
                    </a>
                    @endif

                    @if(getSetting()['authenticate_with_facebook'] == 1)
                    <a href="{{url('/api/client/customer_login/facebook')}}" class="btn-social btn-facebook facebook-click">
                        <i class="fab fa-facebook-f"></i>
                        Facebook
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <!-- Phone Login -->
        @if(getSetting()['authenticate_with_phone'] == 1)
        <div class="row">
            <div class="col-12">
                <div class="auth-card-modern phone-login-section">
                    <h3 class="auth-title" style="font-size: 1.5rem;">
                        @if($data['direction'] === 'rtl')
                            تسجيل الدخول برقم الهاتف
                        @else
                            Login With Phone Number
                        @endif
                    </h3>

                    <form id="verifyForm">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    رقم الهاتف
                                @else
                                    Phone Number
                                @endif
                            </label>
                            <input
                                type="number"
                                class="form-input-modern"
                                id="phone_number"
                                placeholder="@if($data['direction'] === 'rtl')+20 123 456 7890@elseEnter Phone Number@endif"
                            >
                            <small class="phone_note phone_number">
                                @if($data['direction'] === 'rtl')
                                    أدخل رقم الهاتف مع كود الدولة
                                @else
                                    Enter phone number with country code
                                @endif
                            </small>
                            <small class="phone_number errors d-none"></small>
                        </div>

                        <button type="button" class="btn-modern-primary" id="sendCode">
                            @if($data['direction'] === 'rtl')
                                تحقق
                            @else
                                Verify
                            @endif
                        </button>
                    </form>

                    <!-- Phone Registration Form (Hidden Initially) -->
                    <div id="loginWithPhoneDiv" style="display: none;">
                        <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: var(--space-4);">
                            @if($data['direction'] === 'rtl')
                                أدخل بريدك الإلكتروني وكلمة المرور
                            @else
                                Set Your Email and Password
                            @endif
                        </h4>

                        <form id="loginWithPhone">
                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        البريد الإلكتروني
                                    @else
                                        {{ trans('lables.login-email') }}
                                    @endif
                                </label>
                                <input
                                    type="text"
                                    class="form-input-modern"
                                    id="registerPhoneEmail"
                                    placeholder="@if($data['direction'] === 'rtl')بريدك الإلكتروني@else{{ trans('lables.login-email') }}@endif"
                                >
                                <small class="email errors d-none"></small>
                            </div>

                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        كلمة المرور
                                    @else
                                        {{ trans('lables.login-password') }}
                                    @endif
                                </label>
                                <input
                                    type="password"
                                    class="form-input-modern"
                                    id="registerPhonePassword"
                                    placeholder="@if($data['direction'] === 'rtl')كلمة المرور@else{{ trans('lables.login-password') }}@endif"
                                >
                                <small class="password errors d-none"></small>
                            </div>

                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        تأكيد كلمة المرور
                                    @else
                                        {{ trans('lables.login-confirm-password') }}
                                    @endif
                                </label>
                                <input
                                    type="password"
                                    class="form-input-modern"
                                    id="registerPhoneConfirmPassword"
                                    placeholder="@if($data['direction'] === 'rtl')تأكيد كلمة المرور@else{{ trans('lables.login-confirm-password') }}@endif"
                                >
                                <small class="confirm_password errors d-none"></small>
                            </div>

                            <button type="button" class="btn-modern-secondary" id="createAccountWithPhone">
                                @if($data['direction'] === 'rtl')
                                    إنشاء حساب
                                @else
                                    {{ trans('lables.login-create-account') }}
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if(loggedIn == '1'){
        window.location.href = "{{url('/')}}";
    }

    $("#createAccount").click(function(e) {
        e.preventDefault();
        creatAcount();
    });

    $(".google-click").click(function() {
        localStorage.setItem("sociallite",'google');
    });

    $(".facebook-click").click(function() {
        localStorage.setItem("sociallite",'facebook');
    });

    @if(isset($_GET["code"]) && $_GET["code"] != '')
        code = "{{ isset($_GET['code']) ? $_GET['code'] : '' }}"
        scope = ''
        authuser = "{{ isset($_GET['authuser']) ? $_GET['authuser'] : ''}}"
        prompt = "{{ isset($_GET['prompt']) ? $_GET['prompt'] : '' }}"
        sociallite = localStorage.getItem("sociallite");
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_login/'+sociallite+'/callback?code='+code+'&scope='+scope+'&authuser='+authuser+'&prompt='+prompt,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#registerForm").find("."+index).html(value)
                        $("#registerForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    @endif

    function creatAcount() {
        firstname = $("#registerFirstName").val();
        lastname = $("#registerLastName").val();
        email = $("#registerEmail").val();
        pwd = $("#registerPassword").val();
        confirmpwd = $("#registerConfirmPassword").val();
        $(".errors").addClass('d-none');
        customerLogin = $.trim(localStorage.getItem("customerLoggedin"));
        if(customerLogin == '1'){
            toastr.error('{{ trans("already-logged-in") }}');
            return;
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if(cartSession == null || cartSession == 'null'){
            cartSession = '';
        }

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_register',
            data:{
                first_name: firstname,
                last_name: lastname,
                email: email,
                password: pwd,
                confirm_password: confirmpwd,
                session_id:cartSession,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    toastr.success('{{ trans("response.registered_successully") }}');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#registerForm").find("."+index).html(value)
                        $("#registerForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    }

    $("#loginAccount").click(function() {
        email = $("#loginEmail").val();
        pwd = $("#loginPassword").val();
        $(".errors").addClass('d-none');

        customerLogin = $.trim(localStorage.getItem("customerLoggedin"));
        if(customerLogin == '1'){
            toastr.error('{{ trans("already-logged-in") }}');
            return;
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if(cartSession == null || cartSession == 'null'){
            cartSession = '';
        }

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_login',
            data:{
                email: email,
                password: pwd,
                session_id:cartSession,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    toastr.success('{{ trans("response.login_successfully") }}');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#loginForm").find("."+index).html(value)
                        $("#loginForm").find("."+index).removeClass('d-none');
                    });
                } else {
                    toastr.error('{{ trans("response.invalid_email_or_password") }}');
                }
            },
        });
    });

    // Phone authentication (if enabled)
    @if(getSetting()['authenticate_with_phone'] == 1)
    $("#sendCode").click(function() {
        phone_number = $("#phone_number").val();
        $(".errors").addClass('d-none');

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_login/phone',
            data:{
                phone_number: phone_number,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            success: function(data) {
                if(data.status == 'Success'){
                    $("#loginWithPhoneDiv").show();
                    toastr.success('{{ trans("response.verification_code_sent") }}');
                }
            },
            error: function(data) {
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#verifyForm").find("."+index).html(value)
                        $("#verifyForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    });

    $("#createAccountWithPhone").click(function() {
        phone_number = $("#phone_number").val();
        email = $("#registerPhoneEmail").val();
        pwd = $("#registerPhonePassword").val();
        confirmpwd = $("#registerPhoneConfirmPassword").val();
        $(".errors").addClass('d-none');

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if(cartSession == null || cartSession == 'null'){
            cartSession = '';
        }

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_register/phone',
            data:{
                phone_number: phone_number,
                email: email,
                password: pwd,
                confirm_password: confirmpwd,
                session_id:cartSession,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    toastr.success('{{ trans("response.registered_successully") }}');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#loginWithPhone").find("."+index).html(value)
                        $("#loginWithPhone").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    });
    @endif
</script>
@endsection
