@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Points Content --}}
    <section class="points-content py-5">
        <div class="container">
            <div class="row g-4">
                {{-- Sidebar Menu --}}
                <div class="col-12 col-lg-3">
                    <div class="account-sidebar p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div class="heading mb-4">
                            <h2 class="fw-bold" style="color: var(--text-primary); font-size: 1.5rem;">
                                @if($data['direction'] === 'rtl')
                                    حسابي
                                @else
                                    My Account
                                @endif
                            </h2>
                            <hr style="border-color: var(--surface-3); margin-top: 1rem;">
                        </div>
                        @include('includes.side-menu')
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-12 col-lg-9">
                    {{-- Points Header --}}
                    <div class="points-header mb-4 p-4" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <div>
                                <h2 class="fw-bold text-white mb-2" style="font-size: clamp(1.5rem, 3vw, 2rem);">
                                    @if($data['direction'] === 'rtl')
                                        النقاط
                                    @else
                                        Reward Points
                                    @endif
                                </h2>
                                <p class="text-white mb-0" style="opacity: 0.9;">
                                    @if($data['direction'] === 'rtl')
                                        اكسب نقاط واستبدلها بمكافآت
                                    @else
                                        Earn points and redeem for rewards
                                    @endif
                                </p>
                            </div>
                            <div class="points-balance p-3 px-4" style="background: rgba(255,255,255,0.2); border-radius: var(--radius-md); backdrop-filter: blur(10px);">
                                <div class="text-white" style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 4px;">
                                    @if($data['direction'] === 'rtl')
                                        إجمالي النقاط
                                    @else
                                        Total Points
                                    @endif
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-bold text-white" style="font-size: 1.8rem;" id="total_points">0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Redeem Section --}}
                    <div class="redeem-wrapper mb-4 p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <div>
                                <h4 class="fw-bold mb-2" style="color: var(--text-primary);">
                                    @if($data['direction'] === 'rtl')
                                        استبدل نقاطك
                                    @else
                                        Redeem Your Points
                                    @endif
                                </h4>
                                <div class="d-flex flex-column gap-2">
                                    <p class="mb-0 text-muted">
                                        <i class="fas fa-info-circle me-2" style="color: var(--color-primary);"></i>
                                        @if($data['direction'] === 'rtl')
                                            الحد الأدنى للاستبدال:
                                        @else
                                            Minimum points to redeem:
                                        @endif
                                        <strong style="color: var(--color-primary);">{{ $setting['redeem_point'] }}</strong>
                                    </p>
                                    <p class="mb-0 text-muted">
                                        <i class="fas fa-coins me-2" style="color: var(--color-primary);"></i>
                                        @if($data['direction'] === 'rtl')
                                            قيمة كل نقطة:
                                        @else
                                            Per point value:
                                        @endif
                                        <strong style="color: var(--color-primary);">{{ $setting['per_point'] }} {{ $data['selectedCurrencySymbol'] }}</strong>
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary redeem rounded-pill px-5 py-3" style="background: var(--color-primary); border: none; box-shadow: var(--shadow-md); white-space: nowrap;">
                                <i class="fas fa-gift me-2"></i>
                                @if($data['direction'] === 'rtl')
                                    استبدل الآن
                                @else
                                    Redeem Now
                                @endif
                            </button>
                        </div>
                    </div>

                    {{-- Points History --}}
                    <div class="points-history-wrapper p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-4" style="color: var(--text-primary); font-size: 1.3rem;">
                            @if($data['direction'] === 'rtl')
                                سجل النقاط
                            @else
                                Points History
                            @endif
                        </h3>
                        <div id="points-template">
                            {{-- Loading state --}}
                            <div class="text-center py-5">
                                <div class="spinner-border" style="color: var(--color-primary); width: 3rem; height: 3rem;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-3 text-muted">
                                    @if($data['direction'] === 'rtl')
                                        جاري تحميل النقاط...
                                    @else
                                        Loading points...
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    .points-row {
        padding: 1rem;
        border-bottom: 1px solid var(--surface-3);
        transition: background 0.2s ease;
    }

    .points-row:hover {
        background: var(--surface-2);
    }

    .points-row:last-child {
        border-bottom: none;
    }

    .points-header-row {
        padding: 1rem;
        background: var(--surface-2);
        border-radius: var(--radius-md) var(--radius-md) 0 0;
        font-weight: 600;
        color: var(--text-primary);
    }

    .points-value {
        color: var(--color-primary);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .redeemed-badge {
        background: #10b981;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .pending-badge {
        background: #f59e0b;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .points-balance {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .points-col {
            padding: 0.5rem !important;
            font-size: 0.9rem;
        }

        .redeem {
            width: 100%;
        }
    }
</style>

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

    var descriptionLabel = '{{ $data["direction"] === "rtl" ? "الوصف" : "Description" }}';
    var pointsLabel = '{{ $data["direction"] === "rtl" ? "النقاط" : "Points" }}';
    var redeemedLabel = '{{ $data["direction"] === "rtl" ? "مستبدل" : "Redeemed" }}';
    var yesText = '{{ $data["direction"] === "rtl" ? "نعم" : "Yes" }}';
    var noText = '{{ $data["direction"] === "rtl" ? "لا" : "No" }}';
    var noPointsText = '{{ $data["direction"] === "rtl" ? "لا توجد نقاط حتى الآن" : "No points yet" }}';
    var noPointsDesc = '{{ $data["direction"] === "rtl" ? "ابدأ بالتسوق لكسب نقاط المكافآت" : "Start shopping to earn reward points" }}';
    var errorLoadingText = '{{ $data["direction"] === "rtl" ? "حدث خطأ في تحميل النقاط" : "Error loading points" }}';

    fetchPoints();
    fetchTotalPoints();

    function fetchPoints() {
        var url = "{{ url('') }}" + '/api/client/points';
        $.ajax({
            type: 'get',
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
                    if (data.data.length === 0) {
                        var emptyHtml = "<div class='text-center py-5'>";
                        emptyHtml += "<i class='fas fa-star' style='font-size: 64px; color: var(--color-primary); opacity: 0.3; margin-bottom: 1rem;'></i>";
                        emptyHtml += "<h4 class='fw-bold mb-2' style='color: var(--text-primary);'>" + noPointsText + "</h4>";
                        emptyHtml += "<p class='text-muted'>" + noPointsDesc + "</p>";
                        emptyHtml += "<a href='{{ url('/shop') }}' class='btn btn-primary rounded-pill px-4 mt-3' style='background: var(--color-primary); border: none;'>";
                        emptyHtml += "<i class='fas fa-shopping-bag me-2'></i>" + (languageId == 2 ? "تسوق الآن" : "Shop Now");
                        emptyHtml += "</a></div>";
                        $('#points-template').html(emptyHtml);
                        return;
                    }

                    var html = "<div class='points-header-row row mx-0'>";
                    html += "<div class='col-md-5 points-col'>" + descriptionLabel + "</div>";
                    html += "<div class='col-md-4 points-col'>" + pointsLabel + "</div>";
                    html += "<div class='col-md-3 points-col'>" + redeemedLabel + "</div>";
                    html += "</div>";

                    for (i = 0; i < data.data.length; i++) {
                        html += "<div class='points-row row mx-0 align-items-center'>";
                        html += "<div class='col-md-5 points-col' style='color: var(--text-primary);'>" + data.data[i].description + "</div>";
                        html += "<div class='col-md-4 points-col points-value'>+" + data.data[i].points + "</div>";

                        if (data.data[i].status == '0') {
                            html += "<div class='col-md-3 points-col'><span class='pending-badge'>" + noText + "</span></div>";
                        } else {
                            html += "<div class='col-md-3 points-col'><span class='redeemed-badge'>" + yesText + "</span></div>";
                        }
                        html += "</div>";
                    }

                    $('#points-template').html(html);
                }
            },
            error: function(data) {
                var errorHtml = "<div class='text-center py-5'>";
                errorHtml += "<i class='fas fa-exclamation-circle' style='font-size: 64px; color: #ef4444; opacity: 0.5; margin-bottom: 1rem;'></i>";
                errorHtml += "<p class='text-muted'>" + errorLoadingText + "</p>";
                errorHtml += "</div>";
                $('#points-template').html(errorHtml);
            },
        });
    }

    function fetchTotalPoints() {
        var url = "{{ url('') }}" + '/api/client/points?sum=1';
        $.ajax({
            type: 'get',
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
                    $('#total_points').html(data.data);
                }
            },
            error: function(data) {
                $('#total_points').html('0');
            },
        });
    }

    $('.redeem').click(function (e) {
        e.preventDefault();
        var url = "{{ url('') }}" + '/api/client/redeem';
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
                    toastr.success('{{ trans("points-redeem-successfully") }}');
                    fetchPoints();
                    fetchTotalPoints();
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    jQuery.each(data.responseJSON.errors, function(index, item) {
                        toastr.error(item[0]);
                    });
                } else if (data.status == 401) {
                    toastr.error(data.responseJSON.message);
                } else {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
        });
    });
</script>
@endsection
