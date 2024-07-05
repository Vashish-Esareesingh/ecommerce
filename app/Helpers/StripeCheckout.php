<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class StripeCheckout
{
    // Stripe api key to authenticate requests
    protected $stripe;
    // A customer's session as they pay
    protected $checkout_session;
    // Data needed for stripe pre-built checkout
    protected $stripe_checkout_data = [];
    // variable to determine if coupon was used or not
    private $coupon_used = false;
    // Add checkout session id to url
    private const URL_ID = '{CHECKOUT_SESSION_ID}';

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    /**
     * ==================== MANDATORY FUNCTIONS TO CREATE CHECKOUT SESSION ===========================.
     */
    public function startCheckoutSession()
    {
        return false;
    }

    public function addProducts(Collection $products_data)
    {
        return false;
    }

    public function createSession()
    {
        return false;
    }

    public function getUrl()
    {
        return $this->checkout_session->url;
    }

    /**
     * ==================== OPTIONAL FUNCTIONS TO ADD TO CHECKOUT SESSION ===========================.
     */
    public function addEmail($email)
    {
        return false;
    }

    public function addCoupon()
    {
        return false;
    }

    public function enablePromoCodes()
    {
        return false;
    }

    public function addShippingOptions(Collection $shipping_data)
    {
        return false;
    }

    /**
     * ====================  FUNCTIONS TO RETREIVE A CHECKOUT SESSION ===========================.
     */
    public function getCheckoutOrder($session_id)
    {
        return false;
    }

    public function isCheckoutCompleted($checkout_session)
    {
        return false;
    }

    /**
     * ====================  FUNCTIONS TO DATA FROM A CHECKOUT SESSION ===========================.
     */
    public function getOrderCreateData()
    {
        return false;
    }

    public function getOrderCompletedData($checkout_session)
    {
        return false;
    }
} // end Class