<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class BrandController extends Controller
{
    //
    use ApiResponse;
    public function index()
    {
        $data = Brand::get();
        return view('admin.Brand.brand',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'text' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            $image_name = '';
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $home_banner = Brand::find($request->id);
                    if ($home_banner) {
                        $oldImage = $home_banner->image;
                        delete_file($oldImage);
                    }
                }
                $image_name = upload_file('brand_image', $request->file('image'));
            } else {
                $image_name = Brand::where('id', $request->id)->value('image');
            }
            Brand::updateOrCreate(
                ['id' => $request->id],
                ['text' => $request->post('text'), 'image' => $image_name]
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
