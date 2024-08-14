<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointsDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('points_discounts')->insert([
            [
                'points_needed' => 100,
                'discount_percent' => 10,
                'stripe_discount_id' => 'tbPn0Czq',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 150,
                'discount_percent' => 15,
                'stripe_discount_id' => 'lS4j2B14',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 200,
                'discount_percent' => 20,
                'stripe_discount_id' => 'QS1uocx4',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 250,
                'discount_percent' => 25,
                'stripe_discount_id' => 'twtaG8fv',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
