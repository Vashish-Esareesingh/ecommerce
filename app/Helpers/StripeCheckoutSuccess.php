<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;

class StripeCheckoutSuccess
{
    protected $stripe;

    public $points_gained = 0;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    public function updateCheckoutOrder($id)
    {
        // Assign the passed $id to $session_id, which represents the Stripe session ID
        $session_id = $id;

        // Create a new instance of the StripeCheckout class
        $stripe_helper = new StripeCheckout();

        // Find the first order in the database where the payment_id matches the $session_id
        $order = Order::where('payment_id', $session_id)->first();
        if (!$order) {
            return false;
        }

        // Get stripe checkout session
        $session = $stripe_helper->getCheckoutOrder($session_id);

        $user_id = $order->user_id;
        $user = User::findOrFail($user_id);
        $group_ids = $user->getGroups();

        // Get data needed from Stripe checkout to update order in database
        $order_completed_data = $stripe_helper->getOrderCompletedData($session);

        $this->points_gained = $order->points_gained;

        // Check if Order is unpaid to start the process in finalizing an order
        if ($order && $order->payment_status == 'unpaid') {
            // Get selected shipping from database
            $shipping_id = Shipping::where('stripe_id', $order_completed_data['stripe_id'])
            ->get()
            ->first()
            ->id;

            // Update order data in the database
            $order->subtotal = $order_completed_data['subtotal'];
            $order->total = $order_completed_data['total'];
            $order->shipping_id = $shipping_id;

            // Finalize order
            $order->payment_status = 'paid';

            if (!$this->updatePoints($order, $user)) {
                return false;
            }
            $order->save();

            // Remove items from the cart
            $user->products()->detach();
        }

        return true;
    }

    public function updatePoints(Order $order, User $user)
    {
        if ($order->points_exchanged > $user->total_points) {
            return false;
        }

        $this->points_gained = $order->points_gained;
        User::subtractPoints($user->id, $order->points_exchanged)->get();
        User::addPoints($user->id, $order->points_gained)->get();
        PointsHelper::clearPointsSession();

        return true;
    }
}
