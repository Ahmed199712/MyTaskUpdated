@extends('Frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Cart</div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Country</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Weight</th>
                                    <th>Rate</th>
                                    <th>Shipping</th>
                                    <th>Vat</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                    $shipping = 0;
                                    $vat = 0;
                                    $discount = 0;
                                    $discount_amount = 0;
                                @endphp
                                @foreach(Cart::content() as $index=>$cart)
                                    <tr>
                                        <td><img style="width:50px" src="{{ asset($cart->options->image) }}" alt=""></td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->options->country }}</td>
                                        <td>${{ $cart->price }}</td>
                                        <td>
                                            @if( !$cart->options->discount_percentage == NULL )
                                                %{{ $cart->options->discount_percentage }} <br>
                                                ${{ ($cart->options->discount_percentage * $cart->price ) / 100 }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>{{ $cart->weight }}</td>
                                        <td>${{ $cart->options->rate }}</td>
                                        <td>${{ ($cart->weight * 10) * $cart->options->rate }}</td>
                                        <td>${{ ($cart->price * settings()->vat) / 100 }}</td>
                                        <td><a href="{{ route('carts.delete' , $cart->rowId) }}" class="btn btn-danger">X</a></td>
                                    </tr>
                                    @php $subtotal += $cart->price; @endphp
                                    @php $shipping += ($cart->weight * 10) * $cart->options->rate; @endphp
                                    @php $vat += ($cart->price * settings()->vat) / 100; @endphp
                                    @php $discount += $cart->options->discount_percentage ; @endphp
                                    @php $discount_amount += ($cart->options->discount_percentage * $cart->price ) / 100; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="details">
                        <h3>Invoice Details</h3>
                        <div class="box-details" style="width:50%;background-color:#eee;padding:10px">
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>SubTotal:</b></p><p>${{ $subtotal }}</p>
                            </div>
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>Shipping:</b></p><p>${{ $shipping }}</p>
                            </div>
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>Vat: (%{{ settings()->vat }})</b></p><p>${{ $vat }}</p>
                            </div>
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>Total:</b></p><p>${{ $subtotal + $shipping + $vat }}</p>
                            </div>
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>Discount:</b></p><p>%{{ $discount }} <b>|</b> ( ${{ $discount_amount }} )</p>
                            </div>
                            <div style="border-bottom:1px solid #fff;display:flex;justify-content:space-between">
                                <p><b>Grand Total:</b></p><p>${{ $subtotal + $shipping + $vat - $discount_amount }}</p>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
