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
        $YOUR_DOMAIN = url('');
        $this->stripe_checkout_data = [
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN.'/checkout/success'.self::URL_ID,
            'cancel_url' => $YOUR_DOMAIN.'/checkout',
        ];
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
        $this->stripe_checkout_data['customer_email'] = $email;
    }

    public function addCoupon()
    {
        return false;
    }

    public function enablePromoCodes()
    {
        if ($this->coupon_used) {
            return false;
        }

        $this->stripe_checkout_data['allow_promotion_codes'] = true;

        return true;
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
        return $this->stripe->checkout->sessions->retrieve($session_id, []);
    }

    public function isCheckoutCompleted($checkout_session)
    {
        return $checkout_session->status = 'complete' && $checkout_session->payment_status = 'paid';
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
