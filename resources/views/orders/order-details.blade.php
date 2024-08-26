<x-mylayouts.layout-custom>

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Order Details<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </main><!-- End .main -->

    <div class="container my-5">
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('order-history.index') }}">Return</a>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6">
                                <img src="{{ asset('template_default/images/paworder.png') }}" width="200" height="70">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #{{ $order->order_no }}</p>
                                <p class="text-muted">Due to: {{ CustomHelper::dateToReadable($order->created_at) }}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Customer Information</p>
                                <p class="mb-1">{{ $user->name }}</p>
                                <p>{{ $address->line_1 }}</p>
                                <p class="mb-1">{{ $address->line_2 }}</p>
                                <p class="mb-1">{{ $address->contact }}</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>

                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Credit Card</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> {{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Image</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Title</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @php( $count = 1)
                                        @foreach ($product_data as $product)


                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td><img style="width: 80px; height: 80px" src="{{ $product->getImage() }}"
                                                    alt="Image"></td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>${{ CustomHelper::formatPrice($product->pivot->price) }}</td>
                                            <td>${{ CustomHelper::formatPrice($product->pivot->price *
                                                $product->pivot->quantity) }}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right ">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light text-light">${{
                                    CustomHelper::formatPrice($order->total) }}</div>
                            </div>

                            <div class="py-3 px-5 text-right ">
                                <div class="mb-2">Discount</div>
                                <div class="h2 font-weight-light text-light">10%</div>
                            </div>

                            <div class="py-3 px-5 text-right ">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-light text-light">${{
                                    CustomHelper::formatPrice($order->subtotal) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-light mt-5 mb-5 text-center small"> : <a class="text-light" target="_blank" href=""></a></div>

    </div>

</x-mylayouts.layout-custom>
