<?php

namespace App\Http\Controllers;

use App\Models\GroupTest;
use App\Models\LabTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $LabTests = LabTest::with('group')->get();

        return view('lab_tests.index', compact('LabTests'));
    }

    public function create()
    {
        $group = GroupTest::all();
        return view('lab_tests.create',compact("group"));
    }

    public function store(Request $request)
    {
        $LabTest = new LabTest;
        $LabTest->name = $request->input('name');
        $LabTest->descripe = $request->input('descripe');
        $LabTest->group_id = $request->input('group_id');
        $LabTest->unit = $request->input('unit');
        $LabTest->normal_form = $request->input('normal_form');
        $LabTest->normal_to = $request->input('normal_to');
        $LabTest->save();

        return redirect()->route('lab_tests.create')->with("success","تم الحفظ بنجاح");;
    }

    public function edit(LabTest $LabTest)
    {
        $group = GroupTest::all();
        return view('lab_tests.edit', compact('LabTest',"group"));
    }

    public function update(Request $request, LabTest $LabTest)
    {
        $LabTest->name = $request->input('name');
        $LabTest->descripe = $request->input('descripe');
        $LabTest->group_id = $request->input('group_id');
        $LabTest->unit = $request->input('unit');
        $LabTest->normal_form = $request->input('normal_form');
        $LabTest->normal_to = $request->input('normal_to');
        $LabTest->save();

        return redirect()->route('lab_tests.index');
    }

    public function destroy(LabTest $LabTest)
    {
        $LabTest->delete();

        return redirect()->route('lab_tests.index');
    }
    public function show(LabTest $LabTest)
    {
        //
    }

}
