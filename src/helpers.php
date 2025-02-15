<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($number)
    {
        $number = preg_replace('/\D/', '', $number);

        if (substr($number, 0, 2) === '63' && strlen($number) === 12) {
            return '0' . substr($number, 2);
        }
        if (strlen($number) === 10 && $number[0] === '9') {
            return '0' . $number;
        }
        if (strlen($number) === 11 && $number[0] === '0') {
            return $number;
        }
        return false;
    }
}
