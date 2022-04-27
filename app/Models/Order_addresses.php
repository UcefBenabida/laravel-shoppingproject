<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'facturation',
        'professionnal',
        'civility', 
        'name',
        'firstname',
        'company',
        'address',
        'addressbis', 
        'bp',
        'postal',
        'city',
        'phone',
        'phone',
        'order_id',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
