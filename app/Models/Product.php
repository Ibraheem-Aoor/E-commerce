<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'slug' , 'short_description' ,
        'description' , 'regular_price' , 'sale_price' ,
        'SKU' , 'stock_status' , 'featured' ,
        'quantity' , 'image' ,'images' ,
        'sub_category_id' ,'weight' , 'color' , 'dimensions'
    ];
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    protected $hidden = ['short_description' , 'slug' , 'featured' , 'category_id'];

    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasManyThrough(Review::class , OrderItem::class);
    }
}
