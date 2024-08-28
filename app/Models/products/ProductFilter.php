<?php

namespace App\Models\products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFilter extends Product
{
    use HasFactory;

    // Explicitly define the table associated with this model
    protected $table = 'products';

    /**
     * Applies the filter scope to the query.
     *
     * This function allows filtering based on various criteria.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query  the current query instance
     * @param array                                 $values An associative array of filter values
     *
     * @return void
     */
    public function scopeFilter($query, array $values)
    {
        // Apply the searchTitle scope with the 'search' value from the array, if it exists
        $query->searchTitle($values['search'] ?? '')
        ->priceGreaterThan($values['greater_than'] ?? 0)
        ->priceLowerThan($values['lower_than'] ?? 0)
        ->categoryFor($values['category'] ?? '')
        ->sortBy($values['sort'] ?? 'id')
        ;
    }

    /**
     * Applies a search filter on the 'title' column.
     *
     * This function adds a condition to the query to filter products
     * based on whether their titles contain the search keyword.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query the current query instance
     * @param string|null                           $value the search keyword to filter titles by
     *
     * @return void
     */
    public function scopeSearchTitle($query, $value)
    {
        // If a search value is provided, apply a 'LIKE' filter on the 'title' column
        if (!empty($value)) {
            $query->where('title', 'LIKE', '%'.$value.'%');
        }
    }

    /**
     * Undocumented function.
     *
     * @param [type] $query
     * @param [type] $value
     *
     * @return void
     */
    public function scopePriceGreaterThan($query, $value)
    {
        if (!empty($value)) {
            $query->where('price', '>=', $value);
        }
    }

    /**
     * Undocumented function.
     *
     * @param [type] $query
     * @param [type] $value
     *
     * @return void
     */
    public function scopePriceLowerThan($query, $value)
    {
        if (!empty($value)) {
            $query->where('price', '<=', $value);
        }
    }

    /**
     * By Category function.
     *
     * @param [type] $query
     * @param [type] $value
     *
     * @return void
     */
    public function scopeCategoryFor($query, $value)
    {
        if (!empty($value)) {
            $query->where('category', $value);
        }
    }

    /**
     * Sort By function.
     *
     * @param [type] $query
     * @param [type] $value
     *
     * @return void
     */
    public function scopeSortBy($query, $value = 'id')
    {
        switch ($value) {
            case 'title_asc':
                $query->reorder('title');
                break;

            case 'price_asc':
                $query->reorder('price');
                break;

            case 'price_desc':
                $query->reorder('price', 'desc');
                break;

            case 'category':
                $query->reorder('category');
                break;

            default:
                $query->reorder('id');
                break;
        }
    }
}
