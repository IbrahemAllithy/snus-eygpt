@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Wallet Content --}}
    <section class="wallet-content py-5">
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
                    {{-- Wallet Header --}}
                    <div class="wallet-header mb-4 p-4" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <div>
                                <h2 class="fw-bold text-white mb-2" style="font-size: clamp(1.5rem, 3vw, 2rem);">
                                    @if($data['direction'] === 'rtl')
                                        المحفظة
                                    @else
                                        Wallet
                                    @endif
                                </h2>
                                <p class="text-white mb-0" style="opacity: 0.9;">
                                    @if($data['direction'] === 'rtl')
                                        تتبع معاملات محفظتك ورصيدك
                                    @else
                                        Track your wallet transactions and balance
                                    @endif
                                </p>
                            </div>
                            <div class="wallet-balance p-3 px-4" style="background: rgba(255,255,255,0.2); border-radius: var(--radius-md); backdrop-filter: blur(10px);">
                                <div class="text-white" style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 4px;">
                                    @if($data['direction'] === 'rtl')
                                        الرصيد الإجمالي
                                    @else
                                        Total Balance
                                    @endif
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-bold text-white" style="font-size: 1.8rem;" id="total_cr">0</span>
                                    <span class="text-white" style="font-size: 1.2rem;">{{ $data['selectedCurrencySymbol'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Transactions Table --}}
                    <div class="transactions-wrapper p-4" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
                        <h3 class="fw-bold mb-4" style="color: var(--text-primary); font-size: 1.3rem;">
                            @if($data['direction'] === 'rtl')
                                سجل المعاملات
                            @else
                                Transaction History
                            @endif
                        </h3>
                        <div class="table-responsive">
                            <div id="points-template">
                                {{-- Loading state --}}
                                <div class="text-center py-5">
                                    <div class="spinner-border" style="color: var(--color-primary); width: 3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-3 text-muted">
                                        @if($data['direction'] === 'rtl')
                                            جاري تحميل المعاملات...
                                        @else
                                            Loading transactions...
                                        @endif
                                    </p>
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
    .transaction-row {
        padding: 1rem;
        border-bottom: 1px solid var(--surface-3);
        transition: background 0.2s ease;
    }

    .transaction-row:hover {
        background: var(--surface-2);
    }

    .transaction-row:last-child {
        border-bottom: none;
    }

    .transaction-header {
        padding: 1rem;
        background: var(--surface-2);
        border-radius: var(--radius-md) var(--radius-md) 0 0;
        font-weight: 600;
        color: var(--text-primary);
    }

    .amount-credit {
        color: #10b981;
        font-weight: 600;
    }

    .amount-debit {
        color: #ef4444;
        font-weight: 600;
    }

    .wallet-balance {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .transaction-col {
            padding: 0.5rem !important;
            font-size: 0.9rem;
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

    var dateLabel = '{{ $data["direction"] === "rtl" ? "التاريخ" : "Date" }}';
    var descriptionLabel = '{{ $data["direction"] === "rtl" ? "الوصف" : "Description" }}';
    var debitLabel = '{{ $data["direction"] === "rtl" ? "مدين" : "Debit" }}';
    var creditLabel = '{{ $data["direction"] === "rtl" ? "دائن" : "Credit" }}';
    var infoLabel = '{{ $data["direction"] === "rtl" ? "معلومات" : "Info" }}';
    var noTransactionsText = '{{ $data["direction"] === "rtl" ? "لا توجد معاملات في محفظتك حتى الآن" : "No transactions in your wallet yet" }}';

    fetchWallet();

    function fetchWallet() {
        var url = "{{ url('') }}" + '/api/client/wallet';
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
                    var html = "";

                    if (data.data.length === 0) {
                        html = "<div class='text-center py-5'>";
                        html += "<i class='fas fa-wallet' style='font-size: 64px; color: var(--color-primary); opacity: 0.3; margin-bottom: 1rem;'></i>";
                        html += "<p class='text-muted' style='font-size: 1.1rem;'>" + noTransactionsText + "</p>";
                        html += "</div>";
                    } else {
                        html += "<div class='transaction-header row mx-0'>";
                        html += "<div class='col-md-2 transaction-col'>" + dateLabel + "</div>";
                        html += "<div class='col-md-2 transaction-col'>" + descriptionLabel + "</div>";
                        html += "<div class='col-md-2 transaction-col'>" + debitLabel + "</div>";
                        html += "<div class='col-md-2 transaction-col'>" + creditLabel + "</div>";
                        html += "<div class='col-md-4 transaction-col'>" + infoLabel + "</div>";
                        html += "</div>";

                        for (i = 0; i < data.data.length; i++) {
                            html += "<div class='transaction-row row mx-0 align-items-center'>";
                            html += "<div class='col-md-2 transaction-col' style='color: var(--text-primary);'>" + data.data[i].date + "</div>";
                            html += "<div class='col-md-2 transaction-col' style='color: var(--text-primary);'>" + data.data[i].transaction_description + "</div>";

                            var debitAmount = data.data[i].debit_amount || '0';
                            html += "<div class='col-md-2 transaction-col amount-debit'>" + (debitAmount != '0' ? debitAmount : '-') + "</div>";

                            var creditAmount = data.data[i].credit_amount || '0';
                            html += "<div class='col-md-2 transaction-col amount-credit'>" + (creditAmount != '0' ? creditAmount : '-') + "</div>";

                            html += "<div class='col-md-4 transaction-col' style='color: var(--text-secondary); font-size: 0.9rem;'>" + data.data[i].description + "</div>";
                            html += "</div>";
                        }
                    }

                    $('#points-template').html(html);
                }
            },
            error: function(data) {
                var errorHtml = "<div class='text-center py-5'>";
                errorHtml += "<i class='fas fa-exclamation-circle' style='font-size: 64px; color: #ef4444; opacity: 0.5; margin-bottom: 1rem;'></i>";
                errorHtml += "<p class='text-muted'>{{ $data['direction'] === 'rtl' ? 'حدث خطأ في تحميل المعاملات' : 'Error loading transactions' }}</p>";
                errorHtml += "</div>";
                $('#points-template').html(errorHtml);
            },
        });
    }

    fetcTotalofDrCr();

    function fetcTotalofDrCr() {
        var url = "{{ url('') }}" + '/api/client/wallet?total=1';
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
                    $('#total_cr').html(data.data);
                }
            },
            error: function(data) {
                $('#total_cr').html('0');
            },
        });
    }
</script>
@endsection