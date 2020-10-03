<?php
namespace Util;

class Math
{
    public static function calculateSumOfDigits(int $number)
    {
        $sum = 0;

        while ($number > 0) {
            $sum += ($number % 10);
            $number = $number / 10;
        }

        return $sum;
    }
}