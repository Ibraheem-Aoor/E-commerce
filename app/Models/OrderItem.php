<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id' , 'product_id' , 'price' , 'quantity' , 'Author'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class , 'order_item_id');
    }
}

