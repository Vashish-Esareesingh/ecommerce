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
        // TODO: Add stripe shipping id for express
        DB::table('shipping')->insert([
            [
                'title' => 'Shipping Option 1',
                'price' => 10,
                'days' => 3,
                'stripe_id' => 'YOUR_SHIPPING_ID',
                'display_order' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'SHIPPING OPTION 2',
                'price' => 0,
                'days' => 1,
                'stripe_id' => 'YOUR_SHIPPING_ID',
                'display_order' => 6,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'SHIPPING OPTION 3',
                'price' => 0,
                'days' => 1,
                'stripe_id' => 'YOUR_SHIPPING_ID',
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
