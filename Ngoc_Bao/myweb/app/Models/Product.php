<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'price',
        'quantity',
        'sale_off',
        'is_public',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_orders');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function producthistorys()
    {
        return $this->hasMany(ProductHistory::class);
    }
}
