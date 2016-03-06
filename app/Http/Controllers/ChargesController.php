<?php

namespace App\Http\Controllers;

use App\Account;
use App\Charge;
use App\Installment;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChargesController extends Controller
{
    public function create($account){
        $charge = new Charge();
        return view('charges.create', compact('charge','account'));
    }

    public function store($account, Requests\ChargesRequest $request){
        $request = $request->all();
        $charge = new Charge();
        $charge->account_id = (int)$account;
        $charge->description = $request['description'];
        $charge->type = $request['type'];
        if($charge->save()){
            foreach($request['installments'] as $value){
                Installment::create(["value"=>$value,"charge_id"=>$charge->id, "paid"=>0]);
            }
        }

        return redirect("accounts/".$account);
    }

    public function show($account, Charge $charge){
        $installments = $charge->installments()->toArray();
        return view('charges.show', compact('charge','installments'));
    }

    public function delete(Charge $charge){
        $charge->delete();
    }
}
