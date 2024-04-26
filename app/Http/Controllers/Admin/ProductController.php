<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttribute;
use App\Models\ProductAttrImage;
use App\Models\Sale;
use App\Models\Size;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Product::get();
        return view('admin.Product.product', get_defined_vars());
    }

    public function view_product($id = 0)
    {
        $colors = Color::get();
        $cat = Category::get();
        $tax = Tax::get();
        $sizes = Size::get();
        $brand = Brand::get();
        $sales = Sale::get();
        if ($id == 0) {
            //new product
            $data = new Product();
            $product_attr = new ProductAttr();
            $product_attr_image = new ProductAttrImage();
        } else {
            //update product
            $data['id'] = $id;
            $validation = Validator::make($data, [
                'id' => 'required|exists:products,id'
            ]);
            if ($validation->fails()) {
                return redirect()->back();
            } else {
                $data = Product::where('id', $id)->with('attribute','product_attributes')->first();
//                prx($data->toArray());
            }
        }
        return view('admin.Product.manage_product', get_defined_vars());
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); //make this block observable and process start
            $validation = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'image' => 'mimes:jpg,png,jpeg,gif|max:5012',
                'item_code' => 'required|string|max:255',
                'keywords' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
            ]);
            if ($validation->fails()) {
                return $this->error($validation->errors()->first(), 400, []);
            } else {
                $image_name = '';
                if ($request->hasFile('image')) {
                    if ($request->id > 0) {
                        $product = Product::find($request->id);
                        if ($product) {
                            $oldImage = $product->image;
                            delete_file($oldImage);
                        }
                    }
                    $image_name = upload_file('product_images', $request->file('image'));
                } else {
                    $image_name = Product::where('id', $request->id)->value('image');
                }
                //Product
                $productID = Product::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->name,
                        'slug' => $request->slug,
                        'item_code' => $request->item_code,
                        'keywords' => $request->keywords,
                        'sale_id' => $request->sale_id,
                        'category_id' => $request->category_id,
                        'brand_id' => $request->brand_id,
                        'tax_id' => $request->tax_id,
                        'description' => $request->description,
                        'image' => $image_name,
                    ]
                );
                $productID = $productID->id;
                //Product Attribute
                $dataProductAttr =ProductAttribute::where('product_id', $productID)->get();
                if ($dataProductAttr){
                    ProductAttribute::where('product_id', $productID)->delete();
                }
                if ($request->attribute_id != ''){
                    foreach ($request->attribute_id as $key => $value) {
                        ProductAttribute::updateOrCreate(
                            ['product_id' => $productID,
                                'category_id' => $request->category_id,
                                'attribute_value_id' => $value,
                            ],
                            ['product_id' => $productID,
                                'category_id' => $request->category_id,
                                'attribute_value_id' => $value,
                            ]
                        );
                    }
                }
                //Product Attrs
                foreach ($request->sku as $key => $value) {
                    $productAttrId = ProductAttr::updateOrCreate(
                        ['id' => $request->productAttrId[$key]],
                        ['product_id' => $productID,
                            'color_id' => $request->color_id[$key],
                            'size_id' => $request->size_id[$key],
                            'sku' => $request->sku[$key],
                            'mrp' => $request->mrp[$key],
                            'qty' => $request->qty[$key],
                            'price' => $request->price[$key],
                            'length' => $request->length[$key],
                            'width' => $request->width[$key],
                            'height' => $request->height[$key],
                            'weight' => $request->weight[$key],
                        ]
                    );
                    //Product Attr Image
                    $productAttrId = $productAttrId->id;
                    $imageVal = 'attr_image_'.$request->imageValue[$key];
                    $imageId = 0;
                    if (isset($request->$imageVal)){
                        foreach ($request->$imageVal as $key => $image) {
                                $imageId = $key;
                                $productAttrImage = ProductAttrImage::query()->where('id', $imageId)->first();
                                if ($productAttrImage){
                                    $oldImage = $productAttrImage->image;
                                    delete_file($oldImage);
                                }
                            $image_name = upload_file('product_attr_images', $image);
                            ProductAttrImage::updateOrCreate(
                                ['id' => $imageId], // Cập nhật theo ID ảnh
                                [
                                    'product_id' => $productID,
                                    'product_attr_id' => $productAttrId,
                                    'image' => $image_name
                                ]
                            );
                        }
                    }

                }
                DB::commit(); //process end
                echo "No Error occurs";
                return redirect()->back();
//                return $this->success(['reload' => true], 'Successfully update');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack(); // if error occurs rollback all database queries
            echo $th;
        }
    }

    public function get_attribute(Request $request)
    {
        $category_id = $request->category_id;
        $data = CategoryAttribute::where('category_id', $category_id)->with('attribute', 'values')->get();
        return $this->success(['data' => $data], 'Successfully update');
    }
    public function removeAttrId(Request $request)
    {
        $type = $request->type;
//        prx($request->id);
        DB::table($type)->where('id',$request->id)->delete();
        return $this->success(['status' => 'Success'], 'Successfully update');
    }
}
