<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
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
        $data = Category::where('slug',$slug)->with('product:id,category_id,name,slug,image,item_code,sale_id')->get();
        return $this->success(['data'=> $data], 'Successfully data fetched');
    }
}
