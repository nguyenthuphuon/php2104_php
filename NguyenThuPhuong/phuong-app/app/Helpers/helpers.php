<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('showImg')) {
    function showImg($image)
    {
        if (Str::contains($image, 'http')) {
            return $image;
        }

        return asset('storage/products/' . $image);
    }
}

if (!function_exists('showCartQuantity')) {
    function showCartQuantity()
    {
        $sessionData = session('cart');
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}

if (!function_exists('showLoveQuantity')) {
    function showLoveQuantity()
    {
        $sessionData = session('love');
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}
