<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopp extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'address',
            'holder',
            'email',
            'bit',
            'iban',
            'bank',
            'bank_address',
            'phone',
            'facebook',
            'home',
            'home_infos',
            'home_shipping',
            'invoice',
            'card',
            'transfer',
            'check',
            'mandat'
    ];
    public $timestamps = false;
}
