<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-login') }}</li>
            </ol>
        </div>
    </nav>
</div>


    <!-- login Content -->
    <section class="page-area pro-content">
        <div class="container">


            <div class="row justify-content-center">



                <div class="col-12 col-sm-12 col-md-6">
                    @if(getSetting()['authenticate_with_email_password'] == '1')
                    <div class="row">
                        <div class="col-12">

                            <ul class="nav nav-tabs" id="registerTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                                        aria-controls="login" aria-selected="true">{{ trans('lables.login-login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab"
                                        aria-controls="signup" aria-selected="false">{{ trans('lables.login-sign-up') }}</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="registerTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel"
                                    aria-labelledby="login-tab">
                                    <div class="registration-process">
                                        <form>
                                            <div class="from-group mb-3">
                                                <div class="col-12"> <label for="inlineFormInputGroup">{{ trans('lables.login-email') }}</label>
                                                </div>
                                                <div class="input-group col-12">

                                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                                        placeholder="{{ trans('lables.login-email') }}">
                                                </div>
                                            </div>
                                            <div class="from-group mb-3">
                                                <div class="col-12"> <label for="inlineFormInputGroup">{{ trans('lables.login-password') }}</label>
                                                </div>
                                                <div class="input-group col-12">

                                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                                        placeholder="{{ trans('lables.login-password') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <button class="btn btn-secondary swipe-to-top">{{ trans('lables.login-login') }}</button>
                                                <a href="{{  url('/forget-password') }}" class="btn btn-link">{{ trans('lables.login-forget-password') }}</a>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                                    <div class="registration-process">
                                        <form>
                                            <div class="from-group mb-3">
                                                <div class="col-12"> <label for="inlineFormInputGroup">{{ trans('lables.login-email') }}</label>
                                                </div>
                                                <div class="input-group col-12">

                                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                                        placeholder="{{ trans('lables.login-email') }}">
                                                </div>
                                            </div>
                                            <div class="from-group mb-3">
                                                <div class="col-12"> <label for="inlineFormInputGroup">{{ trans('lables.login-password') }}</label>
                                                </div>
                                                <div class="input-group col-12">

                                                    <input type="password" class="form-control" id="inlineFormInputGroup"
                                                        placeholder="{{ trans('lables.login-password') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <button class="btn btn-light swipe-to-top">{{ trans('lables.login-create-account') }}</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12 my-5">
                            <div class="registration-socials">
                                <div class="row align-items-center justify-content-between">

                                    {{-- <div class="col-12 mb-2">
                                        {{ trans('lables.login-access-account') }}

                                    </div> --}}
                                    <div class="col-12 ">
                                        @if(getSetting()['authenticate_with_google'] == 1)
                                       <a href="{{url('/api/client/customer_login/google')}}" type="button" class="btn btn-google google-click"><i class="fab fa-google-plus-g"></i>&nbsp;Google</a>
                                       @endif
                                       @if(getSetting()['authenticate_with_facebook'] == 1)
                                        <a href="{{url('/api/client/customer_login/facebook')}}"  type="button" class="btn btn-facebook facebook-click"><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(getSetting()['authenticate_with_phone'] == 1)
                    <div class="col-12 registration-process">

                        <form id="verifyForm">
                            <div class="row">
                                <div class="from-group mb-3 col-12">
                                    <h4>Login With Phone Number</h4>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="phone_number" placeholder="Enter Phone Number">
                                    </div>
                                    <small class="phone_number">Enter phone number with country code</small>
                                    <small class="phone_number errors d-none" style="color:red"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <button class="btn btn-secondary swipe-to-top" id="sendCode">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
        
                    <div class="col-12 registration-process" style="display: none" id="loginWithPhoneDiv">
                        <h4>Set Your Email and Password</h4>
                        <form id="loginWithPhone">
        
                            <div class="row">
                                <div class="from-group mb-3 col-12">
                                    <label for="inlineFormInputGroup">{{ trans('lables.login-email') }}</label>
                                    <div class="input-group">
        
                                        <input type="text" class="form-control" id="registerPhoneEmail" placeholder="{{ trans('lables.login-email') }}">
                                    </div>
                                    <small class="email errors d-none" style="color:red"></small>
                                </div>
                            </div>
        
        
                            <div class="row">
                                <div class="from-group mb-3 col-12">
                                    <label for="inlineFormInputGroup">{{ trans('lables.login-password') }}</label>
                                    <div class="input-group">
        
                                        <input type="password" class="form-control" id="registerPhonePassword" placeholder="{{ trans('lables.login-password') }}">
                                    </div>
                                    <small class="password errors d-none" style="color:red"></small>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="from-group mb-3 col-12">
                                    <label for="inlineFormInputGroup">{{ trans('lables.login-confirm-password') }}</label>
                                    <div class="input-group">
        
                                        <input type="password" class="form-control" id="registerPhoneConfirmPassword" placeholder="{{ trans('lables.login-confirm-password') }}">
                                    </div>
                                    <small class="confirm_password errors d-none" style="color:red"></small>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-12 ">
                                    <button class="btn btn-light swipe-to-top" id="createAccountWithPhone">{{ trans('lables.login-create-account') }}</button>
        
                                </div>
                            </div>
        
                        </form>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
