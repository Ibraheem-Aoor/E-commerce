<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageCategory extends Model
{
    use HasFactory;
    protected $table = 'home_page_categories';
    protected $fillable = ['category_id' ,  'number_of_products'];
    protected $hidden = ['crated_at' , 'updated_at'];
}
