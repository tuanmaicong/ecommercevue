<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryAttribute;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Category::get();
        return view('admin.Category.category', get_defined_vars());
    }

    public function index_category_attribute()
    {
        $data = CategoryAttribute::with('category', 'attribute')->get();
        $category = Category::get();
        $attribute = Attribute::get();
//        prx($data);
        return view('admin.Category.category_attribute', get_defined_vars());
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'id' => 'required'
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $image_name = '';
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $home_banner = Category::find($request->id);
                    if ($home_banner) {
                        $oldImage = $home_banner->image;
                        delete_file($oldImage);
                    }
                }
                $image_name = upload_file('category_image', $request->file('image'));
            } else {
                $image_name = Category::where('id', $request->id)->value('image');
            }
            if ($request->parent_category_id != 0) {
                Category::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->post('name'),
                        'slug' => $request->post('slug'),
                        'parent_category_id' => $request->post('parent_category_id'),
                        'image' => $image_name,
                    ]
                );
            } else {
                Category::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->post('name'),
                        'slug' => $request->post('slug'),
                        'image' => $image_name,
                    ]
                );
            }
            return $this->success(['reload' => true], 'Successfully update');
        }
    }

    public function store_category_attribute(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'attribute_id' => 'required|exists:attributes,id',
            'id' => 'required'
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            CategoryAttribute::updateOrCreate(
                ['id' => $request->id],
                ['category_id' => $request->category_id,
                    'attribute_id' => $request->attribute_id,
                ]
            );
            return $this->success(['reload' => true], 'Successfully update');
        }
    }
}
