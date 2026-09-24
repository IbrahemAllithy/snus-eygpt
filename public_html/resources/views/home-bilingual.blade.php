@extends('layouts.master')

@section('content')
<div class="main" style="background: var(--surface-0);">

    {{-- Hero Section --}}
    <section class="hero-section-modern" data-aos="fade-in" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); padding: 4rem 0; position: relative; overflow: hidden;">
        <div class="hero-pattern" style="position: absolute; inset: 0; opacity: 0.1; background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.05) 10px, rgba(255,255,255,0.05) 20px);"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <h1 class="text-white fw-bold mb-3" style="font-size: clamp(2rem, 5vw, 3rem); line-height: 1.2;">
                        @if($data['direction'] === 'rtl')
                            اكتشف أفضل منتجات <span style="opacity: 0.9;">السنس</span> في مصر
                        @else
                            Discover the Best <span style="opacity: 0.9;">Snus</span> Products in Egypt
                        @endif
                    </h1>
                    <p class="text-white mb-4" style="font-size: clamp(1rem, 2vw, 1.2rem); opacity: 0.95;">
                        @if($data['direction'] === 'rtl')
                            منتجات أصلية، أسعار منافسة، وتوصيل سريع لجميع المحافظات
                        @else
                            Authentic products, competitive prices, and fast delivery to all governorates
                        @endif
                    </p>
                    <div class="hero-buttons d-flex flex-wrap gap-3">
                        <a href="{{ url('/shop') }}" class="btn btn-light btn-lg rounded-pill px-4 py-3" style="font-weight: 600; box-shadow: var(--shadow-lg);">
                            <i class="fas fa-shopping-bag me-2"></i>
                            @if($data['direction'] === 'rtl')
                                تسوق الآن
                            @else
                                Shop Now
                            @endif
                        </a>
                        <a href="#categories" class="btn btn-outline-light btn-lg rounded-pill px-4 py-3" style="font-weight: 600; border-width: 2px;">
                            <i class="fas fa-th-large me-2"></i>
                            @if($data['direction'] === 'rtl')
                                التصنيفات
                            @else
                                Categories
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image-wrapper" style="position: relative;">
                        <div class="hero-glow" style="position: absolute; inset: -20%; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); filter: blur(40px); z-index: 0;"></div>
                        <img src="https://via.placeholder.com/600x400/C19A49/ffffff?text=Snus+Egypt" alt="Snus Products" loading="lazy" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-xl); position: relative; z-index: 1; width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="features-section py-5" data-aos="fade-up">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-4 text-center h-100" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease;">
                        <div class="feature-icon mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #10b981 0%, #059669 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-shipping-fast" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                        <h4 class="fw-bold mb-2" style="color: var(--text-primary); font-size: 1.1rem;">
                            @if($data['direction'] === 'rtl')
                                شحن سريع
                            @else
                                Fast Shipping
                            @endif
                        </h4>
                        <p class="mb-0" style="color: var(--text-secondary); font-size: 0.95rem;">
                            @if($data['direction'] === 'rtl')
                                توصيل لجميع المحافظات في أقل من 48 ساعة
                            @else
                                Delivery to all governorates in less than 48 hours
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card p-4 text-center h-100" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease;">
                        <div class="feature-icon mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-shield-alt" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                        <h4 class="fw-bold mb-2" style="color: var(--text-primary); font-size: 1.1rem;">
                            @if($data['direction'] === 'rtl')
                                منتجات أصلية
                            @else
                                Authentic Products
                            @endif
                        </h4>
                        <p class="mb-0" style="color: var(--text-secondary); font-size: 0.95rem;">
                            @if($data['direction'] === 'rtl')
                                جميع المنتجات أصلية 100% ومضمونة
                            @else
                                All products are 100% authentic and guaranteed
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-4 text-center h-100" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease;">
                        <div class="feature-icon mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-headset" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                        <h4 class="fw-bold mb-2" style="color: var(--text-primary); font-size: 1.1rem;">
                            @if($data['direction'] === 'rtl')
                                دعم 24/7
                            @else
                                24/7 Support
                            @endif
                        </h4>
                        <p class="mb-0" style="color: var(--text-secondary); font-size: 0.95rem;">
                            @if($data['direction'] === 'rtl')
                                خدمة عملاء متاحة على مدار الساعة
                            @else
                                Customer service available around the clock
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card p-4 text-center h-100" style="background: var(--surface-1); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); transition: all 0.3s ease;">
                        <div class="feature-icon mx-auto mb-3" style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-wallet" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                        <h4 class="fw-bold mb-2" style="color: var(--text-primary); font-size: 1.1rem;">
                            @if($data['direction'] === 'rtl')
                                دفع آمن
                            @else
                                Secure Payment
                            @endif
                        </h4>
                        <p class="mb-0" style="color: var(--text-secondary); font-size: 0.95rem;">
                            @if($data['direction'] === 'rtl')
                                طرق دفع متعددة وآمنة تمامًا
                            @else
                                Multiple payment methods, completely secure
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include(isset(getSetting()['slider_style']) ? 'includes.sliders.slider-'.getSetting()['slider_style'] : 'includes.sliders.slider-style1')

    @php($homeTemplates = homePageBuilderJson())
    @if (count($homeTemplates))
        @foreach ($homeTemplates as $template)
            @if (!empty($template['template_postfix']) && empty($template['skip']) && !empty($template['display']))
                @include('sections.home-'.$template['template_postfix'].'-section')
            @endif
        @endforeach
    @else
        @include('sections.home-category-section')
        @include('sections.home-new-arrival-section')
        @include('sections.home-tabs-section')
        @include('sections.home-week-sale-section')
        @include('sections.home-services-section')
    @endif

</div>

<style>
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg) !important;
    }

    .hero-buttons .btn:hover {
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .hero-section-modern {
            padding: 3rem 0;
        }

        .feature-card {
            margin-bottom: 1rem;
        }
    }
</style>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var url = "{{ url('') }}" +
                '/api/client/products?limit=10&getCategory=1&getDetail=1&language_id=' + languageId +
                '&isFeatured=1&currency=' + localStorage.getItem("currency");
            appendTo = 'tab_top_sales';
            fetchProduct(url, appendTo);

            var url = "{{ url('') }}" + '/api/client/products?limit=10&getDetail=1&language_id=' +
                languageId + '&currency=' + localStorage.getItem("currency");
            appendTo = 'tab_special_products';
            fetchProduct(url, appendTo);

            var url = "{{ url('') }}" + '/api/client/products?limit=10&getDetail=1&language_id=' +
                languageId + '&currency=' + localStorage.getItem("currency");
            appendTo = 'tab_most_liked';
            fetchProduct(url, appendTo);

            var url = "{{ url('') }}" +
                '/api/client/products?limit=12&getCategory=1&getDetail=1&language_id=' + languageId +
                '&sortBy=id&sortType=DESC&currency=' + localStorage.getItem("currency");
            appendTo = 'new-arrival';
            fetchProduct(url, appendTo);


            var url = "{{ url('') }}" +
                '/api/client/products?limit=6&getCategory=1&getDetail=1&language_id=' + languageId +
                '&sortBy=id&sortType=DESC&currency=' + localStorage.getItem("currency");
            appendTo = 'weekly-sale';
            fetchProduct(url, appendTo);

            blogNews();
            sliderMedia();
            categorySlider();
            bannerMedia();
            cartSession = $.trim(localStorage.getItem("cartSession"));
            if (cartSession == null || cartSession == 'null') {
                cartSession = '';
            }
            menuCart(cartSession);
        });


        function fetchProduct(url, appendTo) {
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        const templ = document.getElementById("product-card-template");
                        if (!templ) return;

                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);

                            clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');

                            clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i]
                                .product_type);

                            clone.querySelector(".wishlist-icon-2").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".wishlist-icon-2").setAttribute('onclick', 'addWishlist(this)');

                            clone.querySelector(".wishlist-icon-2").setAttribute('data-type', data.data[i]
                                .product_type);

                            clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                            clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".quick-view-icon").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".quick-view-icon").setAttribute('onclick',
                                'quiclViewData(this)');


                            clone.querySelector(".quantity-right-plus").setAttribute('data-field', i);
                            clone.querySelector(".quantity-left-minus").setAttribute('data-field', i);
                            clone.querySelector(".qty-input").setAttribute('id', 'quantity'+i);
                            clone.querySelector(".item-quantity").classList.add('itemqty'+i);

                            var bages = '';
                            if(data.data[i].discount_percentage > 0)
                                bages +='<span class="badge badge-danger">'+data.data[i].discount_percentage+'%</span>';
                            if(data.data[i].is_featured != "0")
                                bages +='<span class="badge badge-success">Featured</span>';
                            if(data.data[i].new != "0")
                                bages +='<span class="badge badge-info ">New</span>';

                            clone.querySelector(".badges").innerHTML = bages;

                            rating = '';
                            if(data.data[i].product_rating == 1){
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            else if(data.data[i].product_rating == 2){
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            else if(data.data[i].product_rating == 3){
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            else if(data.data[i].product_rating == 4){
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            else if(data.data[i].product_rating == 5){
                                rating = '<label class="full fa active" for="star1" title="Awesome - 1 stars"></label><label class="full fa active" for="star_2" title="Awesome - 2 stars"></label><label class="full fa active" for="star_3" title="Awesome - 3 stars"></label><label class="full fa active" for="star_4" title="Awesome - 4 stars"></label><label class="full fa active" for="star_5" title="Awesome - 5 stars"></label>'
                            }
                            else{
                                rating = '<label class="full fa " for="star1" title="Awesome - 1 stars"></label><label class="full fa " for="star_2" title="Awesome - 2 stars"></label><label class="full fa " for="star_3" title="Awesome - 3 stars"></label><label class="full fa " for="star_4" title="Awesome - 4 stars"></label><label class="full fa " for="star_5" title="Awesome - 5 stars"></label>'
                            }

                            clone.querySelector(".display-rating").innerHTML = rating;
                            clone.querySelector(".display-rating1").innerHTML = rating;

                            if (data.data[i].product_gallary != null && data.data[i].product_gallary !=
                                'null' && data.data[i].product_gallary != '') {
                                if (data.data[i].product_gallary.detail != null && data.data[i].product_gallary
                                    .detail != 'null' && data.data[i].product_gallary.detail != '') {
                                    var productImage = data.data[i].product_gallary.detail[1] || data.data[i].product_gallary.detail[0];
                                    if (productImage && productImage.gallary_path) {
                                        clone.querySelector(".product-card-image").setAttribute('src', productImage.gallary_path);
                                    }
                                }
                            }
                            if (data.data[i].detail != null && data.data[i].detail != 'null' && data.data[i]
                                .detail != '') {
                                clone.querySelector(".product-card-image").setAttribute('alt', data.data[i]
                                    .detail[0].title);
                            }
                            if (data.data[i].category != null && data.data[i].category != 'null' && data.data[i]
                                .category != '') {
                                if (data.data[i].category[0].category_detail != null && data.data[i].category[0]
                                    .category_detail != 'null' && data.data[i].category[0].category_detail != ''
                                ) {
                                    if (data.data[i].category[0].category_detail.detail != null && data.data[i]
                                        .category[0].category_detail.detail != 'null' && data.data[i].category[
                                            0].category_detail.detail != '') {
                                        clone.querySelector(".product-card-category").innerHTML = data.data[i]
                                            .category[0].category_detail.detail[0].name;
                                    }
                                }
                            }
                            if (data.data[i].detail != null && data.data[i].detail != 'null' && data.data[i]
                                .detail != '') {
                                clone.querySelector(".product-card-name").innerHTML = data.data[i].detail[0]
                                    .title;
                                clone.querySelector(".product-card-name").setAttribute('href', '/product/' +
                                    data
                                    .data[i].product_id + '/' + data
                                    .data[i].product_slug);
                                var desc = data.data[i].detail[0].desc;
                                clone.querySelector(".product-card-desc").innerHTML = desc.substring(0, 50);
                            }

                            if (data.data[i].product_type == 'simple') {
                                if (data.data[i].product_discount_price == '' || data.data[i]
                                    .product_discount_price == null || data.data[i].product_discount_price ==
                                    'null') {
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i]
                                        .product_price_symbol;
                                } else {
                                    clone.querySelector(".product-card-price").innerHTML =
                                    data.data[i]
                                        .product_discount_price_symbol + '<span>' +data.data[i].product_price_symbol + '</span>';
                                }
                            } else {
                                clone.querySelector(".product-card-price").innerHTML = data.data[i].product_variable_price_symbol;
                            }

                            if (data.data[i].product_type == 'simple') {
                                clone.querySelector(".product-card-link").setAttribute('onclick',
                                    "addToCart(this)");
                                clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i]
                                    .product_id);
                                clone.querySelector(".product-card-link").setAttribute('data-field', i);
                                clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i]
                                    .product_type);
                                clone.querySelector(".product-card-link").innerHTML = 'Add To Cart';

                                clone.querySelector(".add-to-card-bag").setAttribute('onclick', "addToCart(this)");
                                clone.querySelector(".add-to-card-bag").setAttribute('data-id', data.data[i].product_id);
                                clone.querySelector(".add-to-card-bag").setAttribute('data-type', data.data[i].product_type);
                                clone.querySelector(".add-to-card-bag").setAttribute('data-field', i);

                            } else {
                                clone.querySelector('.itemqty'+i).classList.add('d-none');
                                clone.querySelector(".add-to-card-bag").classList.add('d-none');
                                clone.querySelector(".product-card-link").classList.remove('d-g-none');
                                clone.querySelector(".product-card-link").classList.remove('listing-none');
                                clone.querySelector(".product-card-link").innerHTML = 'View Detail';
                                clone.querySelector(".product-card-link").setAttribute('href', '/product/' +
                                    data
                                    .data[i].product_id + '/' + data
                                    .data[i].product_slug);
                            }

                            $("." + appendTo).append(clone);

                            if (appendTo == 'new-arrival' || appendTo == 'weekly-sale') {
                                $(".div-class").addClass('col-12 col-sm-6 col-lg-3');
                            }
                        }

                        if (appendTo != 'new-arrival' && appendTo != 'weekly-sale')
                            getSliderSettings(appendTo);
                    }
                },
                error: function(data) {},
            });
        }

        function fetchFeaturedWeeklyProduct(url, appendTo) {
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        var htmlToRender ="<article><div class='badges'><span class='badge badge-success'>Featured</span></div><div class='detail'>";

                        htmlToRender +='<h5 class="title"><a  href="/product/'+data
                                .data[0].product_id +'/'+data
                                .data[0].product_slug+'">'+data.data[0].detail[0]
                                .title+'</a></h5>';

                        htmlToRender +='<p class="discription">'+data.data[0].detail[0]
                                .desc+'</p>';

                        var featuredDetails = Array.isArray(data.data[0].detail) && data.data[0].detail.length ? data.data[0].detail[0] : null;
                            if (!featuredDetails) return;
                            if (data.data[0].product_type == 'simple') {
                                if (data.data[0].product_discount_price == '' || data.data[0]
                                    .product_discount_price == null || data.data[0].product_discount_price ==
                                    'null') {
                                    htmlToRender +='<div class="price">'+data.data[0]
                                        .product_price_symbol+'</div>';
                                } else {
                                    htmlToRender +='<div class="price">'+data.data[0]
                                        .product_discount_price_symbol + '<span>' +data.data[0].product_price_symbol + '</span></div>';
                                }
                            } else {
                                if (data.data[0].product_combination != null && data.data[0]
                                    .product_combination != 'null' && data.data[0].product_combination != '') {
                                        htmlToRender +='<div class="price">'+data.data[0]
                                        .product_combination[0].product_price_symbol+'</div>';
                                }
                            }

                            htmlToRender +='<div class="pro-sub-buttons"><div class="buttons"><button type="button" class="btn  btn-link " data-id='+data.data[0]
                                .product_id+' onclick="addWishlist(this)" data-type='+data.data[0]
                                .product_type+'><i class="fas fa-heart"></i>Add to Wishlist</button>';

                            htmlToRender +='<button type="button" class="btn btn-link" data-id='+data.data[0]
                                .product_id+' data-type='+data.data[0]
                                .product_type+' onclick="addCompare(this)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Compare"><i class="fas fa-align-right"></i>Add to Compare</button></div></div></div>';
                            htmlToRender +='<picture><div class="product-hover">';
                            if (data.data[0].product_type == 'simple') {
                                htmlToRender +='<button type="button" data-id="'+data.data[0].product_id+'" data-field="'+0+'" data-type="'+data.data[0].product_type+'" onclick="addToCart(this)" class="btn btn-block btn-secondary cart swipe-to-top" >Add to Cart</button>';

                            } else {

                                htmlToRender +='<a href="/product/'+data
                                    .data[0].product_id +'/'+data
                                    .data[0].product_slug+'" onclick="addToCart(this)" class="btn btn-block btn-secondary cart swipe-to-top" >View Detail</a>';

                            }

                            htmlToRender +='</div>';

                             if (data.data[0].product_gallary != null && data.data[0].product_gallary !=
                                'null' && data.data[0].product_gallary != '') {
                                if (data.data[0].product_gallary.detail != null && data.data[0].product_gallary
                                    .detail != 'null' && data.data[0].product_gallary.detail != '') {
                                       var featuredImage = data.data[0].product_gallary.detail[1] || data.data[0].product_gallary.detail[0];
                                       if (featuredImage && featuredImage.gallary_path) {
                                           htmlToRender +='<img class="img-fluid" src="'+featuredImage.gallary_path+'" alt="'+featuredDetails.title+'">';
                                       }

                                }
                            }
                            htmlToRender +='</picture></article>';

                        $('#weekly-sale-first-div').html(htmlToRender);
                    }
                },
                error: function(data) {},
            });
        }

        function blogNews() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/blog_news?getGallaryDetail=1&limit=10&sortBy=id&language_id=' + languageId +
                    '&getDetail=1&getBlogCategory=1&sortType=DESC',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        $(".blog-news-data").html('');
                        const templ = document.getElementById("news-blog-template");
                        if (!templ) return;
                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            clone.querySelector(".news-blog-date").innerHTML = data.data[i].date;
                            clone.querySelector(".news-blog-date").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".blog-url").setAttribute('href', '/blog-detail/' + data.data[i]
                                .slug);
                            clone.querySelector(".read-more-url").setAttribute('href', '/blog-detail/' + data
                                .data[i].slug);

                            if (data.data[i].gallary != null && data.data[i].gallary != 'null' && data.data[i]
                                .gallary != '') {
                                if (data.data[i].gallary.detail != null && $.trim(data.data[i].gallary
                                        .detail) != '' && data.data[i].gallary.detail != 'null') {
                                    if (data.data[i].gallary.detail[1] && data.data[i].gallary.detail[1].gallary_path) {
                                        clone.querySelector(".news-blog-image").setAttribute('src', data.data[i]
                                            .gallary.detail[1].gallary_path);
                                    } else {
                                        if (data.data[i].gallary.detail[0] && data.data[i].gallary.detail[0].gallary_path) {
                                            clone.querySelector(".news-blog-image").setAttribute('src', data.data[i]
                                                .gallary.detail[0].gallary_path);
                                        }
                                    }
                                }
                            }
                            if (data.data[i].detail != null && $.trim(data.data[i].detail) != '' && data.data[i]
                                .detail != 'null') {
                                clone.querySelector(".news-blog-image").setAttribute('alt', data.data[i].detail[
                                    0].name);
                            }
                            if (data.data[i].category != null && data.data[i].category != 'null' && $.trim(data
                                    .data[i].category) != '') {
                                if (data.data[i].category.blog_detail != null && data.data[i].category
                                    .blog_detail != 'null' && data.data[i].category.blog_detail != '') {
                                    clone.querySelector(".news-blog-category").innerHTML = data.data[i].category
                                        .blog_detail[0].name;
                                }
                            }
                            if (data.data[i].detail != null && data.data[i].detail != 'null' && $.trim(data
                                    .data[i].detail) != '') {
                                clone.querySelector(".news-blog-name").innerHTML = data.data[i].detail[0].name;
                                clone.querySelector(".news-blog-desc").innerHTML = data.data[i].detail[0]
                                    .description;
                            }
                            $(".blog-news-data").append(clone);
                        }
                        getSliderSettings("blog-news-data");
                    }
                },
                error: function(data) {},
            });
        }

        function sliderMedia() {
            var sliderType = "{{ getSetting()['slider_style'] ? getSetting()['slider_style'] : '' }}";
            if (sliderType == "style1") {
                sliderType = 1;
            }
            if (sliderType == "style2") {
                sliderType = 2;
            }
            if (sliderType == "style3") {
                sliderType = 3;
            }
            if (sliderType == "style4") {
                sliderType = 4;
            }
            if (sliderType == "style5") {
                sliderType = 5;
            }
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/slider?getLanguage=' + languageId +
                    '&getSliderType=1&getSliderNavigation=1&getSliderGallary=1&limit=5&sortBy=id&sortType=ASC&sliderType=' +
                    sliderType + '&language_id=' + languageId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        $(".slider-navigation-show").html('');
                        const templ = document.getElementById("slider-navigation-template");
                        if (!templ) return;
                        for (i = 0; i < data.data.length; i++) {

                            $("#slider-bullets-" + i).addClass("d-block");
                            $("#slider-bullets-" + i).removeClass('d-none')

                            const clone = templ.content.cloneNode(true);
                            clone.querySelector(".slider-navigation-title").innerHTML = data.data[i]
                                .slider_title;
                            clone.querySelector(".slider-navigation-desc").innerHTML = data.data[i]
                                .slider_description;
                            clone.querySelector(".slider-navigation-url").setAttribute('href', data.data[i]
                                .slider_url);

                            clone.querySelector(".carousel-caption").classList.add(data.data[i]
                                .slider_position);
                            clone.querySelector(".carousel-caption").classList.add(data.data[i]
                                .slider_textcontent);
                            clone.querySelector(".carousel-caption").classList.add(data.data[i]
                                .slider_text);

                            if (i == 0) {
                                clone.querySelector(".slider-navigation-active").classList.add("active");
                            }
                            if (data.data[i].gallary != null && $.trim(data.data[i].gallary) != '') {
                                clone.querySelector(".slider-navigation-image").setAttribute('src',
                                    '/gallary/' + data.data[i].gallary);
                            }
                            $(".slider-navigation-show").append(clone);
                        }
                    }
                },
                error: function(data) {},
            });


            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/constant_banner?getLanguage=' + languageId +
                    '&title=rightsliderbanner&language_id=' + languageId + '&getGallary=1',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length >= 2) {
                        var side_banners = '';
                        side_banners += '<figure class="banner-image imagespace">';
                        side_banners +=
                            '<a class="banner-slider-link1" href=""><img class="img-fluid banner-slider-image1" src="" alt="Banner Image"></a>';
                        side_banners += '</figure>';
                        side_banners += '<figure class="banner-image ">';
                        side_banners +=
                            '<a class="banner-slider-link2" href=""><img class="img-fluid banner-slider-image2" src="" alt="Banner Image"></a>';
                        side_banners += '</figure>';
                        $('.side-banners').html(side_banners);

                        if (data.data[0] && data.data[0].gallary) {
                            $('.banner-slider-link1').attr('href', "{{ url('') }}" + (data.data[0].banner_url || '#'));
                            $('.banner-slider-image1').attr('src', "/gallary/" + data.data[0].gallary.gallary_name);
                        }
                        if (data.data[1] && data.data[1].gallary) {
                            $('.banner-slider-link2').attr('href', "{{ url('') }}" + (data.data[1].banner_url || '#'));
                            $('.banner-slider-image2').attr('src', "/gallary/" + data.data[1].gallary.gallary_name);
                        }

                    }
                },
                error: function(data) {},
            });
        }

        function categorySlider() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/category?getDetail=1&page=1&limit=10&getGallary=1&language_id=' + languageId +
                    '&sortBy=category_name&sortType=DESC',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        $(".category-slider-show").html('');
                        const templ = document.getElementById("category-slider-template");
                        if (!templ) return;
                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            clone.querySelector(".category-slider-url").setAttribute('href', '/shop?category=' +
                                data.data[i].id);
                            clone.querySelector(".category-slider-image").setAttribute('src', data.data[i].icon && data.data[i].icon != 'placeholder'
                                ? '/gallary/' + data.data[i].icon : '{{ asset('assets/images/snuslogo1.png') }}');
                            clone.querySelector(".category-slider-title").innerHTML = data.data[i].name;
                            $(".category-slider-show").append(clone);
                        }
                        getSliderSettings("category-slider-show");
                    }
                },
                error: function(data) {},
            });
        }

        function bannerMedia() {
            var bannerType = "{{ getSetting()['banner_style'] ? getSetting()['banner_style'] : 'style1' }}";
            if (bannerType == "style1") {
                bannerType = 'banner1';
            }
            if (bannerType == "style2" || bannerType == "style3" || bannerType == "style4") {
                bannerType = "banner2";
            }
            if (bannerType == "style5" || bannerType == "style6") {
                bannerType = "banner5";
            }
            if (bannerType == "style7" || bannerType == "style8") {
                bannerType = "banner7";
            }
            if (bannerType == "style9") {
                bannerType = "banner9";
            }
            if (bannerType == "style10" || bannerType == "style11" || bannerType == "style12") {
                bannerType = "banner10";
            }

            if (bannerType == "style13" || bannerType == "style14" || bannerType == "style15") {
                bannerType = "banner13";
            }

            if (bannerType == "style16" || bannerType == "style17") {
                bannerType = "banner16";
            }

            if (bannerType == "style18" || bannerType == "style19") {
                bannerType = "banner18";
            }
            $('.banner_div').css('display', 'none');
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/constant_banner?getLanguage=' + languageId + '&title=' +
                    bannerType +
                    '&language_id=' + languageId + '&getGallary=1',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success' && Array.isArray(data.data) && data.data.length) {
                        if (typeof data.data[0] !== 'undefined') {
                            $('.banner-link1').attr('href', data.data[0]
                                .banner_url);

                            if (data.data[0].gallary && data.data[0].gallary.gallary_name) {
                                $('.banner-image1').attr('src', "/gallary/" + data.data[0].gallary.gallary_name);
                            }
                        }

                        if (typeof data.data[1] !== 'undefined') {
                            $('.banner-link2').attr('href', data.data[1]
                                .banner_url);

                            if (data.data[1].gallary && data.data[1].gallary.gallary_name) {
                                $('.banner-image2').attr('src', "/gallary/" + data.data[1].gallary.gallary_name);
                            }
                        }

                        if (typeof data.data[2] !== 'undefined') {
                            $('.banner-link3').attr('href', data.data[2]
                                .banner_url);
                            $('.banner-image3').attr('src', "/gallary/" + data.data[2].gallary
                                .gallary_name);
                        }

                        if (typeof data.data[3] !== 'undefined') {
                            $('.banner-link4').attr('href', data.data[3]
                                .banner_url);
                            $('.banner-image4').attr('src', "/gallary/" + data.data[3].gallary
                                .gallary_name);
                        }

                        if (typeof data.data[4] !== 'undefined') {

                            $('.banner-link5').attr('href', data.data[4]
                                .banner_url);
                            $('.banner-image5').attr('src', "/gallary/" + data.data[4].gallary
                                .gallary_name);
                        }
                        if (typeof data.data[5] !== 'undefined') {
                            $('.banner-link6').attr('href', data.data[5]
                                .banner_url);
                            $('.banner-image6').attr('src', "/gallary/" + data.data[5].gallary
                                .gallary_name);

                        }
                        $('.banner_div').css('display', 'block');
                    }
                },
                error: function(data) {},
            });
        }

        $(document).on('click', '.quantity-right-plus', function() {
            var row_id = $(this).attr('data-field');
            var quantity = $('#quantity' + row_id).val();
            $('#quantity' + row_id).val(parseInt(quantity) + 1);
        })

        $(document).on('click', '.quantity-left-minus', function() {
            var row_id = $(this).attr('data-field');
            var quantity = $('#quantity' + row_id).val();
            if (quantity > 1)
                $('#quantity' + row_id).val(parseInt(quantity) - 1);
        })
    </script>
@endsection
