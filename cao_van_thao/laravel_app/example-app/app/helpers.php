<?php
use Illuminate\Support\Str;

	if (!function_exists('showImageProduct')) {
		function showImageProduct($image)
		{
			if (Str::contains($image, 'http')) {
				return $image;
			}
			return asset('storage/products/' . $image); 
		}
	}