<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class ProductCollectionHelper extends Collection
{
    private $subtotal = 0;
    private $total = 0;

    public function calculateSubtotal()
    {
        return false;
    }

    public function calculateTotal()
    {
        return false;
    }

    public function getSubtotal()
    {
        return false;
    }

    public function getTotal()
    {
        return false;
    }
}
