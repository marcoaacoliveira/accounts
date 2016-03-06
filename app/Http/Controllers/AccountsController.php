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
        if(Account::create($request->all())){
            session()->flash('success','Criação bem sucedida!');
        } else{
            session()->flash('error','Criação falhou!');
        }

        return redirect('accounts');
    }

    public function edit($id){
        $account = Account::findOrFail($id);
        $charges = $account->charges();
        return view('accounts.edit', compact('account','charges'));
    }

    public function update($id, Requests\AccountsRequest $request){
        $account = Account::findOrFail($id);

        if($account->update($request->all())){
            session()->flash('success','Atualização bem sucedida!');
        } else{
            session()->flash('error','Atualização falhou!');
        }

        return redirect('accounts');
    }

    public function delete(Account $account){
        if($account->delete()) {
            session()->flash('success','Remoção bem sucedida!');
        } else {
            session()->flash('error','Remoção falhou!');
        }
    }
}
