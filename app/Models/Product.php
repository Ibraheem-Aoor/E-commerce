<?php

namespace App\Models;

use Carbon\Traits\Serialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'name' , 'slug' , 'short_description' ,
        'description' , 'regular_price' , 'sale_price' ,
        'SKU' , 'stock_status' , 'featured' ,
        'quantity' , 'image' ,'images' ,
        'sub_category_id' ,
    ];
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    protected $hidden = ['short_description' , 'slug' , 'featured' , 'category_id'];
}
