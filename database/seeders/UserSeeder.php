<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>"المسؤول"]);
        Role::create(['name'=>"الاداري"]);
        Role::create(['name'=>'الفني']);

        $user = User::create([
            'id'=>1,
            'name'=>"admin",
            "password"=>Hash::make(12345678),
            'email'=>"admin@admin.com",
            'username'=>"admin"
        ]);
        $user->assignRole('المسؤول');
    }
}
