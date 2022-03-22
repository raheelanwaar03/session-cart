@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cart Items 
                        <a href="{{ route('product.index') }}">Main page</a></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-md-3 text-center">
                                <div class="product">
                                    <div class="product-image">
                                        <a href="{{ route('product.show', ['product' => $product->id]) }}">
                                            <img src="{{ asset('images/' . $product->image) }}" alt="product" class="img-fluid">                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <h3>{{ $product->name }}</h3>
                                        <p>Rs: {{ number_format($product->price, 2) }}/-</p>
                                        <form action="{{ route('cart.destroy',['cart' => $product->id ]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" value="Remove From Cart" class="btn btn-primary btn-sm">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <h2>No Product In Cart</h2>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection