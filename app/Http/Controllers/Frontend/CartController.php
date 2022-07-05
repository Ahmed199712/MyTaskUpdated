<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('Frontend.carts.index');
    }

    public function addToCart($product_id)
    {
        $product = Product::find($product_id);

        $vat = settings()->vat;

        $carts = Cart::content();
        
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'price' => $product->price, 
            'weight' => $product->weight, 
            'vat' => ($product->price * $vat) / 100, 
            'options' => [
                'image' => $product->image,
                'rate' => $product->rate, 
                'country' => $product->country, 
                'shipping' => ($product->weight * 10) * $product->rate, 
                'discount_percentage' => $product->discount_percentage, 
            ]
        ]);

        session()->flash('success' , 'Items Added To Your Cart !');
        return redirect()->route('carts.index');
    }

    public function deleteFromCart($rowId)
    {
        Cart::remove($rowId);

        session()->flash('success' , 'Product Removed From Cart !');
        return redirect()->back();
    }
}
