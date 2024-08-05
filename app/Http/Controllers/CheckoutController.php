<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingHelper;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
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

        return view('pages.testing.checkoutpage', compact('cart_data', 'shipping_data'));
    }
}
