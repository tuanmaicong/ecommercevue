<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttrImage;
use App\Models\Size;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    use ApiResponse;
    public function index()
    {
        $data = Product::get();
        return view('admin.Product.product', get_defined_vars());
    }

    public function view_product($id=0)
    {
        if ($id == 0){
            //new product
            $data = new Product();
            $product_attr = new ProductAttr();
            $product_attr_image = new ProductAttrImage();
            $colors = Color::get();
            $cat = Category::get();
            $tax = Tax::get();
            $sizes = Size::get();
            $brand = Brand::get();
        }else{
            //update product
            $data['id'] = $id;
            $validation = Validator::make($data, [
                'id' => 'required|exists:products,id'
            ]);
            if ($validation->fails()){
                return redirect()->back();
            }else{
                $data = Product::where('id',$id)->first();
            }
        }
//        prx(get_defined_vars());
        return view('admin.Product.manage_product',get_defined_vars());
//        prx(get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
            'item_code' => 'required|string|max:255',
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
    public function get_attribute(Request $request)
    {
        $category_id = $request->category_id;
        $data = CategoryAttribute::where('category_id',$category_id)->with('attribute','values')->get();
        return $this->success(['data' => $data], 'Successfully update');
    }
}
