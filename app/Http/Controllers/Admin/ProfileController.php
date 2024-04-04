<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class ProfileController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        echo $request->file('image');die();
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'phone' => 'numeric|min:10',
            'address' => 'required|string|max:255',
            'twitter_link' => 'string|max:255',
            'insta_link' => 'string|max:255',
            'fb_link' => 'required|string|max:255',
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            if ($request->hasFile('image')) {
                $oldFile = Auth::user()->image;
                Auth::user()->image = upload_file('avatar', $request->file('image'));
                Auth::user()->save();
                delete_file($oldFile);
            }
                $user = User::updateOrCreate(
                ['id' => Auth::user()->id],
                ['name' => $request->name,
                    'address' => $request->address,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'twitter_link' => $request->twitter_link,
                    'insta_link' => $request->insta_link,
                    'fb_link' => $request->fb_link,
                    ]
            );
            return $this->success([],'Successfully update');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
