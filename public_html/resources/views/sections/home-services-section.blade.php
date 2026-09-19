@php
    $siteSettings = getSetting();
    $supportPhone = trim((string) ($siteSettings['phone_number'] ?? ''));
@endphp

<section class="boxes-content">
  
    <div class="container">
      <div class="info-boxes-content">         
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
              <div class="info-box first">
                  <div class="panel">
                      <h3 class="fas fa-truck"></h3>
                      <div class="block">
                          <h4 class="title">{{ trans('lables.home-servics-free-shipping') }}</h4>
                          <p>{{ trans('lables.home-servics-on-ordr') }}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
              <div class="info-box">
                  <div class="panel">
                      <h3 class="fas fa-money-bill-alt"></h3>
                      <div class="block">
                          <h4 class="title">Money Back Guarantee</h4>
                          <p>{{ trans('lables.home-servics-return-days') }}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
            <div class="info-box">
                <div class="panel">
                    <h3 class="fas fa-life-ring"></h3>
                    <div class="block">
                        <h4 class="title">Customer Support</h4>
                        <p>{{ trans('lables.home-servics-hotline') }}&nbsp;:&nbsp;{{ $supportPhone ?: 'Contact us' }}</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 pl-xl-0">
              <div class="info-box last">
                  <div class="panel">
                      <h3 class="fas fa-credit-card"></h3>
                      <div class="block">
                          <h4 class="title">Secure Payment</h4>
                          <p>{{ trans('lables.home-servics-protect-payment') }}</p>
                      </div>
                  </div>
              </div>
          </div> 
        </div> 
    </div>   
    </div>
</section>
