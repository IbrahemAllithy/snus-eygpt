@extends('layouts.master')
@section('content')
<style>
/* Order Detail Page Modern Styles */
.order-detail-modern {
    padding: var(--space-12) 0;
    background: var(--surface-0);
    min-height: 70vh;
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

.order-detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-4);
}

.order-detail-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: var(--space-8);
}

.sidebar-modern {
    position: sticky;
    top: var(--space-4);
    height: fit-content;
}

.order-detail-main {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.order-header-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    border: 2px solid var(--surface-2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--space-4);
}

.order-number {
    font-size: clamp(1.25rem, 2vw, 1.5rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.order-number span {
    color: var(--color-primary);
}

.btn-print {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-6);
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    background: var(--surface-0);
    border: 2px solid var(--surface-2);
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
}

.btn-print:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-6);
}

.info-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    border: 2px solid var(--surface-2);
}

.info-card-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
    padding-bottom: var(--space-3);
    border-bottom: 2px solid var(--surface-2);
}

.info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-3) 0;
    gap: var(--space-4);
}

.info-row:not(:last-child) {
    border-bottom: 1px solid var(--surface-2);
}

.info-label {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-secondary);
}

.info-value {
    font-size: 0.9375rem;
    color: var(--text-primary);
    text-align: right;
}

.info-address {
    font-size: 0.9375rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0;
}

.order-status-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    font-size: 0.875rem;
    font-weight: 700;
    border-radius: 999px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-pending {
    background: var(--color-warning-light);
    color: var(--color-warning);
}

.status-processing {
    background: var(--color-info-light);
    color: var(--color-info);
}

.status-completed {
    background: var(--color-success-light);
    color: var(--color-success);
}

.status-cancelled {
    background: var(--color-error-light);
    color: var(--color-error);
}

.items-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    border: 2px solid var(--surface-2);
}

.items-table {
    width: 100%;
    border-collapse: collapse;
}

.items-table thead th {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: var(--space-3);
    border-bottom: 2px solid var(--surface-2);
    text-align: left;
}

.items-table tbody td {
    padding: var(--space-4) var(--space-3);
    border-bottom: 1px solid var(--surface-2);
    font-size: 0.9375rem;
    color: var(--text-primary);
}

.items-table tbody tr:last-child td {
    border-bottom: none;
}

.item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: var(--radius-md);
    border: 1px solid var(--surface-2);
}

.item-name {
    font-weight: 600;
    color: var(--text-primary);
}

.price-old {
    text-decoration: line-through;
    color: var(--text-tertiary);
    font-size: 0.875rem;
}

.summary-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: var(--space-4);
}

.summary-table td {
    padding: var(--space-3);
    font-size: 0.9375rem;
}

.summary-table td:first-child {
    text-align: right;
    font-weight: 600;
    color: var(--text-secondary);
}

.summary-table td:last-child {
    text-align: right;
    color: var(--text-primary);
    width: 150px;
}

.summary-table tr:last-child td {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-primary);
    padding-top: var(--space-4);
    border-top: 2px solid var(--surface-2);
}

.comments-card {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    border: 2px solid var(--surface-2);
}

.comments-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 var(--space-4) 0;
}

.comments-list {
    margin-bottom: var(--space-4);
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.comment-item {
    padding: var(--space-4);
    background: var(--surface-0);
    border-radius: var(--radius-md);
    border: 1px solid var(--surface-2);
}

.comment-text {
    font-size: 0.9375rem;
    line-height: 1.6;
    color: var(--text-secondary);
    margin: 0;
}

.comment-textarea {
    width: 100%;
    padding: var(--space-4);
    font-size: 0.9375rem;
    line-height: 1.6;
    color: var(--text-primary);
    background: var(--surface-0);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    resize: vertical;
    min-height: 100px;
    transition: all 0.2s;
}

.comment-textarea:focus {
    outline: none;
    border-color: var(--color-primary);
}

.btn-save-comment {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-6);
    font-size: 0.9375rem;
    font-weight: 700;
    color: var(--surface-0);
    background: var(--color-primary);
    border: 2px solid var(--color-primary);
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s;
    margin-top: var(--space-3);
}

.btn-save-comment:hover {
    background: var(--color-primary-dark);
    border-color: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern {
    direction: rtl;
}

[dir="rtl"] .items-table thead th,
[dir="rtl"] .items-table tbody td {
    text-align: right;
}

[dir="rtl"] .info-value {
    text-align: left;
}

[dir="rtl"] .summary-table td:first-child,
[dir="rtl"] .summary-table td:last-child {
    text-align: left;
}

/* Responsive */
@media (max-width: 992px) {
    .order-detail-layout {
        grid-template-columns: 1fr;
        gap: var(--space-6);
    }

    .sidebar-modern {
        position: relative;
        top: 0;
    }

    .items-table {
        display: block;
        overflow-x: auto;
    }

    .items-table thead {
        display: none;
    }

    .items-table tbody,
    .items-table tr,
    .items-table td {
        display: block;
        width: 100%;
    }

    .items-table tbody tr {
        margin-bottom: var(--space-4);
        padding: var(--space-4);
        background: var(--surface-0);
        border-radius: var(--radius-md);
        border: 1px solid var(--surface-2);
    }

    .items-table tbody td {
        padding: var(--space-2) 0;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .items-table tbody td::before {
        content: attr(data-label);
        font-weight: 700;
        color: var(--text-secondary);
    }
}

@media (max-width: 768px) {
    .page-header-modern {
        padding: var(--space-6) 0;
        margin-bottom: var(--space-8);
    }

    .order-detail-modern {
        padding: var(--space-8) 0;
    }

    .info-grid {
        grid-template-columns: 1fr;
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
                    تفاصيل الطلب
                @else
                    Order Details
                @endif
            </span>
        </nav>
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                تفاصيل الطلب
            @else
                Order Details
            @endif
        </h1>
    </div>
</div>

<!-- Order Detail Content -->
<section class="order-detail-modern">
    <div class="order-detail-container">
        <div class="order-detail-layout">
            <!-- Sidebar -->
            <div class="sidebar-modern">
                @include('includes.side-menu')
            </div>

            <!-- Main Content -->
            <div class="order-detail-main">
                <!-- Order Header -->
                <div class="order-header-card">
                    <h2 class="order-number">
                        @if($data['direction'] === 'rtl')
                            طلب رقم #<span class="order-no"></span>
                        @else
                            Order #<span class="order-no"></span>
                        @endif
                    </h2>
                    <a href="#" class="btn-print" id="print_invoice">
                        <i class="fas fa-print"></i>
                        <span>
                            @if($data['direction'] === 'rtl')
                                طباعة الفاتورة
                            @else
                                Print Invoice
                            @endif
                        </span>
                    </a>
                </div>

                <!-- Order Information Grid -->
                <div class="info-grid">
                    <!-- Order Status Card -->
                    <div class="info-card">
                        <h3 class="info-card-title">
                            @if($data['direction'] === 'rtl')
                                معلومات الطلب
                            @else
                                Order Information
                            @endif
                        </h3>
                        <div class="info-row">
                            <span class="info-label">
                                @if($data['direction'] === 'rtl')
                                    الحالة
                                @else
                                    Status
                                @endif
                            </span>
                            <span class="info-value order-status"></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">
                                @if($data['direction'] === 'rtl')
                                    التاريخ
                                @else
                                    Date
                                @endif
                            </span>
                            <span class="info-value order-date"></span>
                        </div>
                    </div>

                    <!-- Payment Information Card -->
                    <div class="info-card">
                        <h3 class="info-card-title">
                            @if($data['direction'] === 'rtl')
                                معلومات الدفع
                            @else
                                Payment Information
                            @endif
                        </h3>
                        <div class="info-row">
                            <span class="info-label">
                                @if($data['direction'] === 'rtl')
                                    رقم المعاملة
                                @else
                                    Transaction ID
                                @endif
                            </span>
                            <span class="info-value order-transaction_id"></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">
                                @if($data['direction'] === 'rtl')
                                    المبلغ
                                @else
                                    Amount
                                @endif
                            </span>
                            <span class="info-value order-amount"></span>
                        </div>
                    </div>
                </div>

                <!-- Billing and Shipping Grid -->
                <div class="info-grid">
                    <!-- Billing Address Card -->
                    <div class="info-card">
                        <h3 class="info-card-title">
                            @if($data['direction'] === 'rtl')
                                عنوان الفاتورة
                            @else
                                Billing Address
                            @endif
                        </h3>
                        <p class="info-address order-billing-address"></p>
                        <p class="info-address order-billing-detail"></p>
                    </div>

                    <!-- Shipping Address Card -->
                    <div class="info-card">
                        <h3 class="info-card-title">
                            @if($data['direction'] === 'rtl')
                                عنوان التوصيل
                            @else
                                Shipping Address
                            @endif
                        </h3>
                        <p class="info-address order-delivery-address"></p>
                        <p class="info-address order-delivery-detail"></p>
                    </div>
                </div>

                <!-- Order Notes Card -->
                <div class="info-card">
                    <h3 class="info-card-title">
                        @if($data['direction'] === 'rtl')
                            ملاحظات الطلب
                        @else
                            Order Notes
                        @endif
                    </h3>
                    <p class="info-address customer-order-notes"></p>
                </div>

                <!-- Order Items Card -->
                <div class="items-card">
                    <h3 class="info-card-title">
                        @if($data['direction'] === 'rtl')
                            المنتجات
                        @else
                            Products
                        @endif
                    </h3>
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">
                                    @if($data['direction'] === 'rtl')
                                        الصورة
                                    @else
                                        Image
                                    @endif
                                </th>
                                <th>
                                    @if($data['direction'] === 'rtl')
                                        المنتج
                                    @else
                                        Product
                                    @endif
                                </th>
                                <th style="width: 100px;">
                                    @if($data['direction'] === 'rtl')
                                        السعر
                                    @else
                                        Price
                                    @endif
                                </th>
                                <th style="width: 100px;">
                                    @if($data['direction'] === 'rtl')
                                        سعر الخصم
                                    @else
                                        Discount Price
                                    @endif
                                </th>
                                <th style="width: 80px;">
                                    @if($data['direction'] === 'rtl')
                                        الكمية
                                    @else
                                        Qty
                                    @endif
                                </th>
                                <th style="width: 120px;">
                                    @if($data['direction'] === 'rtl')
                                        المجموع
                                    @else
                                        Subtotal
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody id="order-show-detail">
                        </tbody>
                    </table>

                    <!-- Order Summary -->
                    <table class="summary-table">
                        <tbody>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        المجموع الفرعي
                                    @else
                                        Subtotal
                                    @endif
                                </td>
                                <td class="order-subtotal"></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        الخصم
                                    @else
                                        Discount
                                    @endif
                                </td>
                                <td class="order-discount"></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        الضريبة
                                    @else
                                        Tax
                                    @endif
                                </td>
                                <td class="order-tax"></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        الشحن
                                    @else
                                        Shipping
                                    @endif
                                </td>
                                <td class="order-shipping"></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        خصم الكوبون
                                    @else
                                        Coupon Discount
                                    @endif
                                </td>
                                <td class="coupon-amount"></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($data['direction'] === 'rtl')
                                        المجموع الكلي
                                    @else
                                        Total
                                    @endif
                                </td>
                                <td class="order-total"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Comments Card -->
                <div class="comments-card">
                    <h3 class="comments-title">
                        @if($data['direction'] === 'rtl')
                            التعليقات
                        @else
                            Comments
                        @endif
                    </h3>
                    <div class="comments-list" id="show_comment"></div>
                    <textarea class="comment-textarea" id="comment" rows="3"
                        placeholder="@if($data['direction'] === 'rtl') أضف تعليق @else Add a comment @endif"></textarea>
                    <button type="button" class="btn-save-comment" id="saveComments" onclick="saveComments()">
                        <i class="fas fa-save"></i>
                        <span>
                            @if($data['direction'] === 'rtl')
                                حفظ التعليق
                            @else
                                Save Comment
                            @endif
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<template id="order-show-detail-template">
    <tr>
        <td data-label="@if($data['direction'] === 'rtl') الصورة @else Image @endif">
            <img class="item-image order-image" src="" alt="">
        </td>
        <td data-label="@if($data['direction'] === 'rtl') المنتج @else Product @endif" class="item-name order-product-name"></td>
        <td data-label="@if($data['direction'] === 'rtl') السعر @else Price @endif" class="order-price"></td>
        <td data-label="@if($data['direction'] === 'rtl') سعر الخصم @else Discount Price @endif" class="order-discountprice"></td>
        <td data-label="@if($data['direction'] === 'rtl') الكمية @else Qty @endif" class="order-qty"></td>
        <td data-label="@if($data['direction'] === 'rtl') المجموع @else Subtotal @endif" class="order-sub-price"></td>
    </tr>
</template>

@endsection
@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{ url('/') }}";
    }

    languageId = localStorage.getItem("languageId");
    if (languageId == null || languageId == 'null') {
        localStorage.setItem("languageId", '1');
        localStorage.setItem("languageName", 'English');
        languageId = 1;
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    $(document).ready(function() {
        getCustomerOrder();
        var url = "{{ url('') }}" + '/print-invoice/' + id;
        $('#print_invoice').click(function (e) {
            e.preventDefault();
            window.open(url);
        });
    });

    function getCustomerOrder() {
        id = '{{$id}}';
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/client/customer/order/' + id + '?orderDetail=1&language_id=' + languageId + '&productDetail=1&billing_country=1&billing_state=1&delivery_country=1&delivery_state=1&currency='+localStorage.getItem("currency"),
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    const templ = document.getElementById("order-show-detail-template");
                    $("#order-show-detail").html('');
                    order = data.data.order_date.split('T');
                    $(".order-date").html(order[0]);
                    $(".order-no").html(data.data.order_id);

                    // Set order status with badge
                    var statusClass = 'status-pending';
                    var statusText = data.data.order_status;
                    if(statusText.toLowerCase().includes('processing')) {
                        statusClass = 'status-processing';
                    } else if(statusText.toLowerCase().includes('completed')) {
                        statusClass = 'status-completed';
                    } else if(statusText.toLowerCase().includes('cancelled')) {
                        statusClass = 'status-cancelled';
                    }
                    $(".order-status").html('<span class="order-status-badge ' + statusClass + '">' + statusText + '</span>');

                    $(".order-delivery-address").html(data.data.delivery_street_aadress);

                    $(".customer-order-notes").html(data.data.customer_order_notes || '@if($data["direction"] === "rtl") لا توجد ملاحظات @else No notes @endif');

                    city = state = postcode = country = '';

                    if(data.data.delivery_city != null && data.data.delivery_city != 'null' && data.data.delivery_city != ''){
                        city = data.data.delivery_city;
                    }

                    if(data.data.delivery_postcode != null && data.data.delivery_postcode != 'null' && data.data.delivery_postcode != ''){
                        postcode = ', '+data.data.delivery_postcode;
                    }

                    if(data.data.delivery_country1 != null && data.data.delivery_country1 != 'null' && data.data.delivery_country1 != ''){
                        country = ', '+data.data.delivery_country1.country_name;
                    }
                    if(data.data.delivery_state1 != null && data.data.delivery_state1 != 'null' && data.data.delivery_state1 != ''){
                        state = ', '+data.data.delivery_state1.name;
                    }

                    detail_address = city + state + postcode + country;

                    $(".order-delivery-detail").html(detail_address);

                    $(".order-billing-address").html(data.data.billing_street_aadress);

                    billing_city = billing_state = billing_postcode = billing_country = '';

                    if(data.data.billing_city != null && data.data.billing_city != 'null' && data.data.billing_city != ''){
                        billing_city = data.data.billing_city;
                    }

                    if(data.data.billing_postcode != null && data.data.billing_postcode != 'null' && data.data.billing_postcode != ''){
                        billing_postcode = ', '+data.data.billing_postcode;
                    }

                    if(data.data.billing_country1 != null && data.data.billing_country1 != 'null' && data.data.billing_country1 != ''){
                        billing_country = ', '+data.data.billing_country1.country_name;
                    }
                    if(data.data.billing_state1 != null && data.data.billing_state1 != 'null' && data.data.billing_state1 != ''){
                        billing_state = ', '+data.data.billing_state1.name;
                    }

                    billing_detail_address = billing_city + billing_state + billing_postcode + billing_country;

                    $(".order-billing-detail").html(billing_detail_address);

                    $(".order-transaction_id").html(data.data.transaction_id || '-');
                    $(".order-amount").html(data.data.currency_symbol + data.data.order_amount);

                    $(".order-subtotal").html(data.data.currency_symbol + data.data.sub_total);
                    $(".order-discount").html(data.data.currency_symbol + data.data.discount);
                    $(".order-tax").html(data.data.currency_symbol + data.data.tax);
                    $(".order-shipping").html(data.data.currency_symbol + data.data.shipping_cost);
                    $(".coupon-amount").html(data.data.currency_symbol + (data.data.coupon_discount || '0'));
                    $(".order-total").html(data.data.currency_symbol + data.data.order_amount);

                    $.each(data.data.order_detail, function(index, value) {
                        const clone = templ.content.cloneNode(true);
                        let td = clone.querySelectorAll("td");

                        td[0].querySelector('.order-image').src = value.product_detail.product_galleries[0].gallery_name;
                        td[1].querySelector('.order-product-name').textContent = value.product_detail.detail[0].title;
                        td[2].querySelector('.order-price').textContent = data.data.currency_symbol + value.price;
                        td[3].querySelector('.order-discountprice').textContent = data.data.currency_symbol + value.discount_price;
                        td[4].querySelector('.order-qty').textContent = value.qty;
                        td[5].querySelector('.order-sub-price').textContent = data.data.currency_symbol + (value.discount_price * value.qty);

                        document.querySelector("#order-show-detail").appendChild(clone);
                    });

                    getComments();

                } else if (data.status == 'Error') {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
            error: function(data) {
                toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
            },
        });
    }

    function getComments() {
        id = '{{$id}}';
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/order_comment?order_id=' + id,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#show_comment").html('');
                    $.each(data.data, function(index, value) {
                        $("#show_comment").append('<div class="comment-item"><p class="comment-text">' + value.comment + '</p></div>');
                    });
                }
            },
            error: function(data) {},
        });
    }

    function saveComments() {
        id = '{{$id}}';
        comment = $('#comment').val();

        if(!comment) {
            toastr.error("@if($data['direction'] === 'rtl') الرجاء إدخال تعليق @else Please enter a comment @endif");
            return;
        }

        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/order_comment',
            data: {
                order_id: id,
                comment: comment
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#saveComments').prop('disabled', true);
            },
            success: function(data) {
                $('#saveComments').prop('disabled', false);
                if (data.status == 'Success') {
                    $('#comment').val('');
                    toastr.success(data.message);
                    getComments();
                } else if (data.status == 'Error') {
                    toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
                }
            },
            error: function(data) {
                $('#saveComments').prop('disabled', false);
                toastr.error("@if($data['direction'] === 'rtl') حدث خطأ ما @else Something went wrong @endif");
            },
        });
    }
</script>
@endsection

