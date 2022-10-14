<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalQuanty = 0;
    public $totalPrice = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalQuanty = $cart->totalQuanty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function saveCart($product, $id){
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct=$this->products[$id];
            }
        }
        
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalQuanty++;
        $this->totalPrice += $product->price;
    }

    public function delete_cart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
