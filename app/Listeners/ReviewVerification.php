<?php

namespace App\Listeners;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Queue\InteractsWithQueue;

class ReviewVerification
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // get review
        $review = $event->review;

        // check if product was purchased
        $product_purchased = OrderProduct::where('product_id', $review->product_id)
        ->where('user_id', $review->user_id)
        ->where(function (Builder $query) use ($review) {
            $query->orWhere('created_at', '<', $review->created_at)
            ->orWhere('created_at', '<', $review->updated_at);
        })
        ->first();

        if ($product_purchased) {
            $review->verified = 1;
            $review->save();
        }
    }
}
