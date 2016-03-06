<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'type',
        'description',
        'account_id',
    ];


    public function getTotal(){
        $installments = $this->installments();
        $total = 0;
        foreach($installments as $installment){
            if(!$installment->paid) $total+= $installment->value;
        }
        if($this->type==1){
            $total*=-1;
        }
        return $total;
    }
    public function account(){
        return $this->belongsTo('App\Account')->get();
    }

    public function installments(){
        return $this->hasMany('App\Installment')->get();
    }
}
