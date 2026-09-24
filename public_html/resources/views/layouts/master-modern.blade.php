<!DOCTYPE html>
<html class="no-js" lang="{{ ($data['direction'] ?? 'rtl') === 'rtl' ? 'ar' : 'en' }}" dir="{{ ($data['direction'] ?? 'rtl') === 'rtl' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : (($data['direction'] ?? 'rtl') === 'rtl' ? 'Snus Egypt - متجر السنس الإلكتروني' : 'Snus Egypt - Online Snus Store') }}</title>
    <meta name="description" content="{{ isset(getSetting()['seo_description']) ? getSetting()['seo_description'] : (($data['direction'] ?? 'rtl') === 'rtl' ? 'أفضل منتجات السنس في مصر' : 'Premium snus products in Egypt') }}" id="meta-description">
    <meta name="keywords" content="{{ isset(getSetting()['seo_keywords']) ? getSetting()['seo_keywords'] : 'snus, egypt' }}" id="meta-keyword">
    <meta name="author" content="Snus Egypt">
    <meta name="title" content="{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Snus Egypt' }}" id="meta-title">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#C19A49">

    <link rel="icon" type="image/png" href="{{ isset(getSetting()['favicon']) ? getSetting()['favicon'] : '01-fav.png' }}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://use.fontawesome.com">

    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Modern Design System - Load First -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modern-design-system.css') }}">

    <!-- Core CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ isset(getSetting()['color']) ? asset('assets/front/css/' . getSetting()['color'] . '.css') : asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/modern-overrides.css') }}?v={{ filemtime(public_path('assets/front/css/modern-overrides.css')) }}">

    <!-- Toastr Notifications -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Modern Root Variables */
        :root {
            --font-primary: 'Cairo', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            font-family: var(--font-primary) !important;
        }

        /* Install App Button - Modern Style */
        #installAppButton {
            position: fixed;
            left: 20px;
            bottom: 95px;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 14px 22px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            z-index: 999999;
            box-shadow: var(--shadow-gold);
            transition: all var(--transition-base);
        }

        #installAppButton:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(193, 154, 73, 0.4);
        }

        #installAppButton i {
            margin-left: 8px;
        }

        /* Preloader Modern Style */
        .se-pre-con {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999999;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .se-pre-con.is-hidden {
            opacity: 0;
            transition: opacity 0.35s ease;
        }

        .loader-logo {
            width: 120px;
            height: 120px;
            margin-bottom: 30px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Back to Top Button - Modern */
        #back-to-top {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--color-primary);
            color: white;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            z-index: 9999;
            box-shadow: var(--shadow-gold);
            transition: all var(--transition-base);
            border: none;
        }

        #back-to-top:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(193, 154, 73, 0.4);
        }

        /* Notification Toast - hidden until .show, then auto-dismissed */
        .notifications {
            position: fixed;
            bottom: 30px;
            right: 30px;
            left: auto;
            width: max-content;
            max-width: calc(100vw - 48px);
            margin: 0;
            background: white;
            padding: 16px 24px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            transform: translateY(12px);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: transform var(--transition-base), opacity var(--transition-base), visibility var(--transition-base);
            z-index: 10000;
            color: var(--text-primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notifications.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .notifications::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--color-success);
            color: white;
            font-weight: bold;
        }

        /* Mobile Overlay */
        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
            backdrop-filter: blur(4px);
        }

        .mobile-overlay.active {
            display: block;
        }

        /* RTL Support */
        [dir="rtl"] #back-to-top {
            right: auto;
            left: 20px;
        }

        [dir="rtl"] .notifications {
            right: auto;
            left: 30px;
            margin: 0;
            transform: translateY(12px);
        }

        [dir="rtl"] .notifications.show {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            #installAppButton {
                left: 15px;
                bottom: 90px;
                padding: 12px 18px;
                font-size: 14px;
            }

            .notifications {
                bottom: 20px;
                right: 20px;
                left: auto;
                margin: 0;
                font-size: 14px;
            }

            [dir="rtl"] .notifications {
                right: auto;
                left: 20px;
            }
        }

        /* Performance Optimization */
        img {
            image-rendering: -webkit-optimize-contrast;
        }

        .media-failed {
            opacity: 0.5;
            filter: grayscale(100%);
        }

        .media-missing {
            background: var(--bg-page);
        }
    </style>
</head>

<body class="snus-modern animation-s1 {{ $data['direction'] === 'rtl' ? 'bodyrtl' : '' }}" data-theme="light">

    @include('snus.whatsapp')
    @include('snus.age-gate')
    @include('extras.preloader')
    @include(isset(getSetting()['header_style']) ? 'includes.headers.header-'.getSetting()['header_style'] : 'includes.headers.header-style1')

    <script src="{{ asset('assets/snus/js/install-app.js') }}"></script>

    @yield('content')

    @include(isset(getSetting()['Footer_style']) ? 'includes.footers.footer-'.getSetting()['Footer_style'] : 'includes.footers.footer-style1')

    <a href="javascript:void(0)" class="btn-secondary swipe-to-top" id="back-to-top" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ trans('lables.general-backtotop') }}" title="{{ trans('lables.general-backtotop') }}">&uarr;</a>

    <div class="mobile-overlay"></div>

    <div class="notifications" id="notificationWishlist" role="status" aria-live="polite" aria-hidden="true">{{ trans('lables.wishlist-add-success') }}</div>

    @include('extras.settings')
    @include('modals.product-quick-view')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Core Scripts -->
    @include('includes.headers.mobile-menu-script')
    <script src="{{ asset('assets/front/js/scripts.js') }}"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Modern Enhancements -->
    <script src="{{ asset('assets/front/js/modern-enhancements.js') }}"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Preloader handler with fallbacks
        (function () {
            function hidePreloader() {
                var loader = document.querySelector('.se-pre-con');
                if (!loader) return;
                loader.classList.add('is-hidden');
                setTimeout(function () {
                    loader.style.display = 'none';
                }, 350);
            }
            document.addEventListener('DOMContentLoaded', hidePreloader);
            window.addEventListener('load', hidePreloader);
            setTimeout(hidePreloader, 1800);
        }());

        // Image error handler
        document.addEventListener('error', function (event) {
            var image = event.target;
            if (!image || image.tagName !== 'IMG') return;
            if (image.dataset.fallback) return;

            image.classList.add('media-failed');
            if (image.parentElement) image.parentElement.classList.add('media-missing');
            if (image.closest('.carousel-item')) image.closest('.carousel-item').classList.add('media-missing');
        }, true);

        // Back to top button
        window.addEventListener('scroll', function() {
            var backToTop = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });

        document.getElementById('back-to-top')?.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        function notificationWishlist() {
            var toast = document.getElementById('notificationWishlist');
            if (!toast) return;
            toast.classList.add('show');
            toast.setAttribute('aria-hidden', 'false');
            clearTimeout(toast._hideTimer);
            toast._hideTimer = setTimeout(function () {
                toast.classList.remove('show');
                toast.setAttribute('aria-hidden', 'true');
            }, 2500);
        }
    </script>

    <script>
        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        // Authentication state management
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        customerFname = $.trim(localStorage.getItem("customerFname"));
        customerLname = $.trim(localStorage.getItem("customerLname"));
        customerEmail = $.trim(localStorage.getItem("customerEmail"));

        if (loggedIn != '1') {
            $(".auth-login").remove();
        } else {
            $(".without-auth-login").remove();
            $(".welcomeUsername").html(customerFname + " " + customerLname);
            $('.profile-username').html(customerFname + " " + customerLname);
            $('.profile-user-email').html(customerEmail);
        }

        customerToken = $.trim(localStorage.getItem("customerToken"));

        // Language follows the server selection, so English does not keep Arabic content.
        languageId = $.trim("{{ $data['selectedLenguage'] }}");
        languageName = $.trim("{{ $data['selectedLenguageName'] }}");
        localStorage.setItem("languageId", languageId);
        localStorage.setItem("languageName", languageName);
        $(".language-default-name").html(languageName);
        $('.mobile-language option[value="' + languageId + '"]').attr('selected', 'selected');

        // Currency management
        currency = localStorage.getItem("currency");
        currencyCode = localStorage.getItem("currencyCode");
        if (currencyCode == null || currencyCode == 'null') {
            localStorage.setItem("currency", $.trim("{{ $data['selectedCurrency'] }}"));
            localStorage.setItem("currencyCode", $.trim("{{ $data['selectedCurrencyName'] }}"));
            $("#selected-currency").html($.trim("{{ $data['selectedCurrencyName'] }}"));
            currency = 1;
        } else {
            $("#selected-currency").html(localStorage.getItem("currencyCode"));
            $('.currency option[value="' + localStorage.getItem("languageId") + '"]').attr('selected', 'selected');
        }

        // Cart session
        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }

        $(document).ready(function() {
            if (loggedIn != '1') {
                localStorage.setItem("cartSession", cartSession);
                menuCart(cartSession);
            } else {
                menuCart('');
            }

            getWishlist();
            newLetter();
        });

        // Newsletter subscription
        function newLetter() {
            $('#newsletter').click(function (e) {
                e.preventDefault();
                url = "{{ url('') }}" + '/api/client/newslettercontact';
                var newsEmail = $('#news_email').val();
                var newsName = $('#news_name').val();

                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        name: newsName,
                        email: newsEmail,
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
                            toastr.success('تم الاشتراك بنجاح!');
                            setTimeout(function() {
                                window.location.href = "{{ url('/') }}";
                            }, 1500);
                        }
                    },
                    error: function(data) {
                        toastr.error('حدث خطأ، يرجى المحاولة مرة أخرى');
                    },
                });
            });
        }

        // Slider settings helper
        function getSliderSettings(className) {
            jQuery(document).ready(function() {
                (function(jQuery) {
                    var tabCarousel = jQuery('.' + className);
                    if (tabCarousel.length) {
                        tabCarousel.each(function() {
                            var thisCarousel = jQuery(this),
                                item = jQuery(this).data('item'),
                                itemmobile = jQuery(this).data('itemmobile');

                            thisCarousel.slick({
                                lazyLoad: 'progressive',
                                dots: false,
                                arrows: true,
                                infinite: false,
                                speed: 300,
                                slidesToShow: item || 4,
                                slidesToScroll: item || 1,
                                adaptiveHeight: true,
                                responsive: [{
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        arrows: false,
                                    }
                                }, {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 1
                                    }
                                }, {
                                    breakpoint: 576,
                                    settings: {
                                        slidesToShow: itemmobile || 1,
                                        slidesToScroll: itemmobile || 1
                                    }
                                }]
                            });
                        });
                    };
                })(jQuery);
            });
        }

        // Get wishlist
        function getWishlist() {
            if (loggedIn != '1') {
                return;
            }

            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/wishlist',
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        $(".wishlist-count").html(data.data.length);
                    }
                },
                error: function(data) {},
            });
        }

        // Add to wishlist
        function addWishlist(input) {
            if (loggedIn != '1') {
                toastr.error('{{ trans('response.please_login_first') }}')
                return;
            }

            $.ajax({
                type: 'post',
                url: "{{ url('') }}" + '/api/client/wishlist?product_id=' + $(input).attr('data-id'),
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        $(".wishlist-count").html(data.data.length);
                        toastr.success('{{ trans('lables.wishlist-add-success') }}')
                    }
                },
                error: function(data) {},
            });
        }

        // Add to compare
        function addCompare(input) {
            if (loggedIn != '1') {
                toastr.error('{{ trans('response.please_login_first') }}')
                return;
            }

            customerId = $.trim(localStorage.getItem("customerId"));
            $.ajax({
                type: 'post',
                url: "{{ url('') }}" + '/api/client/compare?product_id=' + $(input).attr('data-id') + '&customer_id=' + customerId,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        toastr.success('{{ trans('response.compare-add-success') }}')
                    }
                },
                error: function(data) {},
            });
        }

        function quiclViewData(input) {
            var productId = $.trim($(input).attr('data-id'));
            $(".quick-view-modal-show").html('');

            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/products/' + productId +
                    '?getCategory=1&getDetail=1&language_id=' + languageId + '&currency=' +
                    localStorage.getItem("currency"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                success: function(response) {
                    if (response.status !== 'Success' || !response.data) return;

                    var product = response.data;
                    var details = Array.isArray(product.detail) && product.detail.length ? product.detail[0] : null;
                    var template = document.getElementById("quick-view-template");
                    if (!template) return;

                    var clone = template.content.cloneNode(true);
                    var images = [];

                    if (Array.isArray(product.product_gallary_detail)) {
                        images = product.product_gallary_detail.map(function(image) {
                            return '/gallary/' + image.gallary_name;
                        });
                    }

                    if (!images.length && product.product_gallary && Array.isArray(product.product_gallary.detail)) {
                        images = product.product_gallary.detail.map(function(image) {
                            var path = image.gallary_path || '';
                            return /^https?:\/\//.test(path) || path.charAt(0) === '/' ? path : '/' + path;
                        }).filter(Boolean);
                    }

                    if (!images.length) {
                        images = ["{{ asset('assets/images/snuslogo1.png') }}"];
                    }

                    clone.querySelector(".carasol-images").innerHTML = images.map(function(image, index) {
                        return '<div class="carousel-item ' + (index === 0 ? 'active' : '') +
                            '"><img class="img-fluid quick-view-image" src="' + image +
                            '" alt="' + (details ? details.title : 'Product') + '"></div>';
                    }).join('');

                    clone.querySelector(".quick-view-product-name").textContent = details ? details.title : 'Product';
                    clone.querySelector(".quick-view-desc").textContent = details
                        ? $('<div>').html(details.desc || '').text().substring(0, 250) : '';
                    clone.querySelector(".quick-view-product-id").textContent = product.product_id;

                    var categories = Array.isArray(product.category) ? product.category : [];
                    clone.querySelector(".quick-view-categories").innerHTML = categories.map(function(category) {
                        var detail = category.category_detail && Array.isArray(category.category_detail.detail)
                            ? category.category_detail.detail[0] : null;
                        return detail
                            ? '<li><a href="/shop?category=' + detail.category_id + '">' + detail.name + '</a></li>'
                            : '';
                    }).join('');

                    var badges = '';
                    if (product.discount_percentage > 0)
                        badges += '<span class="badge badge-danger">' + product.discount_percentage + '%</span>';
                    if (product.is_featured != "0")
                        badges += '<span class="badge badge-success">Featured</span>';
                    if (product.new != "0")
                        badges += '<span class="badge badge-info">New</span>';
                    clone.querySelector(".badges").innerHTML = badges;

                    var action = clone.querySelector(".quick-view-add-to-cart");
                    if (product.product_type === 'simple') {
                        clone.querySelector(".quick-view-price").innerHTML = product.product_discount_price
                            ? '<ins>' + product.product_discount_price_symbol + '</ins> <del>' +
                                product.product_price_symbol + '</del>'
                            : '<ins>' + product.product_price_symbol + '</ins>';
                        action.setAttribute('onclick', 'addToCart(this)');
                        action.setAttribute('data-id', product.product_id);
                        action.setAttribute('data-type', product.product_type);
                    } else {
                        var combination = Array.isArray(product.product_combination)
                            ? product.product_combination[0] : null;
                        clone.querySelector(".quick-view-price").innerHTML = combination
                            ? '<ins>' + combination.product_price_symbol + '</ins>' : '';
                        clone.querySelector(".quick-view-qty").classList.add('d-none');
                        action.setAttribute('href', '/product/' + product.product_id + '/' + product.product_slug);
                        action.textContent = 'View Detail';
                    }

                    $(".quick-view-modal-show").append(clone);
                },
            });
        }

        // Add to cart
        function addToCart(input) {
            product_type = $.trim($(input).attr('data-type'));
            product_id = $.trim($(input).attr('data-id'));
            data_field = $.trim($(input).attr('data-field'));
            product_combination_id = '';

            if (product_type == 'variable') {
                if ($.trim($("#product_combination_id").val()) == '' || $.trim($("#product_combination_id").val()) == 'null') {
                    toastr.error("{{ trans('response.select-combination') }}")
                    return;
                }
                product_combination_id = $("#product_combination_id").val();
            }

            if (data_field != '')
                qty = $.trim($("#quantity" + data_field).val());
            else
                qty = $.trim($("#quantity-input").val());

            if (qty == '' || qty == 'undefined' || qty == null) {
                qty = 1;
            }
            addToCartFun(product_id, product_combination_id, cartSession, qty);
        }

        function addToCartFun(product_id, product_combination_id, cartSession, qty) {
            if (loggedIn == '1') {
                url = "{{ url('') }}" + '/api/client/cart?session_id=' + cartSession + '&product_id=' + product_id + '&qty=' + qty + '&product_combination_id=' + product_combination_id;
            } else {
                url = "{{ url('') }}" + '/api/client/cart/guest/store?session_id=' + cartSession + '&product_id=' + product_id + '&qty=' + qty + '&product_combination_id=' + product_combination_id;
            }

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
                        if (loggedIn != '1') {
                            localStorage.setItem("cartSession", data.data.session);
                            menuCart(data.data.session);
                        } else {
                            menuCart('');
                        }
                        $('#quantity-input').val(1);
                        toastr.success('{{ trans('response.add-to-cart-success') }}')
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {
                    if (data.responseJSON && data.responseJSON.status == 'Error') {
                        toastr.error('{{ trans('response.out_of_stock') }}');
                    }
                },
            });
        }

        function menuCart(cartSession) {
            if (loggedIn != '1' && (cartSession == null || cartSession === '' || cartSession === 'null')) {
                $(".top-cart-product-show").html('{{ trans('lables.header-emptycart') }}');
                $(".total-menu-cart-product-count").html('0');
                return;
            }

            if (loggedIn == '1') {
                url = "{{ url('') }}" + '/api/client/cart?session_id=' + cartSession + '&currency=' + localStorage.getItem("currency");
            } else {
                url = "{{ url('') }}" + '/api/client/cart/guest/get?session_id=' + cartSession + '&currency=' + localStorage.getItem("currency");
            }
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                success: function(data) {
                    if (data.status != 'Success' || !Array.isArray(data.data)) {
                        return;
                    }
                    $(".top-cart-product-show").html('');
                    const templ = document.getElementById("top-cart-product-template");
                    var totalPrice = 0;
                    var currency = '';
                    for (var i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        var item = data.data[i];
                        var gallery = item.product_gallary && Array.isArray(item.product_gallary.detail) ? item.product_gallary.detail : [];
                        var image = gallery[2] || gallery[1] || gallery[0];
                        if (image && image.gallary_path) {
                            clone.querySelector(".top-cart-product-image").setAttribute('src', image.gallary_path);
                        }
                        if (item.product_detail && item.product_detail[0]) {
                            clone.querySelector(".top-cart-product-image").setAttribute('alt', item.product_detail[0].title);
                            clone.querySelector(".top-cart-product-name").innerHTML = item.product_detail[0].title;
                        }
                        var discountPrice = item.discount_price > 0 ? item.discount_price : item.price;
                        var amount = item.qty + ' x ' + discountPrice;
                        if (item.currency && item.currency.code) {
                            amount = item.currency.symbol_position == 'left'
                                ? item.qty + ' x ' + item.currency.code + ' ' + discountPrice
                                : item.qty + ' x ' + discountPrice + ' ' + item.currency.code;
                        }
                        clone.querySelector(".top-cart-product-qty-amount").innerHTML = amount +
                            ' <i class="fas fa-trash" data-id="' + item.product_id + '" data-combination-id="' + (item.product_combination_id || '') + '" onclick="removeCartItem(this)"></i>';
                        totalPrice += discountPrice * item.qty;
                        $(".top-cart-product-show").append(clone);
                        currency = item.currency;
                    }
                    if (data.data.length > 0) {
                        if (currency && currency.code) {
                            totalPrice = currency.symbol_position == 'left'
                                ? currency.code + ' ' + totalPrice
                                : totalPrice + ' ' + currency.code;
                        }
                        const totalTemplate = document.getElementById("top-cart-product-total-template");
                        const totalClone = totalTemplate.content.cloneNode(true);
                        totalClone.querySelector(".top-cart-product-total").innerHTML = totalPrice;
                        $(".top-cart-product-show").append(totalClone);
                        $(".total-menu-cart-product-count").html(data.data.length);
                    } else {
                        $(".top-cart-product-show").html('{{ trans('lables.header-emptycart') }}');
                        $(".total-menu-cart-product-count").html('0');
                    }
                },
            });
        }

        function removeCartItem(input) {
            var productId = $.trim($(input).attr('data-id'));
            var combinationId = $.trim($(input).attr('data-combination-id'));
            if (combinationId == null || combinationId == 'null') {
                combinationId = '';
            }
            var url = loggedIn == '1'
                ? "{{ url('') }}" + '/api/client/cart/delete?session_id=' + cartSession + '&product_id=' + productId + '&product_combination_id=' + combinationId
                : "{{ url('') }}" + '/api/client/cart/guest/delete?session_id=' + cartSession + '&product_id=' + productId + '&product_combination_id=' + combinationId;
            $.ajax({
                type: 'DELETE',
                url: url,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                success: function(data) {
                    if (data.status == 'Success') {
                        menuCart(cartSession);
                    }
                },
            });
        }

        // Quantity controls
        $(document).on('click', '.quantity-plus', function() {
            var quantity = $('#quantity-input').val();
            $('#quantity-input').val(parseInt(quantity) + 1);
        })

        $(document).on('click', '.quantity-minus', function() {
            var quantity = $('#quantity-input').val();
            if (quantity > 1)
                $('#quantity-input').val(parseInt(quantity) - 1);
        });

        // Language switcher
        $(".language-default").click(function(e) {
            e.preventDefault();
            languageId = $(this).attr('data-id');
            languageName = $(this).attr('data-name');
            localStorage.setItem("languageId", languageId);
            localStorage.setItem("languageName", languageName);
            $(".language-default-name").html(languageName);
            var href = $.trim($(this).attr('href'));
            window.location.href = href;
        });

        $('.cat-dropdown').click(function() {
            var categoryId = $(this).attr('data-id') || '';
            var categoryName = $(this).attr('data-name');
            $('.selected_category').attr('data-id', categoryId).html(categoryName);
        });

        // Search and category navigation
        $('#search_button').click(function(e) {
            e.preventDefault();
            var searchInput = $.trim($('#search-input').val());
            var categoryId = $('.selected_category').attr('data-id') || '';
            var params = [];

            if (searchInput) params.push('search=' + encodeURIComponent(searchInput));
            if (categoryId) params.push('category=' + encodeURIComponent(categoryId));

            window.location.href = "{{ url('/shop') }}" + (params.length ? '?' + params.join('&') : '');
        })

        // Currency switcher
        $(".selected-currency").click(function(e) {
            e.preventDefault();
            currencyId = $(this).attr('data-id');
            currencycode = $(this).attr('data-code');
            localStorage.setItem("currency", currencyId);
            localStorage.setItem("currencyCode", currencycode);
            $("#selected-currency").html(currencycode);
            location.reload();
        });

        // Logout
        $('.log_out').click(function() {
            url = "{{ url('') }}" + '/api/client/customer_logout';

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
                        localStorage.clear();
                        location.reload();
                    }
                },
                error: function(data) {
                    localStorage.clear();
                    location.reload();
                },
            });
        });

        $('.close-quick-view-model').click(function(){
            $('.quantity-input').val('1');
        })
    </script>

    @yield('script')
</body>

</html>
