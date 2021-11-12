<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
  protected $fillable = [
    'name','email','address','phone','notice','delivery_time'
  ];

  public function purchaseProduct()
  {
    return $this->hasMany(Purchases::class);
  }
}
