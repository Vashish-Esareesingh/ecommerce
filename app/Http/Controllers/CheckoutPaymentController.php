<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Helpers\ShippingHelper;
use App\Helpers\StripeCheckout;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutPaymentController extends Controller
{
    public function index($payment)
    {
        // to see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

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

        // Determine payment used
        switch ($payment) {
            case 'stripe':
                $stripe_checkout->startCheckoutSession();
                $stripe_checkout->addEmail($user->email);
                $stripe_checkout->addProducts($cart_data);
                $stripe_checkout->addPointsCoupon();
                $stripe_checkout->enablePromoCodes();
                $shipping_data = $shipping_helper->getGroupShippingOptions();
                $stripe_checkout->addShippingOptions($shipping_data);
                $stripe_checkout->createSession();
                $insert_data = $stripe_checkout->getOrderCreateData();
                $completed = true;

                break;

            default:
                // code...
                $insert_data = [
                    'payment_provider' => 'testing',
                    'payment_id' => 'testing',
                ];
                $completed = true;
                break;
        }

        // If payment was completed
        if (!$completed && empty($insert_data)) {
            dd('Payment incomplete or checkout data is missing');
        }

        // Insert values into the order table
        $order->user_id = $user->id;
        // Find code to generate random and unique characters
        $order->order_no = 'ORD-2024-'.Str::random(6);
        $order->subtotal = $cart_data->getSubtotal();
        $order->total = $cart_data->getTotal();
        $order->payment_provider = $insert_data['payment_provider'];
        $order->payment_id = $insert_data['payment_id'];
        $order->shipping_id = 1;
        $order->shipping_address_id = 1;
        $order->billing_address_id = 1;
        $order->payment_status = 'unpaid';

        // Store Points for an Order
        $points_helper = new PointsHelper($cart_data->getSubtotal(), $user->total_points, $group_ids);
        $order->points_exchanged = $points_helper->getPointsExhanged();
        $order->points_discount_applied = $points_helper->getPointsDiscountApplied();
        $order->points_gained = $points_helper->getPointsGained();

        $order->save();

        $records = [];
        // Loop through cart to make a record based on the data found to insert into OrderProduct table
        foreach ($cart_data as $data) {
            array_push($records,
                new OrderProduct([
                    'product_id' => $data->id,
                    'user_id' => $user->id,
                    'price' => $data->getPrice(),
                    'quantity' => $data->pivot->quantity,
                ]));
        }

        $order->order_products()->saveMany($records);

        if ($payment == 'stripe') {
            return redirect($stripe_checkout->getUrl());
        }

        dd('Payment successful during test');
    }
}
