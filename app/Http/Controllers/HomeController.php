<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroubDay;
use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\GroupTest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function get_charts(){

                    $get = ClientGroupTest::select(DB::raw('min(client_group_tests.day) as day')
                    ,DB::raw('COUNT(client_group_tests.id) AS total_analysis'),
                    DB::raw('min(group_tests.name) as name')
                    )
                    ->join("group_tests", "group_tests.id", "=", "client_group_tests.group_id")
                    ->whereBetween('client_group_tests.day',[date("Y-m-1"),date(('Y-m-t'))])
                    ->groupBy(['name'])->get();
                //    foreach($get as $val){
                //     echo $val->day.' '.$val->name .' '.$val->total_analysis.'<br>';
                //    }
                return response()->json($get);
    }

    public function get_g_charts(){

        $get = ClientGroupTest::select(DB::raw('min(client_group_tests.day) as day')
        ,DB::raw('sum(group_tests.price) AS total_analysis'),
        DB::raw('min(group_tests.name) as name')
        )
        ->join("group_tests", "group_tests.id", "=", "client_group_tests.group_id")
        ->whereBetween('client_group_tests.day',[date("Y-m-1"),date(('Y-m-t'))])
        ->groupBy(['name'])->get();
    //    foreach($get as $val){
    //     echo $val->day.' '.$val->name .' '.$val->total_analysis.'<br>';
    //    }
    return response()->json($get);
}

    public function charts(){
        return view('lab_tests/Charts');
    }
}

