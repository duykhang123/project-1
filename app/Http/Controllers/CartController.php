<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cart as MainModel;
use  App\Models\Product;
use Session;

class CartController extends Controller
{
    public $path = 'cart';
    public $controllerName = 'cart.element';

    public function show_cart(){
        return view('frontend.page.cart');
    }

    public function add_cart(REQUEST $request,$id){
        $product = Product::where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new MainModel($oldCart);
            $newCart->saveCart($product,$id);
            $request->session()->put('Cart',$newCart);
        }
        return view('frontend.page.list-cart');
        
    }

    public function delete_cart(REQUEST $request,$id){
        
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new MainModel($oldCart);
        $newCart->delete_cart($id);
        if (count($newCart->products) > 0) {
            $request->Session()->put('Cart',$newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        return view('frontend.page.list-cart');
    }

    public function delete_item_cart (REQUEST $request,$id){
        
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new MainModel($oldCart);
        $newCart->delete_cart($id);
        if (count($newCart->products) > 0) {
            $request->Session()->put('Cart',$newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        return view('frontend.page.cart');
    }
}
