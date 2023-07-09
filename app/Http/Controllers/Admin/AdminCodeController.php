<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SubscriptionCode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.gestion.code.index')->with([
            'datas'=> DB::table('subscription_codes')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.gestion.code.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'email'=>['email','required'],
            'plan'=>['string','required'],
            'code'=>['string','required','min:2'],
        ]);
        $data['is_validated']=true;

        SubscriptionCode::create($data);
        session()->flash('created','created');
        return redirect()->route('admin.code.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscriptionCode $code)
    {
        return view('pages.admin.gestion.code.edit')->with([
            'data'=>$code
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubscriptionCode $code)
    {
        $data=$request->validate([
            'email'=>['email','required'],
            'plan'=>['string','required'],
            'code'=>['string','required','min:2'],
            'is_validated'=>['boolean','required'],
        ]);
        SubscriptionCode::where('id',$code->id)->update($data);
        session()->flash('updated','updated');
        return redirect()->route('admin.code.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}