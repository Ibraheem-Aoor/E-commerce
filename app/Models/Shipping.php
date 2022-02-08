<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname' ,
        'lastname' ,
        'order_id' ,
        'mobile' ,
        'email' ,
        'line_1' ,
        'line_2' ,
        'city',
        'country',
        'zipcode',
        'province' ,
    ];

    
}
