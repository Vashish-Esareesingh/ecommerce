<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Helpers\ShippingHelper;
use App\Models\points\PointsDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Get all groups the user belongs to
        $group_ids = 1;
        if (Auth::check()) {
            $user = Auth::user();
            $group_ids = $user->getGroups();
        }

        // Retireve the products that the user added to their cart
        $cart_data = $user->products()->withPrices()->get();

        // Calculate Subtotal
        $cart_data->calculateSubtotal();

        // Creates Shipping Helper that fetches the shipping and shipping data for certain groups
        $shipping_helper = new ShippingHelper();
        $shipping_data = $shipping_helper->getGroupShippingOptions($group_ids);

        $points_helper = new PointsHelper($cart_data->getSubtotal(), $user->total_points, $group_ids);
        $discount_data = PointsDiscount::all();

        return view('pages.testing.checkoutpage',
            compact('cart_data', 'shipping_data', 'points_helper', 'discount_data')
        );
    }

    public function points(Request $request)
    {
        $message = PointsHelper::exchangePoints($request->points_exchanged);

        return redirect()->route('checkout.index')->with('message', $message);
    }
}
