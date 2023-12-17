<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{   
    //root page
    public function index(){
        
        $category = Category::all();
        $bannerproduct = Product::where('product_slider',1)->latest()->first();
        return view('frontend.index',compact('category','bannerproduct'));
    }

    //single product page calling method
    public function productDetails($slug){
        $product = Product::where('slug',$slug)->first();
        return view('frontend.product_details',compact('product'));
    }
}
