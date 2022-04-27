<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference' ,
        'shipping' ,
        'total' ,
        'tax' ,
        'payment' ,
        'purchase_order',
        'pick' ,
        'invoice_id' ,
        'invoice_number' ,
        'state_id' ,
        'user_id'

        
    ];

    public function adresses()
    {
        return $this->hasMany(Order_addresses::class);
    }
    public function products()
    {
        return $this->hasMany(Order_products::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_infos()
    {
        return $this->hasOne(Payement::class);
    }



    
    public function getTotalOrderAttribute()
    {
        return $this->total + $this->shipping;
    }
    public function getTvaAttribute()
    {
        return $this->tax > 0 ? $this->total / (1 + $this->tax) * $this->tax : 0;
    }


    public function getPaymentTextAttribute($value)
    {
        $texts = [
            'carte' => 'Carte bancaire',
            'virement' => 'Virement',
            'cheque' => 'Chèque',
            'mandat' => 'Mandat administratif',
        ];
        return $texts[$this->payment];
    }


    public function getHtAttribute()
    {
        return $this->total / (1 + $this->tax);
    }
   
}
