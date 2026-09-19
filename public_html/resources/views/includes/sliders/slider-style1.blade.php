 <!-- Bootstrap Caption Carousel Content Full Width -->
 <section class="carousel-content">
      
  <div id="carouselExampleWithCaptions2" class="carousel slide shimmer-background" data-ride="carousel">
    <ol class="carousel-indicators" style="direction:ltr;">
      <li id="slider-bullets-0" data-target="#carouselExampleWithCaptions2" data-slide-to="0" class="active"></li>
      <li id="slider-bullets-1" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="1"></li>
      <li id="slider-bullets-2" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="2"></li>
      <li id="slider-bullets-3" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="3"></li>
      <li id="slider-bullets-4" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="4"></li>
      <li id="slider-bullets-5" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="5"></li>
      <li id="slider-bullets-6" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="6"></li>
      <li id="slider-bullets-7" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="7"></li>
      <li id="slider-bullets-8" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="8"></li>
      <li id="slider-bullets-9" class="d-none" data-target="#carouselExampleWithCaptions2" data-slide-to="9"></li>
    </ol>
  
    <template id="slider-navigation-template">
      <div class="carousel-item slider-navigation-active">
        <img class="d-block w-100 slider-navigation-image" src="" alt="">
        <div class="carousel-caption d-none d-md-flex  ">
            <div class="text-deco1">
                <h2 class="slider-navigation-title"></h2>
                <p class="slider-navigation-desc"></p>
                <a href="javascript:void(0)"  class="slider-navigation-url btn btn-secondary swipe-to-top">
                  {{  trans("lables.home-slider-button-title") }}
                </a>
              </div>
          </div>
      </div>
    </template>

    <div class="carousel-inner slider-navigation-show">
      <div class="carousel-item active fallback-slide">
        <img class="d-block w-100" src="{{ asset('gallary/202609061258202608192419snusegy_velo_orange_spark.jpeg') }}" alt="Snus Egypt products">
        <div class="carousel-caption d-flex">
          <div class="text-deco1">
            <span class="fallback-kicker">SNUS EGYPT</span>
            <h2>اختار نكهتك المفضلة</h2>
            <p>منتجات أصلية، اختيارات واضحة، وتوصيل سريع داخل مصر.</p>
            <a href="{{ url('/shop') }}" class="btn btn-secondary swipe-to-top">تسوق الآن</a>
          </div>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleWithCaptions2" role="button" data-slide="prev">
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleWithCaptions2" role="button" data-slide="next">
      <span class="sr-only">Next</span>
    </a>

  </div>
</section>
