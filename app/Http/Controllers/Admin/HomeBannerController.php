<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;
class HomeBannerController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HomeBanner::get();
        return view('admin.HomeBanner.home_banners',get_defined_vars());
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
        $validation = Validator::make($request->all(),[
            'text' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            $image_name = '';
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $home_banner = HomeBanner::find($request->id);
                    if ($home_banner) {
                        $oldImage = $home_banner->image;
                        delete_file($oldImage);
                    }
                }
                $image_name = upload_file('home_banner', $request->file('image'));
            } else {
                $image_name = HomeBanner::where('id', $request->id)->value('image');
            }
            HomeBanner::updateOrCreate(
                ['id' => $request->id],
                ['text' => $request->post('text'), 'link' => $request->post('link'), 'image' => $image_name]
            );
            return $this->success(['reload'=> true], 'Successfully update');
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
