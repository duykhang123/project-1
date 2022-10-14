<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\ProductCategories;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.page.index');
    }

    public function product($slug)
    {
        $item = \App\Models\Product::where('status', 'active')->where('slug', $slug)->first();
        if($item == null){
            abort(404);
        }
        $productRelative = \App\Models\Product::where('status','active')->where('categories_id',$item->categories_id)->where('id','!=',$item->id)->orderBy('id','DESC')->limit(4)->get();
        
        return view('frontend.page.product-details')->with('item', $item)
                                       ->with('productRelative', $productRelative);
    }

    public function productcate($slug,$id)
    {
        
        //$productRelative = \App\Models\ProductCategories::join('products','productcategories.id','=','products.categories_id')->where('products.categories_id',$id)->get();
        $test = ProductCategories::where('id',$id)->first();
        
        $productRelative = $test->products;
        if($productRelative == null){
            abort(404);
        }
        return view('frontend.page.shop')->with('productRelative', $productRelative);
    }

    public function show_brand($slug,$id)
    {
        
        //$productRelative = \App\Models\Brand::join('products','brand.id','=','products.brand_id')->where('products.brand_id',$id)->get();
        $test = Brand::where('id',$id)->first();
        $productRelative = $test->products;
        if($productRelative == null){
            abort(404);
        }
        return view('frontend.page.shop')->with('productRelative', $productRelative);
    }

    
}
