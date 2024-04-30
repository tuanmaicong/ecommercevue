<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttribute;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

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
        $data['products'] = Product::select('id','category_id','image','name','slug','item_code','sale_id')->with('product_attributes','sale')->get();
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
}
