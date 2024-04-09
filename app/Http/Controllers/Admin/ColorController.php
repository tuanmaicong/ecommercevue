<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = Color::get();
        return view('admin.Color.color',get_defined_vars());
    }
    public function store(Request $request)
    {
//        print_r($request->all());die();
        $validation = Validator::make($request->all(),[
            'text' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            Color::updateOrCreate(
                ['id' => $request->id],
                ['text' => $request->post('text'), 'value' => $request->post('value')],
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
