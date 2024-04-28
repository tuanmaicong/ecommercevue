<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfomationShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
class InfoShopController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = InfomationShop::get();
        return view('admin.InfoShop.shop',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'logo' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'phone_number' => 'numeric|min:10',
            'email' => 'required|string|email',
            'address' => 'required|string|max:255',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            $image_name = '';
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $home_banner = InfomationShop::find($request->id);
                    if ($home_banner) {
                        $oldImage = $home_banner->image;
                        delete_file($oldImage);
                    }
                }
                $image_name = upload_file('brand_image', $request->file('image'));
            } else {
                $image_name = InfomationShop::where('id', $request->id)->value('image');
            }
            InfomationShop::updateOrCreate(
                ['id' => $request->id],
                ['name' => $request->name,'phone_number' => $request->phone_number,'email' => $request->email,'address' => $request->address, 'logo' => $image_name]
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
