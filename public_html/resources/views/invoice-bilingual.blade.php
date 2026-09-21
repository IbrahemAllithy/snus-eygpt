@extends('layouts.master')

@section('content')
<style>
    .header-one {
        display: none !important;
    }
    .footer-one {
        display: none !important;
    }
    .pre-loader {
        display: none !important;
    }
    #headerMobile {
        display: none !important;
    }
    #stickyHeader {
        display: none !important;
    }
    #headerOne {
        display: none !important;
    }
    .demo-panel-trigger {
        display: none !important;
    }

    @media print {
        body {
            background: white !important;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<div class="main" style="background: white;">
    {{-- Invoice Content --}}
    <section class="invoice-content py-5">
        <div class="container">
            {{-- Invoice Header --}}
            <div class="invoice-header mb-4 p-4" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h1 class="fw-bold text-white mb-2" style="font-size: clamp(1.8rem, 4vw, 2.5rem);">
                            @if($data['direction'] === 'rtl')
                                فاتورة الطلب
                            @else
                                Order Invoice
                            @endif
                        </h1>
                        <p class="text-white mb-0" style="opacity: 0.9;">
                            @if($data['direction'] === 'rtl')
                                رقم الطلب #<span class="order-no">-</span>
                            @else
                                Order #<span class="order-no">-</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Order Info Cards --}}
            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6">
                    <div class="info-card p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 1.2rem;">
                            @if($data['direction'] === 'rtl')
                                معلومات الطلب
                            @else
                                Order Information
                            @endif
                        </h3>
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td style="color: var(--text-secondary); width: 50%;">
                                        @if($data['direction'] === 'rtl')
                                            الحالة:
                                        @else
                                            Status:
                                        @endif
                                    </td>
                                    <td class="order-status fw-bold" style="color: var(--color-primary);"></td>
                                </tr>
                                <tr>
                                    <td style="color: var(--text-secondary);">
                                        @if($data['direction'] === 'rtl')
                                            التاريخ:
                                        @else
                                            Date:
                                        @endif
                                    </td>
                                    <td class="order-date" style="color: var(--text-primary);"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="info-card p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 1.2rem;">
                            @if($data['direction'] === 'rtl')
                                معلومات الدفع
                            @else
                                Payment Information
                            @endif
                        </h3>
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td style="color: var(--text-secondary); width: 50%;">
                                        @if($data['direction'] === 'rtl')
                                            رقم المعاملة:
                                        @else
                                            Transaction ID:
                                        @endif
                                    </td>
                                    <td class="order-transaction_id" style="color: var(--text-primary);"></td>
                                </tr>
                                <tr>
                                    <td style="color: var(--text-secondary);">
                                        @if($data['direction'] === 'rtl')
                                            المبلغ الإجمالي:
                                        @else
                                            Total Amount:
                                        @endif
                                    </td>
                                    <td class="order-amount fw-bold" style="color: var(--color-primary);"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Address Cards --}}
            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6">
                    <div class="address-card p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 1.2rem;">
                            <i class="fas fa-file-invoice me-2" style="color: var(--color-primary);"></i>
                            @if($data['direction'] === 'rtl')
                                عنوان الفواتير
                            @else
                                Billing Address
                            @endif
                        </h3>
                        <div class="order-billing-address mb-2" style="color: var(--text-primary); font-weight: 500;"></div>
                        <div class="order-billing-detail" style="color: var(--text-secondary);"></div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="address-card p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 1.2rem;">
                            <i class="fas fa-shipping-fast me-2" style="color: var(--color-primary);"></i>
                            @if($data['direction'] === 'rtl')
                                عنوان الشحن
                            @else
                                Shipping Address
                            @endif
                        </h3>
                        <div class="order-delivery-address mb-2" style="color: var(--text-primary); font-weight: 500;"></div>
                        <div class="order-delivery-detail" style="color: var(--text-secondary);"></div>
                    </div>
                </div>
            </div>

            {{-- Order Notes --}}
            <div class="notes-card p-4 mb-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                <h3 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 1.2rem;">
                    <i class="fas fa-sticky-note me-2" style="color: var(--color-primary);"></i>
                    @if($data['direction'] === 'rtl')
                        ملاحظات الطلب
                    @else
                        Order Notes
                    @endif
                </h3>
                <div class="customer-order-notes" style="color: var(--text-secondary); font-style: italic;"></div>
            </div>

            {{-- Order Items --}}
            <div class="items-wrapper p-4 mb-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                <h3 class="fw-bold mb-4" style="color: var(--text-primary); font-size: 1.2rem;">
                    @if($data['direction'] === 'rtl')
                        المنتجات
                    @else
                        Order Items
                    @endif
                </h3>

                <div class="table-responsive">
                    <table class="table">
                        <thead style="background: var(--surface-2);">
                            <tr>
                                <th style="color: var(--text-primary); border: none; padding: 12px;">
                                    @if($data['direction'] === 'rtl')
                                        المنتج
                                    @else
                                        Product
                                    @endif
                                </th>
                                <th style="color: var(--text-primary); border: none; padding: 12px;">
                                    @if($data['direction'] === 'rtl')
                                        السعر
                                    @else
                                        Price
                                    @endif
                                </th>
                                <th style="color: var(--text-primary); border: none; padding: 12px;">
                                    @if($data['direction'] === 'rtl')
                                        سعر الخصم
                                    @else
                                        Discount Price
                                    @endif
                                </th>
                                <th style="color: var(--text-primary); border: none; padding: 12px;">
                                    @if($data['direction'] === 'rtl')
                                        الكمية
                                    @else
                                        Qty
                                    @endif
                                </th>
                                <th style="color: var(--text-primary); border: none; padding: 12px; text-align: right;">
                                    @if($data['direction'] === 'rtl')
                                        الإجمالي الفرعي
                                    @else
                                        Subtotal
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody id="order-show-detail">
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="summary-wrapper p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                <div class="row justify-content-end">
                    <div class="col-12 col-md-6 col-lg-5">
                        <table class="table table-borderless">
                            <tbody>
                                <tr style="border-bottom: 1px solid var(--surface-3);">
                                    <td style="color: var(--text-secondary); padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            المجموع الفرعي:
                                        @else
                                            Subtotal:
                                        @endif
                                    </td>
                                    <td class="order-subtotal" style="color: var(--text-primary); text-align: right; padding: 12px;"></td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--surface-3);">
                                    <td style="color: var(--text-secondary); padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            الخصم:
                                        @else
                                            Discount:
                                        @endif
                                    </td>
                                    <td class="order-discount" style="color: #10b981; text-align: right; padding: 12px;"></td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--surface-3);">
                                    <td style="color: var(--text-secondary); padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            الضريبة:
                                        @else
                                            Tax:
                                        @endif
                                    </td>
                                    <td class="order-tax" style="color: var(--text-primary); text-align: right; padding: 12px;"></td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--surface-3);">
                                    <td style="color: var(--text-secondary); padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            الشحن:
                                        @else
                                            Shipping:
                                        @endif
                                    </td>
                                    <td class="order-shipping" style="color: var(--text-primary); text-align: right; padding: 12px;"></td>
                                </tr>
                                <tr style="border-bottom: 1px solid var(--surface-3);">
                                    <td style="color: var(--text-secondary); padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            خصم الكوبون:
                                        @else
                                            Coupon Discount:
                                        @endif
                                    </td>
                                    <td class="coupon-amount" style="color: #10b981; text-align: right; padding: 12px;"></td>
                                </tr>
                                <tr style="border-top: 2px solid var(--surface-3);">
                                    <td style="color: var(--text-primary); font-weight: 600; font-size: 1.1rem; padding: 12px;">
                                        @if($data['direction'] === 'rtl')
                                            الإجمالي:
                                        @else
                                            Total:
                                        @endif
                                    </td>
                                    <td class="order-total" style="color: var(--color-primary); font-weight: 700; font-size: 1.3rem; text-align: right; padding: 12px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<template id="order-show-detail-template">
    <tr style="border-bottom: 1px solid var(--surface-3);">
        <td style="padding: 16px;">
            <div class="d-flex align-items-center gap-3">
                <img class="order-image" style="width: 60px; height: 60px; object-fit: cover; border-radius: var(--radius-md);" src="" alt="Product">
                <span class="order-product-name fw-bold" style="color: var(--text-primary);"></span>
            </div>
        </td>
        <td class="order-price" style="color: var(--text-primary); padding: 16px;"></td>
        <td class="order-discountprice" style="color: var(--text-secondary); padding: 16px;"></td>
        <td class="order-qty" style="color: var(--text-primary); padding: 16px;"></td>
        <td class="order-sub-price fw-bold" style="color: var(--color-primary); text-align: right; padding: 16px;"></td>
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

    $(document).ready(function() {
        getCustomerOrder();
    });

    function getCustomerOrder() {
        var url = window.location.pathname;
        var getid = url.substring(url.lastIndexOf('/') + 1);
        id = getid;
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/customer/order/print/' + id + '?orderDetail=1&language_id=' + languageId + '&productDetail=1&billing_country=1&billing_state=1&delivery_country=1&delivery_state=1&currency=' + localStorage.getItem("currency"),
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
                    $(".order-status").html(data.data.order_status);

                    $(".order-delivery-address").html(data.data.delivery_street_aadress);

                    $(".customer-order-notes").html(data.data.customer_order_notes || (languageId == 2 ? 'لا توجد ملاحظات' : 'No notes'));
                    city = state = postcode = country = '';

                    if (data.data.delivery_city != null && data.data.delivery_city != 'null' && data.data.delivery_city != '') {
                        city = data.data.delivery_city;
                    }

                    if (data.data.delivery_postcode != null && data.data.delivery_postcode != 'null' && data.data.delivery_postcode != '') {
                        postcode = ', ' + data.data.delivery_postcode;
                    }

                    if (data.data.delivery_country1 != null && data.data.delivery_country1 != 'null' && data.data.delivery_country1 != '') {
                        country = ', ' + data.data.delivery_country1.country_name;
                    }
                    if (data.data.delivery_state1 != null && data.data.delivery_state1 != 'null' && data.data.delivery_state1 != '') {
                        state = ', ' + data.data.delivery_state1.name;
                    }

                    detail_address = city + state + postcode + country;

                    $(".order-delivery-detail").html(detail_address);


                    $(".order-billing-address").html(data.data.billing_street_aadress);
                    city = state = postcode = country = '';

                    if (data.data.billing_city != null && data.data.billing_city != 'null' && data.data.billing_city != '') {
                        city = data.data.billing_city;
                    }

                    if (data.data.billing_postcode != null && data.data.billing_postcode != 'null' && data.data.billing_postcode != '') {
                        postcode = ', ' + data.data.billing_postcode;
                    }

                    if (data.data.billing_country1 != null && data.data.billing_country1 != 'null' && data.data.billing_country1 != '') {
                        country = ', ' + data.data.billing_country1.country_name;
                    }
                    if (data.data.billing_state1 != null && data.data.billing_state1 != 'null' && data.data.billing_state1 != '') {
                        state = ', ' + data.data.billing_state1.name;
                    }
                    detail_address = city + state + postcode + country;

                    $(".order-billing-detail").html(detail_address);

                    $(".order-transaction_id").html((data.data.transaction_id != null && data.data.transaction_id != 'null' && data.data.transaction_id != '') ? data.data.transaction_id : "N/A");

                    subtotal = total_discount = coupon_amount = 0.00;

                    if (data.data.order_detail != null && data.data.order_detail != 'null' && data.data.order_detail != '') {
                        for (k = 0; k < data.data.order_detail.length; k++) {
                            const clone = templ.content.cloneNode(true);
                            if (data.data.order_detail[k].product != null && data.data.order_detail[k].product != 'null' && data.data.order_detail[k].product != '') {
                                if (data.data.order_detail[k].product.product_type == 'variable') {
                                    if (data.data.order_detail[k].product_combination.gallary != null && data.data.order_detail[k].product_combination.gallary != 'null' && data.data.order_detail[k].product_combination.gallary != '') {
                                        clone.querySelector(".order-image").setAttribute('src',
                                            '/gallary/' + data.data.order_detail[k].product_combination.gallary.gallary_name);
                                        clone.querySelector(".order-image").setAttribute('alt', data.data.order_detail[k].product_combination.gallary.gallary_name);
                                        name = data.data.order_detail[k].product.detail[0].title + ' - ';
                                        for (loop = 0; loop < data.data.order_detail[k].product_combination.combination
                                            .length; loop++) {
                                            if (data.data.order_detail[k].product_combination.combination.length - 1 == loop) {
                                                name += data.data.order_detail[k].product_combination.combination[loop].variation.detail[0].name;
                                            } else {
                                                name += data.data.order_detail[k].product_combination.combination[loop].variation.detail[0].name + '-';
                                            }
                                        }
                                        clone.querySelector(".order-product-name").innerHTML = name;
                                    }
                                } else {
                                    if (data.data.order_detail[k].product.detail != null && data.data.order_detail[k].product.detail != 'null' && data.data.order_detail[k].product.detail != '') {
                                        clone.querySelector(".order-image").setAttribute('src',
                                            '/gallary/' + data.data.order_detail[k].product.product_gallary.gallary_name);

                                        clone.querySelector(".order-image").setAttribute('alt', data.data.order_detail[k].product.product_gallary.gallary_name);

                                        clone.querySelector(".order-product-name").innerHTML = data.data.order_detail[k].product.detail[0].title;

                                    }
                                }
                            }

                            price = data.data.order_detail[k].product_price;
                            discountprice = (data.data.order_detail[k].product_discount > 0) ? +data.data.order_detail[k].product_discount : "-";
                            sub_total = data.data.order_detail[k].product_total * data.data.order_detail[k].product_qty;
                            subtotal = subtotal + data.data.order_detail[k].product_price * data.data.order_detail[k].product_qty;

                            if (data.data.coupon_amount != null && data.data.coupon_amount != 'null' && data.data.coupon_amount != '') {
                                coupon_amount = data.data.coupon_amount;
                            }

                            if (data.data.order_detail[k].product_discount > 0) {
                                total_discount = total_discount + ((parseFloat(data.data.order_detail[k].product_price) - parseFloat(data.data.order_detail[k].product_discount)) * parseFloat(data.data.order_detail[k].product_qty));
                            }
                            if (data.data.currency_id.symbol_position == 'left') {
                                sub_total = data.data.currency_id.code + '' + sub_total.toFixed(2);
                                price = data.data.currency_id.code + '' + price;
                                if (discountprice != "-")
                                    discountprice = data.data.currency_id.code + '' + discountprice;
                            } else {
                                sub_total = sub_total.toFixed(2) + '' + data.data.currency_id.code;
                                price = price + '' + data.data.currency_id.code;
                                if (discountprice != "-")
                                    discountprice = data.data.currency_id.code + '' + discountprice;
                            }


                            clone.querySelector(".order-price").innerHTML = price;
                            clone.querySelector(".order-discountprice").innerHTML = discountprice;
                            clone.querySelector(".order-qty").innerHTML = data.data.order_detail[k].product_qty;
                            clone.querySelector(".order-sub-price").innerHTML = sub_total;

                            $("#order-show-detail").append(clone);
                        }
                    }

                    subtotal = parseFloat(subtotal).toFixed(2);
                    total_discount = parseFloat(total_discount).toFixed(2);

                    if (data.data.currency_id.symbol_position == 'left') {
                        $(".order-amount").html(data.data.currency_id.code + '' + data.data.order_price);
                        $(".order-subtotal").html(data.data.currency_id.code + '' + subtotal);
                        $(".order-tax").html(data.data.currency_id.code + '' + data.data.total_tax);
                        $(".order-shipping").html(data.data.currency_id.code + '' + data.data.shipping_cost);
                        $(".order-discount").html('-' + data.data.currency_id.code + '' + total_discount);
                        $(".order-total").html(data.data.currency_id.code + '' + data.data.order_price);
                        $(".coupon-amount").html('-' + data.data.currency_id.code + '' + coupon_amount);
                    } else {
                        $(".order-amount").html(data.data.order_price + '' + data.data.currency_id.code);
                        $(".order-subtotal").html(subtotal + '' + data.data.currency_id.code);
                        $(".order-tax").html(data.data.total_tax + '' + data.data.currency_id.code);
                        $(".order-shipping").html(data.data.shipping_cost + '' + data.data.currency_id.code);
                        $(".order-discount").html('-' + total_discount + '' + data.data.currency_id.code);
                        $(".order-total").html(data.data.order_price + '' + data.data.currency_id.code);
                        $(".coupon-amount").html('-' + coupon_amount + '' + data.data.currency_id.code);
                    }

                    const myTimeout = setTimeout(printInvoice, 5000);

                }
            },
            error: function(data) {},
        });
    }

    function printInvoice() {
        window.print();
    }
</script>
@endsection
