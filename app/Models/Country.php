<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tax'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function order_addresses()
    {
        return $this->hasMany(Order_addresses::class);// relation de 1 à n
    }

    
    public function ranges()
    {
        return $this->belongsToMany(Ranges::class);// relation de n à n
    }

}
