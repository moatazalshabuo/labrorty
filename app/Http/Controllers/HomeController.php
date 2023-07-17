<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\GroupTest;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Group;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cusers = count(User::all());
        $cclient = count(Client::all());
        $cgroup = count(GroupTest::all());
        $cfinish = count(ClientGroupTest::where('status',1)->get());
        $cnotfinish = count(ClientGroupTest::where('status',0)->get());
        $client_group = ClientGroupTest::with('group')->with('client')->skip(0)->take(5)->get();

        return view('home',compact('cusers','cclient',"cgroup","cfinish","cnotfinish",'client_group'));
    }
}
