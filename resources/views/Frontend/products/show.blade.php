@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" class="">
                <h3 style="margin:0;display:flex;justify-content:space-between">
                    Product Details
                    <div>
                        <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-thumbnail" style="width:100%" src="{{ asset($product->image) }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h3><b>Name:</b> {{ $product->name }}</h3>
                        <h3><b>Price:</b> ${{ $product->price }}</h3>
                        <h3><b>Discount:</b> %{{ $product->discount_percentage }} <b>|</b> ${{ $product->discount_percentage * $product->price / 100 }}</h3>
                        <h3><b>Country:</b> {{ $product->country }}</h3>
                        <h3><b>Weight:</b> {{ $product->weight }}</h3>
                        <h3><b>Rate:</b> ${{ $product->rate }}</h3>
                        <h3><b>Shipping:</b> ${{ ( $product->weight * 10 ) * $product->rate }}</h3>
                        <h3><b>Vat:</b> ${{ settings()->vat * $product->price / 100 }}</h3>
                        <a href="{{ route('carts.add',$product->id) }}" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection