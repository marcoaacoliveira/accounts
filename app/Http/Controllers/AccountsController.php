<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;

class AccountsController extends Controller
{
    public function index(){
        $accounts = Account::latest()->get();
        return view('accounts.index',compact('accounts'));
    }

    public function show($id){
        $account = Account::findOrFail($id);
        $charges = $account->charges();
        return view('accounts.show',compact('account','charges'));
    }

    public function create(){
        $account = new Account();
        return view('accounts.create',compact('account'));
    }

    public function store(Requests\AccountsRequest $request){
        Account::create($request->all());
        return redirect('accounts');
    }

    public function edit($id){
        $account = Account::findOrFail($id);
        $charges = $account->charges();
        return view('accounts.edit', compact('account','charges'));
    }

    public function update($id, Requests\AccountsRequest $request){
        $account = Account::findOrFail($id);

        $account->update($request->all());

        return redirect('accounts');
    }

    public function delete(Account $account){
        $account->delete();
    }
}
