<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'total'
    ];

    public function charges(){
        return $this->hasMany('App\Charge')->get();
    }
}
