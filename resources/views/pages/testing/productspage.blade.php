<x-mylayouts.layout-default>


    <h1>Store Page</h1>

    <div class="row">

        @foreach ($product_data as $data)

        <div class="col-md-4">
            <img style="width: 200px; height: 200px" src="storage/images/products/iphone1-1.jpg" alt="image">
            <p>{{ $data ->title }}</p>
            <p>${{ $data->price }}</p>
            <p><a href="#">View</a></p>
        </div>
        @endforeach

    </div>


</x-mylayouts.layout-default>