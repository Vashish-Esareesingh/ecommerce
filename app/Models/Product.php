<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array<int, \Illuminate\Database\Eloquent\Model> $models
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function newCollection(array $models = []): Collection
    {
        return new ProductCollectionHelper($models);
    }

    /**
     * Get all of the order_products for the Product.
     */
    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }

    public function scopeWithPrices(Builder $query, array $group_ids = [1])
    {
        $query->where('products.id', '>', 0);
    }

    public function scopeSingleProduct(Builder $query, int $id)
    {
        $query->where('products.id', $id);
    }

    public function getImage()
    {
        return asset('storage'.$this->image_path.$this->image_name);
    }

    public function getStockPrice(): float
    {
        return $this->price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscountPercent()
    {
        return $this->price;
    }

    public function getCartQuantityPrice()
    {
        return $this->getPrice() * $this->pivot->quantity;
    }
}
