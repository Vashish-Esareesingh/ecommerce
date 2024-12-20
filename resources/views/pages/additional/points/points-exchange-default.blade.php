<div class="card p-3 my-3">

    <h3>Loyalty Points</h3>
    <p>Available Points: {{ $points_helper->getUserPoints() }}</p>
    <p>Points multiplier: x{{ $points_helper->getPoints()}}
        ({{
        $points_helper->displayUserGroup('name')
        }})
    </p>
    <p>Points to be gained: {{ $points_helper->getPointsGained() }}</p>
    <p>Discount Applied: {{ $points_helper->getPointsDiscountApplied() }}%</p>
    @if($points_helper->isDiscountApplied())
    <p>Discounted Total:

        ${{ CustomHelper::calculateDiscountedPrice(
        $cart_data->getSubtotal(),
        $points_helper->getPointsDiscountApplied()
        ) }}


    </p>
    @endif

    <form action="{{ route('checkout.points') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="points_exchanged">
                <th>Exchange Loyalty Points</th>
            </label>
            <select class="form-control" id="points_exchanged" name="points_exchanged">
                <option>Select your discount</option>

                @foreach ($discount_data as $data)
                <option value="{{ $data->points_needed }}">{{ $data->points_needed }} points for {{
                    $data->discount_percent
                    }}% OFF</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary btn-block" type="submit">Exchange</button>
    </form>


</div>
