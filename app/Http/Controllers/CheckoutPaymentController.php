<?php

namespace App\Http\Controllers;

use App\Helpers\ShippingHelper;
use App\Helpers\StripeCheckout;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutPaymentController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Create helper objects and instances
        $shipping_helper = new ShippingHelper();
        $stripe_checkout = new StripeCheckout();
        $order = new Order();
        $insert_data = [];
        $completed = false;

        // Retireve the products that the user added to their cart
        $cart_data = $user->products()->withPrices()->get();

        // Calculate Subtotal
        $cart_data->calculateSubtotal();

        // Check to see if the cart is empty
        if ($cart_data->isEmpty()) {
            dd('Cart is empty');
        }
    }
}
