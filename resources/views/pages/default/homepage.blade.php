<x-mylayouts.layout-custom>



    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Home<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </main><!-- End .main -->

    <main class="main">
        {{-- Categories --}}
        <div class="container categories pt-6">
            <h2 class="title-lg text-center mb-4">Shop by Category</h2><!-- End .title-lg text-center -->

            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="{{ asset('template_default/images/dog.jpeg') }}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Dogs</a></h3><!-- End .banner-title -->
                            <a href="http://localhost:8000/store?category=Dogs"
                                class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-6 col-lg-4 order-lg-last">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="{{ asset('template_default/images/cat.jpg') }}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Cats</a></h3><!-- End .banner-title -->
                            <a href="http://localhost:8000/store?category=Cats"
                                class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-sm-12 col-lg-4 banners-sm">
                    <div class="row">
                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="{{ asset('template_default/images/bird.webp') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Birds</a></h3>
                                <!-- End .banner-title -->
                                <a href="http://localhost:8000/store?category=Birds"
                                    class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="{{ asset('template_default/images/fish.png') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Fish</a></h3>
                                <!-- End .banner-title -->
                                <a href="http://localhost:8000/store?category=Fish"
                                    class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div>
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        {{-- Recently Added/New Arrivals --}}
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">New Arrivals</h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>

                        {{-- Product --}}

                        @foreach ($recent as $data)
                        <div class="product product-7 text-center">

                            <figure class="product-media">

                                <a href="{{ $data->getLink() }}">
                                    <img src="{{ $data->getImage() }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                        class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $data->category }}
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ $data->getLink() }}">{{ $data->title }}</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">$
                                    {{ $data->getPrice() }}
                                </div><!-- End .product-price -->

                                @include('pages.additional.reviews.reviews-stars-custom')

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        {{-- Random Products--}}
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">We thought you'd like</h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>

                        {{-- Product --}}

                        @foreach ($random as $data)
                        <div class="product product-7 text-center">

                            <figure class="product-media">

                                <a href="{{ $data->getLink() }}">
                                    <img src="{{ $data->getImage() }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                        class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $data->category }}
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ $data->getLink() }}">{{ $data->title }}</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">$
                                    {{ $data->getPrice() }}
                                </div><!-- End .product-price -->

                                @include('pages.additional.reviews.reviews-stars-custom')

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        {{-- Best Sellers--}}
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">Best Sellers</h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>

                        {{-- Product --}}

                        @foreach ($best_selling_products as $data)
                        <div class="product product-7 text-center">

                            <figure class="product-media">

                                <a href="{{ $data->getLink() }}">
                                    <img src="{{ $data->getImage() }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                        class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $data->category }}
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ $data->getLink() }}">{{ $data->title }}</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">$
                                    {{ $data->getPrice() }}
                                </div><!-- End .product-price -->

                                @include('pages.additional.reviews.reviews-stars-custom')

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        {{-- Hero Body --}}
        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                            <p>Shipping as cheap as $10</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                            <p>Free 100% money back guarantee</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                            <p>24/7 Chatbot</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->

        </div><!-- End .container -->

    </main><!-- End .main -->


</x-mylayouts.layout-custom>
