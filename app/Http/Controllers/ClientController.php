<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client/index',compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone'=>['unique:clients,phone']
        ],[
            "phone.unique"=>"رقم الهاتف موجود مسبقا"
        ]);

        $client =  Client::create([
            'name'=>$request->name,
            "phone"=>$request->phone,
            "address"=>$request->address,
            'password'=>$request->password
        ]);
        return redirect()->back()->with(["success"=>"تم الحفظ بنجاح","client_id"=>$client->id]);
    }

    public function show(Client $client)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client/edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'phone'=>['unique:clients,phone,'.$client->id]
        ],[
            "phone.unique"=>"رقم الهاتف موجود مسبقا"
        ]);
        $client->update([
            'name'=>$request->name,
            "phone"=>$request->phone,
            "address"=>$request->address,
            'password'=>$request->password
        ]);
        return redirect()->route('client.index')->with("success","تم الحفظ بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
       $client->delete();
       return redirect()->back()->with("success","تم الحذف بنجاح");
    }
}
