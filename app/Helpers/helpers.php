<?php

if (!function_exists('convertToUrduNumerals')) {
    function convertToUrduNumerals($number)
    {
        if (app()->getLocale() !== 'ur') {
            return $number;
        }
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        $urdu    = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        return str_replace($english, $urdu, $number);
    }
}
