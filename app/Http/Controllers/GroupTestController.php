<?php

namespace App\Http\Controllers;

use App\Models\GroupTest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class GroupTestController extends Controller
{

    public function index()
    {
        $group = GroupTest::all();

        return view('test.cat_index', compact('group'));
    }

    public function create()
    {
        return view('test.cat_create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => "required|unique:group_tests,name"]);
        $post = new GroupTest();
        $post->name = $request->input('name');
        $post->price = $request->input('price');
        $post->save();

        return redirect()->route('group-test.index')->with("success","تم الحفظ بنجاح");
    }

    public function edit($group)
    {
        $group = GroupTest::find($group);
        return view('test.cat_edit', compact('group'));
    }
    public function show(GroupTest $groupTest){

    }
    public function update(Request $request, GroupTest $groupTest)
    {
        $request->validate(['name' => "required|unique:group_tests,name,".$groupTest->id]);
        $groupTest->name = $request->input('name');
        $groupTest->price = $request->input('price');
        $groupTest->save();

        return redirect()->route('group-test.index')->with("success","تم الحفظ بنجاح");
    }

    public function destroy(GroupTest $groupTest)
    {
        $groupTest->delete();

        return redirect()->route('group-test.index');
    }
}
