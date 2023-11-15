<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\GroupTest;
use App\Models\SendingMassage;
use App\Models\TestClient;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class MobileController extends Controller
{

    public function index()
    {

        if (!session()->get('client')) {

            return view("phone/index");
        }
        $tests = ClientGroupTest::with('group')->where('client_id', session()->get('client')->id)->orderBy('id', "DESC")->get();
        return view('phone/tests', compact('tests'));
    }

    public function login(Request $request)
    {

        $client = Client::where(['phone'=>$request->input('phone'),'password'=>$request->input('password')])->get();

        if (count($client) > 0) {
            session()->put("client", $client[0]);
            return redirect()->route("mobile");
        } else {
            return redirect()->back()->with("error", "رقم الهاتف غير موجود الرجاء التاكد من الرقم");
        }
    }

    public function test($id)
    {
        if (!session()->get('client')) {

            return view("phone/index");
        }
        $test = TestClient::with("client_tests")->where('cgt_id', $id)->get();
        $group = GroupTest::find($test[0]->client_tests->group_id);
        return view('phone/test', compact('test','group'));
    }

    public function Chating()
    {
        if (!session()->get('client')) {

            return view("phone/index");
        }
        $message = SendingMassage::where('client_id', session()->get('client')->id)->update([
            'status_client'=>0
        ]);
        $message = SendingMassage::with("client")->where('client_id', session()->get('client')->id)->get();
        return view('phone/chating', compact('message'));
    }

    public function leave()
    {
        session()->forget('client');
        return redirect()->route("mobile");
    }
}
