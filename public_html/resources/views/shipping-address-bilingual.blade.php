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
                            عناوين الشحن
                        @else
                            Shipping Addresses
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Shipping Addresses Section --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                {{-- Sidebar --}}
                <div class="col-12 col-lg-3">
                    <div class="card border-0" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-md); background: var(--surface-1); position: sticky; top: 20px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    حسابي
                                @else
                                    My Account
                                @endif
                            </h5>
                            <hr style="border-color: var(--surface-3);">
                            @include('includes.side-menu')
                        </div>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-12 col-lg-9">
                    {{-- Saved Addresses --}}
                    <div class="card border-0 mb-4" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); background: var(--surface-1);">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    عناوين الشحن المحفوظة
                                @else
                                    Saved Shipping Addresses
                                @endif
                            </h4>
                            <hr style="border-color: var(--surface-3);">

                            <div class="table-responsive">
                                <table class="table" style="border: none;">
                                    <thead style="background: var(--surface-0);">
                                        <tr>
                                            <th scope="col" style="color: var(--text-primary); font-weight: 600; padding: 12px 16px;">
                                                @if($data['direction'] === 'rtl')
                                                    افتراضي
                                                @else
                                                    Default
                                                @endif
                                            </th>
                                            <th scope="col" style="color: var(--text-primary); font-weight: 600; padding: 12px 16px;">
                                                @if($data['direction'] === 'rtl')
                                                    الاسم الأول
                                                @else
                                                    First Name
                                                @endif
                                            </th>
                                            <th scope="col" style="color: var(--text-primary); font-weight: 600; padding: 12px 16px;">
                                                @if($data['direction'] === 'rtl')
                                                    اسم العائلة
                                                @else
                                                    Last Name
                                                @endif
                                            </th>
                                            <th scope="col" style="color: var(--text-primary); font-weight: 600; padding: 12px 16px;">
                                                @if($data['direction'] === 'rtl')
                                                    البلد/الولاية/المدينة
                                                @else
                                                    Country/State/City
                                                @endif
                                            </th>
                                            <th scope="col" class="d-none d-md-table-cell" style="color: var(--text-primary); font-weight: 600; padding: 12px 16px;">
                                                @if($data['direction'] === 'rtl')
                                                    الإجراءات
                                                @else
                                                    Actions
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="shipping-address-listing-show">
                                        {{-- Dynamic content loaded via AJAX --}}
                                    </tbody>
                                </table>
                            </div>

                            <template id="shipping-address-listing-template">
                                <tr class="shipping-address-listing-id" style="border-bottom: 1px solid var(--surface-3); transition: all 0.3s ease;">
                                    <td style="padding: 16px;">
                                        <div class="form-check">
                                            <input class="form-check-input shipping-address-listing-is-default" name="radiobtn" type="radio" style="cursor: pointer;">
                                        </div>
                                    </td>
                                    <td style="padding: 16px;">
                                        <label class="form-check-label shipping-address-listing-first-name" style="color: var(--text-primary);"></label>
                                    </td>
                                    <td style="padding: 16px;">
                                        <label class="form-check-label shipping-address-listing-last-name" style="color: var(--text-primary);"></label>
                                    </td>
                                    <td style="padding: 16px;">
                                        <label class="form-check-label shipping-address-listing-country-state-city" style="color: var(--text-secondary);"></label>
                                    </td>
                                    <td class="edit-tag d-none d-md-table-cell" style="padding: 16px;">
                                        <div class="d-flex gap-2">
                                            <a href="javascript:void(0)" class="shipping-address-listing-edit-btn btn btn-sm" style="background: rgba(193, 154, 73, 0.1); color: var(--color-primary); border: none; border-radius: var(--radius-md); padding: 6px 12px; transition: all 0.3s ease; text-decoration: none;">
                                                <i class="fas fa-pen"></i>
                                                @if($data['direction'] === 'rtl')
                                                    تعديل
                                                @else
                                                    Edit
                                                @endif
                                            </a>
                                            <a href="javascript:void(0)" class="shipping-address-listing-delete-btn btn btn-sm" style="background: rgba(220, 38, 38, 0.1); color: #dc2626; border: none; border-radius: var(--radius-md); padding: 6px 12px; transition: all 0.3s ease; text-decoration: none;">
                                                <i class="fas fa-trash-alt"></i>
                                                @if($data['direction'] === 'rtl')
                                                    حذف
                                                @else
                                                    Remove
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </div>
                    </div>

                    {{-- Add New Address Form --}}
                    <div class="card border-0" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); background: var(--surface-1);">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary);">
                                @if($data['direction'] === 'rtl')
                                    إضافة عنوان جديد
                                @else
                                    Add New Address
                                @endif
                            </h4>
                            <hr style="border-color: var(--surface-3);">

                            <form id="shippingAddressForm">
                                <div class="row g-3">
                                    {{-- First Name --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                الاسم الأول
                                            @else
                                                First Name
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="first_name"
                                               placeholder="@if($data['direction'] === 'rtl') أدخل الاسم الأول @else Enter first name @endif"
                                               style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                اسم العائلة
                                            @else
                                                Last Name
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="last_name"
                                               placeholder="@if($data['direction'] === 'rtl') أدخل اسم العائلة @else Enter last name @endif"
                                               style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- Street Address --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                عنوان الشارع
                                            @else
                                                Street Address
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="street_address"
                                               placeholder="@if($data['direction'] === 'rtl') أدخل عنوان الشارع @else Enter street address @endif"
                                               style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- Country --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                البلد
                                            @else
                                                Country
                                            @endif
                                        </label>
                                        <select class="form-control" id="country_id" onchange="states()"
                                                style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- State --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                الولاية
                                            @else
                                                State
                                            @endif
                                        </label>
                                        <select class="form-control" id="state_id" onchange="cities()"
                                                style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- City --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                المدينة
                                            @else
                                                City
                                            @endif
                                        </label>
                                        <select class="form-control" id="city"
                                                style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    {{-- Postal Code --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                الرمز البريدي
                                            @else
                                                Postal Code
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" id="postcode"
                                               placeholder="@if($data['direction'] === 'rtl') أدخل الرمز البريدي @else Enter postal code @endif"
                                               style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0);">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    @if(isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1')
                                    {{-- Location --}}
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-600" style="color: var(--text-primary);">
                                            @if($data['direction'] === 'rtl')
                                                الموقع (خط الطول والعرض)
                                            @else
                                                Location (Lat/Long)
                                            @endif
                                        </label>
                                        <input type="text" class="form-control" data-toggle="modal" data-target="#mapModal" name="location" id="location"
                                               placeholder="@if($data['direction'] === 'rtl') اضغط لاختيار الموقع @else Click to select location @endif"
                                               style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); cursor: pointer;">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    @endif
                                </div>

                                {{-- Hidden Fields --}}
                                <input type="hidden" id="method">
                                <input type="hidden" id="country_id_hidden">
                                <input type="hidden" id="state_id_hidden">
                                <input type="hidden" id="city_id_hidden">
                                <input type="hidden" id="addres_id">
                                <input type="hidden" id="gender">
                                <input type="hidden" id="dob">
                                <input type="hidden" id="phone">

                                {{-- Submit Button --}}
                                <button type="submit" class="btn w-100 py-3 mt-4" style="background: var(--color-primary); color: white; border: none; border-radius: 999px; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease; box-shadow: var(--shadow-md);">
                                    <i class="fas fa-plus me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        إضافة العنوان
                                    @else
                                        Add Address
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- Map Modal --}}
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: var(--radius-lg); border: none;">
            <div class="modal-body p-0">
                <div class="container-fluid p-4">
                    <div class="row align-items-center">
                        <div class="form-group mb-3">
                            <input type="text" id="pac-input" name="address_address" class="form-control"
                                   placeholder="@if($data['direction'] === 'rtl') ابحث عن عنوان @else Search for an address @endif"
                                   style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md);">
                        </div>
                        <div id="address-map-container" style="width:100%;height:400px;">
                            <div style="width: 100%; height: 100%; border-radius: var(--radius-md);" id="map"></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid var(--surface-3);">
                <button type="button" class="btn" onclick="setUserLocation()" style="background: rgba(193, 154, 73, 0.1); color: var(--color-primary); border: none; border-radius: var(--radius-md); padding: 10px 20px;">
                    <i class="fas fa-location-arrow me-2"></i>
                    @if($data['direction'] === 'rtl')
                        موقعي الحالي
                    @else
                        My Location
                    @endif
                </button>
                <button type="button" class="btn" onclick="saveAddress()" style="background: var(--color-primary); color: white; border: none; border-radius: var(--radius-md); padding: 10px 20px;">
                    @if($data['direction'] === 'rtl')
                        حفظ
                    @else
                        Save
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
    }

    button[type="submit"]:hover {
        background: var(--color-primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .shipping-address-listing-edit-btn:hover {
        background: rgba(193, 154, 73, 0.2) !important;
        transform: translateY(-1px);
    }

    .shipping-address-listing-delete-btn:hover {
        background: rgba(220, 38, 38, 0.2) !important;
        transform: translateY(-1px);
    }

    tbody tr:hover {
        background: var(--surface-0);
    }

    [dir="rtl"] .form-control, [dir="rtl"] .form-select {
        text-align: right;
    }

    .invalid-feedback {
        display: none;
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
@endsection

@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{url('/')}}";
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    $(document).ready(function() {
        getCustomerAdress();
        countries();
    });

    function getCustomerAdress() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_address_book',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#shipping-address-listing-show").html('');
                    const templ = document.getElementById("shipping-address-listing-template");
                    for(i=0;i<data.data.length;i++){
                        const clone = templ.content.cloneNode(true);
                        clone.querySelector(".shipping-address-listing-first-name").innerHTML = data.data[i].first_name;
                        clone.querySelector(".shipping-address-listing-last-name").innerHTML = data.data[i].last_name;
                        country = state = '';
                        if(data.data[i].country_id != 'null' && data.data[i].country_id != null && data.data[i].country_id != ''){
                            country = data.data[i].country_id.country_name +', ';
                        }
                        if(data.data[i].state_id != 'null' && data.data[i].state_id != null && data.data[i].state_id != ''){
                            state = data.data[i].state_id.name +', ';
                        }
                        clone.querySelector(".shipping-address-listing-country-state-city").innerHTML = country + state + data.data[i].city;
                        clone.querySelector(".shipping-address-listing-is-default").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-is-default").setAttribute('onclick', 'isDefault(this)');
                        clone.querySelector(".shipping-address-listing-edit-btn").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-edit-btn").setAttribute('onclick', 'shippingEdit(this)');
                        clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('onclick', 'shippingDelete(this)');
                        if(data.data[i].default_address == '1'){
                            $("#shippingAddressForm").find("#gender").val(data.data[i].gender);
                            $("#shippingAddressForm").find("#dob").val(data.data[i].dob);
                            $("#shippingAddressForm").find("#phone").val(data.data[i].phone);
                            clone.querySelector(".shipping-address-listing-is-default").setAttribute('checked', true);
                        }
                        $("#shipping-address-listing-show").append(clone);
                    }
                    $("#shippingAddressForm").find("#method").val('post');
                }
            },
            error: function(data) {},
        });
    }

    $("#shippingAddressForm").submit(function(e) {
        e.preventDefault();

        // Clear previous errors
        $('.invalid-feedback').css('display', 'none');

        first_name = $("#shippingAddressForm").find("#first_name").val();
        last_name = $("#shippingAddressForm").find("#last_name").val();
        street_address = $("#shippingAddressForm").find("#street_address").val();
        country_id = $("#shippingAddressForm").find("#country_id").val();
        state_id = $("#shippingAddressForm").find("#state_id").val();
        city = $("#shippingAddressForm").find("#city").val();
        postcode = $("#shippingAddressForm").find("#postcode").val();
        gender = $("#shippingAddressForm").find("#gender").val();
        dob = $("#shippingAddressForm").find("#dob").val();
        phone = $("#shippingAddressForm").find("#phone").val();
        method = $("#shippingAddressForm").find("#method").val();
        latlong = $("#shippingAddressForm").find("#location").val();

        if (method == 'post') {
            url = '/api/client/customer_address_book';
        } else {
            ids = $("#shippingAddressForm").find("#addres_id").val();
            url = '/api/client/customer_address_book/' + ids;
        }

        $.ajax({
            type: method,
            url: "{{ url('') }}" + url,
            data: {
                is_default: '1',
                gender: gender,
                dob: dob,
                phone: phone,
                postcode: postcode,
                city: city,
                state_id: state_id,
                country_id: country_id,
                street_address: street_address,
                last_name: last_name,
                first_name: first_name,
                type: 'profile',
                latlong: latlong,
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>@if($data["direction"] === "rtl") جاري الحفظ... @else Saving... @endif');
            },
            success: function(data) {
                if (data.status == 'Success') {
                    toastr.success('@if($data["direction"] === "rtl") تم إضافة العنوان بنجاح @else Address added successfully @endif');
                    getCustomerAdress();
                    $("#shippingAddressForm")[0].reset();
                    $("#shippingAddressForm").find("#method").val('post');
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    jQuery.each(data.responseJSON.errors, function(index, item) {
                        $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                        $("#" + index).parent().find('.invalid-feedback').html(item);
                    });
                } else {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).html('<i class="fas fa-plus me-2"></i>@if($data["direction"] === "rtl") إضافة العنوان @else Add Address @endif');
            }
        });
    });

    function countries(){
        $.ajax({
            type: 'get',
            url: "{{ url('') }}/api/client/country?getAllData=1",
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    html = '<option value="">@if($data["direction"] === "rtl") اختر @else Select @endif</option>';
                    for(i=0;i<data.data.length;i++){
                        selected = '';
                        if($.trim($("#country_id_hidden").val()) != '' && $.trim($("#country_id_hidden").val()) == data.data[i].country_id){
                            selected = 'selected';
                            $("#country_id_hidden").val('');
                        }
                        html += '<option value="'+data.data[i].country_id+'" '+selected+'>'+data.data[i].country_name+'</option>';
                    }
                    $("#country_id").html(html);
                    if($.trim($("#state_id_hidden").val()) != ''){
                        $("#country_id").trigger('change');
                    }
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {},
        });
    }

    function states(){
        country_id = $("#country_id").val();
        if(country_id == ''){
            $("#state_id").html('');
            return;
        }

        $.ajax({
            type: 'get',
            url: "{{ url('') }}/api/client/state?country_id="+country_id+'&getAllData=1',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    html = '<option value="">@if($data["direction"] === "rtl") اختر @else Select @endif</option>';
                    for(i=0;i<data.data.length;i++){
                        selected = '';
                        if($.trim($("#state_id_hidden").val()) != '' && $.trim($("#state_id_hidden").val()) == data.data[i].id){
                            selected = 'selected';
                        }
                        html += '<option value="'+data.data[i].id+'" '+selected+'>'+data.data[i].name+'</option>';
                    }
                    $("#state_id").html(html);
                    $("#state_id_hidden").val('');
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {},
        });
    }

    function cities(){
        state_id = $("#state_id").val();
        if(state_id == ''){
            $("#city").html('');
            return;
        }

        $.ajax({
            type: 'get',
            url: "{{ url('') }}/api/client/city?state_id="+state_id+'&getAllData=1',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    html = '<option value="">@if($data["direction"] === "rtl") اختر @else Select @endif</option>';
                    for(i=0;i<data.data.length;i++){
                        selected = '';
                        if($.trim($("#city_id_hidden").val()) != '' && $.trim($("#city_id_hidden").val()) == data.data[i].id){
                            selected = 'selected';
                        }
                        html += '<option value="'+data.data[i].id+'" '+selected+'>'+data.data[i].name+'</option>';
                    }
                    $("#city").html(html);
                    $("#city_id_hidden").val('');
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {},
        });
    }

    function isDefault(input){
        id = $(input).attr('data-id');
        $.ajax({
            type: 'put',
            url: "{{ url('') }}/api/client/customer_address_book/" + id,
            data: {
                is_default: '1',
                is_default_type: 'default_action',
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
                    toastr.success('@if($data["direction"] === "rtl") تم تحديث العنوان @else Address updated @endif');
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {},
        });
    }

    function shippingEdit(input) {
        id = $(input).attr('data-id');
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_address_book/'+id,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#shippingAddressForm").find("#first_name").val(data.data.first_name);
                    $("#shippingAddressForm").find("#last_name").val(data.data.last_name);
                    $("#shippingAddressForm").find("#postcode").val(data.data.postcode);
                    $("#shippingAddressForm").find("#location").val(data.data.latlong);

                    country = state = '';
                    if(data.data.country_id != 'null' && data.data.country_id != null && data.data.country_id != ''){
                        country = data.data.country_id.country_id;
                    }
                    if(data.data.state_id != 'null' && data.data.state_id != null && data.data.state_id != ''){
                        state = data.data.state_id.id;
                    }
                    countries();
                    $("#shippingAddressForm").find("#country_id_hidden").val(country);
                    $("#shippingAddressForm").find("#state_id_hidden").val(state);
                    $("#shippingAddressForm").find("#city_id_hidden").val(city);
                    $("#shippingAddressForm").find("#city").val(data.data.city);
                    $("#shippingAddressForm").find("#street_address").val(data.data.street_address);
                    $("#shippingAddressForm").find("#gender").val(data.data.gender);
                    $("#shippingAddressForm").find("#dob").val(data.data.dob);
                    $("#shippingAddressForm").find("#phone").val(data.data.phone);
                    $("#shippingAddressForm").find("#method").val('put');
                    $("#shippingAddressForm").find("#addres_id").val(id);
                }
            },
            error: function(data) {},
        });
    }

    function shippingDelete(input) {
        if (!confirm('@if($data["direction"] === "rtl") هل أنت متأكد من حذف هذا العنوان؟ @else Are you sure you want to delete this address? @endif')) {
            return;
        }

        id = $(input).attr('data-id');
        $.ajax({
            type: 'delete',
            url: "{{ url('') }}" + '/api/client/customer_address_book/'+id,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $(input).closest('tr').remove();
                    toastr.success('@if($data["direction"] === "rtl") تم حذف العنوان بنجاح @else Address removed successfully @endif');
                } else {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {
                toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
            },
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkfQ--NrbuRkdYSFBu1AXlWohPV7RhNyI&libraries=places&callback=initialize" async defer></script>
<script>
    var markers;
    var myLatlng;
    var map;
    var geocoder;

    function setUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                myLatlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                markers.setPosition(myLatlng);
                map.setCenter(myLatlng);
            }, function() {});
        }
    }

    function saveAddress() {
        var latlng = markers.getPosition();
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    $("#location").val(latlng);
                    $('#mapModal').hide();
                    $('.modal-backdrop').hide();
                    setTimeout(function() {
                        $('#location').get(0).focus();
                    }, 500);
                } else {
                    console.log('No results found');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });
    }

    function initialize() {
        defaultPOS = {lat: 31.4, lng: 71.1};
        map = new google.maps.Map(document.getElementById('map'), {
            center: defaultPOS,
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        geocoder = new google.maps.Geocoder;
        markers = new google.maps.Marker({
            map: map,
            draggable: true,
            position: defaultPOS
        });

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) return;

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) return;
                markers.setPosition(place.geometry.location);
                markers.setTitle(place.name);
                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
</script>
@endsection
