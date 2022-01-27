<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    /* Note:
    Algorithm used to calculate the rating of the product:
    numbOf5stars*numOfVotesFor5Stars + numberOf3Stars*numOfVotesFor3Stars ... / total number of votes for all stars
    */
    use HasFactory;
    protected $table = 'rates';
    protected $fillable = ['product_id' , 'stars'];
}
