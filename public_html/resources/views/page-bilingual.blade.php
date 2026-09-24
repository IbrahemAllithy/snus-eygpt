@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    @if (isset($page->page_detail))

        {{-- Page Header --}}
        <section class="page-header py-5" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); min-height: 250px;">
            <div class="container">
                <div class="row align-items-center" style="min-height: 250px;">
                    <div class="col-12 text-center text-white">
                        <h1 class="fw-bold mb-0" style="font-size: clamp(2rem, 5vw, 3rem); text-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            {{ $page->page_detail[0]->title }}
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        {{-- Page Content --}}
        <section class="page-content py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="content-wrapper p-4 p-md-5" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                            <div class="page-description" style="color: var(--text-primary); line-height: 1.8; font-size: 1.1rem;">
                                {!! $page->page_detail[0]->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @else
        {{-- Coming Soon Fallback --}}
        <section class="coming-soon py-5" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 text-center">
                        <div class="p-5" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-xl);">
                            <div class="mb-4">
                                <i class="fas fa-hourglass-half" style="font-size: 80px; color: var(--color-primary);"></i>
                            </div>
                            <h2 class="fw-bold mb-3" style="color: var(--text-primary); font-size: 2.5rem;">
                                @if($data['direction'] === 'rtl')
                                    قريباً
                                @else
                                    Coming Soon
                                @endif
                            </h2>
                            <p class="text-muted" style="font-size: 1.2rem;">
                                @if($data['direction'] === 'rtl')
                                    هذه الصفحة قيد الإنشاء. يرجى التحقق مرة أخرى قريباً!
                                @else
                                    This page is under construction. Please check back soon!
                                @endif
                            </p>
                            <a href="{{ url('/') }}" class="btn btn-primary mt-4 px-5 py-3 rounded-pill" style="background: var(--color-primary); border: none; font-weight: 600; box-shadow: var(--shadow-md);">
                                <i class="fas fa-home me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    العودة للرئيسية
                                @else
                                    Back to Home
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

</div>

<style>
    .page-description {
        word-wrap: break-word;
    }

    .page-description h1,
    .page-description h2,
    .page-description h3,
    .page-description h4,
    .page-description h5,
    .page-description h6 {
        color: var(--text-primary);
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .page-description p {
        margin-bottom: 1.5rem;
    }

    .page-description a {
        color: var(--color-primary);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .page-description a:hover {
        text-decoration: underline;
        opacity: 0.8;
    }

    .page-description ul,
    .page-description ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .page-description li {
        margin-bottom: 0.5rem;
    }

    .page-description img {
        max-width: 100%;
        height: auto;
        border-radius: var(--radius-md);
        margin: 1.5rem 0;
        box-shadow: var(--shadow-md);
    }

    .page-description blockquote {
        border-left: 4px solid var(--color-primary);
        padding-left: 1.5rem;
        margin: 1.5rem 0;
        font-style: italic;
        color: var(--text-secondary);
    }

    [dir="rtl"] .page-description blockquote {
        border-left: none;
        border-right: 4px solid var(--color-primary);
        padding-left: 0;
        padding-right: 1.5rem;
    }

    .page-description table {
        width: 100%;
        margin: 1.5rem 0;
        border-collapse: collapse;
    }

    .page-description table th,
    .page-description table td {
        padding: 0.75rem;
        border: 1px solid var(--surface-3);
    }

    .page-description table th {
        background: var(--surface-2);
        font-weight: 600;
        color: var(--text-primary);
    }

    .page-description table td {
        color: var(--text-secondary);
    }

    .page-description code {
        background: var(--surface-2);
        padding: 0.2rem 0.5rem;
        border-radius: var(--radius-sm);
        font-family: monospace;
        color: var(--color-primary);
    }

    .page-description pre {
        background: var(--surface-2);
        padding: 1rem;
        border-radius: var(--radius-md);
        overflow-x: auto;
        margin: 1.5rem 0;
    }

    .page-description pre code {
        background: transparent;
        padding: 0;
    }
</style>

@endsection

@section('script')
@endsection