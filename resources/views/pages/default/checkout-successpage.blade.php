<x-mylayouts.layout-custom>

    @include("pages.additional.points.points-exchange-success")

    <div class="my-5 container">
        <div class="jumbotron">
            <h1>Your purchase was successful</h1>
            <p><a href="{{ route('store.index') }}">Continue shopping</a></p>
        </div>

    </div>

</x-mylayouts.layout-custom>
