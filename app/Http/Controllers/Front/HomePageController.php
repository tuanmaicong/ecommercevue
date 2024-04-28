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

    public function getCategoryData($slug = '')
    {
        $category = Category::where('slug',$slug)->first();
        if (isset($category->id)){
            $products = Product::where('category_id',$category->id)->with('product_attributes','sale')
                ->select('id','name','slug','image','item_code','sale_id')->paginate(10);
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
}
