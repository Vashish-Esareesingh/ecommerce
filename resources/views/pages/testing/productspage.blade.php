<x-mylayouts.layout-default>

    @if ($product_data->isEmpty())
    <x-core.products-empty />

    @else

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">


                        <x-core.products-search />
                        <x-core.products-filter />


                        @foreach ($product_data as $data)

                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                            <div class="product">
                                <a href="{{ $data->getLink() }}" class="img-prod"><img class="img-fluid"
                                        src="{{ $data->getImage() }}" alt="Colorlib Template">
                                    {{-- <span class="status">30%</span> --}}
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a href="{{ $data->getLink() }}">{{ $data->title }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price">
                                                {{-- <span class="mr-2 price-dc">$120.00</span> --}}

                                                <span class="price-sale">${{ $data->getPrice() }}</span>
                                            </p>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right">
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                            class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                    class="ion-ios-add ml-1"></i></span></a>
                                        <a href="{{ $data->getLink() }}" class="buy-now text-center py-2">View<span><i
                                                    class="ion-ios-cart ml-1"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Categories</a></h2>
                        <ul>
                            @foreach ($category_data as $category)
                            <li><a href="{{ route('store.index', ['category' =>$category]) }}">{{ $category }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Sort</a></h2>
                        <ul>
                            <li><a href="{{ route('store.index', ['sort' => 'category']) }}">Category</a></li>
                            <li><a href="{{ route('store.index', ['sort' => 'price_asc']) }}">Price (Low to High)</a>
                            </li>
                            <li><a href="{{ route('store.index', ['sort' => 'price_desc']) }}">Price (High to Low)</a>
                            </li>

                        </ul>
                    </div>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-2"><a href="#">Bags</a></h2>
                        <h2 class="heading mb-2"><a href="#">Accessories</a></h2>
                    </div>
                    <div class="sidebar-box-2">
                        <h2 class="heading mb-4"><a href="#">Shoes</a></h2>
                        <ul>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Addidas</a></li>
                            <li><a href="#">Skechers</a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Coats</a></li>
                            <li><a href="#">Jeans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

</x-mylayouts.layout-default>
