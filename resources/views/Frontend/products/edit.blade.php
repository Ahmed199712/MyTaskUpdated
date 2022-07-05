@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" class="">
                <h3 style="margin:0;display:flex;justify-content:space-between">
                    Edit Product
                    <div>
                        <a href="{{ route('products.show' , $product->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Name</b></label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $product->name }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Price</b></label>
                                <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $product->price }}">
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>(%)Discount</b></label>
                                <input type="number" name="discount_percentage" class="form-control {{ $errors->has('discount_percentage') ? 'is-invalid' : '' }}" value="{{ $product->discount_percentage }}">
                                @if ($errors->has('discount_percentage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('discount_percentage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Weight</b></label>
                                <input type="text" name="weight" class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" value="{{ $product->weight }}">
                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Rate</b></label>
                                <input type="text" name="rate" class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" value="{{ $product->rate }}">
                                @if ($errors->has('rate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Country</b></label>
                                <input type="text" name="country" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" value="{{ $product->country }}">
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Image</b></label>
                                <input type="file" name="image" style="padding: 10px;height:45px" class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                                <div class="imagePreview text-center">
                                    <img style="width:70%;height:200px;margin-top:5px" class="image-preview img-thumbnail" src="{{ asset($product->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for=""><b>Update</b></label>
                                <button type="submit" class="btn btn-warning form-control">Update Product</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection