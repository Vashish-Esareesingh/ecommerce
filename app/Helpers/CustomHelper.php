<?php

namespace App\Helpers;

use Carbon\Carbon;

class CustomHelper
{
    /**
     * Show price with 2 decimal place, $400.00.
     *
     * @param [type] $price to format
     *
     * @return void
     */
    public static function formatPrice($price)
    {
        return number_format($price, 2, '.', '');
    }

    /**
     * Date as text, April 30th, 2024.
     * Mainly used.
     *
     * @param [type] $date to format
     *
     * @return Carbon date formatted
     */
    public static function dateToReadable($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)
            ->format('F jS, Y');
    }

    /**
     * Used for admin dashboard, Tue 30 Apr, 2024.
     *
     * @param [type] $dateString
     *
     * @return void
     */
    public static function formatDateToReadable($dateString)
    {
        $date = date_create($dateString);

        return date_format($date, 'D d M, Y');
    }

    /**
     * Used for admin dashboard, Tuesday, April 30th 2024
     * // CHANGE: NEW FUNCTION TO REPLACE formatDateToReadable.
     *
     * @param [type] $dateString
     *
     * @return void
     */
    public static function dateToReadableFull($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)
            ->format('l, F jS Y');
    }

    /**
     * Used for admin dashboard, Tue, Apr 30th 2024
     * // CHANGE: NEW FUNCTION TO REPLACE formatDateToReadable.
     *
     * @param [type] $dateString
     *
     * @return void
     */
    public static function dateToReadableFullAbbr($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)
        ->format('D, M jS Y');
    }

    /**
     * Get price after a discount is applied.
     *
     * @param [decimal] $total
     * @param [int] $discount
     *
     * @return void
     */
    public static function calculateDiscountedPrice($total, $discount)
    {
        // Easy
        // $value = $total - (($discount / 100) * $total);

        $value = $total - bcmul(bcdiv($discount, 100, 10), $total, 10);

        return number_format($value, 2, '.', '');
    }

    // What is x percent of a value
    public static function calculatePercentOf($total, $percent)
    {
        return number_format(bcmul(bcdiv($percent, 100, 10), $total, 10), 2);
    }

    public static function toCapitalize($text)
    {
        return ucwords($text);
    }
}
