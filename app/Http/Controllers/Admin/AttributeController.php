<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    use ApiResponse;
    public function index_attribute_name()
    {
        $data = Attribute::get();
        return view('admin.Attribute.attribute',get_defined_vars());
    }
    public function store_attribute_name(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            Attribute::updateOrCreate(
                ['id' => $request->id],
                ['name' => $request->post('name'), 'slug' => $request->post('slug')],
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
    public function index_attribute_value()
    {
        $data = AttributeValue::with('singleAttribute')->get();
//        echo "<pre>";print_r($data);die();
        $attribute = Attribute::get();
        return view('admin.Attribute.attribute_value',get_defined_vars());
    }
    public function store_attribute_value(Request $request)
    {
//        print_r($request->all());die();
        $validation = Validator::make($request->all(),[
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            AttributeValue::updateOrCreate(
                ['id' => $request->id],
                ['attribute_id' => $request->post('attribute_id'), 'value' => $request->post('value')],
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
