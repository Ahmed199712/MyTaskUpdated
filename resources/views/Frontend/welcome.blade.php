@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
    
        <div class="card cart-primary">
            <div class="card-header">
                <h4 style="margin:0">All Products</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-3">
                            <div class="card" style="padding:5px 20px">
                                <div class="image text-center">
                                    <img class="img-thumbnail" style="width:100%;height:300px" src="{{ asset($product->image) }}" alt="">
                                </div>
                                <h4 class="pt-2"><b>Name:</b> {{ $product->name }}</h4>
                                @if( $product->discount_percentage == NULL )
                                    <h4 class=""><b>Price:</b> ${{ $product->price }}</h4>
                                @else
                                    <h4 class="price_before_discount">
                                        <b>Price:</b> ${{ $product->price }}
                                    </h4>
                                    <h5 class=""><b>Discount:</b> <span class="text-danger">%{{ $product->discount_percentage }}</span> <b>|</b> <span class="text-success">${{ $product->discount_percentage * $product->price / 100 }}</span></h5>
                                    <h4 class="">
                                        <b>New Price:</b> <span class="" style="color:tomato;font-weight:bold">${{ $product->price - ($product->discount_percentage * $product->price / 100) }}</span>
                                    </h4>
                                @endif
                                <h4 class=""><b>Country:</b> {{ $product->country }}</h4>
                                <a href="{{ route('carts.add',$product->id) }}" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection