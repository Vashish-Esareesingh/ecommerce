<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    // Specifies to Laravel the correct name of the table
    protected $table = 'order_products';

    // Specifies to Laravel permission to insert into these columns
    protected $fillable = [
        'order_id',
        'product_id',
        'user_id',
        'price',
        'quantity',
    ];
}
