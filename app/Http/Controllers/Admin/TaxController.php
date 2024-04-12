<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class TaxController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = Tax::get();
        return view('admin.Tax.tax',get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'text' => 'required',
            'id' => 'required'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            Tax::updateOrCreate(
                ['id' => $request->id],
                ['text' => $request->post('text')]
            );
            return $this->success(['reload'=> true], 'Successfully update');
        }
    }
}
