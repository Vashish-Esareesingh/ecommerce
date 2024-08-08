<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TO DO: Add stripe shipping id for different options
        DB::table('shipping')->insert([
            [
                'title' => 'Standard Shipping',
                'price' => 10,
                'days' => 3,
                'stripe_id' => 'shr_1PleC1DzivxN3FOvGPo3J0cB',
                'display_order' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Express Shipping',
                'price' => 0,
                'days' => 1,
                'stripe_id' => 'shr_1PleRvDzivxN3FOvcsY3ykKx',
                'display_order' => 6,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Free Express Shipping',
                'price' => 0,
                'days' => 1,
                'stripe_id' => 'shr_1PleJrDzivxN3FOvLXlImcX5',
                'display_order' => 1,
                'created_at' => Carbon::now(),
            ],
        ]);

        // Assign shipping to groups
        DB::table('shipping_options')->insert([
            [
                'group_id' => 1,
                'shipping_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'shipping_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'group_id' => 4,
                'shipping_id' => 3,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
