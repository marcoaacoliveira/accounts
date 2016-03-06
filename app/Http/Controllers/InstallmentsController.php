<?php

namespace App\Http\Controllers;

use App\Installment;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstallmentsController extends Controller
{
    public function pay(Installment $installment){
        if($installment->paid==0){
            $installment->paid=1;
            if($installment->save()){
                $charge = $installment->charge()->first();
                $account = $charge->account()->first();
                if($charge->type==0){
                    $account->total+= $installment->value;
                }else{
                    $account->total-= $installment->value;
                }
                if($account->save()){
                    return redirect('accounts/'.$account->id);
                }
            }
        }
        return redirect('accounts/');
    }
}
