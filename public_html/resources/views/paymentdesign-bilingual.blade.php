<!DOCTYPE html>
<html class="no-js h-100" lang="{{ $data['direction'] === 'rtl' ? 'ar' : 'en' }}" dir="{{ $data['direction'] }}">

<head>
    <meta charset="UTF-8">
    <title>{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Seo Title' }}</title>
    <meta name="description"
        content="{{ isset(getSetting()['seo_description']) ? getSetting()['seo_description'] : 'Seo Description' }}">
    <meta name="keywords"
        content="{{ isset(getSetting()['seo_keywords']) ? getSetting()['seo_keywords'] : 'Seo Keywords' }}">
    <meta name="author" content="">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png"
        href="{{ isset(getSetting()['favicon']) ? getSetting()['favicon'] : '01-fav.png' }}">

    <!-- Fontawesome CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Core CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modern-design-system.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --color-primary: #C19A49;
            --color-primary-dark: #A67F3A;
            --surface-0: #FAFAFA;
            --surface-1: #FFFFFF;
            --surface-2: #F5F5F5;
            --surface-3: #E0E0E0;
            --text-primary: #1A1A1A;
            --text-secondary: #666666;
            --radius-md: 8px;
            --radius-lg: 12px;
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        body {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .payment-card {
            background: var(--surface-1);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            padding: 3rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .payment-logo {
            max-width: 200px;
            margin: 0 auto 2rem;
            display: block;
        }

        .payment-title {
            color: var(--text-primary);
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--surface-3);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--surface-0);
            color: var(--text-primary);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
        }

        .btn-payment {
            width: 100%;
            padding: 14px 24px;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 999px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-lg);
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-payment:hover {
            background: var(--color-primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        .secure-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .secure-badge i {
            color: #10b981;
        }

        @media (max-width: 768px) {
            .payment-card {
                padding: 2rem 1.5rem;
            }
        }

        [dir="rtl"] .form-control {
            text-align: right;
        }
    </style>
</head>

<body class="h-100">
    <div class="h-100">
        <div class="container-fluid h-100 p-0">
            <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                <div class="row w-100 justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="payment-card">
                            <img class="payment-logo" src="{{ asset('images/razorpay.png') }}" alt="Payment Gateway">

                            <h1 class="payment-title">
                                @if($data['direction'] === 'rtl')
                                    إكمال الدفع
                                @else
                                    Continue Payment
                                @endif
                            </h1>

                            <form class="payment-form">
                                <div class="form-group">
                                    <label class="form-label">
                                        @if($data['direction'] === 'rtl')
                                            رقم بطاقة الائتمان
                                        @else
                                            Credit Card Number
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" id="card_number"
                                        placeholder="@if($data['direction'] === 'rtl') أدخل رقم البطاقة @else Enter card number @endif"
                                        maxlength="19">
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                @if($data['direction'] === 'rtl')
                                                    تاريخ الانتهاء
                                                @else
                                                    Expiration Date
                                                @endif
                                            </label>
                                            <input type="text" class="form-control" id="expiry_date"
                                                placeholder="@if($data['direction'] === 'rtl') MM/YY @else MM/YY @endif"
                                                maxlength="5">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                @if($data['direction'] === 'rtl')
                                                    CVV
                                                @else
                                                    CVV
                                                @endif
                                            </label>
                                            <input type="text" class="form-control" id="cvv"
                                                placeholder="@if($data['direction'] === 'rtl') XXX @else XXX @endif"
                                                maxlength="4">
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn-payment" onclick="processPayment()">
                                    <i class="fas fa-lock me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        ادفع الآن
                                    @else
                                        Pay Now
                                    @endif
                                </button>

                                <div class="secure-badge">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>
                                        @if($data['direction'] === 'rtl')
                                            دفع آمن ومشفر
                                        @else
                                            Secure & Encrypted Payment
                                        @endif
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        // Format card number with spaces
        $('#card_number').on('input', function() {
            var value = $(this).val().replace(/\s/g, '');
            var formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            $(this).val(formattedValue);
        });

        // Format expiry date
        $('#expiry_date').on('input', function() {
            var value = $(this).val().replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            $(this).val(value);
        });

        // Only numbers for CVV
        $('#cvv').on('input', function() {
            var value = $(this).val().replace(/\D/g, '');
            $(this).val(value);
        });

        function processPayment() {
            var cardNumber = $('#card_number').val().replace(/\s/g, '');
            var expiryDate = $('#expiry_date').val();
            var cvv = $('#cvv').val();

            if (!cardNumber || cardNumber.length < 13) {
                toastr.error('{{ $data["direction"] === "rtl" ? "يرجى إدخال رقم بطاقة صالح" : "Please enter a valid card number" }}');
                return;
            }

            if (!expiryDate || expiryDate.length < 5) {
                toastr.error('{{ $data["direction"] === "rtl" ? "يرجى إدخال تاريخ انتهاء صالح" : "Please enter a valid expiry date" }}');
                return;
            }

            if (!cvv || cvv.length < 3) {
                toastr.error('{{ $data["direction"] === "rtl" ? "يرجى إدخال CVV صالح" : "Please enter a valid CVV" }}');
                return;
            }

            // Process payment here
            toastr.info('{{ $data["direction"] === "rtl" ? "جاري معالجة الدفع..." : "Processing payment..." }}');

            // Simulate payment processing
            setTimeout(function() {
                toastr.success('{{ $data["direction"] === "rtl" ? "تم الدفع بنجاح!" : "Payment successful!" }}');
            }, 2000);
        }
    </script>
</body>
</html>
