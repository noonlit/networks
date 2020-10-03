<?php
namespace Util;

class FormatConverter
{
    private static $masculineDigitsMap = [
        0 => 'zero',
        1 => 'unu',
        2 => 'doi',
        3 => 'trei',
        4 => 'patru',
        5 => 'cinci',
        6 => 'sase',
        7 => 'sapte',
        8 => 'opt',
        9 => 'noua'
    ];

    private static $feminineDigitsMap = [
        0 => 'zero',
        1 => 'una',
        2 => 'doua',
        3 => 'trei',
        4 => 'patru',
        5 => 'cinci',
        6 => 'sase',
        7 => 'sapte',
        8 => 'opt',
        9 => 'noua'
    ];

    public static function convertFourDigitsNumberToString(int $number)
    {
        $message = "";

        $iteration = 0;
        while ($iteration < 4) {
            $digit = $number % 10;
            $digitString = $iteration > 0 ? self::$feminineDigitsMap[$digit] : self::$masculineDigitsMap[$digit];

            switch ($iteration) {
                case 0:
                    $message = " si {$digitString}";
                    break;
                case 1:
                    $message = " {$digitString} zeci" . $message;
                    break;
                case 2:
                    $message = " {$digitString} sute" . $message;
                    break;
                case 3:
                    $message = "{$digitString} mii" . $message;
            }
            
            $number = $number / 10;
            $iteration++;
        }

        return $message;
    }
}
