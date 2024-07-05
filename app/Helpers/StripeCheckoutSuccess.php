<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;

class StripeCheckoutSuccess
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    public function updateCheckoutOrder($id)
    {
       return false;
    }
}
