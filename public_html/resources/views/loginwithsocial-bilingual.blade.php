@extends('layouts.master')

@section('content')
<style>
/* Social Login Page Modern Styles */
.social-login-modern {
    padding: var(--space-12) 0;
    background: var(--surface-0);
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-login-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.social-login-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-10);
    box-shadow: var(--shadow-lg);
    border: 2px solid var(--surface-2);
    text-align: center;
}

.social-login-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-6);
    border-radius: 50%;
    background: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s ease-in-out infinite;
}

.social-login-icon i {
    font-size: 2rem;
    color: var(--surface-0);
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.8;
    }
}

.social-login-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-3) 0;
    line-height: 1.3;
}

.social-login-description {
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0 0 var(--space-8) 0;
}

.loader-modern {
    width: 50px;
    height: 50px;
    margin: 0 auto var(--space-6);
    border: 4px solid var(--surface-2);
    border-top: 4px solid var(--color-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.social-login-back {
    margin-top: var(--space-6);
}

.social-login-back a {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-size: 0.9375rem;
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
}

.social-login-back a:hover {
    color: var(--color-primary);
}

/* RTL Support */
[dir="rtl"] .social-login-back a {
    flex-direction: row-reverse;
}

/* Responsive */
@media (max-width: 768px) {
    .social-login-modern {
        padding: var(--space-8) 0;
    }

    .social-login-card {
        padding: var(--space-8);
    }

    .social-login-icon {
        width: 70px;
        height: 70px;
    }

    .social-login-icon i {
        font-size: 1.75rem;
    }
}
</style>

<!-- Social Login Content -->
<section class="social-login-modern">
    <div class="social-login-container">
        <div class="social-login-card">
            <div class="social-login-icon">
                <i class="fas fa-user-check"></i>
            </div>

            <h2 class="social-login-title">
                @if($data['direction'] === 'rtl')
                    جارٍ تسجيل الدخول
                @else
                    Logging You In
                @endif
            </h2>

            <p class="social-login-description">
                @if($data['direction'] === 'rtl')
                    يرجى الانتظار بينما نكمل عملية تسجيل الدخول...
                @else
                    Please wait while we complete your login...
                @endif
            </p>

            <div class="loader-modern"></div>

            <div class="social-login-back">
                <a href="{{ url('/') }}">
                    <i class="fas fa-arrow-left"></i>
                    <span>
                        @if($data['direction'] === 'rtl')
                            العودة إلى الرئيسية
                        @else
                            Back to Home
                        @endif
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if(loggedIn == '1'){
        window.location.href = "{{url('/')}}";
    }

    @if(isset($_GET["token"]) && $_GET["token"] != '')

        token = "{{ isset($_GET['token']) ? $_GET['token'] : '' }}";
        hash = "{{ isset($_GET['hash']) ? $_GET['hash'] : '' }}";
        customer_id = "{{ isset($_GET['customer_id']) ? $_GET['customer_id'] : '' }}";
        email = "{{ isset($_GET['email']) ? $_GET['email'] : '' }}";
        first_name = "{{ isset($_GET['first_name']) ? $_GET['first_name'] : '' }}";
        last_name = "{{ isset($_GET['last_name']) ? $_GET['last_name'] : '' }}";

        localStorage.setItem("customerToken",token);
        localStorage.setItem("customerHash",hash);
        localStorage.setItem("customerId",customer_id);
        localStorage.setItem("customerEmail",email);
        localStorage.setItem("customerFname",first_name);
        localStorage.setItem("customerLname",last_name);
        localStorage.setItem("customerLoggedin",'1');
        localStorage.setItem("cartSession",'');

        // Redirect to home after storing credentials
        setTimeout(function() {
            window.location.href = "/";
        }, 500);

    @endif
</script>
@endsection
