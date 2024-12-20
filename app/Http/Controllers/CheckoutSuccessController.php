<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Helpers\StripeCheckoutSuccess;

class CheckoutSuccessController extends Controller
{
    public function index($id)
    {
        $stripe_checkout = new StripeCheckoutSuccess();

        // Attempt to update the checkout order with the provided ID
        $successful = $stripe_checkout->updateCheckoutOrder($id);

        PointsHelper::clearPointsSession();
        $points_gained = $stripe_checkout->points_gained;

        // Check if the update was unsuccessful
        if (!$successful) {
            // If unsuccessful, abort the request and return a 404 error page
            abort(404);
        }

        // If successful, send user to the checkout success page
        return view('pages.default.checkout-successpage', compact('points_gained'));
    }
}
