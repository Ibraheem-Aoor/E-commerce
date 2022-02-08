<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['mode'  , 'status' , 'order_id' , 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}