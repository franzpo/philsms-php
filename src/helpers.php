<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($number)
    {
        $number = preg_replace('/\D/', '', $number); // Remove non-numeric characters

        if (substr($number, 0, 2) === '63' && strlen($number) === 12) {
            return $number; // Already in the correct format
        }
        if (strlen($number) === 11 && $number[0] === '0') {
            return '63' . substr($number, 1); // Convert "09123456789" → "639123456789"
        }
        if (strlen($number) === 10 && $number[0] === '9') {
            return '63' . $number; // Convert "9123456789" → "639123456789"
        }

        return false; // Invalid format
    }
}
