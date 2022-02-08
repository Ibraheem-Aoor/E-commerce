<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,  'user_id' ,'firstname' ,'lastname',
        'mobile' ,
        'email' ,
        'line_1' ,
        'line_2' ,
        'city',
        'country',
        'zipcode',
        'status' ,
        'province' ,
        'subtotal',
        'discount',
        'tax',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }


}
