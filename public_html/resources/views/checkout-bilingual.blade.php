@extends('layouts.master')
@section('content')

<style>
/* Modern Checkout Styles */
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

.checkout-modern {
    padding: var(--space-10) 0;
    background: var(--surface-0);
    min-height: 60vh;
}

.page-title-modern {
    font-size: clamp(1.75rem, 5vw, 2.5rem);
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-8);
    letter-spacing: -0.02em;
}

.checkout-steps-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-8);
    position: relative;
}

.checkout-steps-modern::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--surface-2);
    z-index: 0;
}

.checkout-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-2);
    cursor: pointer;
    position: relative;
    z-index: 1;
    flex: 1;
}

.step-circle {
    width: 40px;
    height: 40px;
    border-radius: 999px;
    background: var(--surface-1);
    border: 2px solid var(--surface-3);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--text-secondary);
    transition: all 0.3s;
}

.checkout-step.active .step-circle {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
}

.checkout-step.completed .step-circle {
    background: var(--color-success);
    border-color: var(--color-success);
    color: white;
}

.step-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-align: center;
}

.checkout-step.active .step-label {
    color: var(--color-primary);
}

.checkout-form-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
    margin-bottom: var(--space-6);
}

.form-section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
    padding-bottom: var(--space-3);
    border-bottom: 2px solid var(--surface-2);
}

.form-group-modern {
    margin-bottom: var(--space-5);
}

.form-label-modern {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-2);
    display: block;
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

.invalid-feedback {
    color: var(--color-error);
    font-size: 0.8125rem;
    margin-top: var(--space-1);
}

.form-select-modern {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    background: var(--surface-0);
    color: var(--text-primary);
    font-size: 0.9375rem;
    cursor: pointer;
    transition: all 0.2s;
}

.form-select-modern:focus {
    outline: none;
    border-color: var(--color-primary);
}

.order-summary-modern {
    background: var(--surface-1);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
    position: sticky;
    top: 100px;
}

.summary-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: var(--space-6);
    letter-spacing: -0.01em;
}

.summary-item {
    display: flex;
    align-items: flex-start;
    gap: var(--space-3);
    padding: var(--space-3) 0;
    border-bottom: 1px solid var(--surface-2);
}

.summary-item-image {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-md);
    object-fit: cover;
}

.summary-item-details {
    flex: 1;
}

.summary-item-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-1);
}

.summary-item-price {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-4) 0;
    border-bottom: 1px solid var(--surface-2);
}

.summary-row:last-child {
    border-bottom: none;
}

.summary-label {
    font-size: 1rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.summary-value {
    font-size: 1rem;
    color: var(--text-primary);
    font-weight: 700;
}

.summary-total {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-primary);
}

.btn-modern-primary {
    width: 100%;
    padding: var(--space-4);
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    font-size: 1.125rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-modern-primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-modern-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

.btn-modern-outline {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--surface-3);
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-modern-outline:hover {
    background: var(--surface-2);
    border-color: var(--text-primary);
}

.payment-method-card {
    padding: var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all 0.2s;
    margin-bottom: var(--space-3);
}

.payment-method-card:hover {
    border-color: var(--color-primary);
    background: var(--surface-0);
}

.payment-method-card.selected {
    border-color: var(--color-primary);
    background: var(--surface-0);
}

.payment-method-card input[type="radio"] {
    margin-right: var(--space-2);
}

.shipping-method-card {
    padding: var(--space-4);
    border: 2px solid var(--surface-2);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all 0.2s;
    margin-bottom: var(--space-3);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.shipping-method-card:hover {
    border-color: var(--color-primary);
    background: var(--surface-0);
}

.shipping-method-card.selected {
    border-color: var(--color-primary);
    background: var(--surface-0);
}

.shipping-method-info {
    flex: 1;
}

.shipping-method-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-1);
}

.shipping-method-desc {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.shipping-method-price {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-primary);
}

.form-buttons {
    display: flex;
    gap: var(--space-3);
    margin-top: var(--space-6);
}

.tab-content-modern {
    display: none;
}

.tab-content-modern.active {
    display: block;
}

/* RTL Support */
[dir="rtl"] .breadcrumb-modern .breadcrumb-item + .breadcrumb-item::before {
    content: "\\";
    transform: scaleX(-1);
}

[dir="rtl"] .form-buttons {
    flex-direction: row-reverse;
}

[dir="rtl"] .summary-row {
    direction: rtl;
}

/* Responsive */
@media (max-width: 992px) {
    .checkout-steps-modern {
        flex-wrap: wrap;
    }

    .checkout-step {
        min-width: 25%;
    }

    .step-label {
        font-size: 0.75rem;
    }

    .order-summary-modern {
        position: static;
        margin-top: var(--space-6);
    }

    .form-buttons {
        flex-direction: column;
    }
}

@media (max-width: 576px) {
    .checkout-steps-modern::before {
        display: none;
    }

    .checkout-step {
        min-width: 50%;
        margin-bottom: var(--space-4);
    }

    .step-circle {
        width: 35px;
        height: 35px;
        font-size: 0.875rem;
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
                            Home
                        @endif
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if($data['direction'] === 'rtl')
                        إتمام الطلب
                    @else
                        Checkout
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Checkout Content -->
<section class="checkout-modern">
    <div class="container">
        <h1 class="page-title-modern">
            @if($data['direction'] === 'rtl')
                إتمام الطلب
            @else
                {{ trans('lables.checkout-checkout') }}
            @endif
        </h1>

        <!-- Checkout Steps -->
        <div class="checkout-steps-modern">
            <div class="checkout-step active" data-step="1">
                <div class="step-circle">1</div>
                <div class="step-label">
                    @if($data['direction'] === 'rtl')
                        عنوان التوصيل
                    @else
                        {{ trans('lables.checkout-shipping-address') }}
                    @endif
                </div>
            </div>
            <div class="checkout-step" data-step="2">
                <div class="step-circle">2</div>
                <div class="step-label">
                    @if($data['direction'] === 'rtl')
                        عنوان الفواتير
                    @else
                        {{ trans('lables.checkout-billing-address') }}
                    @endif
                </div>
            </div>
            <div class="checkout-step" data-step="3">
                <div class="step-circle">3</div>
                <div class="step-label">
                    @if($data['direction'] === 'rtl')
                        طريقة التوصيل
                    @else
                        Shipping Method
                    @endif
                </div>
            </div>
            <div class="checkout-step" data-step="4">
                <div class="step-circle">4</div>
                <div class="step-label">
                    @if($data['direction'] === 'rtl')
                        الدفع
                    @else
                        Payment
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Step 1: Shipping Address -->
                <div class="tab-content-modern active" id="step-1">
                    <div class="checkout-form-modern">
                        <h3 class="form-section-title">
                            @if($data['direction'] === 'rtl')
                                عنوان التوصيل
                            @else
                                {{ trans('lables.checkout-shipping-address') }}
                            @endif
                        </h3>

                        <form id="shipping-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الاسم الأول
                                            @else
                                                {{ trans('lables.checkout-first-name') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="delivery_first_name"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل الاسم الأول@else{{ trans('lables.checkout-first-name') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                اسم العائلة
                                            @else
                                                {{ trans('lables.checkout-last-name') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="delivery_last_name"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل اسم العائلة@else{{ trans('lables.checkout-last-name') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                العنوان
                                            @else
                                                {{ trans('lables.checkout-address') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="delivery_street_aadress"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل العنوان@else{{ trans('lables.checkout-address') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الدولة
                                            @else
                                                {{ trans('lables.checkout-country-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="delivery_country" onchange="states1()">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                المحافظة
                                            @else
                                                {{ trans('lables.checkout-state-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="delivery_state" onchange="city1()">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                المدينة
                                            @else
                                                {{ trans('lables.checkout-city-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="delivery_city">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الرمز البريدي
                                            @else
                                                {{ trans('lables.checkout-postal-code') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="delivery_postcode"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل الرمز البريدي@else{{ trans('lables.checkout-postal-code') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                رقم الهاتف
                                            @else
                                                {{ trans('lables.checkout-phone') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="delivery_phone"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل رقم الهاتف@else{{ trans('lables.checkout-phone') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            @if (isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الموقع
                                            @else
                                                @lang('lables.checkout-location')
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="latlong"
                                            data-toggle="modal"
                                            data-target="#mapModal"
                                            placeholder="@if($data['direction'] === 'rtl')حدد الموقع على الخريطة@else@lang('lables.checkout-location-placeholder')@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="form-buttons">
                                <button type="button" class="btn-modern-primary" onclick="goToStep(2)">
                                    @if($data['direction'] === 'rtl')
                                        التالي
                                    @else
                                        {{ trans('lables.checkout-continue') }}
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 2: Billing Address -->
                <div class="tab-content-modern" id="step-2">
                    <div class="checkout-form-modern">
                        <h3 class="form-section-title">
                            @if($data['direction'] === 'rtl')
                                عنوان الفواتير
                            @else
                                {{ trans('lables.checkout-billing-address') }}
                            @endif
                        </h3>

                        <form id="billing-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الاسم الأول
                                            @else
                                                {{ trans('lables.checkout-billing-first-name') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="billing_first_name"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل الاسم الأول@else{{ trans('lables.checkout-billing-first-name') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                اسم العائلة
                                            @else
                                                {{ trans('lables.checkout-billing-last-name') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="billing_last_name"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل اسم العائلة@else{{ trans('lables.checkout-billing-last-name') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                العنوان
                                            @else
                                                {{ trans('lables.checkout-billing-address') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="billing_street_aadress"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل العنوان@else{{ trans('lables.checkout-billing-address') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الدولة
                                            @else
                                                {{ trans('lables.checkout-billing-country-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="billing_country" onchange="states()">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                المحافظة
                                            @else
                                                {{ trans('lables.checkout-state-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="billing_state" onchange="city()">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                المدينة
                                            @else
                                                {{ trans('lables.checkout-billing-city-name') }}
                                            @endif
                                        </label>
                                        <select class="form-select-modern" id="billing_city">
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                الرمز البريدي
                                            @else
                                                {{ trans('lables.checkout-billing-postal-code') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="billing_postcode"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل الرمز البريدي@else{{ trans('lables.checkout-billing-postal-code') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            @if($data['direction'] === 'rtl')
                                                رقم الهاتف
                                            @else
                                                {{ trans('lables.checkout-billing-phone') }}
                                            @endif
                                        </label>
                                        <input
                                            type="text"
                                            class="form-input-modern"
                                            id="billing_phone"
                                            placeholder="@if($data['direction'] === 'rtl')أدخل رقم الهاتف@else{{ trans('lables.checkout-billing-phone') }}@endif"
                                        >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-buttons">
                                <button type="button" class="btn-modern-outline" onclick="goToStep(1)">
                                    @if($data['direction'] === 'rtl')
                                        السابق
                                    @else
                                        Back
                                    @endif
                                </button>
                                <button type="button" class="btn-modern-primary" onclick="goToStep(3)">
                                    @if($data['direction'] === 'rtl')
                                        التالي
                                    @else
                                        {{ trans('lables.checkout-continue') }}
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 3: Shipping Method -->
                <div class="tab-content-modern" id="step-3">
                    <div class="checkout-form-modern">
                        <h3 class="form-section-title">
                            @if($data['direction'] === 'rtl')
                                طريقة التوصيل
                            @else
                                Shipping Method
                            @endif
                        </h3>

                        <div id="shipping-methods-container">
                            <!-- Shipping methods will be loaded here -->
                        </div>

                        <div class="form-buttons">
                            <button type="button" class="btn-modern-outline" onclick="goToStep(2)">
                                @if($data['direction'] === 'rtl')
                                    السابق
                                @else
                                    Back
                                @endif
                            </button>
                            <button type="button" class="btn-modern-primary" onclick="goToStep(4)">
                                @if($data['direction'] === 'rtl')
                                    التالي
                                @else
                                    {{ trans('lables.checkout-continue') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Payment -->
                <div class="tab-content-modern" id="step-4">
                    <div class="checkout-form-modern">
                        <h3 class="form-section-title">
                            @if($data['direction'] === 'rtl')
                                طريقة الدفع
                            @else
                                Payment Method
                            @endif
                        </h3>

                        <div id="payment-methods-container">
                            <!-- Payment methods will be loaded here -->
                        </div>

                        <div class="form-buttons">
                            <button type="button" class="btn-modern-outline" onclick="goToStep(3)">
                                @if($data['direction'] === 'rtl')
                                    السابق
                                @else
                                    Back
                                @endif
                            </button>
                            <button type="button" class="btn-modern-primary" id="place-order-btn" onclick="placeOrder()">
                                @if($data['direction'] === 'rtl')
                                    إتمام الطلب
                                @else
                                    Place Order
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <!-- Order Summary -->
                <div class="order-summary-modern">
                    <h3 class="summary-title">
                        @if($data['direction'] === 'rtl')
                            ملخص الطلب
                        @else
                            Order Summary
                        @endif
                    </h3>

                    <div id="order-items-container">
                        <!-- Order items will be loaded here -->
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            @if($data['direction'] === 'rtl')
                                المجموع الفرعي
                            @else
                                Subtotal
                            @endif
                        </span>
                        <span class="summary-value" id="subtotal-amount">$0.00</span>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            @if($data['direction'] === 'rtl')
                                التوصيل
                            @else
                                Shipping
                            @endif
                        </span>
                        <span class="summary-value" id="shipping-amount">$0.00</span>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            @if($data['direction'] === 'rtl')
                                الضريبة
                            @else
                                Tax
                            @endif
                        </span>
                        <span class="summary-value" id="tax-amount">$0.00</span>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            @if($data['direction'] === 'rtl')
                                الإجمالي
                            @else
                                Total
                            @endif
                        </span>
                        <span class="summary-total caritem_grandtotal" id="total-amount">$0.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shipping Method Template -->
<template id="shipping-method-template">
    <div class="shipping-method-card" onclick="selectShippingMethod(this)">
        <input type="radio" name="shipping_method" class="shipping-method-radio">
        <div class="shipping-method-info">
            <div class="shipping-method-name"></div>
            <div class="shipping-method-desc"></div>
        </div>
        <div class="shipping-method-price"></div>
    </div>
</template>

<!-- Payment Method Template -->
<template id="payment-method-template">
    <div class="payment-method-card" onclick="selectPaymentMethod(this)">
        <input type="radio" name="payment_method" class="payment-method-radio">
        <span class="payment-method-name"></span>
    </div>
</template>

<!-- Order Item Template -->
<template id="order-item-template">
    <div class="summary-item">
        <img class="summary-item-image" src="" alt="Product">
        <div class="summary-item-details">
            <div class="summary-item-name"></div>
            <div class="summary-item-price"></div>
        </div>
    </div>
</template>

@if (isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1')
<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if($data['direction'] === 'rtl')
                        حدد موقعك
                    @else
                        Select Your Location
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @if($data['direction'] === 'rtl')
                        إلغاء
                    @else
                        Cancel
                    @endif
                </button>
                <button type="button" class="btn btn-primary" onclick="confirmLocation()">
                    @if($data['direction'] === 'rtl')
                        تأكيد
                    @else
                        Confirm
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')
<script>
    languageId = $.trim(localStorage.getItem("languageId"));
    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));

    var currentStep = 1;
    var selectedShippingMethod = null;
    var selectedPaymentMethod = null;

    $(document).ready(function() {
        loadOrderSummary();
        loadCountries();
        loadShippingMethods();
        loadPaymentMethods();
    });

    function goToStep(step) {
        // Validate current step before moving
        if (step > currentStep) {
            if (!validateStep(currentStep)) {
                return;
            }
        }

        // Hide all tabs
        $('.tab-content-modern').removeClass('active');
        $('.checkout-step').removeClass('active completed');

        // Show target tab
        $('#step-' + step).addClass('active');
        $('.checkout-step[data-step="' + step + '"]').addClass('active');

        // Mark previous steps as completed
        for (let i = 1; i < step; i++) {
            $('.checkout-step[data-step="' + i + '"]').addClass('completed');
        }

        currentStep = step;
    }

    function validateStep(step) {
        if (step === 1) {
            // Validate shipping address
            const fields = ['delivery_first_name', 'delivery_last_name', 'delivery_street_aadress',
                          'delivery_country', 'delivery_state', 'delivery_city', 'delivery_phone'];
            for (let field of fields) {
                const value = $('#' + field).val();
                if (!value || value === '') {
                    toastr.error('{{ trans("response.please_fill_required_fields") }}');
                    return false;
                }
            }
            return true;
        } else if (step === 2) {
            // Validate billing address
            const fields = ['billing_first_name', 'billing_last_name', 'billing_street_aadress',
                          'billing_country', 'billing_state', 'billing_city', 'billing_phone'];
            for (let field of fields) {
                const value = $('#' + field).val();
                if (!value || value === '') {
                    toastr.error('{{ trans("response.please_fill_required_fields") }}');
                    return false;
                }
            }
            return true;
        } else if (step === 3) {
            // Validate shipping method
            if (!selectedShippingMethod) {
                toastr.error('{{ trans("response.please_select_shipping_method") }}');
                return false;
            }
            return true;
        }
        return true;
    }

    function selectShippingMethod(element) {
        $('.shipping-method-card').removeClass('selected');
        $(element).addClass('selected');
        $(element).find('.shipping-method-radio').prop('checked', true);
        selectedShippingMethod = $(element).data('method-id');

        // Update shipping amount in summary
        const shippingPrice = $(element).data('price');
        $('#shipping-amount').text(shippingPrice);
        updateTotal();
    }

    function selectPaymentMethod(element) {
        $('.payment-method-card').removeClass('selected');
        $(element).addClass('selected');
        $(element).find('.payment-method-radio').prop('checked', true);
        selectedPaymentMethod = $(element).data('method-id');
    }

    function loadOrderSummary() {
        if (loggedIn == '1') {
            url = "{{ url('') }}" + '/api/client/cart?session_id=' + cartSession + '&language_id=' + languageId +
                '&currency=' + localStorage.getItem("currency");
        } else {
            url = "{{ url('') }}" + '/api/client/cart/guest/get?session_id=' + cartSession + '&language_id=' +
                languageId + '&currency=' + localStorage.getItem("currency");
        }

        $.ajax({
            type: 'get',
            url: url,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#order-items-container').html('');
                    let total = 0;

                    for (let i = 0; i < data.data.length; i++) {
                        const item = data.data[i];
                        const template = document.getElementById("order-item-template");
                        const clone = template.content.cloneNode(true);

                        // Set image
                        if (item.product_gallary && item.product_gallary.detail && item.product_gallary.detail[0]) {
                            clone.querySelector(".summary-item-image").src = item.product_gallary.detail[0].gallary_path;
                        }

                        // Set name
                        if (item.product_detail && item.product_detail[0]) {
                            clone.querySelector(".summary-item-name").textContent = item.product_detail[0].title;
                        }

                        // Set price
                        const price = item.discount_price > 0 ? item.discount_price : item.price;
                        const itemTotal = price * item.qty;
                        total += itemTotal;

                        if (item.currency) {
                            const priceText = item.currency.symbol_position == 'left'
                                ? item.currency.code + ' ' + itemTotal.toFixed(2)
                                : itemTotal.toFixed(2) + ' ' + item.currency.code;
                            clone.querySelector(".summary-item-price").textContent = priceText + ' (x' + item.qty + ')';
                        }

                        $('#order-items-container').append(clone);
                    }

                    // Update subtotal
                    if (data.data.length > 0 && data.data[0].currency) {
                        const currency = data.data[0].currency;
                        const subtotalText = currency.symbol_position == 'left'
                            ? currency.code + ' ' + total.toFixed(2)
                            : total.toFixed(2) + ' ' + currency.code;
                        $('#subtotal-amount').text(subtotalText);
                        $('#subtotal-amount').data('amount', total);
                        updateTotal();
                    }
                }
            },
            error: function(data) {
                toastr.error('{{ trans("response.some_thing_went_wrong") }}');
            }
        });
    }

    function updateTotal() {
        const subtotal = parseFloat($('#subtotal-amount').data('amount')) || 0;
        const shipping = parseFloat($('#shipping-amount').data('amount')) || 0;
        const tax = parseFloat($('#tax-amount').data('amount')) || 0;
        const total = subtotal + shipping + tax;

        // Get currency format from subtotal
        const subtotalText = $('#subtotal-amount').text();
        const currencyMatch = subtotalText.match(/([A-Z]{3})/);
        if (currencyMatch) {
            const currency = currencyMatch[1];
            const isLeft = subtotalText.indexOf(currency) < subtotalText.indexOf(subtotal.toFixed(2));
            const totalText = isLeft
                ? currency + ' ' + total.toFixed(2)
                : total.toFixed(2) + ' ' + currency;
            $('#total-amount').text(totalText);
        }
    }

    function loadCountries() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/countries',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#delivery_country, #billing_country').html('');
                    data.data.forEach(function(country) {
                        $('#delivery_country, #billing_country').append(
                            '<option value="' + country.id + '">' + country.name + '</option>'
                        );
                    });
                }
            }
        });
    }

    function states1() {
        const countryId = $('#delivery_country').val();
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/states/' + countryId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#delivery_state').html('');
                    data.data.forEach(function(state) {
                        $('#delivery_state').append(
                            '<option value="' + state.id + '">' + state.name + '</option>'
                        );
                    });
                    city1();
                }
            }
        });
    }

    function city1() {
        const stateId = $('#delivery_state').val();
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/cities/' + stateId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#delivery_city').html('');
                    data.data.forEach(function(city) {
                        $('#delivery_city').append(
                            '<option value="' + city.id + '">' + city.name + '</option>'
                        );
                    });
                }
            }
        });
    }

    function states() {
        const countryId = $('#billing_country').val();
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/states/' + countryId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#billing_state').html('');
                    data.data.forEach(function(state) {
                        $('#billing_state').append(
                            '<option value="' + state.id + '">' + state.name + '</option>'
                        );
                    });
                    city();
                }
            }
        });
    }

    function city() {
        const stateId = $('#billing_state').val();
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/cities/' + stateId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#billing_city').html('');
                    data.data.forEach(function(city) {
                        $('#billing_city').append(
                            '<option value="' + city.id + '">' + city.name + '</option>'
                        );
                    });
                }
            }
        });
    }

    function loadShippingMethods() {
        // Placeholder - implement actual API call
        const methods = [
            { id: 1, name: 'Standard Shipping', desc: '5-7 business days', price: '5.00' },
            { id: 2, name: 'Express Shipping', desc: '2-3 business days', price: '15.00' }
        ];

        const container = $('#shipping-methods-container');
        container.html('');

        methods.forEach(function(method) {
            const template = document.getElementById("shipping-method-template");
            const clone = template.content.cloneNode(true);
            const card = clone.querySelector('.shipping-method-card');

            card.setAttribute('data-method-id', method.id);
            card.setAttribute('data-price', method.price);
            clone.querySelector('.shipping-method-name').textContent = method.name;
            clone.querySelector('.shipping-method-desc').textContent = method.desc;
            clone.querySelector('.shipping-method-price').textContent = '$' + method.price;

            container.append(clone);
        });
    }

    function loadPaymentMethods() {
        // Placeholder - implement actual API call
        const methods = [
            { id: 1, name: 'Cash on Delivery' },
            { id: 2, name: 'Credit Card' },
            { id: 3, name: 'PayPal' }
        ];

        const container = $('#payment-methods-container');
        container.html('');

        methods.forEach(function(method) {
            const template = document.getElementById("payment-method-template");
            const clone = template.content.cloneNode(true);
            const card = clone.querySelector('.payment-method-card');

            card.setAttribute('data-method-id', method.id);
            clone.querySelector('.payment-method-name').textContent = method.name;

            container.append(clone);
        });
    }

    function placeOrder() {
        if (!validateStep(4)) {
            return;
        }

        if (!selectedPaymentMethod) {
            toastr.error('{{ trans("response.please_select_payment_method") }}');
            return;
        }

        // Implement actual order placement logic here
        toastr.success('Order placed successfully!');
    }
</script>
@endsection