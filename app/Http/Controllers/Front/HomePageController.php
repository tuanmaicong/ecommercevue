<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class HomePageController extends Controller
{
    use ApiResponse;
    public function getHomeData()
    {
        $data = [];
        $data['banner'] = HomeBanner::get();
        $data['categories'] = Category::with('product')->get();
        $data['brands'] = Brand::get();
        return $this->success(['data'=> $data], 'Successfully data fetched');
    }

}
