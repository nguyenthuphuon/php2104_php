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
