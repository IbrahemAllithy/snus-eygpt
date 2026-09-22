@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Thank You Section --}}
    <section class="py-5" style="min-height: 70vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="text-center">
                        {{-- Success Icon --}}
                        <div class="mb-4" style="animation: scaleIn 0.5s ease-out;">
                            <div class="mx-auto" style="width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #10b981 0%, #059669 100%); display: flex; align-items: center; justify-content: center; box-shadow: 0 20px 50px rgba(16, 185, 129, 0.3);">
                                <i class="far fa-check-circle" style="font-size: 70px; color: white;"></i>
                            </div>
                        </div>

                        {{-- Thank You Message --}}
                        <h1 class="fw-bold mb-3" style="color: var(--text-primary); font-size: clamp(2rem, 4vw, 3rem);">
                            @if($data['direction'] === 'rtl')
                                شكراً لك!
                            @else
                                Thank You!
                            @endif
                        </h1>

                        <p class="mb-4" style="color: var(--text-secondary); font-size: clamp(1rem, 2vw, 1.25rem); line-height: 1.6;">
                            @if($data['direction'] === 'rtl')
                                تم استلام طلبك بنجاح. يمكنك متابعة حالة طلبك من صفحة
                                <a href="{{ url('/orders') }}" class="fw-bold" style="color: var(--color-primary); text-decoration: none; border-bottom: 2px solid var(--color-primary); transition: all 0.3s ease;">
                                    الطلبات
                                </a>
                            @else
                                Your order has been successfully received. You can track your order status from the
                                <a href="{{ url('/orders') }}" class="fw-bold" style="color: var(--color-primary); text-decoration: none; border-bottom: 2px solid var(--color-primary); transition: all 0.3s ease;">
                                    Orders Page
                                </a>
                            @endif
                        </p>

                        {{-- Action Buttons --}}
                        <div class="d-flex flex-wrap gap-3 justify-content-center mt-4">
                            <a href="{{ url('/orders') }}" class="btn px-4 py-3" style="background: var(--color-primary); color: white; border: none; border-radius: 999px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; box-shadow: var(--shadow-lg); text-decoration: none;">
                                <i class="fas fa-list-ul me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    عرض طلباتي
                                @else
                                    View My Orders
                                @endif
                            </a>
                            <a href="{{ url('/') }}" class="btn px-4 py-3" style="background: var(--surface-1); color: var(--text-primary); border: 2px solid var(--surface-3); border-radius: 999px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fas fa-home me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    العودة للرئيسية
                                @else
                                    Back to Home
                                @endif
                            </a>
                        </div>

                        {{-- Additional Info --}}
                        <div class="mt-5 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                            <div class="row g-4">
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(193, 154, 73, 0.1); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-envelope" style="font-size: 20px; color: var(--color-primary);"></i>
                                        </div>
                                        <div class="text-start">
                                            <p class="mb-0 fw-600" style="color: var(--text-primary); font-size: 0.9rem;">
                                                @if($data['direction'] === 'rtl')
                                                    تأكيد البريد
                                                @else
                                                    Email Confirmation
                                                @endif
                                            </p>
                                            <small style="color: var(--text-secondary);">
                                                @if($data['direction'] === 'rtl')
                                                    تم إرساله
                                                @else
                                                    Sent
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(193, 154, 73, 0.1); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-box" style="font-size: 20px; color: var(--color-primary);"></i>
                                        </div>
                                        <div class="text-start">
                                            <p class="mb-0 fw-600" style="color: var(--text-primary); font-size: 0.9rem;">
                                                @if($data['direction'] === 'rtl')
                                                    قيد المعالجة
                                                @else
                                                    Processing
                                                @endif
                                            </p>
                                            <small style="color: var(--text-secondary);">
                                                @if($data['direction'] === 'rtl')
                                                    1-2 يوم
                                                @else
                                                    1-2 days
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(193, 154, 73, 0.1); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-shipping-fast" style="font-size: 20px; color: var(--color-primary);"></i>
                                        </div>
                                        <div class="text-start">
                                            <p class="mb-0 fw-600" style="color: var(--text-primary); font-size: 0.9rem;">
                                                @if($data['direction'] === 'rtl')
                                                    التسليم
                                                @else
                                                    Delivery
                                                @endif
                                            </p>
                                            <small style="color: var(--text-secondary);">
                                                @if($data['direction'] === 'rtl')
                                                    3-5 أيام
                                                @else
                                                    3-5 days
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    @keyframes scaleIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    a[href="{{ url('/orders') }}"]:hover,
    a[href="{{ url('/') }}"]:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
    }

    a[href="{{ url('/orders') }}"]:hover {
        background: var(--color-primary-dark);
    }

    a[href="{{ url('/') }}"]:hover {
        border-color: var(--color-primary);
        color: var(--color-primary);
    }
</style>
@endsection

@section('script')
@endsection
