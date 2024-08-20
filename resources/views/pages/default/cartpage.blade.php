<x-mylayouts.layout-custom>

    @if($cart_data->isEmpty())

    <x-core.cart-empty />

    @else

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            @foreach ($cart_data as $data)

                            <tbody>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ $data->getImage() }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $data->title }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">${{ CustomHelper::formatPrice($data->getPrice()) }}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number"
                                                value="{{ $data->pivot->quantity }}" min="1" max="100">
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">${{ CustomHelper::formatPrice($data->getCartQuantityPrice())
                                        }}</td>


                                    <td class="remove-col">
                                        <form action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>

                                </tr>


                            </tbody>
                            @endforeach
                        </table><!-- End .table table-cart -->


                    </div><!-- End .col-lg-9 -->


                    {{-- Totals --}}
                    <aside class="col-lg-3">

                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{ CustomHelper::formatPrice($cart_data->getSubtotal()) }}</td>
                                    </tr><!-- End .summary-subtotal -->


                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{ CustomHelper::formatPrice($cart_data->getSubtotal()) }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{ route('checkout.index') }}"
                                class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ route('store.index') }}"
                            class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
    </main><!-- End .main -->
    @endif


</x-mylayouts.layout-custom>