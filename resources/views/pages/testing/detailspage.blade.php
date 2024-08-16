<x-mylayouts.layout-default>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ $data->getImage() }}" class="image-popup"><img src="{{ $data->getImage() }}"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $data->title }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span
                                    style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <p class="price"><span>${{ $data->getPrice() }}</span></p>


                    <div>{{ $data->short_description }}</div>
                    <div>{{ $data->full_description }}</div>

                    {{-- <p>A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.
                    </p> --}}


                    <form class="form-group" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mt-4">

                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn details-quantity-control"
                                        id="details-minus" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn details-quantity-control"
                                        id="details-plus" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <p style="color: #000;">80 piece available</p>
                            </div>
                        </div>


                        <input type="hidden" name="product_id" value="{{ $data->id }}">

                        <button type="submit" class="btn btn-black py-3 px-5">Add to Cart</button>
                    </form>



                    {{-- <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p> --}}



                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Ralated Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg"
                                alt="Colorlib Template">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">$120.00</span><span
                                            class="price-sale">$80.00</span></p>
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
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/product-2.jpg"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
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
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/product-3.jpg"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
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
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">Floral Jackquard Pullover</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
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
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-mylayouts.layout-default>