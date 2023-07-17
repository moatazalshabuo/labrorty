<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SendingMassage;
use Illuminate\Http\Request;

class SendingMassageController extends Controller
{
    //
    public function index()
    {
        $message = Client::with('massage')->get()->sortByDesc('massage.id');
        return view('message/messages', compact('message'));
    }

    public function client_message($id)
    {
        SendingMassage::where('client_id', $id)->update([
            'status_user'=>0
        ]);
        $message = SendingMassage::with("client")->where('client_id', $id)->get();
        return view('message/message', compact('message'));
    }
    public function send(Request $request)
    {
        SendingMassage::create([
            'client_id'=>$request->input("client_id"),
            "receiver_id"=>$request->input('receiver_id'),
            "message"=>$request->input("message")
        ]);
        return redirect()->back();
    }
}
