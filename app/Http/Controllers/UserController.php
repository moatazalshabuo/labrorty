<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view("users/index", compact("users"));
    }

    public function create(): View
    {
        $permission = Role::all();
        return view("users/create", compact('permission'));
    }

    public function show($id){

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "permission" => ['required']
        ], [
            'name.required' =>      "يرجى ادخال الاسم",
            "username.required" =>     "يرجى ادخال اسم المستخدم",
            "password.required" =>   "يجب ادخال كلمة المرور ",
            "permission.required" => "يجب اختيار الصلاحيات"
        ]);

        $user = User::create([
            "name" => $request->name,
            "username" => $request->username,
            "password" => Hash::make($request->password),
        ]);


        $user->assignRole($request->permission);

        return redirect()->back()->with("Add", "تم اضافة المستخدم بنجاح");
    }

    public function edit($id)
    {
        $user = User::with('roles')->where('id', $id)->get()[0];
        $ourpermission = '';

        foreach ($user->roles as $val) {
            $ourpermission = $val->name;
        }

        $permission = Role::all();
        return view("users/edit", compact("user", "permission", "ourpermission"));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $roule = [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $id],
            "permission" => ['required']
        ];
        if (isset($request->password))
            $roule["password"] = ['string', 'min:8', 'confirmed'];
        $request->validate($roule, [
            'name.required' =>      "يرجى ادخال الاسم",
            "username.required" =>     "يرجى ادخال اسم المستخدم",
            "permission.required" => "يجب اختيار الصلاحيات"
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        if (isset($request->password)) {
            $user = Hash::make($request->password);
        }
        $user->update();
        $permission = $user->getRoleNames();
        foreach ($permission as $val) {
            $user->removeRole($val);
        }

        $user->assignRole($request->permission);

        return redirect()->route("users.index")->with('edit', "تم التعديل بنجاح");
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return redirect()->route("users.index")->with("delete", "تم الحذف بنجاح");
    }
}
