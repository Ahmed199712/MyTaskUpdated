@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="margin:0;display:flex;justify-content:space-between">
                    All Products
                    <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>(%)Discount</th>
                                <th>Country</th>
                                <th>Weight</th>
                                <th>Rate</th>
                                <th>Shipping</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img style="width:50px" src="{{ asset($product->image) }}" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>
                                        @if( $product->discount_percentage )
                                            %{{ $product->discount_percentage }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ $product->country }}</td>
                                    <td>{{ $product->weight }}</td>
                                    <td>${{ $product->rate }}</td>
                                    <td>${{ ( $product->weight * 10 ) * $product->rate }}</td>
                                    <td>
                                        <a href="{{ route('products.show' , $product->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('products.destroy' , $product->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button title="{{ trans('backend.edit') }} {{ trans('backend.record') }}" type="submit"  class="btn btn-danger delete" style="cursor:pointer">
                                                <i class="fa fa-trash fa-fw"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection