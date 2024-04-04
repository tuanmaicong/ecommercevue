<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required|string'
        ]);
        if ($validation->fails()){
            return response()->json([
                'status' => 400,
                'message' => $validation->errors()->first()
            ]);
        }else{
            $cred = \request(['email','password']);
            if (Auth::attempt($cred,false)){
                if (Auth::check()){
                    $user = Auth::user();
                    if ($user->hasRole('admin')){
                        return response()->json([
                            'status' => 200,
                            'message' => 'Admin user',
                            'url' => 'admin/dashboard'
                        ]);
                    }else{
                        return response()->json([
                            'status' => 200,
                            'message' => 'Non user'
                        ]);
                    }
                }
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Wrong'
                ]);
            }
        }
    }
}
