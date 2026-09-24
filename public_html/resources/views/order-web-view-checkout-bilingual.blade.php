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
            margin-bottom: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
        }

        .form-control.is-valid {
            border-color: #10b981;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: -0.5rem;
            margin-bottom: 0.5rem;
            display: none;
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
        }

        .btn-payment:hover {
            background: var(--color-primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
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

        .formpaytree {
            margin-top: 1.5rem;
        }

        .formpaytree p {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
    </style>
</head>

<body class="h-100">

    <input type="hidden" id="payment-method-nonce" name="payment-method-nonce" />
    <input type="hidden" id="data-descriptor" name="data-descriptor" />
    <input type="hidden" id="data-value" name="data-value" />

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'braintree')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="payment-card">
                                <img class="payment-logo" src="{{ asset('images/braintree.png') }}" alt="Braintree">

                                <h1 class="payment-title">
                                    @if($data['direction'] === 'rtl')
                                        إكمال الدفع
                                    @else
                                        Continue Payment
                                    @endif
                                </h1>

                                <form class="needs-validation" id="braintree-form" novalidate="">
                                    <div class="formpaytree w-100">
                                        <label for="cc-number" class="form-label">
                                            @if($data['direction'] === 'rtl')
                                                رقم بطاقة الائتمان
                                            @else
                                                Credit card number
                                            @endif
                                        </label>
                                        <div class="form-control" id="cc-number"></div>
                                        <div class="invalid-feedback">
                                            @if($data['direction'] === 'rtl')
                                                رقم بطاقة الائتمان مطلوب
                                            @else
                                                Credit card number is required
                                            @endif
                                        </div>

                                        <label for="cc-expiration" class="form-label">
                                            @if($data['direction'] === 'rtl')
                                                تاريخ الانتهاء
                                            @else
                                                Expiration
                                            @endif
                                        </label>
                                        <div class="form-control" id="cc-expiration"></div>
                                        <div class="invalid-feedback">
                                            @if($data['direction'] === 'rtl')
                                                تاريخ الانتهاء مطلوب
                                            @else
                                                Expiration date required
                                            @endif
                                        </div>

                                        <label for="cc-cvv" class="form-label">
                                            @if($data['direction'] === 'rtl')
                                                رمز الأمان
                                            @else
                                                CVV
                                            @endif
                                        </label>
                                        <div class="form-control" id="cc-cvv"></div>
                                        <div class="invalid-feedback">
                                            @if($data['direction'] === 'rtl')
                                                رمز الأمان مطلوب
                                            @else
                                                Security code required
                                            @endif
                                        </div>

                                        <button class="btn-payment" type="submit">
                                            <i class="fas fa-lock me-2"></i>
                                            @if($data['direction'] === 'rtl')
                                                ادفع بـ <span id="card-brand">البطاقة</span>
                                            @else
                                                Pay with <span id="card-brand">Card</span>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'razorpay')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="payment-card">
                                <img class="payment-logo" src="{{ asset('images/razorpay.png') }}" alt="Razorpay">

                                <h1 class="payment-title">
                                    @if($data['direction'] === 'rtl')
                                        إكمال الدفع
                                    @else
                                        Continue Payment
                                    @endif
                                </h1>

                                <button type="submit" class="btn-payment createOrder">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        متابعة
                                    @else
                                        {{ trans('lables.checkout-continue') }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'paytm')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="payment-card">
                                <img class="payment-logo" src="{{ asset('images/paytm.png') }}" alt="Paytm">

                                <h1 class="payment-title">
                                    @if($data['direction'] === 'rtl')
                                        إكمال الدفع
                                    @else
                                        Continue Payment
                                    @endif
                                </h1>

                                <form class="needs-validation" action="{{ url('paytm-pay') }}" id="paytm-form"
                                    novalidate="">
                                    <div class="formpaytree w-100">
                                        <p>
                                            @if($data['direction'] === 'rtl')
                                                الاسم
                                            @else
                                                Name
                                            @endif
                                        </p>
                                        <input type="text" id="paytm-name" name="name" class="form-control"
                                            placeholder="@if($data['direction'] === 'rtl') أدخل الاسم @else Name @endif">

                                        <p>
                                            @if($data['direction'] === 'rtl')
                                                رقم الهاتف
                                            @else
                                                Mobile
                                            @endif
                                        </p>
                                        <input type="text" id="paytm-mobile" name="mobile" class="form-control"
                                            placeholder="@if($data['direction'] === 'rtl') رقم الهاتف @else Mobile @endif">

                                        <p>
                                            @if($data['direction'] === 'rtl')
                                                البريد الإلكتروني
                                            @else
                                                Email
                                            @endif
                                        </p>
                                        <input type="email" id="paytm-email" class="form-control" placeholder="@if($data['direction'] === 'rtl') البريد الإلكتروني @else Email @endif"
                                            name="email" />
                                        <input type="hidden" name="order_id" value="" id="order_status_by_paytm" />

                                        <button type="submit" class="btn-payment paytm-button">
                                            <i class="fas fa-arrow-right me-2"></i>
                                            @if($data['direction'] === 'rtl')
                                                ادفع بـ Paytm
                                            @else
                                                Pay to Paytm
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'mollie')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="payment-card">
                                <img class="payment-logo" src="{{ asset('images/mollie.png') }}" alt="Mollie">

                                <h1 class="payment-title">
                                    @if($data['direction'] === 'rtl')
                                        إكمال الدفع
                                    @else
                                        Continue Payment
                                    @endif
                                </h1>

                                <button type="submit" class="btn-payment createOrder">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        متابعة
                                    @else
                                        {{ trans('lables.checkout-continue') }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'paystack')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 100vh; padding: 2rem 1rem;">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="payment-card">
                                <img class="payment-logo" src="{{ asset('images/paystack.png') }}" alt="Paystack">

                                <h1 class="payment-title">
                                    @if($data['direction'] === 'rtl')
                                        إكمال الدفع
                                    @else
                                        Continue Payment
                                    @endif
                                </h1>

                                <button type="submit" class="btn-payment createOrder">
                                    <i class="fas fa-arrow-right me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        متابعة
                                    @else
                                        {{ trans('lables.checkout-continue') }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        customerToken = "{{ isset($_GET['token']) ? $_GET['token'] : '' }}";
        payment_method = "{{ isset($_GET['payment_method']) ? $_GET['payment_method'] : '' }}";
        locations ="{{ isset($_GET['location']) ? $_GET['location'] : '' }}";
        billing_first_name = "{{ isset($_GET['billing_first_name']) ? $_GET['billing_first_name'] : '' }}";
        billing_last_name = "{{ isset($_GET['billing_last_name']) ? $_GET['billing_last_name'] : '' }}";
        billing_street_aadress = "{{ isset($_GET['billing_street_aadress']) ? $_GET['billing_street_aadress'] : '' }}";
        billing_country = "{{ isset($_GET['billing_country']) ? $_GET['billing_country'] : '' }}";
        billing_state = "{{ isset($_GET['billing_state']) ? $_GET['billing_state'] : '' }}";
        billing_city = "{{ isset($_GET['billing_city']) ? $_GET['billing_city'] : '' }}";
        billing_postcode = "{{ isset($_GET['billing_postcode']) ? $_GET['billing_postcode'] : '' }}";
        billing_phone = "{{ isset($_GET['billing_phone']) ? $_GET['billing_phone'] : '' }}";

        delivery_first_name = "{{ isset($_GET['delivery_first_name']) ? $_GET['delivery_first_name'] : '' }}";
        delivery_last_name = "{{ isset($_GET['delivery_last_name']) ? $_GET['delivery_last_name'] : '' }}";
        delivery_street_aadress =
            "{{ isset($_GET['delivery_street_aadress']) ? $_GET['delivery_street_aadress'] : '' }}";
        delivery_country = "{{ isset($_GET['delivery_country']) ? $_GET['delivery_country'] : '' }}";
        delivery_state = "{{ isset($_GET['delivery_state']) ? $_GET['delivery_state'] : '' }}";
        delivery_city = "{{ isset($_GET['delivery_city']) ? $_GET['delivery_city'] : '' }}";
        delivery_postcode = "{{ isset($_GET['delivery_postcode']) ? $_GET['delivery_postcode'] : '' }}";
        delivery_phone = "{{ isset($_GET['delivery_phone']) ? $_GET['delivery_phone'] : '' }}";
        order_notes = "{{ isset($_GET['order_notes']) ? $_GET['order_notes'] : '' }}";
        coupon_code = "{{ isset($_GET['couponCart']) ? $_GET['couponCart'] : '' }}";
        currency_id = "{{ isset($_GET['currency_id']) ? $_GET['currency_id'] : '' }}";

        $(document).ready(function() {
            var url = "{{ url('') }}" + '/api/client/get-braintree-auth-token';
            var braintree_token = null;

            var form = $('#braintree-form');
            $.ajax({
                type: 'post',
                url: url,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        braintree_token = data.data.token;
                        braintree.client.create({
                            authorization: braintree_token
                        }, function(err, clientInstance) {
                            if (err) {
                                console.error(err);
                                return;
                            }

                            braintree.hostedFields.create({
                                client: clientInstance,
                                styles: {
                                    input: {
                                        'font-size': '1rem',
                                        color: '#495057'
                                    }
                                },
                                fields: {
                                    number: {
                                        selector: '#cc-number',
                                        placeholder: '4111 1111 1111 1111'
                                    },
                                    cvv: {
                                        selector: '#cc-cvv',
                                        placeholder: '123'
                                    },
                                    expirationDate: {
                                        selector: '#cc-expiration',
                                        placeholder: 'MM / YY'
                                    }
                                }
                            }, function(err, hostedFieldsInstance) {
                                if (err) {
                                    console.error(err);
                                    return;
                                }

                                function setValidityClasses(element, validity) {
                                    if (validity) {
                                        element.removeClass('is-invalid');
                                        element.addClass('is-valid');
                                    } else {
                                        element.addClass('is-invalid');
                                        element.removeClass('is-valid');
                                    }
                                }

                                hostedFieldsInstance.on('validityChange', function(event) {
                                    var field = event.fields[event.emittedBy];
                                    $(field.container).removeClass('is-valid');
                                    $(field.container).removeClass('is-invalid');

                                    if (field.isValid) {
                                        $(field.container).addClass('is-valid');
                                    } else if (!field.isPotentiallyValid) {
                                        $(field.container).addClass('is-invalid');
                                    }
                                });

                                form.submit(function(event) {
                                    event.preventDefault();

                                    var formIsInvalid = false;
                                    var state = hostedFieldsInstance.getState();

                                    Object.keys(state.fields).forEach(function(field) {
                                        if (!state.fields[field].isValid) {
                                            $(state.fields[field].container).addClass('is-invalid');
                                            formIsInvalid = true;
                                        }
                                    });

                                    hostedFieldsInstance.tokenize(function(err, payload) {
                                        if (err) {
                                            console.error(err);
                                            return;
                                        }

                                        $('#payment-method-nonce').val(payload.nonce);

                                        url = '/api/client/order';
                                        $.ajax({
                                            type: 'post',
                                            url: "{{ url('') }}" + url,
                                            data: {
                                                billing_first_name: billing_first_name,
                                                billing_last_name: billing_last_name,
                                                billing_street_aadress: billing_street_aadress,
                                                billing_country: billing_country,
                                                billing_state: billing_state,
                                                billing_city: billing_city,
                                                billing_postcode: billing_postcode,
                                                billing_phone: billing_phone,
                                                delivery_first_name: delivery_first_name,
                                                delivery_last_name: delivery_last_name,
                                                delivery_street_aadress: delivery_street_aadress,
                                                delivery_country: delivery_country,
                                                delivery_state: delivery_state,
                                                delivery_city: delivery_city,
                                                delivery_postcode: delivery_postcode,
                                                delivery_phone: delivery_phone,
                                                order_notes: order_notes,
                                                coupon_code: coupon_code,
                                                latlong: locations,
                                                currency_id: currency_id,
                                                payment_method: payment_method,
                                                payment_method_nonce: '',
                                                authorize_net_data_value: '',
                                                authorize_net_data_descriptor: '',
                                            },
                                            headers: {
                                                'Authorization': 'Bearer ' + customerToken,
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                            },
                                            beforeSend: function() {},
                                            success: function(data) {
                                                if (data.status == 'Success') {
                                                    if (payment_method == "mollie") {
                                                        window.location.href = "{{ url('/mollie-payment/') }}" + "/" + data.data.order_id;
                                                    }
                                                    if (payment_method == "paystack") {
                                                        url = '/api/client/paystack-authorization';
                                                        $.ajax({
                                                            type: 'post',
                                                            url: "{{ url('') }}" + url,
                                                            data: {
                                                                order_id: data.data.order_id,
                                                            },
                                                            headers: {
                                                                'Authorization': 'Bearer ' + customerToken,
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                                            },
                                                            beforeSend: function() {},
                                                            success: function(data) {
                                                                if (data.status == 'Success') {
                                                                    window.location.href = data.data;
                                                                }
                                                            },
                                                            error: function(data) {},
                                                        });
                                                    } else {
                                                        window.location.href = "{{ url('/thankyou') }}";
                                                    }
                                                }
                                            },
                                            error: function(data) {
                                                if (data.status == 422) {
                                                    jQuery.each(data.responseJSON.errors, function(index, item) {
                                                        $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                                                        $("#" + index).parent().find('.invalid-feedback').html(item);
                                                    });
                                                }
                                            },
                                        });
                                    });
                                });
                            });
                        });
                    }
                }
            });
        });

        $(".createOrder").click(function(e) {
            e.preventDefault();
            $('.invalid-feedback').css('display', 'none');

            payment_method_nonce = $('#payment-method-nonce').val();

            if (payment_method == 'razorpay') {
                var total_amount = 10 * 100;
                var options = {
                    "key": "rzp_test_YSTH90m9DEc0FQ",
                    "amount": total_amount,
                    "currency": "USD",
                    "name": "NiceSnippets",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": "",
                    "handler": function(response) {
                        url = '/api/client/order';
                        $.ajax({
                            type: 'post',
                            url: "{{ url('') }}" + url,
                            data: {
                                billing_first_name: billing_first_name,
                                billing_last_name: billing_last_name,
                                billing_street_aadress: billing_street_aadress,
                                billing_country: billing_country,
                                billing_state: billing_state,
                                billing_city: billing_city,
                                billing_postcode: billing_postcode,
                                billing_phone: billing_phone,
                                delivery_first_name: delivery_first_name,
                                delivery_last_name: delivery_last_name,
                                delivery_street_aadress: delivery_street_aadress,
                                delivery_country: delivery_country,
                                delivery_state: delivery_state,
                                delivery_city: delivery_city,
                                delivery_postcode: delivery_postcode,
                                delivery_phone: delivery_phone,
                                order_notes: order_notes,
                                coupon_code: coupon_code,
                                latlong: locations,
                                currency_id: currency_id,
                                payment_method: payment_method,
                                razor_pay_transaction_id: response.razorpay_payment_id
                            },
                            headers: {
                                'Authorization': 'Bearer ' + customerToken,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                            },
                            beforeSend: function() {},
                            success: function(data) {
                                if (data.status == 'Success') {
                                    window.location.href = "{{ url('/thankyou') }}";
                                } else if (data.status == 'Error') {
                                    toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                                }
                            },
                            error: function(data) {
                                if (data.status == 422) {
                                    jQuery.each(data.responseJSON.errors, function(index, item) {
                                        toastr.error(item[0]);
                                    });
                                } else {
                                    toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                                }
                            },
                        });
                    },
                    "prefill": {
                        "name": "Mehul Bagda",
                        "email": "mehul.bagda@example.com",
                        "contact": "818********6"
                    },
                    "notes": {
                        "address": "test test"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else {
                url = '/api/client/order';
                $.ajax({
                    type: 'post',
                    url: "{{ url('') }}" + url,
                    data: {
                        billing_first_name: billing_first_name,
                        billing_last_name: billing_last_name,
                        billing_street_aadress: billing_street_aadress,
                        billing_country: billing_country,
                        billing_state: billing_state,
                        billing_city: billing_city,
                        billing_postcode: billing_postcode,
                        billing_phone: billing_phone,
                        delivery_first_name: delivery_first_name,
                        delivery_last_name: delivery_last_name,
                        delivery_street_aadress: delivery_street_aadress,
                        delivery_country: delivery_country,
                        delivery_state: delivery_state,
                        delivery_city: delivery_city,
                        delivery_postcode: delivery_postcode,
                        delivery_phone: delivery_phone,
                        order_notes: order_notes,
                        coupon_code: coupon_code,
                        latlong: locations,
                        currency_id: currency_id,
                        payment_method: payment_method,
                        payment_method_nonce: payment_method_nonce,
                        authorize_net_data_value: $('data-value').val(),
                        authorize_net_data_descriptor: $('data-descriptor').val(),
                    },
                    headers: {
                        'Authorization': 'Bearer ' + customerToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 'Success') {
                            if (payment_method == "mollie") {
                                window.location.href = "{{ url('/mollie-payment/') }}" + "/" + data.data.order_id;
                            }
                            if (payment_method == "paystack") {
                                url = '/api/client/paystack-authorization';
                                $.ajax({
                                    type: 'post',
                                    url: "{{ url('') }}" + url,
                                    data: {
                                        order_id: data.data.order_id,
                                    },
                                    headers: {
                                        'Authorization': 'Bearer ' + customerToken,
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                    },
                                    beforeSend: function() {},
                                    success: function(data) {
                                        if (data.status == 'Success') {
                                            window.location.href = data.data;
                                        }
                                    },
                                    error: function(data) {},
                                });
                            } else {
                                window.location.href = "{{ url('/thankyou') }}";
                            }
                        } else if (data.status == 'Error') {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                        }
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            jQuery.each(data.responseJSON.errors, function(index, item) {
                                $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                                $("#" + index).parent().find('.invalid-feedback').html(item);
                            });
                        } else {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                        }
                    },
                });
            }
        });

        $('#paytm-form').submit(function(e) {
            paytmOrderStatus = $('#order_status_by_paytm').val();
            if (paytmOrderStatus == '') {
                e.preventDefault();
                $('.invalid-feedback').css('display', 'none');

                url = '/api/client/order';
                $.ajax({
                    type: 'post',
                    url: "{{ url('') }}" + url,
                    data: {
                        billing_first_name: billing_first_name,
                        billing_last_name: billing_last_name,
                        billing_street_aadress: billing_street_aadress,
                        billing_country: billing_country,
                        billing_state: billing_state,
                        billing_city: billing_city,
                        billing_postcode: billing_postcode,
                        billing_phone: billing_phone,
                        delivery_first_name: delivery_first_name,
                        delivery_last_name: delivery_last_name,
                        delivery_street_aadress: delivery_street_aadress,
                        delivery_country: delivery_country,
                        delivery_state: delivery_state,
                        delivery_city: delivery_city,
                        delivery_postcode: delivery_postcode,
                        delivery_phone: delivery_phone,
                        order_notes: order_notes,
                        coupon_code: coupon_code,
                        latlong: locations,
                        currency_id: currency_id,
                        payment_method: 'paytm',
                    },
                    headers: {
                        'Authorization': 'Bearer ' + customerToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 'Success') {
                            $('#order_status_by_paytm').val(data.data.order_id);
                            $('#paytm-form').submit();
                        } else if (data.status == 'Error') {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                        }
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            jQuery.each(data.responseJSON.errors, function(index, item) {
                                toastr.error(item[0]);
                            });
                        } else {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                        }
                    },
                });
            }
        })
    </script>

    <script src="https://js.braintreegateway.com/web/3.83.0/js/hosted-fields.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.83.0/js/client.min.js"></script>
</body>

</html>
