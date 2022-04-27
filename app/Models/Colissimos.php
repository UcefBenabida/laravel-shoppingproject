<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colissimos extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'country_id',
        'range_id'
    ];
}
