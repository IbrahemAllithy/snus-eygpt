@extends('layouts.master')
@section('content')

<style>
/* Modern Orders Styles */
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

.orders-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
}

.sidebar-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
    margin-bottom: var(--space-6);
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

.orders-table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.orders-table-modern thead tr {
    background: var(--surface-2);
}

.orders-table-modern th {
    padding: var(--space-4);
    text-align: left;
    font-weight: 700;
    font-size: 0.875rem;
    color: var(--text-primary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.orders-table-modern tbody tr {
    background: var(--surface-0);
    border-bottom: 1px solid var(--surface-2);
    transition: all 0.2s;
}

.orders-table-modern tbody tr:hover {
    background: var(--surface-1);
}

.orders-table-modern td {
    padding: var(--space-4);
    font-size: 0.9375rem;
    color: var(--text-primary);
}

.order-id-cell {
    font-weight: 700;
    color: var(--color-primary);
}

.order-status-badge {
    display: inline-block;
    padding: var(--space-2) var(--space-3);
    border-radius: 999px;
    font-size: 0.8125rem;
    font-weight: 700;
    text-transform: uppercase;
}

.order-status-pending {
    background: var(--color-warning-light);
    color: var(--color-warning);
}

.order-status-processing {
    background: var(--color-info-light);
    color: var(--color-info);
}

.order-status-completed {
    background: var(--color-success-light);
    color: var(--color-success);
}

.order-status-cancelled {
    background: var(--color-error-light);
    color: var(--color-error);
}

.order-actions {
    display: flex;
    gap: var(--space-2);
    flex-wrap: wrap;
}

.btn-view-detail {
    padding: var(--space-2) var(--space-4);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 0.8125rem;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-block;
}

.btn-view-detail:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-cancel {
    padding: var(--space-2) var(--space-4);
    background: var(--color-error);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 0.8125rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-cancel:hover {
    background: #c92a2a;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.empty-state {
    text-align: center;
    padding: var(--space-10) var(--space-4);
}

.empty-state-icon {
    font-size: 4rem;
    color: var(--text-tertiary);
    margin-bottom: var(--space-4);
}

.empty-state-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-2);
}

.empty-state-text {
    font-size: 1rem;
    color: var(--text-secondary);
    margin-bottom: var(--space-6);
}

.btn-shop-now {
    padding: var(--space-4) var(--space-6);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 700;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s;
}

.btn-shop-now:hover {
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

[dir="rtl"] .orders-table-modern th,
[dir="rtl"] .orders-table-modern td {
    text-align: right;
}

/* Responsive */
@media (max-width: 992px) {
    .orders-table-modern {
        display: block;
        overflow-x: auto;
    }

    .sidebar-modern {
        display: none;
    }
}

@media (max-width: 768px) {
    .orders-table-modern thead {
        display: none;
    }

    .orders-table-modern tbody tr {
        display: block;
        margin-bottom: var(--space-4);
        border: 1px solid var(--surface-2);
        border-radius: var(--radius-md);
    }

    .orders-table-modern td {
        display: flex;
        justify-content: space-between;
        padding: var(--space-3);
        border-bottom: 1px solid var(--surface-2);
    }

    .orders-table-modern td:last-child {
        border-bottom: none;
    }

    .orders-table-modern td::before {
        content: attr(data-label);
        font-weight: 700;
        color: var(--text-secondary);
        text-transform: uppercase;
        font-size: 0.75rem;
    }

    .order-actions {
        width: 100%;
        justify-content: flex-end;
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
                        طلباتي
                    @else
                        {{ trans('lables.bread-order') }}
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Orders Content -->
<section class="orders-modern">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-lg-3">
                <div class="sidebar-modern">
                    <h2 class="sidebar-title">
                        @if($data['direction'] === 'rtl')
                            حسابي
                        @else
                            {{ trans('lables.orders-my-account') }}
                        @endif
                    </h2>

                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a href="{{ url('/profile') }}" class="sidebar-menu-link">
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
                            <a href="{{ url('/orders') }}" class="sidebar-menu-link active">
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
                            طلباتي
                        @else
                            {{ trans('lables.orders-my-order') }}
                        @endif
                    </h2>

                    <div id="orders-container">
                        <table class="orders-table-modern">
                            <thead>
                                <tr>
                                    <th>
                                        @if($data['direction'] === 'rtl')
                                            رقم الطلب
                                        @else
                                            {{ trans('lables.orders-order-id') }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($data['direction'] === 'rtl')
                                            المبلغ
                                        @else
                                            {{ trans('lables.order-detail-order-amount') }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($data['direction'] === 'rtl')
                                            التاريخ
                                        @else
                                            {{ trans('lables.orders-date') }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($data['direction'] === 'rtl')
                                            الحالة
                                        @else
                                            {{ trans('lables.orders-status') }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($data['direction'] === 'rtl')
                                            الإجراءات
                                        @else
                                            {{ trans('lables.orders-detail') }}
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="order-show"></tbody>
                        </table>

                        <div id="empty-state" class="empty-state" style="display: none;">
                            <div class="empty-state-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <h3 class="empty-state-title">
                                @if($data['direction'] === 'rtl')
                                    لا توجد طلبات بعد
                                @else
                                    No Orders Yet
                                @endif
                            </h3>
                            <p class="empty-state-text">
                                @if($data['direction'] === 'rtl')
                                    ابدأ التسوق الآن واحصل على منتجاتك المفضلة
                                @else
                                    Start shopping now and get your favorite products
                                @endif
                            </p>
                            <a href="{{ url('/shop') }}" class="btn-shop-now">
                                @if($data['direction'] === 'rtl')
                                    تسوق الآن
                                @else
                                    Shop Now
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<template id="order-show-template">
    <tr>
        <td data-label="@if($data['direction'] === 'rtl')رقم الطلب@else{{ trans('lables.orders-order-id') }}@endif" class="order-id-cell order-no"></td>
        <td data-label="@if($data['direction'] === 'rtl')المبلغ@else{{ trans('lables.order-detail-order-amount') }}@endif" class="order-amount"></td>
        <td data-label="@if($data['direction'] === 'rtl')التاريخ@else{{ trans('lables.orders-date') }}@endif" class="order-date"></td>
        <td data-label="@if($data['direction'] === 'rtl')الحالة@else{{ trans('lables.orders-status') }}@endif" class="order-status"></td>
        <td data-label="@if($data['direction'] === 'rtl')الإجراءات@else{{ trans('lables.orders-detail') }}@endif" class="order-detail"></td>
    </tr>
</template>

@endsection

@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{url('/')}}";
    }

    languageId = localStorage.getItem("languageId");
    if (languageId == null || languageId == 'null') {
        localStorage.setItem("languageId", '1');
        $(".language-default-name").html('English');
        localStorage.setItem("languageName", 'English');
        languageId = 1;
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    const isRTL = "{{ $data['direction'] }}" === 'rtl';

    $(document).ready(function() {
        getCustomerOrder();
    });

    function getCustomerOrder() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/client/customer/order?customer_id='+customerId+'&orderDetail=1&language_id=' + languageId + '&productDetail=1&sortBy=id&sortType=DESC&currency='+localStorage.getItem("currency"),
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success' && data.data.length > 0) {
                    const templ = document.getElementById("order-show-template");
                    $("#order-show").html('');
                    $("#empty-state").hide();

                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        order = data.data[i].order_date.split('T');
                        clone.querySelector(".order-date").innerHTML = order[0];
                        clone.querySelector(".order-no").innerHTML = data.data[i].order_id;

                        if (data.data[i].currency != null && data.data[i].currency != 'null' && data.data[i].currency != '') {
                            if (data.data[i].currency.symbol_position == 'left') {
                                price = (data.data[i].order_price * +data.data[i].currency.exchange_rate);
                                price = data.data[i].currency.code +' '+ price.toFixed(2);
                            } else {
                                price = (data.data[i].order_price * +data.data[i].currency.exchange_rate);
                                price = price.toFixed(2) +' '+ data.data[i].currency.code;
                            }
                        } else {
                            price = data.data[i].order_price;
                        }
                        clone.querySelector(".order-amount").innerHTML = price;

                        // Status badge
                        let statusClass = 'order-status-pending';
                        let statusText = data.data[i].order_status;

                        if (data.data[i].order_status === 'Completed') {
                            statusClass = 'order-status-completed';
                            statusText = isRTL ? 'مكتمل' : 'Completed';
                        } else if (data.data[i].order_status === 'Processing') {
                            statusClass = 'order-status-processing';
                            statusText = isRTL ? 'قيد المعالجة' : 'Processing';
                        } else if (data.data[i].order_status === 'Cancel') {
                            statusClass = 'order-status-cancelled';
                            statusText = isRTL ? 'ملغي' : 'Cancelled';
                        } else if (data.data[i].order_status === 'Pending') {
                            statusText = isRTL ? 'قيد الانتظار' : 'Pending';
                        }

                        clone.querySelector(".order-status").innerHTML = '<span class="order-status-badge ' + statusClass + '">' + statusText + '</span>';

                        // Actions
                        let actionsHTML = '<div class="order-actions">';
                        actionsHTML += '<a href="/orders/'+data.data[i].order_id+'" class="btn-view-detail">';
                        actionsHTML += isRTL ? 'عرض التفاصيل' : '{{ trans("lables.orders-view-detail") }}';
                        actionsHTML += '</a>';

                        if (data.data[i].order_status === 'Pending') {
                            actionsHTML += '<button onClick="cancelStatus('+data.data[i].order_id+')" class="btn-cancel">';
                            actionsHTML += isRTL ? 'إلغاء' : '{{ trans("lables.orders-cancel") }}';
                            actionsHTML += '</button>';
                        }
                        actionsHTML += '</div>';

                        clone.querySelector(".order-detail").innerHTML = actionsHTML;

                        $("#order-show").append(clone);
                    }
                } else {
                    $("#orders-container table").hide();
                    $("#empty-state").show();
                }
            },
            error: function(data) {
                $("#orders-container table").hide();
                $("#empty-state").show();
            },
        });
    }

    function cancelStatus(order) {
        const confirmMessage = isRTL ?
            'هل أنت متأكد من إلغاء هذا الطلب؟' :
            '{{ trans("lables.orders-delete") }}';

        if (confirm(confirmMessage)){
            $.ajax({
                method: 'post',
                url: "{{ url('') }}" + '/api/client/order/' + order,
                data: { _method:'PUT',order_status:'Cancel'},
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        toastr.success(isRTL ? 'تم إلغاء الطلب بنجاح' : 'Order cancelled successfully');
                        getCustomerOrder();
                    }
                },
                error: function(data) {
                    toastr.error(isRTL ? 'حدث خطأ ما' : 'Something went wrong');
                },
            });
        }
    }
</script>
@endsection
