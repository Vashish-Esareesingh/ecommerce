<?php

namespace App\Models\reviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewFilter extends Review
{
    use HasFactory;

    protected $table = 'reviews';

    public function scopeFilterReviews($query, $values)
    {
        // Main query
        $query->with('users')

        // Get verified reviews
        ->verified($values['verified'] ?? 'all')

        // Get specific ratings
        ->withRating($values['rating'] ?? 0)

        // Sort
        ->sortBy($values['sort'] ?? 'recent')
        ;
    }

    public function scopeForProduct($query, $id)
    {
        $query->where('product_id', $id);
    }

    public function scopeVerified($query, $verified = 'all')
    {
        if ($verified == 'verified') {
            $query->where('verified', 1);
        }
    }

    public function scopeWithRating($query, $rating = 0)
    {
        if ($rating) {
            $query->where('rating', $rating);
        }
    }

    public function scopeSortBy($query, $value = 'recent')
    {
        switch ($value) {
            case 'oldest':
                $query->reorder('created_at');
                break;
            default:
                $query->reorder('created_at', 'desc');
                break;
        }
    }

    public function scopeAverageOnly($query, $id)
    {
        $average = $query->where('product_id', $id)
        ->where('verified', 1)
        ->avg('rating');

        return round($average, 1);
    }

    public function scopeCalculateRatings($query, $product_id)
    {
        // Reviews per rating
        $ratingCounts = $query
        ->where('product_id', $product_id)
        ->where('verified', 1)
        ->groupBy('rating')
        ->selectRaw('rating, COUNT(*) as count')
        ->pluck('count', 'rating')
        ->all()
        ;
        // Calculate the total number of reviews
        $totalReviews = array_sum($ratingCounts);

        // Calculate the percentage for each rating
        $percentageData = [];
        for ($rating = 1; $rating <= 5; ++$rating) {
            $count = $ratingCounts[$rating] ?? 0;
            $percentage = ($totalReviews > 0) ? ($count / $totalReviews) * 100 : 0;
            $percentageData[$rating] = round($percentage, 2);
        }
        // Sort in descending order
        krsort($percentageData);

        return $percentageData;
    }

    public function scopeTotalReviews($query)
    {
        return $query->count();
    }
}
