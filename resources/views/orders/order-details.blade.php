<x-mylayouts.layout-default>



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
                                <img src="http://via.placeholder.com/400x90?text=logo">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #{{ $order->order_no }}</p>
                                <p class="text-muted">Due to: {{ CustomHelper::dateToReadable($order->created_at) }}</p>
                            </div>
                        </div>

                        <hr class="my-5">

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

        <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank"
                href="http://totoprayogo.com">totoprayogo.com</a></div>

    </div>

</x-mylayouts.layout-default>