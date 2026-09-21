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
                            تغيير كلمة المرور
                        @else
                            Change Password
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Change Password Section --}}
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card border-0" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); background: var(--surface-1);">
                        <div class="card-body p-4 p-md-5">
                            {{-- Icon --}}
                            <div class="text-center mb-4">
                                <div class="mx-auto" style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-key" style="font-size: 36px; color: white;"></i>
                                </div>
                            </div>

                            {{-- Title --}}
                            <h2 class="text-center fw-bold mb-2" style="color: var(--text-primary); font-size: clamp(1.5rem, 3vw, 2rem);">
                                @if($data['direction'] === 'rtl')
                                    تغيير كلمة المرور
                                @else
                                    Change Password
                                @endif
                            </h2>
                            <p class="text-center mb-4" style="color: var(--text-secondary);">
                                @if($data['direction'] === 'rtl')
                                    أدخل كلمة المرور الحالية والجديدة
                                @else
                                    Enter your current and new password
                                @endif
                            </p>

                            {{-- Form --}}
                            <form id="forgetForm">
                                {{-- Current Password --}}
                                <div class="mb-4">
                                    <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            كلمة المرور الحالية
                                        @else
                                            Current Password
                                        @endif
                                    </label>
                                    <input type="password" class="form-control" id="current_password_input"
                                           placeholder="@if($data['direction'] === 'rtl') أدخل كلمة المرور الحالية @else Enter current password @endif"
                                           style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                    <small class="current_password errors d-none text-danger mt-1"></small>
                                </div>

                                {{-- New Password --}}
                                <div class="mb-4">
                                    <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            كلمة المرور الجديدة
                                        @else
                                            New Password
                                        @endif
                                    </label>
                                    <input type="password" class="form-control" id="reset_password_input"
                                           placeholder="@if($data['direction'] === 'rtl') أدخل كلمة المرور الجديدة @else Enter new password @endif"
                                           style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                    <small class="new_password errors d-none text-danger mt-1"></small>
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-4">
                                    <label class="form-label fw-600 mb-2" style="color: var(--text-primary);">
                                        @if($data['direction'] === 'rtl')
                                            تأكيد كلمة المرور
                                        @else
                                            Confirm Password
                                        @endif
                                    </label>
                                    <input type="password" class="form-control" id="reset_confirm_password_input"
                                           placeholder="@if($data['direction'] === 'rtl') أعد إدخال كلمة المرور الجديدة @else Re-enter new password @endif"
                                           style="padding: 12px 16px; border: 2px solid var(--surface-3); border-radius: var(--radius-md); background: var(--surface-0); transition: all 0.3s ease;">
                                    <small class="confirm_password errors d-none text-danger mt-1"></small>
                                </div>

                                {{-- Submit Button --}}
                                <button type="button" id="reset_password" class="btn w-100 py-3 mt-3" style="background: var(--color-primary); color: white; border: none; border-radius: 999px; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease; box-shadow: var(--shadow-md);">
                                    <i class="fas fa-lock me-2"></i>
                                    @if($data['direction'] === 'rtl')
                                        تغيير كلمة المرور
                                    @else
                                        Change Password
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

<style>
    .form-control:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(193, 154, 73, 0.1);
    }

    #reset_password:hover {
        background: var(--color-primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    [dir="rtl"] .form-control {
        text-align: right;
    }
</style>
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

    $('#reset_password').click(function() {
        // Clear previous errors
        $('.errors').addClass('d-none').html('');

        current_password = $('#current_password_input').val();
        new_password = $('#reset_password_input').val();
        confirm_password = $('#reset_confirm_password_input').val();

        resetPassword(current_password, new_password, confirm_password);
    })

    function resetPassword(current_password, new_password, confirm_password) {
        var url = "{{ url('') }}" + '/api/client/change_password';

        $.ajax({
            type: 'post',
            url: url,
            data: {
                current_password: current_password,
                new_password: new_password,
                confirm_password: confirm_password
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {
                $('#reset_password').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>@if($data["direction"] === "rtl") جاري التغيير... @else Changing... @endif');
            },
            success: function(data) {
                if (data.status == 'Success') {
                    $('#current_password_input').val('');
                    $('#reset_password_input').val('');
                    $('#reset_confirm_password_input').val('');
                    toastr.success(data.message);
                } else if (data.status == 'Error') {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            error: function(data) {
                if (data.status == 422) {
                    $.each(data.responseJSON.errors, function(index, value) {
                        $("#forgetForm").find("." + index).html(value);
                        $("#forgetForm").find("." + index).removeClass('d-none');
                    });
                } else {
                    toastr.error('@if($data["direction"] === "rtl") حدث خطأ ما @else Something went wrong @endif');
                }
            },
            complete: function() {
                $('#reset_password').prop('disabled', false).html('<i class="fas fa-lock me-2"></i>@if($data["direction"] === "rtl") تغيير كلمة المرور @else Change Password @endif');
            }
        });
    }
</script>
@endsection
