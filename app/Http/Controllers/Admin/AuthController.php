<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth;

class AuthController extends Controller
{
    public function createAdmin()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123');
        $user->save();

        //lấy ra id bản ghi có vai trò admin
        $admin = Role::query()->where('slug','admin')->first();

        //user gọi đến phương thức roles trong mode User dùng attach để gắn bản ghi vào user vừa được tạo
        $user->roles()->attach($admin);
    }
}
