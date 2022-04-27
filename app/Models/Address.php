<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'country_id',
        'phone'
        ];

    public function country()
    {
        return $this->belongsTo(Country::class); // relation de 1 à 1
    }

    
}
