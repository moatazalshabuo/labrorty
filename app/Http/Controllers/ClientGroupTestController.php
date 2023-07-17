<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\GroupTest;
use App\Models\LabTest;
use App\Models\TestClient;
use Illuminate\Http\Request;

class ClientGroupTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        $group = GroupTest::all();
        $client_group = ClientGroupTest::all();
        return view("sales_test/index", compact('client', "group", "client_group"));
    }
    public function finish()
    {
        // echo "2";
        $client_group = ClientGroupTest::with('group')->with('client')->where('status', 1)->get();
        return view("sales_test/finish", compact("client_group"));
    }
    public function notfinish()
    {
        // echo "2";
        $client_group = ClientGroupTest::with('group')->with('client')->where('status', 0)->get();
        return view("sales_test/notfinish", compact("client_group"));
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

        foreach ($request->input('group_id') as $val) {
            $tests = LabTest::where('group_id', $val)->get();
            if(isset($tests[0])){
            $cgt = ClientGroupTest::create([
                'client_id' => $request->input('client_id'),
                "group_id" => $val
            ]);

            foreach ($tests as $value) {
                TestClient::create([
                    'cgt_id' => $cgt->id,
                    "test_id" => $value->id
                ]);
            }
        }
        }
        return redirect()->back()->with("success","تم الحفظ بنجاح");
    }

    /**
     * Display the specified resource.
     */

    public function show($clientGroupTest)
    {
        //    print_r($clientGroupTest);die();
        $test = TestClient::with('client_tests')->where("cgt_id", $clientGroupTest)->get();
        return view("sales_test/result", compact('test', 'clientGroupTest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientGroupTest $clientGroupTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientGroupTest $clientGroupTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clientGroupTest)
    {
        ClientGroupTest::find($clientGroupTest)->delete();
        return redirect()->back();
    }

    public function update_result(Request $request, $cgt)
    {
        $test = TestClient::where('cgt_id', $cgt)->get();

        foreach ($test as $val) {
            TestClient::find($val->id)->update([
                "result"=>$request->input("$val->id"),
            ]);
        }
        ClientGroupTest::find($cgt)->update([
            'status'=>1
        ]);
        return redirect()->route('cl.finish');
    }
    public function cancel($cgt){
        $test = TestClient::where('cgt_id', $cgt)->get();

        foreach ($test as $val) {
            TestClient::find($val->id)->update([
                "result"=>0,
            ]);
        }
        ClientGroupTest::find($cgt)->update([
            'status'=>0
        ]);
        return redirect()->route('cl.notfinish');
    }
}
