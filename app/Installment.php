<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = [
        'charge_id',
        'value',
        'paid',
    ];

    public function charge(){
        return $this->belongsTo('App\Charge')->get();
    }
}
