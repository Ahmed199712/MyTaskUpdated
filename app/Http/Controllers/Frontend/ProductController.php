<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();

        return view('Frontend.products.index' , compact('products'));
    }


    public function create()
    {
        return view('Frontend.products.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required|min:1|max:8',
            'discount_percentage' => 'nullable',
            'country' => 'required|min:2|max:20',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'rate' => 'required',
            'weight' => 'required'
        ]);

        $product = new Product;
        if( $request->image ){
            Image::make($request->image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products/'.$request->image->hashName());
            $product->image = 'uploads/products/' . $request->image->hashName();
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->country = $request->country;
        $product->discount_percentage = $request->discount_percentage;
        $product->weight = $request->weight;
        $product->rate = $request->rate;
        $product->save();

        session()->flash('success' , 'Product Created Successfully...');
        return redirect()->route('products.index');
    }

    
    public function show(Product $product)
    {
        return view('Frontend.products.show' , compact('product'));
    }

    
    public function edit(Product $product)
    {
        return view('Frontend.products.edit' , compact('product'));
    }

    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required|min:1|max:8',
            'discount_percentage' => 'nullable',
            'country' => 'required|min:2|max:20',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'weight' => 'required'
        ]);

        if( $request->image ){
            if($product->image != 'uploads/products/default.png'){
                unlink($product->image);
            }
            Image::make($request->image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products/'.$request->image->hashName());
            $product->image = 'uploads/products/' . $request->image->hashName();
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->country = $request->country;
        $product->discount_percentage = $request->discount_percentage;
        $product->weight = $request->weight;
        $product->rate = $request->rate;
        $product->save();

        session()->flash('success' , 'Product Updated Successfully...');
        return redirect()->route('products.index');
    }

    
    public function destroy(Product $product)
    {

        if($product->image != 'uploads/products/default.png'){
            unlink($product->image);
        }
        
        $product->delete();

        session()->flash('success' , 'Product Deleted Successfully...');
        return redirect()->route('products.index');
    }
}
