<x-mylayouts.layout-custom>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Store<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </main><!-- End .main -->

    @if ($product_data->isEmpty())
    <x-core.products-empty />

    @else

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-info">
                        <br>
                        Showing
                        <span>{{ $product_data->firstItem() }} - {{ $product_data->lastItem() }} of {{
                            $product_data->total() }}</span>
                        Products
                    </div><!-- End .toolbox-info -->
                </div><!-- End .toolbox -->





                {{-- Product --}}
                <div class="products mb-3">
                    <div class="row justify-content-center">
                        <x-core.products-search />
                        <x-core.products-filter />
                        @foreach ($product_data as $data)


                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product product-7 text-center">
                                <figure class="product-media">

                                    <a href="{{ $data->getLink() }}">
                                        <img src="{{ $data->getImage() }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Add to
                                                wishlist</span></a>

                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                            class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $data->category }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ $data->getLink() }}">{{ $data->title }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        ${{ $data->getPrice() }}
                                    </div><!-- End .product-price -->

                                    @include('pages.additional.reviews.reviews-stars-custom')

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach


                    </div><!-- End .row -->
                </div><!-- End .products -->

                {{-- Page Navigation --}}
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($product_data->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link page-link-prev" href="{{ $product_data->previousPageUrl() }}"
                                aria-label="Previous">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($product_data->links()->elements[0] as $page => $url)
                        @if ($page == $product_data->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($product_data->hasMorePages())
                        <li class="page-item">
                            <a class="page-link page-link-next" href="{{ $product_data->nextPageUrl() }}"
                                aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <a class="page-link page-link-next" href="#" aria-label="Next" tabindex="-1"
                                aria-disabled="true">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div><!-- End .col-lg-9 -->


            {{-- Side bar Products Filter --}}
            <aside class="col-lg-3 order-lg-first">
                {{-- Categories --}}
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-collapsible">
                        <br>
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                aria-controls="widget-1">
                                Category
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">

                                        <ul>
                                            @foreach ($category_data as $category)
                                            <li><a href="{{ route('store.index', ['category' =>$category]) }}">{{
                                                    $category }}</a></li>
                                            @endforeach
                                        </ul>

                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    {{-- Sort by --}}
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                aria-controls="widget-2">
                                Sort By
                            </a>
                        </h3><!-- End .widget-title -->
                        
                        <div class="collapse show" id="widget-2">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">

                                        <ul>
                                            <li><a
                                                    href="{{ route('store.index', ['sort' => 'category']) }}">Category</a>
                                            </li>
                                            <li><a href="{{ route('store.index', ['sort' => 'price_asc']) }}">Price
                                                    (Low to High)</a>
                                            </li>
                                            <li><a href="{{ route('store.index', ['sort' => 'price_desc']) }}">Price
                                                    (High to Low)</a>
                                            </li>

                                        </ul>

                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
    @endif

</x-mylayouts.layout-custom>
