<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
class AuthController extends Controller
{
    use ApiResponse;
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|unique:users,email',
            'password'=> 'required|string|min:6'
        ]);

        if($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);

        }

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);
        $customer = Role::where('slug','customer')->first();

        $user->roles()->attach($customer);
        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }
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
                        $user = User::where('id',Auth::User()->id)->first();
                        $user['token'] = $user->createToken('API Token')->plainTextToken;
                        return $this->success(
                            ['user' => $user],'successfully login'
                        );
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
    public function updateUser(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            Auth::user()->update(['name'=>$request->name]);
            return $this->success(['user' => $request->user()],'Successfully update');
        }
    }
}
