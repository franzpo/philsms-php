<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($number)
    {
        return match (strlen($number)) {
            10 => "63" . $number,
            11 => "63" . substr($number, 2),
            13 => substr($number, 1),
            default => $number,
        };
    }
}
