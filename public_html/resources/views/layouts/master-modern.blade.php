{{-- Modern Layout Master - Updated for Vite + Bootstrap 5 --}}
<!DOCTYPE html>
<html class="no-js" lang="zxx" data-theme="default">

<head>
    <meta charset="UTF-8">
    <title>{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Seo Title' }}</title>
    <meta name="description"
        content="{{ isset(getSetting()['seo_description']) ? getSetting()['seo_description'] : 'Seo Description' }}" id="meta-description">
    <meta name="keywords"
        content="{{ isset(getSetting()['seo_keywords']) ? getSetting()['seo_keywords'] : 'Seo Keywords' }}" id="meta-keyword">
    <meta name="author" content="">
    <meta name="title" content="" id="meta-title">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png"
        href="{{ isset(getSetting()['favicon']) ? getSetting()['favicon'] : '01-fav.png' }}">

    <!-- Font Awesome 6.7 (Updated) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- Laravel Mix Assets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ isset(getSetting()['color']) ? asset('assets/front/css/' . getSetting()['color'] . '.css') : asset('assets/front/css/style.css') }}">

    <!-- Toastr Notifications -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <!-- AOS Animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

<style>
#installAppButton{
position:fixed;
left:20px;
bottom:95px;
display:none;
align-items:center;
justify-content:center;
padding:14px 22px;
background:#C19A49;
color:#fff;
font-size:15px;
font-weight:600;
border:none;
border-radius:50px;
cursor:pointer;
z-index:999999;
box-shadow:0 10px 30px rgba(0,0,0,.35);
transition:.3s;
}

#installAppButton:hover{
transform:translateY(-3px);
background:#d7aa54;
}

@media(max-width:768px){
#installAppButton{
left:15px;
bottom:90px;
padding:12px 18px;
font-size:14px;
}
}

/* Theme Toggle Button */
#theme-toggle {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--color-primary, #ae69f5);
    color: white;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
    transition: all 0.3s ease;
}

#theme-toggle:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
</style>

</head>

<body class="animation-s1 {{ $data['direction'] === 'rtl' ? 'bodyrtl' : '' }}" x-data="{ mobileMenuOpen: false }">
    @include('snus.whatsapp')
    @include('snus.age-gate')
    @include('extras.preloader')
    @include(isset(getSetting()['header_style']) ? 'includes.headers.header-'.getSetting()['header_style'] :
    'includes.headers.header-style1')

    <script src="{{ asset('assets/snus/js/install-app.js') }}"></script>

    @yield('content')

    @include(isset(getSetting()['Footer_style']) ? 'includes.footers.footer-'.getSetting()['Footer_style'] :
    'includes.footers.footer-style1')

    <a href="javascript:void(0)" class="btn-secondary swipe-to-top" id="back-to-top" data-toggle="tooltip"
        data-placement="bottom" data-original-title="{{ trans('lables.general-backtotop') }}"
        title="{{ trans('lables.general-backtotop') }}">&uarr;</a>

    <!-- Theme Toggle Button (New) -->
    <button id="theme-toggle" title="Toggle Dark/Light Mode">
        <i class="fas fa-moon"></i>
    </button>

    <div class="mobile-overlay"></div>

    <div class="notifications" id="notificationWishlist">Product Added To Wishlist</div>

    @include('extras.settings')
    @include('modals.product-quick-view')

    <!-- jQuery (Keep for compatibility) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Old Scripts (For compatibility) -->
    <script src="{{ asset('assets/front/js/scripts.js') }}"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- AOS Animations -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>

    @php
        $language_id = $data['selectedLenguage'];
        $locale = session()->get('locale');
    @endphp

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": false,
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

        languageId = localStorage.getItem("languageId");
        languageName = localStorage.getItem("languageName");

        if (languageName == null || languageName == 'null') {
            localStorage.setItem("languageId", $.trim("{{ $data['selectedLenguage'] }}"));
            localStorage.setItem("languageName", $.trim("{{ $data['selectedLenguageName'] }}"));
            $(".language-default-name").html($.trim("{{ $data['selectedLenguageName'] }}"));
            languageId = $.trim("{{ $data['selectedLenguage'] }}");
        } else {
            $(".language-default-name").html(localStorage.getItem("languageName"));
            $('.mobile-language option[value="' + localStorage.getItem("languageId") + '"]').attr('selected', 'selected');
        }

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

        // Theme functionality is handled by Alpine.js + theme-switcher.js (loaded via Vite)

        // Rest of the old JavaScript functions remain for compatibility...
        // (keeping all the existing functions for cart, wishlist, etc.)
    </script>

    @yield('script')
</body>

</html>
