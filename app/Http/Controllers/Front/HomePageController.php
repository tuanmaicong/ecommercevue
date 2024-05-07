<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttribute;
use App\Models\Size;
use App\Models\TempUser;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\error;

class HomePageController extends Controller
{
    use ApiResponse;
    public function getCategoriesData()
    {
        $data['categories'] = Category::with('subcategories')->where('parent_category_id',null)->get();
        return $this->success(['data'=> $data], 'Successfully data fetched');
    }
    public function getHomeData()
    {
        $data = [];
        $data['banner'] = HomeBanner::get();
        $data['categories'] = Category::with('product:id,category_id,name,slug,image,item_code')->get();
        $data['brands'] = Brand::get();
        $data['products'] = Product::select('id', 'category_id', 'image', 'name', 'slug', 'item_code', 'sale_id')
            ->with('product_attributes', 'sale')
            ->whereHas('category', function($query) {
                $query->where('slug', 'new-product');
            })
            ->get();
        $data['product_sale'] = Product::select('id', 'category_id', 'image', 'name', 'slug', 'item_code', 'sale_id')
            ->with('product_attributes', 'sale')
            ->whereHas('category', function($query) {
                $query->where('slug', 'product-sale');
            })
            ->get();
        $data['product_top_sale'] = Product::select('id', 'category_id', 'image', 'name', 'slug', 'item_code', 'sale_id')
            ->with('product_attributes', 'sale')
            ->whereHas('category', function($query) {
                $query->where('slug', 'product-sale')->orderBy('id','desc');
            })
            ->get();
        return $this->success(['data'=> $data], 'Successfully data fetched');
    }

    public function getCategoryData(Request $request)
    {
        $slug = $request->slug;
        $attribute = $request->attribute;
        $lowPrice = $request->lowPrice;
        $highPrice = $request->highPrice;
        $brand = $request->brand;
        $size = $request->size;
        $color = $request->color;
        $category = Category::where('slug',$slug)->first();
        if (isset($category->id)){
//            $products = Product::where('category_id',$category->id)->with('product_attributes','sale')
//                ->select('id','name','slug','image','item_code','sale_id')->paginate(10);
            $products = $this->getFilterProduct($category->id,$size,$color,$brand,$attribute,$lowPrice,$highPrice);
            $data = Category::where('slug',$slug)->with('product:id,category_id,name,slug,image,item_code,sale_id')->get();
            if ($category->parent_category_id == null || $category->parent_category_id == ''){
                $cat = Category::where('parent_category_id',$category->id)->get();
            }else{
                $cat = Category::where('parent_category_id',$category->parent_category_id)->where('id','!=',$category->id)->get();
            }
        }else{
            $category = Category::first();
            $products = Product::where('category_id',$category->id)->with('product_attributes','sale')
                ->select('id','name','slug','image','item_code','sale_id')->paginate(10);
            $data = Category::where('slug',$slug)->with('product:id,category_id,name,slug,image,item_code,sale_id')->get();
            if ($category->parent_category_id == null || $category->parent_category_id == ''){
                $cat = Category::where('parent_category_id',$category->id)->get();
            }else{
                $cat = Category::where('parent_category_id',$category->parent_category_id)->where('id','!=',$category->id)->get();
            }
        }
        $lowPrice = ProductAttr::orderBy('price','asc')->pluck('price')->first();
        $highPrice = ProductAttr::orderBy('price','desc')->pluck('price')->first();
        $brands = Brand::get();
        $sizes = Size::get();
        $colors = Color::get();
        $attributes = CategoryAttribute::where('category_id',$category->id)->with('attribute')->get();
        return $this->success(['data'=> get_defined_vars()], 'Successfully data fetched');
    }

    public function changeSlug()
    {
        $data = Product::get();
        foreach ($data as $item){
            $result = Product::find($item->id);
            $result->slug = replaceStr($result->slug);
            $result->save();
        }
    }
    public function getFilterProduct($category_id,$size=[],$color=[],$brand=[],$attribute=[],$lowPrice,$highPrice){
        $products = Product::where('category_id',$category_id)->get();
        if (sizeof($brand) > 0){
            $products = Product::whereIn('brand_id',$brand)->whereIn('id',$products->pluck('id'))->get();
        }
        if (sizeof($attribute) > 0){
            $products = ProductAttribute::whereIn('attribute_value_id',$attribute)->whereIn('product_id',$products->pluck('id'))->get();
            $products = Product::whereIn('id',$products->pluck('product_id'))->get();
//            prx($products);
        }
        $data = ProductAttr::whereIn('product_id',$products->pluck('id'))->get();
        if (sizeof($size) > 0){
            $data = ProductAttr::whereIn('size_id',$size)->whereIn('id',$data->pluck('id'))->get();
        }
        if (sizeof($color) > 0){
            $data = ProductAttr::whereIn('color_id',$color)->whereIn('id',$data->pluck('id'))->get();
        }
        if ($lowPrice != '' && $lowPrice != null && $highPrice != ''){
            $data = ProductAttr::whereBetween('price',[$lowPrice,$highPrice])->whereIn('id',$data->pluck('id'))->get();
        }
        $data = Product::whereIn('id',$data->pluck('product_id'))->with('product_attributes','sale')->select('id','name','slug','image','item_code','sale_id')->paginate(10);
        return $data;
    }
    function getUserData(Request $request)
    {
        prx($request->all());
        $user = $request->user();
        if ($user){
            echo 123;
        }
        prx($user);
        $token = $request->token;
        $checkUser = TempUser::where('token',$token)->first();
        if (isset($checkUser->id)){
            //token exist in Db
            $data['user_type'] = $checkUser->user_type;
            $data['token'] = $checkUser->token;
            if (checkTokenExpiryInMunites($checkUser->updated_at,60)){
                //token has expire
                $token = generateRandomString();
                $checkUser->updated_at = date('Y-m-d h:i:s a',time());
                $checkUser->save();
                $data['token'] = $token;
            }else{
                //token not expire
            }
        }else{
            //token not exist in Db
            $user_id = rand(1111,9999);
            $token = generateRandomString();
            $time = date('Y-m-d h:i:s a',time());
            TempUser::create([
                'user_id' => $user_id,
                'token' => $token,
                'created_at' => $time,
                'updated_at' => $time
            ]);
            $data['user_type'] = 2;
            $data['token'] = $token;
        }
        return $this->success(['data'=> $data], 'Successfully data fetched');
    }
    public function getCartData(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'token' => 'required|exists:temp_users,token'
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            $userToken = TempUser::where('token',$request->token)->first();
            $data      = Cart::where('user_id',$userToken->user_id)->with('products')->get();
            return $this->success(['data'=> $data], 'Successfully data fetched');
        }
    }
    public function addToCart(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'token' => 'required|exists:temp_users,token',
            'product_id' => 'required|exists:products,id',
            'product_attr_id' => 'required|exists:product_attrs,id',
            'qty' => 'required|numeric|min:0|not_in:0',
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        } else {
            $user = TempUser::where('token',$request->token)->first();

            $cartItem = Cart::where([
                'user_id' => $user->user_id,
                'product_id' => $request->product_id,
                'product_attr_id' => $request->product_attr_id
            ])->first();

            if ($cartItem) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên 1 đơn vị
                $cartItem->qty += $request->qty;
                $cartItem->save();
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
                Cart::create([
                    'user_id' => $user->user_id,
                    'product_id' => $request->product_id,
                    'product_attr_id' => $request->product_attr_id,
                    'qty' => $request->qty,
                    'user_type' => $user->user_type
                ]);
            }
            return $this->success(['data'=> ''], 'Successfully data fetched');
        }
    }
    public function removeCartData(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'token' => 'required|exists:temp_users,token',
            'product_id' => 'required|exists:products,id',
            'product_attr_id' => 'required|exists:product_attrs,id',
            'qty' => 'required|numeric|min:0|not_in:0',
        ]);
        if ($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
        }else{
            $user = TempUser::where('token',$request->token)->first();
            $cart = Cart::where(['user_id'=>$user->user_id,'product_id'=>$request->product_id,
                'product_attr_id' => $request->product_attr_id])->first();
            if (isset($cart->id)){
                $qty = $request->qty;
                if ($cart->qty == $qty){
                    $cart->delete();
                }else if ($cart->qty > $qty){
                    $cart->qty -= $qty;
                    $cart->save();
                }else{
                    $cart->delete();
                }
            }
            return $this->success(['data'=> ''], 'Successfully data fetched');
        }
    }
    public function getProductData($item_code = '',$slug = '')
    {
        $product = Product::where(['item_code' => $item_code,'slug' => $slug])->first();
        if (isset($product->id)){
            $data = Product::where(['item_code' => $item_code,'slug' => $slug])->with('product_attributes.size','product_attributes.color','sale')->first();
            $sizeList = [];
            $colorList = [];
            foreach ($data->product_attributes as $productAttr) {
                $sizeList[] = $productAttr->size;
            }
            foreach ($data->product_attributes as $productAttr) {
                $colorList[] = $productAttr->color;
            }
            $uniqueColorList = collect($colorList)->unique('id')->values()->all();
            $uniqueSizeList = collect($sizeList)->unique('id')->values()->all();
            // Thêm danh sách các size vào dữ liệu trả về
            $data['sizeList'] = $uniqueSizeList;
            $data['colorList'] = $uniqueColorList;

            return $this->success(['data'=> $data], 'Successfully data fetched');
        }else{
            return $this->error('Product Not found',400,[]);
        }
    }
}
