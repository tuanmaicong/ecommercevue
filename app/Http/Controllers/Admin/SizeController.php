<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class SizeController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = Size::get();
        return view('admin.Size.size',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'size' => 'required|string|max:255',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            Size::updateOrCreate(
                ['id' => $request->id],
                ['size' => $request->post('size')],
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
