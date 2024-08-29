<x-mylayouts.layout-custom>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Product Details<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </main><!-- End .main -->



    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <div class="col-lg-6 mb-5 ftco-animate">
                                    <a href="{{ $data->getImage() }}" class="image-popup"><img
                                            src="{{ $data->getImage() }}" class="img-fluid" alt="PawtoPaw">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <br>
                            <h1 class="product-title">{{ $data->title }}</h1>

                            @include('pages.additional.reviews.reviews-stars-custom')

                            <div class="product-price">
                                ${{ $data->getPrice() }}
                            </div>

                            <div class="product-content">
                                <p>{{ $data->short_description }}</p>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" name="quantity" class="form-control" value="1"
                                            min="1" max="100" required>
                                        <input type="hidden" name="product_id" value="{{ $data->id }}">
                                    </div>
                                </div>

                                <div class="product-details-action">
                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                Wishlist</span></a>
                                    </div>
                                </div>
                            </form>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{ $data->category }}</a>
                                </div>

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                            role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>{{ $data->full_description }}

                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->


                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            {{-- Recommended Products --}}
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{

                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
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

                @foreach ($recommendedProducts as $data)
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
            </div>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    </main><!-- End .main -->

    @include('pages.additional.reviews.reviews-preview')


<br>

</x-mylayouts.layout-custom>
