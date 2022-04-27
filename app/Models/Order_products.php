<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'total_price_gross' ,
        'quantity' ,
        'total_price_gross' 

    ];
}
