@extends('layouts.master')
@section('content')

<style>
/* Modern Profile Styles */
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

.profile-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
}

.profile-header-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    box-shadow: var(--shadow-md);
}

.profile-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-4);
}

.profile-info-item {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.profile-info-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 600;
}

.profile-info-value {
    font-size: 1rem;
    color: var(--text-primary);
    font-weight: 700;
}

.sidebar-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
}

.sidebar-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-4);
    letter-spacing: -0.02em;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu-item {
    margin-bottom: var(--space-2);
}

.sidebar-menu-link {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-md);
    color: var(--text-primary);
    text-decoration: none;
    transition: all 0.2s;
    font-weight: 600;
}

.sidebar-menu-link:hover {
    background: var(--surface-2);
    color: var(--color-primary);
    transform: translateX(4px);
}

.sidebar-menu-link.active {
    background: var(--color-primary);
    color: white;
}

.sidebar-menu-icon {
    width: 20px;
    text-align: center;
}

.content-card-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
}

.content-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
    letter-spacing: -0.02em;
}

.form-row-modern {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-5);
    margin-bottom: var(--space-5);
}

.form-group-modern {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.form-label-modern {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
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

.form-select-modern {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    background: var(--surface-0);
    color: var(--text-primary);
    font-size: 0.9375rem;
    transition: all 0.2s;
    cursor: pointer;
}

.form-select-modern:focus {
    outline: none;
    border-color: var(--color-primary);
    background: var(--surface-1);
}

.invalid-feedback {
    color: var(--color-error);
    font-size: 0.8125rem;
    margin-top: var(--space-1);
    display: none;
}

.btn-modern-primary {
    padding: var(--space-4) var(--space-6);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-modern-primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* RTL Support */
[dir="rtl"] .sidebar-menu-link:hover {
    transform: translateX(-4px);
}

[dir="rtl"] .sidebar-menu-icon {
    margin-left: var(--space-3);
    margin-right: 0;
}

/* Responsive */
@media (max-width: 992px) {
    .sidebar-modern {
        margin-bottom: var(--space-6);
    }

    .form-row-modern {
        grid-template-columns: 1fr;
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
                        الملف الشخصي
                    @else
                        {{ trans('lables.bread-profile') }}
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Profile Content -->
<section class="profile-modern">
    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header-modern">
            <div class="profile-info-grid">
                <div class="profile-info-item">
                    <span class="profile-info-label">
                        @if($data['direction'] === 'rtl')
                            الاسم
                        @else
                            {{ trans('lables.profile-name') }}
                        @endif
                    </span>
                    <span class="profile-info-value profile-username"></span>
                </div>
                <div class="profile-info-item">
                    <span class="profile-info-label">
                        @if($data['direction'] === 'rtl')
                            البريد الإلكتروني
                        @else
                            {{ trans('lables.profile-email') }}
                        @endif
                    </span>
                    <span class="profile-info-value profile-user-email"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-lg-3">
                <div class="sidebar-modern">
                    <h2 class="sidebar-title">
                        @if($data['direction'] === 'rtl')
                            حسابي
                        @else
                            {{ trans('lables.profile-my-account') }}
                        @endif
                    </h2>

                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/profile') }}" class="sidebar-menu-link active">
                                <i class="fas fa-user sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    الملف الشخصي
                                @else
                                    {{ trans('lables.profile-side-menue-profile') }}
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/wishlist') }}" class="sidebar-menu-link">
                                <i class="fas fa-heart sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    قائمة الأمنيات
                                @else
                                    {{ trans('lables.profile-side-menue-wishlist') }}
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/compare') }}" class="sidebar-menu-link">
                                <i class="fas fa-align-right sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    المقارنة
                                @else
                                    {{ trans('lables.profile-side-menue-compare') }}
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/orders') }}" class="sidebar-menu-link">
                                <i class="fas fa-shopping-cart sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    الطلبات
                                @else
                                    {{ trans('lables.profile-side-menue-orders') }}
                                @endif
                            </a>
                        </li>
                        @if(isset(getSetting()['point_setting']) && getSetting()['point_setting'] == 'enable')
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/points') }}" class="sidebar-menu-link">
                                <i class="fas fa-coins sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    النقاط
                                @else
                                    {{ trans('lables.header-points') }}
                                @endif
                            </a>
                        </li>
                        @endif
                        @if(isset(getSetting()['wallet_setting']) && getSetting()['wallet_setting'] == 'enable')
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/wallet') }}" class="sidebar-menu-link">
                                <i class="fas fa-wallet sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    المحفظة
                                @else
                                    {{ trans('lables.header-wallet') }}
                                @endif
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/shipping-address') }}" class="sidebar-menu-link">
                                <i class="fas fa-map-marker-alt sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    عناوين الشحن
                                @else
                                    {{ trans('lables.profile-side-menue-shipping-address') }}
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/change-password') }}" class="sidebar-menu-link">
                                <i class="fas fa-unlock-alt sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    تغيير كلمة المرور
                                @else
                                    {{ trans('lables.profile-side-menue-change-password') }}
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="javascript:void(0)" class="sidebar-menu-link log_out">
                                <i class="fas fa-power-off sidebar-menu-icon"></i>
                                @if($data['direction'] === 'rtl')
                                    تسجيل الخروج
                                @else
                                    {{ trans('lables.profile-side-menue-logout') }}
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-12 col-lg-9">
                <div class="content-card-modern">
                    <h2 class="content-title">
                        @if($data['direction'] === 'rtl')
                            المعلومات الشخصية
                        @else
                            {{ trans('lables.profile-prsonal-info') }}
                        @endif
                    </h2>

                    <form id="profileForm">
                        <div class="form-row-modern">
                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        الاسم الأول
                                    @else
                                        {{ trans('lables.profile-first-name') }}
                                    @endif
                                </label>
                                <input
                                    type="text"
                                    class="form-input-modern"
                                    id="first_name"
                                    placeholder="@if($data['direction'] === 'rtl')الاسم الأول@else{{ trans('lables.profile-first-name') }}@endif"
                                >
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        اسم العائلة
                                    @else
                                        {{ trans('lables.profile-last-name') }}
                                    @endif
                                </label>
                                <input
                                    type="text"
                                    class="form-input-modern"
                                    id="last_name"
                                    placeholder="@if($data['direction'] === 'rtl')اسم العائلة@else{{ trans('lables.profile-last-name') }}@endif"
                                >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="form-row-modern">
                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        الجنس
                                    @else
                                        {{ trans('lables.profile-gender') }}
                                    @endif
                                </label>
                                <select class="form-select-modern" id="gender">
                                    <option value="Male">
                                        @if($data['direction'] === 'rtl')
                                            ذكر
                                        @else
                                            Male
                                        @endif
                                    </option>
                                    <option value="Female">
                                        @if($data['direction'] === 'rtl')
                                            أنثى
                                        @else
                                            Female
                                        @endif
                                    </option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    @if($data['direction'] === 'rtl')
                                        تاريخ الميلاد
                                    @else
                                        {{ trans('lables.profile-dob') }}
                                    @endif
                                </label>
                                <input
                                    type="date"
                                    class="form-input-modern"
                                    id="bday"
                                >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                @if($data['direction'] === 'rtl')
                                    رقم الهاتف
                                @else
                                    {{ trans('lables.profile-phone') }}
                                @endif
                            </label>
                            <input
                                type="text"
                                class="form-input-modern"
                                id="phone"
                                placeholder="@if($data['direction'] === 'rtl')رقم الهاتف@else{{ trans('lables.profile-phone') }}@endif"
                            >
                        </div>

                        <input type="hidden" id="method">
                        <input type="hidden" id="addres_id">

                        <button type="submit" class="btn-modern-primary saveProfile">
                            @if($data['direction'] === 'rtl')
                                تحديث الملف الشخصي
                            @else
                                {{ trans('lables.profile-update') }}
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{ url('/') }}";
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    $(document).ready(function() {
        getProfile();

        // Set profile header info from localStorage
        var firstName = localStorage.getItem("customerFname") || '';
        var lastName = localStorage.getItem("customerLname") || '';
        var email = localStorage.getItem("customerEmail") || '';

        $('.profile-username').text(firstName + ' ' + lastName);
        $('.profile-user-email').text(email);
    });

    function getProfile() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/profile/' + customerId,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#profileForm").find("#first_name").val(data.data.customer_first_name);
                    $("#profileForm").find("#last_name").val(data.data.customer_last_name);
                }
            },
            error: function(data) {},
        });

        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_address_book?is_default=1',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    if (data.data != null && data.data != 'null' && data.data != '') {
                        $("#profileForm").find("#gender").val(data.data[0].gender);
                        $("#profileForm").find("#gender").trigger('change');
                        $("#profileForm").find("#bday").val(data.data[0].dob);
                        $("#profileForm").find("#phone").val(data.data[0].phone);
                        $("#profileForm").find("#method").val('put');
                        $("#profileForm").find("#addres_id").val(data.data[0].id);
                    } else {
                        $("#profileForm").find("#method").val('post');
                    }
                }
            },
            error: function(data) {},
        });
    }

    $("#profileForm").submit(function(e) {
        e.preventDefault();
        var birth = $('#bday').val();
        if (birth != "") {
            var record = birth;
            var currentdate = new Date();
            var day1 = currentdate.getDate();
            var month1 = currentdate.getMonth();
            month1++;
            var year1 = currentdate.getFullYear() - 17;

            record = record.split("-")[0];
            if (record > year1) {
                toastr.error('{{ trans("lables.profile-date-check") }}')
                return
            }
        }

        first_name = $("#profileForm").find("#first_name").val();
        last_name = $("#profileForm").find("#last_name").val();

        $.ajax({
            type: 'put',
            url: "{{ url('') }}" + '/api/client/profile/' + customerId,
            data: {
                first_name: first_name,
                last_name: last_name,
                type: 'profile'
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
                    localStorage.setItem("customerFname", first_name);
                    localStorage.setItem("customerLname", last_name);
                    $('.profile-username').text(first_name + ' ' + last_name);
                    toastr.success('{{ trans("profile-updated-successfully") }}');
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    jQuery.each(data.responseJSON.errors, function(index, item) {
                        $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                        $("#" + index).parent().find('.invalid-feedback').html(item);
                    });
                } else {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
        });

        gender = $("#profileForm").find("#gender").val();
        dob = $("#profileForm").find("#bday").val();
        phone = $("#profileForm").find("#phone").val();
        method = $("#profileForm").find("#method").val();
        if (method == 'post') {
            url = '/api/client/customer_address_book';
        } else {
            ids = $("#profileForm").find("#addres_id").val();
            url = '/api/client/customer_address_book/' + ids;
        }

        $.ajax({
            type: method,
            url: "{{ url('') }}" + url,
            data: {
                is_default: '1',
                gender: gender,
                first_name: first_name,
                last_name: last_name,
                dob: dob,
                phone: phone,
                type: 'profile'
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
                    $("#profileForm").find("#method").val('put');
                    $("#profileForm").find("#addres_id").val(data.data.id);
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    jQuery.each(data.responseJSON.errors, function(index, item) {
                        $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                        $("#" + index).parent().find('.invalid-feedback').html(item);
                    });
                } else {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
        });
    });
</script>
@endsection
